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
define( 'DB_NAME', 'Noor' );

/** MySQL database username */
define( 'DB_USER', 'noor' );

/** MySQL database password */
define( 'DB_PASSWORD', '#noor-project#' );

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
define( 'AUTH_KEY',         'F-<8 y,OeT586g:(]^p!8:zNqDruv$Rl7N$LcLiMV68a*40xx@pu#ZYFlt[+kQ,?' );
define( 'SECURE_AUTH_KEY',  'W1nBDh%P6~&HB>BLh5Y4SFW1L(M:U0D$~F8=%s-;_c0g05O1s?4O6uG?p1Y9:J{>' );
define( 'LOGGED_IN_KEY',    'VxY(KIfE#BkwHUrjj5%r!=(q|)UACWn-Jz:lzy:Y7{XN80I6e9,H7a3L=*}HWOBi' );
define( 'NONCE_KEY',        'o].o$LWpL,,X{prJpRix|w;Pqri&AzJp2(>^+LGFU9kIVbS]r8`&O5NIPzv9AY+G' );
define( 'AUTH_SALT',        '?Ns0mrM+QTIFw0#-hm/DWqe`~@vhJ<X%kU3N^N0[+}fL2UaA=>-e1SQk[{>Zq{mr' );
define( 'SECURE_AUTH_SALT', 'h4( :*Uec;4U(NcdW=^]_jU2l|3B.5*!1KTR O*g^L~n-MD1XGM@5x.;p,e#8JFL' );
define( 'LOGGED_IN_SALT',   '@XXwHVO!4H9)51mm*SnKp]9<mB]-l<V8<Y[}dWSznY+; &0m,&5(e`t|`]0!b&&%' );
define( 'NONCE_SALT',       'HzAI!bX1+[Ti1x.{%rviP|oO~YkMer[@`={ d:aub19bEPXQ^,7%N5BwyHKG #Uh' );

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
