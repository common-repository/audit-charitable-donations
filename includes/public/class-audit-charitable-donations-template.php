<?php
/**
 * Audit Charitable Donations template
 *
 * @version     1.0.0
 * @package     Audit Charitable Donations/Classes/Audit_Charitable_Donations_Template
 * @author      Himani Lotia
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! class_exists( 'Audit_Charitable_Donations_Template' ) ) :

	/**
	 * Audit_Charitable_Donations_Template
	 *
	 * @since       1.0.0
	 */
	class Audit_Charitable_Donations_Template extends Charitable_Template {

		/**
		 * Set theme template path.
		 *
		 * @since   1.0.0
		 *
		 * @return  string
		 */
		public function get_theme_template_path() {
			return trailingslashit( apply_filters( 'audit_charitable_donations_theme_template_path', 'charitable/audit-charitable-docations' ) );
		}

		/**
		 * Return the base template path.
		 *
		 * @since   1.0.0
		 *
		 * @return  string
		 */
		public function get_base_template_path() {
			return charitable_admin_expenses()->get_path( 'templates' );
		}
	}

endif;
