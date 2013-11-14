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
define('DB_NAME', 'mymusic5_wow');

/** MySQL database username */
define('DB_USER', 'mymusic5_xyy');

/** MySQL database password */
define('DB_PASSWORD', '13001300');

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
define('AUTH_KEY',         'H)$T(mzX9*P]X[`3Q^ft%gU4Jv2TEq$E4x5C$0Zh<m/h{).OawM<Dw}|.Ef:~SF/');
define('SECURE_AUTH_KEY',  '`+OZNSuOi_&#5e8izJY$+|):haR &Ln?RHgGAc+RA.${,H;rb-i#+Z#D}Qq|bUjY');
define('LOGGED_IN_KEY',    'Tz.~^YGep5-%]nJyp|O$N.[-|c3>D4rg2 3+*u2oYN-A0bU?^`+O{6|4Al]@{:M0');
define('NONCE_KEY',        '9{&YA(=PUsk)^,sQPS1+}I|;4aMX1.+w(z@(ER8cBF}Zvv[4.]I#$mcbpdPc|70s');
define('AUTH_SALT',        'F|/owk=~I)e)P( }vP&{z)gbp3YH.=&u3+%&sR>g|]Rhh5DxR$ZI3<LzC=$4(5-/');
define('SECURE_AUTH_SALT', '7|T+>J+Ok|0%d:}Us_+jC}Qsx>{S:N8Q:dhen4&42c|E9/n?F^&Q-A/eCh|c0N#p');
define('LOGGED_IN_SALT',   'os/)]?P1#=E|p|o<R+b:#Vd*5# I3`i|&N(@Dg2lYc+K(w&J(}7PeQ`@TCW-}|G]');
define('NONCE_SALT',       'wk+G4+eZUnLj]e.xScYPZZXFBO/<7`0G.H+r}{|4VozYao$0=NmB6<!YdxK9N{vH');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
