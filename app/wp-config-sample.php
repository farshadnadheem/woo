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
define( 'DB_NAME', 'db_woocommerce' );

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
define( 'AUTH_KEY',         'P`py(>O~=lqHw_*nuPM}ptD|=v;N2`0&^;<%,1_-`IZHE}^Kfvu(R)k$X(t`2vF3' );
define( 'SECURE_AUTH_KEY',  'r|Z!:WU/+^;*kW30tl?_9l._]-GBExNVi6d32c0Qn7e,`2T$3/B.~*8Tc`e5BA5K' );
define( 'LOGGED_IN_KEY',    'Mv(Dq-X+>ozJmH6JUp5r3NAp%GixO=b|RISW89.z08I<;Y%w$48f#-Bb^ypM?NXP' );
define( 'NONCE_KEY',        '#/r2,]vCw->]>{: ]41wcJjzb.u4)l`3g|}:_LTC95Qyx;@)7KP>fdb/AEJn,on+' );
define( 'AUTH_SALT',        'MtQg;o3-Uorn}9L];F]Gw;<5fiL~ugL=co!!+*6S)`^N<V:(KO+:Nh&Fr]+)][Fb' );
define( 'SECURE_AUTH_SALT', 'Bet*pr8+DkceB1T_t87!(g5fiomYS&`C21Lkyw@i$X98n|{mj0yE&9%w&HeWjrv_' );
define( 'LOGGED_IN_SALT',   '`~cy}}@/!erRc<lsCu)*U?Dgoz&@UR0ZT<Mp1Y xM3#7l(OS*~7>E2#[s- BwBTv' );
define( 'NONCE_SALT',       ';5X^|0,pFEqIi.gFt>DYV Ceu:eGbRR5R2Zu.;54aTHB1:;NK(f9VkAE_CGnq3`C' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'fsd_wp_';

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
