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
define( 'DB_NAME', 'mysite5.rus' );

/** Database username */
define( 'DB_USER', 'glava' );

/** Database password */
define( 'DB_PASSWORD', '12345' );

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
define( 'AUTH_KEY',         'VZ2}*@C#v(=o)0Y]3&T!`aR. mbBsr[Zv=i>(*2uD5Xx?!8@&n$}Ij%#-.Kw62{c' );
define( 'SECURE_AUTH_KEY',  '7::(o$ON!,q{fM#8*%Fg/-p=54YhI#b Jwm:+:l0GJhHHm_zJk[tsh40U,<yjSxQ' );
define( 'LOGGED_IN_KEY',    'gRiJBGK=R):wA/g0Np~~#~`V[/`zl0N_%k#e@dt!{c@Imwp/22f2B-tqbN4P[_WE' );
define( 'NONCE_KEY',        '=r`1|)E3E^K?WrIl!`CSE|%SA3qo#E+>P|>0>Q$nZ$(sxH@}TqHxTod5`Uxt9@3`' );
define( 'AUTH_SALT',        'J:^7BN]|x(8v1:v)j~Uv!L_+#N]}6t</`KQO_UhG>n,^,x&TSH]gWxmO2wX*1+o&' );
define( 'SECURE_AUTH_SALT', 'TC(1>ffOP;Dp @-.KWCyzRkUX9nJ7/6,nQE0Xn<KK*OaNW|29VJ|sl2G{1@ry{9r' );
define( 'LOGGED_IN_SALT',   'HCNLn 9b_Tk=LIA&M{ni`cxpwgS>E/`?Uo%eW_vvLP7@AkDPL^fuN}q3PDDa{X/u' );
define( 'NONCE_SALT',       'l%N>}3iOert&YXjSv1);tEKb{,=NZ`EYN2w/BcWas{hvq{pPWvo@qcA$LjRNuqI9' );

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
