<?php
/**
 * Plugin Name: AIO WP Extension
 * Description: A plugin that helps developers to extend the WordPress functionality and use JS frontend
 * Author: Adam Schubert
 * Author URI: https://github.com/schubertadam
 * Version: 1.0
 * Text Domain: aio-wp
 */

use Src\Init;

define( 'AIO_ROOT', plugin_dir_path(__FILE__) );
define( 'AIO_URL', plugin_dir_url(__FILE__) );

if ( file_exists( AIO_ROOT . 'vendor/autoload.php' ) ) {
	require_once AIO_ROOT . 'vendor/autoload.php';

	if ( class_exists( Init::class ) ) {
		(new Init())->register_services();
	} else {
		error( "Init class does not exists!" );
	}
}