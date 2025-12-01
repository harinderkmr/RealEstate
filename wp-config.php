<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'realstate_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'Q9oUJ}HU)o1+[^[?E~9-lD](sPqFv2]a mNI4TPut6)AcvV:5e=&]x((TZqfud8j' );
define( 'SECURE_AUTH_KEY',  'V>gf:Eg0Ro@NcOLb0GiF(2),qRK6PR&C|mX#!C1TVg0&<Lm5 BH;B;6K.,t}/=4q' );
define( 'LOGGED_IN_KEY',    '&Gu%gqzO9~Q!Rv-Ko=KlgZtc]U{oCFt@2g>|gjo}P 3Q-a1l7DBub#q`:7kk}-HG' );
define( 'NONCE_KEY',        'sHAPY.Tg4)_?/y1Y4W),,AJ7Rb:V{2tbADG%!(sH[N7?EE~dq&jeZ]0zwcofQ*$}' );
define( 'AUTH_SALT',        ' qBn~u6NWDe5ycd;^FPUm:a,Byf4^f.-C-%06>6)k8,MU6B9LWwuAYb$G0KOj)Po' );
define( 'SECURE_AUTH_SALT', 'lBb}hGQ.#bYZ_T>z/N6h~^Z}(*IwERcX^,h(VSB^Z{w|p@-9[j^p:ey%8Zv%8?-I' );
define( 'LOGGED_IN_SALT',   'V@Ks}9%OK-!B.d#tzXv=$0pt+~2/XaiptCNQ4vJ@Z{qzv{zzJCls;Q`vu9IQXyG^' );
define( 'NONCE_SALT',       'c6 RN:X1W&py8a<z 9?+@$di%+{2}X0>M51=]Z$BhCEf+qc0vHI ~No`,g:ch&y~' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
