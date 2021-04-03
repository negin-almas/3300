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
define('DB_NAME', 'blog');

/** MySQL database username */
define('DB_USER', 'blog');

/** MySQL database password */
define('DB_PASSWORD', 'BL0G12789');

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
define('AUTH_KEY',         '#-`8%0|Vlj7vqn+4N|-Y.yhR+8*?_[qHs]+3)M`k! /2Y~Y77n0Zu#_eF lGwQ-2');
define('SECURE_AUTH_KEY',  'OCbfI81HO|aNzl#,xk=ajrm^4HgV<q}jm/`1A]c|Fp$HB}a$J8nxuUe3;&.%/{Uh');
define('LOGGED_IN_KEY',    'DU96l]@~rcabVFGYTZ^Y)8uYy:K_ives?o5c+`[N-uPMa}0h@NJ9ge1L+UNlP3q>');
define('NONCE_KEY',        'DpY8O=kpWN)+|-nrbLmABJ8;}D:JA%|.%Me>V#iS|n!+~sL*M?<3!v&my;RG6K+_');
define('AUTH_SALT',        ':jH>XFkm-m2U6] TwkrSzBd<GoRHpuR=-rqIv4LsmQeddhW:wjKb&i8Qe:[wO0M~');
define('SECURE_AUTH_SALT', 'HaS0G~_t|LGeWeX+ES^!mr*bwkDe:C;]&Z_@,dg IfhT&>FWPI|cVjrjb:*ch_Un');
define('LOGGED_IN_SALT',   'RT<M%g-_V.9^%N~sz7$v!8o;{ D{CtpBHqz0D uq^|F0lgwek+a*a&+ZqL;LRv!7');
define('NONCE_SALT',       'O[!bIU8,kIpdml ^#&^&6/>}M)6 sd` 1+kV]m+|!oM!e2_>x;cG*+M*+{yzoTR#');

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
