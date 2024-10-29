<?php
/**
 * Sets up translations for Charitable Extension Boilerplate.
 *
 * @package     Charitable/Classes/Charitable_i18n
 * @version     1.0.0
 * @author      Himani Lotia
 * @copyright   Copyright (c) 2018, Himani Lotia
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* Ensure that Charitable_i18n exists */
if ( ! class_exists( 'Charitable_i18n' ) ) :
	return;
endif;

if ( ! class_exists( 'Audit_Charitable_Donations_i18n' ) ) :

	/**
	 * Audit_Charitable_Donations_i18n
	 *
	 * @since       1.0.0
	 */
	class Audit_Charitable_Donations_i18n extends Charitable_i18n {

		/**
		 * Plugin textdomain.
		 *
		 * @since   1.0.0
		 *
		 * @var     string
		 */
		protected $textdomain = 'audit-charitable-donations';

		/**
		 * Set up the class.
		 *
		 * @since   1.0.0
		 */
		protected function __construct() {
			$this->languages_directory = apply_filters( 'audit_charitable_donations_languages_directory', 'audit-charitable-donations/languages' );
			$this->locale = apply_filters( 'plugin_locale', get_locale(), $this->textdomain );
			$this->mofile = sprintf( '%1$s-%2$s.mo', $this->textdomain, $this->locale );

			$this->load_textdomain();
		}
	}

endif;
