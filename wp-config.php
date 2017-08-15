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
define('DB_NAME', 'VZEngineeringBlog');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost:3306');

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
define('AUTH_KEY',         'yr*R~3rEyDp~518no>}1&4FQ{*H)Uj%8m(~%!5WoC7P,5^21*8BAmUQ(1yK0S1m4');
define('SECURE_AUTH_KEY',  '?_z(3s`R|(DtxGf5#b;)<-3WjGW};-S.$cX5j;M|dP[L)nh4c*6GZ=.fSkyP}zo8');
define('LOGGED_IN_KEY',    'vkY/?/6,aXjvL.m<gM,YElF_ze!C&V!&}OpkV[~/GHrB}<:]p&D?>9J^UV4iT{K]');
define('NONCE_KEY',        '45OYfwdueSn^/@*%LOM8|z%{M@Vkn&Ty*y[McfN54BIw?b?UJ#4xJUaXiWK2CKu5');
define('AUTH_SALT',        'u;(CiPV^?3,[p6iY=o;cOkfI-B2mr*Xou7!-cWg|AEi#s*$TI?+sq|pAqAW2yr`]');
define('SECURE_AUTH_SALT', 'Ny]ij>Aalq*SMH<c7lhSF7&Sk~7]%W>MK>&G%Y65Nic_gyEsY( C;p_c~*=CD~E2');
define('LOGGED_IN_SALT',   '):BzB?-DVMu0a;Loh@#Mj[8Fw2Kd&_YrZ!6`Y~uT)Lxc@aU|i,dlg<DE+zMaRiJy');
define('NONCE_SALT',       '<Fv+B~9noij$Sy$KYzP_,!o:QoUB>^v{YSmmm}G#g@jQF,}R2I]zx`!ueCpL&w(d');

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

/* Added by Vezeeta */
define('FS_METHOD','direct');
