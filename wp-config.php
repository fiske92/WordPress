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
define( 'DB_NAME', 'afisic_vezbaUtorak' );

/** Database username */
define( 'DB_USER', 'afisic_vezbaUtorakKorisnik' );

/** Database password */
define( 'DB_PASSWORD', 'a!wqrMeq;C#[' );

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
define( 'AUTH_KEY',         ']T;56DaDNX9w;6FLOHABB2pTi&xr|!>+rmwlhyK~t5<Kp0VZ,M/Z8DUDE#ci>u(}' );
define( 'SECURE_AUTH_KEY',  'g.44h~57Lvk^-3z9D_.,*q4YbBL;,bZ3Qb|8zsj}/C%dIyGhJABB,BNk 0#@o|[t' );
define( 'LOGGED_IN_KEY',    'S1W{ZW~G~c1?MjiHE2ufi*Y0/lB?$RiSe^UG;vU{qU*-Jr?]6e90+@Ih/!U@!:9K' );
define( 'NONCE_KEY',        'avcx;^!Wa1:#cL,NYk|O(Q%}tWUGozZW-,SRMp*&]8}YZ#C]^=[&dT5V:3ODOgrr' );
define( 'AUTH_SALT',        'y^.%Wsywnkiq_;gTpAFJ/l+CdHJ:9_JRKe 762SG1o+a4bh1JmSmat{c[!xo|~TN' );
define( 'SECURE_AUTH_SALT', '4.A}w!0WgD4<@0[{SUu~p6z$7$RT.~8d: #,Hm@F!X $2sstAs9+#V~+<D={SE#v' );
define( 'LOGGED_IN_SALT',   ']>I|z<X;!]cQZ>#AeQm<.?/$HJG82ZR13K=OmDWet_wz$.+<jb.5,|S/$P@xn[#a' );
define( 'NONCE_SALT',       '$us+U07U8+vGPN /!OG3*n$3$@|V~)/[F{LDu2{cGzG&uEf?VW f7LwfxFdT+yTc' );

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
