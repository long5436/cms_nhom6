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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cms' );

/** Database username */
define( 'DB_USER', 'cms' );

/** Database password */
define( 'DB_PASSWORD', 'cms' );

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
define( 'AUTH_KEY',         'eXH2i}|S8zo$4Q<TxRz_(Ks_v/L~ie>{owF[= u 5Z.)-}SXzc=VAX(+}0?!>+HH' );
define( 'SECURE_AUTH_KEY',  'n6qS Z5cPSxOyKFjZaWTJ*0RHZP|b=^L #G>Qy{)<6P[;7r$zfV^m3 a:RTie1X,' );
define( 'LOGGED_IN_KEY',    'YJ&vkHN&,}VdDz#KGfyF8SVBY67a$cJ-S9ZSORED}[.#a6{ric3&UAph~(Y-~_qS' );
define( 'NONCE_KEY',        '<JR/T9Wn>PW@^oL5hRdiC>lN1$e?C$z;WhbppiKt7!hxe]^$NVq9Yc>B8>chFRrt' );
define( 'AUTH_SALT',        'BY@hj9rv!=v9i$Qwdsq#t;gi<-l=g]ipZdA3L$+u]8s6]G0K S0pt@7;b@1zVjy_' );
define( 'SECURE_AUTH_SALT', 'zV>dr_8SJE5M1w|2h6wSe4&d6(5Tq=E#pZwi}VRunj[[U;qFcZI0T(<M/on0A/aU' );
define( 'LOGGED_IN_SALT',   '%ixV~LG< YhhUC&00K9j;+5I)aqa8Yn/|EKDU`|.IM?{HF9M~nAMoBU=Jnf%su/O' );
define( 'NONCE_SALT',       '+!ZJY#1+1HzTA*}U<pQk6%.9ZK}_]DFJG]YyHi~VAf7]xE:7hY2+4yb(toG%(Tn,' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
