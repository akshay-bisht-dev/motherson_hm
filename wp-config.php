<?php


//Enable error logging.
@ini_set('log_errors', 'On');
@ini_set('error_log', '/home/u296941949/domains/ms.wixcellent.com/public_html/wp-content/elm-error-logs/php-errors.log');

//Don't show errors to site visitors.
@ini_set('display_errors', 'Off');
if ( !defined('WP_DEBUG_DISPLAY') ) {
	define('WP_DEBUG_DISPLAY', false);
}

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
define( 'DB_NAME', 'u296941949_qRTb9' );

/** Database username */
define( 'DB_USER', 'u296941949_9VZOV' );

/** Database password */
define( 'DB_PASSWORD', 'h8F9HrkmKf' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',          'BW8<;>^r:#cX3*:i)q>9{nSzx*h#_5e$fRn4=T>ku;O HV[9Coc4=<,:&}Pc D0^' );
define( 'SECURE_AUTH_KEY',   'vym&H6}Wvmw#0h3T?m1R1ifAm5QrG?^bb57tkz[z#_~JXOCX2Ztpx&$w@z]rv`6x' );
define( 'LOGGED_IN_KEY',     'Pk_R><^54@a2>53KRa-)tJTxL?7F?Ck-5b1mM1-MVuRz*D-?Dm+haPzV@is|=RD&' );
define( 'NONCE_KEY',         'rfnjj]88%Q[#`tNo Fiqxv]5)4HvFl^LP1R@wUlUlk:cCPQ. hdf~OZuSq-vsP@G' );
define( 'AUTH_SALT',         'pl=Q|pm}qDtyX! -UZ1YF1Skl#rq)/2PO`7+-r)h%v3X@0Fi5CCB7/rQCSg6^(3{' );
define( 'SECURE_AUTH_SALT',  'fe=`7iYKnUz2r?IsHa=V8^.h)V*LwoMtRXVRd)f(>B-0w^[byv:8Nl@%@n~E _y+' );
define( 'LOGGED_IN_SALT',    '^xLZwP}K-0ehw+bW+uZ@;]8o)AoKWf6$3H>;l6dTbTkg!)JhxK;dNznX(J42$%jD' );
define( 'NONCE_SALT',        'xlINT=w#H^@n3#$Shl>3(VN;#E0ny8kCi,$B@_!3k~g6R%=JHrU|+yEAaCy`) `x' );
define( 'WP_CACHE_KEY_SALT', 'z-_B&O}FzvA^yhnx8xot&S.wimo,aILj6PXXnvfx8&=4;oLLce__)x!NVw}@N6u&' );


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

define('WP_MEMORY_LIMIT', '1024M');


define( 'FS_METHOD', 'direct' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
