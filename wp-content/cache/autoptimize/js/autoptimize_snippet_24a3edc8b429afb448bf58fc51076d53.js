
(function (root, factory) {
    if (typeof define === "function" && define.amd) {
        define([], factory);
    } else if (typeof module === "object" && module.exports) {
        module.exports = factory();
    } else {
        root.PDFObject = factory();
    }
}(this, function () {
    "use strict";
    if( typeof window === "undefined" ||
        window.navigator === undefined ||
        window.navigator.userAgent === undefined ||
        window.navigator.mimeTypes === undefined){
        return false;
    }
    let pdfobjectversion = "2.2.6";
    let nav = window.navigator;
    let ua = window.navigator.userAgent;
    /*
        IE11 still uses ActiveX for Adobe Reader, but IE 11 doesn't expose window.ActiveXObject the same way
        previous versions of IE did. window.ActiveXObject will evaluate to false in IE 11, but "ActiveXObject"
        in window evaluates to true.
        MS Edge does not support ActiveX so this test will evaluate false
    */
    let isIE = ("ActiveXObject" in window);
    /*
        There is a coincidental correlation between implementation of window.promises and native PDF support in desktop browsers
        We use this to assume if the browser supports promises it supports embedded PDFs
        Is this fragile? Sort of. But browser vendors removed mimetype detection, so we're left to improvise
    */
    let isModernBrowser = (window.Promise !== undefined);
    let supportsPdfMimeType = (nav.mimeTypes["application/pdf"] !== undefined);
    let isSafariIOSDesktopMode = (  nav.platform !== undefined &&
        nav.platform === "MacIntel" &&
        nav.maxTouchPoints !== undefined &&
        nav.maxTouchPoints > 1 );
    let isMobileDevice = (isSafariIOSDesktopMode || /Mobi|Tablet|Android|iPad|iPhone/.test(ua));
    let isSafariDesktop = ( !isMobileDevice &&
        nav.vendor !== undefined &&
        /Apple/.test(nav.vendor) &&
        /Safari/.test(ua) );
    let isFirefoxWithPDFJS = (!isMobileDevice && /irefox/.test(ua) && ua.split("rv:").length > 1) ? (parseInt(ua.split("rv:")[1].split(".")[0], 10) > 18) : false;
    /* ----------------------------------------------------
       Supporting functions
       ---------------------------------------------------- */
    let createAXO = function (type){
        var ax;
        try {
            ax = new ActiveXObject(type);
        } catch (e) {
            ax = null; //ensure ax remains null
        }
        return ax;
    };
    let supportsPdfActiveX = function (){ return !!(createAXO("AcroPDF.PDF") || createAXO("PDF.PdfCtrl")); };
    let supportsPDFs = (
        !isMobileDevice && (
            isModernBrowser ||
            isFirefoxWithPDFJS ||
            supportsPdfMimeType ||
            (isIE && supportsPdfActiveX())
        )
    );
    let buildURLFragmentString = function(pdfParams){
        let string = "";
        let prop;
        if(pdfParams){
            for (prop in pdfParams) {
                if (pdfParams.hasOwnProperty(prop)) {
                    string += encodeURIComponent(prop) + "=" + encodeURIComponent(pdfParams[prop]) + "&";
                }
            }
            if(string){
                string = "#" + string;
                string = string.slice(0, string.length - 1);
            }
        }
        return string;
    };
    let embedError = function (msg, suppressConsole){
        if(!suppressConsole){
            console.log("[PDFObject] " + msg);
        }
        return false;
    };
    let emptyNodeContents = function (node){
        while(node.firstChild){
            node.removeChild(node.firstChild);
        }
    };
    let getTargetElement = function (targetSelector){
        let targetNode = document.body;
        if(typeof targetSelector === "string"){
            targetNode = document.querySelector(targetSelector);
        } else if (window.jQuery !== undefined && targetSelector instanceof jQuery && targetSelector.length) {
            targetNode = targetSelector.get(0);
        } else if (targetSelector.nodeType !== undefined && targetSelector.nodeType === 1){
            targetNode = targetSelector;
        }
        return targetNode;
    };
    let generatePDFJSMarkup = function (targetNode, url, pdfOpenFragment, PDFJS_URL, id, omitInlineStyles){
        emptyNodeContents(targetNode);
        let fullURL = PDFJS_URL + "?file=" + encodeURIComponent(url) + pdfOpenFragment;
        let div = document.createElement("div");
        let iframe = document.createElement("iframe");
        iframe.src = fullURL;
        iframe.className = "pdfobject";
        iframe.type = "application/pdf";
        iframe.frameborder = "0";
        iframe.allow = "fullscreen";
        if(id){
            iframe.id = id;
        }
        if(!omitInlineStyles){
            div.style.cssText = "position: absolute; top: 0; right: 0; bottom: 0; left: 0;";
            iframe.style.cssText = "border: none; width: 100%; height: 100%;";
            targetNode.style.position = "relative";
            targetNode.style.overflow = "auto";
        }
        div.appendChild(iframe);
        targetNode.appendChild(div);
        targetNode.classList.add("pdfobject-container");
        return targetNode.getElementsByTagName("iframe")[0];
    };
    let generatePDFObjectMarkup = function (embedType, targetNode, targetSelector, url, pdfOpenFragment, width, height, id, title, omitInlineStyles){
        emptyNodeContents(targetNode);
        let embed = document.createElement(embedType);
        if ('object' === embedType ) {
            embed.data = url + pdfOpenFragment;
        }else{
            embed.src = url + pdfOpenFragment;
        }
        embed.className = "pdfobject";
        embed.type = "application/pdf";
        embed.title = title;
        if(id){
            embed.id = id;
        }
        if(embedType === "iframe"){
            embed.allow = "fullscreen";
        }
        if(!omitInlineStyles){
            let style = (embedType === "embed") ? "overflow: auto;" : "border: none;";
            if(targetSelector && targetSelector !== document.body){
                style += "width: " + width + "; height: " + height + ";";
            } else {
                style += "position: absolute; top: 0; right: 0; bottom: 0; left: 0; width: 100%; height: 100%;";
            }
            embed.style.cssText = style;
        }
        targetNode.classList.add("pdfobject-container");
        targetNode.appendChild(embed);
        return targetNode.getElementsByTagName(embedType)[0];
    };
    let embed = function(url, targetSelector, options){
        let selector = targetSelector || false;
        let opt = options || {};
        let id = (typeof opt.id === "string") ? opt.id : "";
        let page = opt.page || false;
        let pdfOpenParams = opt.pdfOpenParams || {};
        let fallbackLink = opt.fallbackLink || true;
        let width = opt.width || "100%";
        let height = opt.height || "100%";
        let title = opt.title || "Embedded PDF";
        let assumptionMode = (typeof opt.assumptionMode === "boolean") ? opt.assumptionMode : true;
        let forcePDFJS = (typeof opt.forcePDFJS === "boolean") ? opt.forcePDFJS : false;
        let supportRedirect = (typeof opt.supportRedirect === "boolean") ? opt.supportRedirect : false;
        let omitInlineStyles = (typeof opt.omitInlineStyles === "boolean") ? opt.omitInlineStyles : false;
        let suppressConsole = (typeof opt.suppressConsole === "boolean") ? opt.suppressConsole : false;
        let forceIframe = (typeof opt.forceIframe === "boolean") ? opt.forceIframe : false;
        let forceObject = (typeof opt.forceObject === "boolean") ? opt.forceObject : false;
        let PDFJS_URL = opt.PDFJS_URL || false;
        let targetNode = getTargetElement(selector);
        let fallbackHTML = "";
        let pdfOpenFragment = "";
        let fallbackHTML_default = "<p>This browser does not support inline PDFs. Please download the PDF to view it: <a href='[url]'>Download PDF</a></p>";
        if(typeof url !== "string"){ return embedError("URL is not valid", suppressConsole); }
        if(!targetNode){ return embedError("Target element cannot be determined", suppressConsole); }
        if(page){ pdfOpenParams.page = page; }
        pdfOpenFragment = buildURLFragmentString(pdfOpenParams);
        if(forcePDFJS && PDFJS_URL){
            return generatePDFJSMarkup(targetNode, url, pdfOpenFragment, PDFJS_URL, id, omitInlineStyles);
        }
        if(supportsPDFs || (assumptionMode && !isMobileDevice)){
            let embedtype = (forceIframe || supportRedirect || isSafariDesktop) ? "iframe" : (forceObject ? "object" : "embed");
            return generatePDFObjectMarkup(embedtype, targetNode, targetSelector, url, pdfOpenFragment, width, height, id, title, omitInlineStyles);
        }
        if(PDFJS_URL){
            return generatePDFJSMarkup(targetNode, url, pdfOpenFragment, PDFJS_URL, id, omitInlineStyles);
        }
        if(fallbackLink){
            fallbackHTML = (typeof fallbackLink === "string") ? fallbackLink : fallbackHTML_default;
            targetNode.innerHTML = fallbackHTML.replace(/\[url\]/g, url);
        }
        return embedError("This browser does not support embedded PDFs", suppressConsole);
    };
    return {
        embed: function (a,b,c){ return embed(a,b,c); },
        pdfobjectversion: (function () { return pdfobjectversion; })(),
        supportsPDFs: (function (){ return supportsPDFs; })()
    };
}));