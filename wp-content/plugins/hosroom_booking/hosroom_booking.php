<?php

/**
 * Plugin Name: Hosroom Booking
 * Plugin URI: https://hosroom.com
 * Description: Servicio de reservas en el línea para el hotel utilizando el canal de reservas interno
 * Version: 1.0.0
 * Author: SeguriServer SAS
 * Author URI: https://seguriserver.com
 * License: GPL2
 * Requires PHP: 7.4
 * Update URI: https://hosroom.com/wp/
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once plugin_dir_path( __FILE__ ) . 'models/BookingPlugin.php';
require_once plugin_dir_path( __FILE__ ) . 'models/ShortCode.php';
require_once plugin_dir_path( __FILE__ ) . 'models/Settings.php';

$hosroom_booking = new \Seguriserver\Hosroom\BookingPlugin();