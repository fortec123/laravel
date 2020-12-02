<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'egg_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'fortec@123' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '9)/-< 06eOF=:KWVJRg#rmbD>_d><z1pok`DFW|I:G9ppwg7lggj0F]EO]o5HhML');
define('SECURE_AUTH_KEY',  'N4OTQE2g&c+l-S|l;{6b>-?g]m2C2>j->k2i%)|ixP+.Y|uwG7s9Yp^fpD?|y15T');
define('LOGGED_IN_KEY',    'lmZQ;%v$Nr4sz1F.#7aDMplzmI|/&1y@|5Y7g0e<n#kcMD4ce4+(6%.o$./L+b?k');
define('NONCE_KEY',        '9eY.E<y+%~|#pi,kbM{fmldK%$<dCfdNtu;D];>ae+l#XN!U6JRDsX{;%-:j5|Qv');
define('AUTH_SALT',        '^ZmCE/E/(f,:_ [!i^2Br3-V]<v@$dpr!+H(5.!XExe${aB=(IQ}iQKnhd&-0e =');
define('SECURE_AUTH_SALT', ';+W+umW5R t B89=,s6C!Z{.G^mg%=VTi<Q5*0q-a2;mCF@>V)/XU?t<tUp3&=`X');
define('LOGGED_IN_SALT',   '8xM D[2sW&F28+Uw-sjh<nhTn:WJs{`_:LUR-)Q~)VXvA][J]&}r*|+fgYe.w_I5');
define('NONCE_SALT',       'j`b7~U{m7Lc.$EGMIoVk+mV/d$isyM,As1BY1P~+SQ?xjZ#=x_fOuzz/P hb[jr`');

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
