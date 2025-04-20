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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'idgx-capital' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'Xl+3d(`FVpct=qlDrO/X[V& `k06OI Bxy_wci<MC.<U5Ucc;+LY6 +|!)=BbdrH' );
define( 'SECURE_AUTH_KEY',  '(%q+WGBcUK(L9F oJLVbivF=}.xt^^>3j=&m{g+P+:ILD:q;_[tpfNek>>&+d3J$' );
define( 'LOGGED_IN_KEY',    'a%`ggtN[c]qDaZr(&MSFV9N!4hcVy:1s]+.||R44MTzN08rD=698yaq,O|R2#HpA' );
define( 'NONCE_KEY',        'CTriB[qzP+h!V]%Tr !OF/4H$_7cTwtpWWz2y>.U59tabI)TBpzn%YJv1Y!8zz,9' );
define( 'AUTH_SALT',        ';$+Gf]n1GHd^H!$@XapkIm: #!xPhoN/Ho6u?9ECv@ZJ4FZoCb~%rFY15!3^?zC4' );
define( 'SECURE_AUTH_SALT', ';B,^,>Btp W=oO)v4d6h1~^[e-t/9JhLO7s$ueeQ,]?eay]kdNvGk?!IYH.OKk|i' );
define( 'LOGGED_IN_SALT',   'BwB}~{zf[wYvg=0`]7#Tfac?b;~?;}~F5z2!3%aW.7L=3tJ<;G([nH7m(]VnO;(5' );
define( 'NONCE_SALT',       'HXMoBW[VIycOcM+BuPTHNHrI#KxPWJx7u){<Zfx8Zsq$d) B2$wl.oksIL5&N(<V' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */
@ini_set('upload_max_filesize', '256M');
@ini_set('post_max_size', '256M');
@ini_set('max_execution_time', '300');
@ini_set('memory_limit', '1024M');



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}


/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
