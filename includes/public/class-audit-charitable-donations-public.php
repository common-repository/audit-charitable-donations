<?php
/**
 * The class responsible for processing plublic side functions.
 *
 * @package     Audit Charitable Donations/Classes/Audit_Charitable_Donations_Public
 * @version     1.0.0
 * @author      Himani Lotia
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */
 
 // Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! class_exists( 'Audit_Charitable_Donations_Public' ) ) :
	/**
	 * Audit_Charitable_Donations_Public
	 *
	 * @since       1.0.0
	 */
	class Audit_Charitable_Donations_Public {
		/**
		 * The single static class instance.
		 *
		 * @since   1.0.0
		 *
		 * @var     Charitable_Track_Donations_Public
		 */
		private static $instance = null;

		/**
		 * Create and return the class object.
		 *
		 * @since   1.0.0
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new Audit_Charitable_Donations_Public();
			}

			return self::$instance;
		}
		
		/**
		* Register public/shortcode scripts
		* 
		* @return
		*/
		public function register_scripts() {
			wp_register_script('footable-min-js', charitable_admin_expenses()->get_path( 'includes', FALSE ) . 'public/assets/footable/js/footable.min.js', array('jquery'), time(), true);
			wp_register_style('footable-min-css', charitable_admin_expenses()->get_path( 'includes', FALSE ) . 'public/assets/footable/css/footable.standalone.min.css', false, time());
			wp_register_style('audit-charitable-donations-public', charitable_admin_expenses()->get_path( 'includes', FALSE ) . 'public/assets/audit-charitable-donations-public.css', false, time());
		}
	
	}
endif;