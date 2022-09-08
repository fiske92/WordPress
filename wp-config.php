<?php
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
define( 'DB_NAME', 'afisic_roman' );

/** Database username */
define( 'DB_USER', 'afisic_romanKorisnik' );

/** Database password */
define( 'DB_PASSWORD', 't820fdTo~3?k' );

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
define( 'AUTH_KEY',         '~~6=R3;nDis}mRKnv$u[1qaK7?HIrWE0KUMyvCd$I$,jQyIo9?.c1E*]7rm=@ypN' );
define( 'SECURE_AUTH_KEY',  'Rt(_I~7W%$T3Bw6D5T[jQgjz.(GZ7[*Aw[[sj{aiNt&Dnrpz(5P<E1MA%u]fEs.a' );
define( 'LOGGED_IN_KEY',    '45<gaPI/ ;l.4nFkAu9fS iwD[:FF{$vKx-J_{.5w#t}]5:AWt :x&X;l]8.A L[' );
define( 'NONCE_KEY',        '8ob@tn)RZ?sP+<j.FO*]guM7{7 LBXp~H@[e$r?e%LRFd3s_*keab>F;)j]0,jFG' );
define( 'AUTH_SALT',        ')n]zi$#wcx{?i7cPGmed<5;&[Oe<ggoKZA{RstM,v_7Z>qubmD6ZY4uN;Wx594zx' );
define( 'SECURE_AUTH_SALT', '#]lFt4o(A>:xZd(!35*Pfu?oXWez`^-4<|{-;c]-(N>CS=;8TjmhOp@x7gp&</|F' );
define( 'LOGGED_IN_SALT',   '^LNu7z>~E4BDtm`iFCULid)w)Zj/sgfVDV~[-2g(L+1/wTN!1+T2<,FeP-l@1))3' );
define( 'NONCE_SALT',       'mX5Aa`?v^PZ9R@JnPj<3( W?iA8D<tI)2Mp4uWC@T`|[KV}{,3<&4`prVJ5e9JPY' );

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
