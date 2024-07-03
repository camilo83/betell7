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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'betell_db' );

/** Database username */
define( 'DB_USER', 'camilo83' );

/** Database password */
define( 'DB_PASSWORD', 'WBovfnnlzxy5ENbv1AKHRP0jDSpR6dhG' );

/** Database hostname */
define( 'DB_HOST', 'dpg-cq2lgpbv2p9s73evt9eg-a.oregon-postgres.render.com' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'W L;RihN9).k$ji1;/IN#)L,2`/7o!GJiJTEx}kgId*e~JE.ft!D=*3!X 4Qp2ZT' );
define( 'SECURE_AUTH_KEY',   'mB t(kvu73+#tFw|+a3L?Ol(``wNW0cqTLF#)~w&>f;z~[P*d M:fr,p<%yU$^aO' );
define( 'LOGGED_IN_KEY',     'Y?>z]k~Y:+3D-c;HIsmc_gkr~ IPQwT,+8-n,U%sHL-LjeTyWR<MFdNS#7^ySrk<' );
define( 'NONCE_KEY',         'k_gu`*~i9L#,[UO+)fAGw^P t)#9FMzbkV8?Iv,5~6yB0 *9xlunE[,$u6m9aKUC' );
define( 'AUTH_SALT',         '#bf0iex1{&CoJ.o[nLbf}gi&x^*y-h)_Pv<1QSf?V7`jxg&zj7lnc7cCS.&kMo.F' );
define( 'SECURE_AUTH_SALT',  'yJ?Ta}Q#W~>$>N:=:j=-t^R3PE}k!%$C/LQ|AF*UM,C:GK?{8l>~02{yrQsMGGyi' );
define( 'LOGGED_IN_SALT',    'eLh~TKc%pW@D.lw/usV;o<ttSegJ!xlD4a~$(WlPu$b9V)i?9k]c;3$xb[*@QM>_' );
define( 'NONCE_SALT',        '{Qt2!h}I/#jhL$bHRM|yjTy-4{U@e^@dsFX!P%;46KM/k&U5-@+c;D>-BpZ]6PsK' );
define( 'WP_CACHE_KEY_SALT', ';D4Lf!x#T*g.J&.aBZ#_X{DW/}TE$Zt>ZQH(uV&<H?|.It<QnQI*ZX^?{usiyh1Q' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
