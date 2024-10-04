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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         '(Jiw6RSCI~U):$<sh%J=14Wuv{$g%Ggg6s0P)ukOD;,Pb_AHdbTjF_ +q~B?W&8,' );
define( 'SECURE_AUTH_KEY',  'Mfq{e{@@nvD+#V^qSt9ua?.vvUJJgqSv!8?&5jF&.2ohrp~zV!VK::R3?y+.tfbJ' );
define( 'LOGGED_IN_KEY',    '0lmAaOq8w:_73_!j @aKD WBV]G,eLjM!9WVsVYq P79::2WH>#8fo;/^KkUbhIt' );
define( 'NONCE_KEY',        '&:&f4]5s3Q2?x):1eK{|~g|i0yB?3%26QD}:nh35eU1x+P(6-j_{:8@-0KIXSMDz' );
define( 'AUTH_SALT',        '~Ed]}H6;gH7F6U@_pa8ZY3v5l0qH{<dIn`.wh mws)[qTZ7[AU*vn&wT&S#149Mc' );
define( 'SECURE_AUTH_SALT', 'l<#Ti1sz~.K)0_~EM|}uY8e%qg+n:aI:$dbgNU,#{k:E)0Z*S,y24MUK7 JV;Rd*' );
define( 'LOGGED_IN_SALT',   '48;3WTGV_]8VK|*c%kW:OL^Aa.Kl:o`>&T}6~9OD<-l_&f~!K41@BTvfY*)RU{~t' );
define( 'NONCE_SALT',       'Mi|l*.|3u1#h37?K29M?A?h-d {z]RJ&.;R>T[_23`Km,9F!Uz$b>IL]R@~Gx:3E' );

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
