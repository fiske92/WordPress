<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache


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
define( 'DB_NAME', 'afisic_portfolio' );
/** Database username */
define( 'DB_USER', 'afisic_portfolioKorisnik' );
/** Database password */
define( 'DB_PASSWORD', '&vZm4R!0gla1' );
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
define( 'AUTH_KEY',         'j)Zt>v]c7?a@oP6.+1:?V|{{B(=iW_%uW^PaIp.gXdR,lh{#Qw,QmMkMkC3e*(*N' );
define( 'SECURE_AUTH_KEY',  'Gp;3kBP/Ug9PDdlaQb;V2UT3+q TAe$=]~ST)#Fj^HOZ*;3>9M!rhccaX`lWLTjH' );
define( 'LOGGED_IN_KEY',    '!>M <azxHirQKnp=P{M-VyQDxnR7W)Be q#zFMVoF<^+vH=8hK&s,s^/!Wrl8sdz' );
define( 'NONCE_KEY',        'DI8oH4`hO(SuHN{}L3tgRk_}K,W{E:~%]~T&}CavdMK!`HI N%niCb&MC&[EE|n/' );
define( 'AUTH_SALT',        'KLOX@:i(PPZe&?W*b0HMuI8]oNtPp:9|56Kd=6C={;1wE/~Q-f`WNY*];a+O0jmU' );
define( 'SECURE_AUTH_SALT', 'E5w_=KnBygdeDOVt8h%55AGkblQ2YMGb]hJb3onPa@XSATmC5m-)w+UAG@Cymf%j' );
define( 'LOGGED_IN_SALT',   'F%$:Qmny83JZR[Ia2SY](C`f`dClr`dp=!)&YTHJJI[$vHyN7mG&Na{zjwzgTiyc' );
define( 'NONCE_SALT',       '!hp?8L^NtS,J&q[dWeJOkV=bgIaO/-&Ryv-8(w?yt.@b!>k<Q|kH}$uZ:RZ+u<B1' );
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