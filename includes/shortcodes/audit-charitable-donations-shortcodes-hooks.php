<?php
/**
 * Audit Charitable Donations Shortcodes Hooks.
 *
 * Action/filter hooks used for Audit Charitable Donations shortcodes
 *
 * @package     Audit Charitable Donations/Functions/Shortcodes
 * @version     1.0.0
 * @author      Himani Lotia
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */
 
 // Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
* Register Shortcodes.
* 
* @see Audit_Charitable_Donations_by_Campaign_Shortcode::display()
*/

add_shortcode( 'charitable_audit', array( 'Audit_Charitable_Donations_by_Campaign_Shortcode', 'charitable_admin_expenses_by_campaign' ));
