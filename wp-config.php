<?php
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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wd');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'll8=GiwbDr+|r{|NpBkTEA>hpvBf$ZQt}w?]d?<K`85C5$xp48cLDq_6vt%q@;L4');
define('SECURE_AUTH_KEY',  'zsMQ% w{u{{a6}aKfabn3y<g!_j+5#uj#wJU;>H/!o@B1nl>sQ-RC#11;R8jCRZa');
define('LOGGED_IN_KEY',    'g6q*w*}pm*-;U1^3n-2BaznKK|YnvQi9Ge-]t[-{%!L:R]4=(J8R*tAv{(SJwG]3');
define('NONCE_KEY',        's-2d{wm<e]rSb]y(!HWCzIECrF#d`*a& KHh:mnXFB&:]/Y;i+,ss!XImE$hM($_');
define('AUTH_SALT',        '7_=K)-rb8 ]`MA25*?N0sJDS2d(8@Jl8DUrFvEeA-GCq9{A]X$I`>Hva/~gOXXwI');
define('SECURE_AUTH_SALT', 'lZ&~]G.rO{ikrYI%Og?)yA.ox$Q@3cyB.|,; u5k[6bL}BU9oe9oOJ=iuB]tglB>');
define('LOGGED_IN_SALT',   'nvs8Gk1w^!)*h%>(w!gXSLHc3#vqL=P.TW NsZ%83&5$WW&n!]H0CZNaN$Mm-sal');
define('NONCE_SALT',       'y:oUbNO4/#:V$O*v1cOr_dwoz+&-(j0x+86XnvNsrvq|1qrB8 xAOd^k[0Q,1pz&');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
