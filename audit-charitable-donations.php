<?php
/**
 * Plugin Name: 		Audit Charitable Donations
 * Plugin URI:
 * Description:			Audit the received donations and display the donation utilization report anywhere on the website with the help of a shortcode [charitable_audit]. 
 * This helps to maintain transparency and gain more trust from Donors.
 * Version: 			1.0.1
 * Author: 				Himani Lotia
 * Author URI: 			https://www.linkedin.com/in/himani-lotia/
 * Requires at least: 	4.2
 * Tested up to: 		5.2.1
 * Text Domain: 		audit-charitable-donations
 * Domain Path: 		/languages/
 *
 * @package 			Audit Charitable Donations
 * @category 			Core
 * @author 				imani3011
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Load plugin class, but only if Charitable is found and activated.
 *
 * @return 	false|Audit_Charitable_Donations Whether the class was loaded.
 */
function audit_charitable_donations_load() {
	require_once( 'includes/class-audit-charitable-donations.php' );

	$loaded = false;

	/* Check for Charitable */
	if ( ! class_exists( 'Charitable' ) ) {

		if ( ! class_exists( 'Charitable_Extension_Activation' ) ) {

			require_once 'includes/admin/class-charitable-extension-activation.php';

		}

		$activation = new Charitable_Extension_Activation( plugin_dir_path( __FILE__ ), basename( __FILE__ ) );
		$activation = $activation->run();

	} else {

		$loaded = new Audit_Charitable_Donations( __FILE__ );

	}

	return $loaded;
}

add_action( 'plugins_loaded', 'audit_charitable_donations_load', 1 );
