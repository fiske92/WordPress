<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
// END iThemes Security - Do not modify or remove this line

/** Enable W3 Total Cache */
/** Enable W3 Total Cache */
/** Enable W3 Total Cache */
/** Enable W3 Total Cache */
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'afisic_digitel' );
/** Database username */
define( 'DB_USER', 'afisic_digitalKorisnik' );
/** Database password */
define( 'DB_PASSWORD', 'bMvMhp95,G,M' );
/** Database hostname */
define( 'DB_HOST', 'localhost' );
/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );
/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'qMpWA0Qa9H.c1vd;V#&RK0Mu[?5eTnm*>&jc|6K)3sjc3$Bcvt[{FF&.Wfg%Kv3e' );
define( 'SECURE_AUTH_KEY',  'ul}j];s%7%(PBA<k4?`9Is>3+n{mUoxvU_a0Y~]a JT?.MhG<ni{:Od1)cxI(vi*' );
define( 'LOGGED_IN_KEY',    '9u Wl6ie@qM2Hk/8fY<c}N0e9B44:4?{a$0wuj?qZ=c0c=WEq5oPK@)2g)q4F)>v' );
define( 'NONCE_KEY',        '}*@j0gb}JXF%aLYRhhEu`fBr.wV[g}SN]]C!Sa;LAnRf-d7G_38Z4b2ELnUrfM~I' );
define( 'AUTH_SALT',        '1v+Qs,qWR!P9mmpxVs2bI=aH=V]HFSV*h_} {FBI6mC5-YM7hz]]h/7QG>jyei4X' );
define( 'SECURE_AUTH_SALT', 'e5}U/t/Z2f%@/;18O+noPs?V|&RRWK~>+u@.[`4+8>O6LGk7Vjj&Zk]]fU]ghQg0' );
define( 'LOGGED_IN_SALT',   '<,Y7#MR>L;^;h407[eXja=ep@)]J.%;o.R]Cd2)SY@`![lqLm}ZnD<~w  il}1Jd' );
define( 'NONCE_SALT',       '{j7b$o^0;ya:5JHL!$N2@wIe:eK7t!MPFCZZ2~+: ;B%?s$*_g LuDCELB.)`.Y9' );
/**#@-*/
/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';
/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
/* Add any custom values between this line and the "stop editing" line. */
/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
