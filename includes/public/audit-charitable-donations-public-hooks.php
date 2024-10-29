<?php
/**
 * Audit Charitable Donations public hooks.
 *
 * @package     Audit Charitable Donations/Functions/Public
 * @version     1.0.0
 * @author      Himani LOtia
 * @copyright   Copyright (c) 2018, Himani Lotia
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */
 // Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
* Enqueue Public/Shortcode Scripts
* 
* @see     Audit_Charitable_Donations_Public::register_scripts()
*/
add_action( 'wp_enqueue_scripts', array( Audit_Charitable_Donations_Public::get_instance(), 'register_scripts'), 11 );