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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress2' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'J-ttLSzmh]qn&}(6JZW.ZLg[|IGq/=$g|c1<$_pKC@n@;i^:R.&I#u2s1B)#006~' );
define( 'SECURE_AUTH_KEY',  'xdR,6H(.x.$ddZ/Q{oawOp?i#NMPQS8--.N]t*w&e@O(>rw<L^4{-1rE6ph&=L20' );
define( 'LOGGED_IN_KEY',    'yA{3bDE}gpHfU&DHLz?g ~:JI` wZOe>WSG|VTsZA3B>+O,f+ji|K_[lwf+76@Uc' );
define( 'NONCE_KEY',        'c>Pr,TeoTVhmMI.+#rBtdd}HG8D Z!dfXSkowW={#c<:LpBH_O~M@dW6!$pS4pRD' );
define( 'AUTH_SALT',        'WG9fmN$ilNY9]8qu0?9FPM,{|4SDnx<8))fle7aT3m^cd(aZc:SI1NjBtAbFHoYO' );
define( 'SECURE_AUTH_SALT', '@`q705RMpDnwepKMN,7/#{&M@~!ly)CR),$u>|NiPK>IW|/{N)gw!~BPw7qr^Wyb' );
define( 'LOGGED_IN_SALT',   '_#|m5z;e/);rnzZ(EOQ(M}IB%Q,_wbA4*)[,6z#`XcC,w-k#bf;S-qgS.T-a7F5r' );
define( 'NONCE_SALT',       'mzE{$~n6Be@e*^(dr]?69k]MWrf[BB>?S@S(zbT]G32z5$/HZe*A(.]wWW$bR+q$' );

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
