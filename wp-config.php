<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'dream');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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

define('AUTH_KEY',         'gN|qedOm9o8dD#YuQUZ&qli06+T[~C4 |.}APKC-0H)iFT9w8Ou2320{4Na+#Lq7');
define('SECURE_AUTH_KEY',  '^cx@8.)8-P@:js<4XfNixkC78$# x5Bbb5<U{RtWg}:e@ .vGQTcDDu3N~CJ@tRA');
define('LOGGED_IN_KEY',    '+j-75]th~^3_1P.?IV!xi#NH}es-`.I{PSCb1u6C10eE&Rg H<.YeJ$vPAv=zt.?');
define('NONCE_KEY',        'FG`o+.n/5_C=Z7qRx~^VJ?D-b-<en+5mI-WV^}py J,&]S(GF*O(Em=3`C3KT1>-');
define('AUTH_SALT',        '%52(1c.qd- %?w3-wW*$v!~$,)}v3)+VD^;j?slx[Yi*)btvg^APK|+Zy+3X >|A');
define('SECURE_AUTH_SALT', 'q&482/,1Bf$WF|frvH4zC}N?=IpP?d{:m,|.?)>D9fF[gwZgvMsG<1>>^o%&a[^P');
define('LOGGED_IN_SALT',   'k<rh*0F2Yv+sZZzEVh-T%GMKwI~4UF]AXrGF|u*af3ol#~w+|~_>aoA>kT+!Pe:D');
define('NONCE_SALT',       '-@Np,]f{z,eI2?7!Z?)u-}8f|v}.O_.*71 )M#/vT=^LzVYc.s<)q-s)s|nRz~[}');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

define('CONCATENATE_SCRIPTS', false );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
