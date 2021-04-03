<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ir3300_3300blog');

/** MySQL database username */
define('DB_USER', 'ir3300_3300blog');

/** MySQL database password */
define('DB_PASSWORD', 'pwSJothXscM2Cyom');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '9;!$+Q5eNcL.?QU)9:c6&FqJ^QyS9VOf>%6Vw>x/W7G-#u%?B~T$znoJpV}+`<nm');
define('SECURE_AUTH_KEY',  '8bWci`7_n9wY(c)0!Cw=N?SxI!+QQZ]cH_fCxF<zD}oYHm6bm+y59b]jP-AOzWm:');
define('LOGGED_IN_KEY',    'D|3`%sW }ojC=WO@bJjjn*89L!!0z?ztY[/z:f3i`B^*_@Js/v=1X0ceL{?.Fv9h');
define('NONCE_KEY',        'OYY9M#YI/$CQ),cFN9zCRU,Sq:TiR#j..hvL74}!1A$R=7>w< PcXe/W};-;m+3<');
define('AUTH_SALT',        ')3H,f&8khzIDImz^T[KFc.CA@0F;Q}ZQk8Xm)|jck,Tq3E35LTT,t fb/JU&c_X`');
define('SECURE_AUTH_SALT', 'Rv:/7*r~k}Hh+)^;u}D.j1Z|d9ZE7HJ_]55U2$;Vm2_LXNNI(]3LEEA^T>B-=x?f');
define('LOGGED_IN_SALT',   'VZZbct]fhnMCcGjuKa)aBF-!#QR-7tygD}x1ineWS2@}j@;+0@kB*K;V6#@riW@6');
define('NONCE_SALT',       'eEU+iMyuxXRkGdhB7P#T_l!x&`gr6%:|-4*0 :-LkYQxj||$ezR*viL)C3,B<Q<B');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'bl_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');