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
define( 'DB_NAME', 'isc' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         '*|$lBL5b({l(A7Vu:ct%Wa}*g@Y$;y-!2/p<5.h@QvXcBG!wmNgG-*Xk$D*]jpgM' );
define( 'SECURE_AUTH_KEY',  ':l%c)f(oJM>lDz}g5$s%~Ajj-CU)mGP;,YHbx!wu.a:y-Bq$MfPLBN|RUVx2#2jH' );
define( 'LOGGED_IN_KEY',    'kgYJZ($qDWQV]w*oH.tHl:]l1wb$<?m@{tW&[qqxWc3j@NY,NR4tAn+.e}WO2)Y`' );
define( 'NONCE_KEY',        'zL%Gr$f,?Ls@tHhff2oqAGY+w(kh>Le=G|4,|p0z`RN6TyJ<Bo,qr$i.^?&uj{cA' );
define( 'AUTH_SALT',        'A[]R1N)ZBsfkueEgddK7sV8uo!=)#/;_obwWIqH9`y[[0_40%w%mpK0gbeZIA~[>' );
define( 'SECURE_AUTH_SALT', 'aN`A{9!h$X`N^)~bAJn7mNnEID@8XljjHmvId^kkgozjFp#Zn/GsT]I_n=giIcDA' );
define( 'LOGGED_IN_SALT',   'q1Jn*!EG;}Np<(g*a4u[p:;c8J J8AI}gtPv.ix=BUARhF#6/w#]syn(3jTR%q;]' );
define( 'NONCE_SALT',       'j)]%NZX$;n{(hy^v2bfilp{h+D#9!n%K H^nAaY#oEFcu7Zz4okg+?}`7Wgm4mnO' );

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
