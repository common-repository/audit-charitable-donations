<?php
/**
 * Audit Charitable Donations admin hooks.
 *
 * @package     Charitable Track Donations/Functions/Admin
 * @version     1.0.0
 * @author      Himani Lotia	
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'init', array( Audit_Charitable_Donations_Admin::get_instance(), 'init_thickbox' ) );

/**
 * Add a direct link to the Extensions settings page from the plugin row.
 *
 * @see     Audit_Charitable_Donations_Admin::add_plugin_action_links()
 */
add_filter( 'plugin_action_links_' . plugin_basename( charitable_admin_expenses()->get_path() ), array( Audit_Charitable_Donations_Admin::get_instance(), 'add_plugin_action_links' ) );

/**
 * Add a "Admin Expenses" section to the Extensions settings area of Charitable.
 *
 * @see Audit_Charitable_Donations_Admin::add_admin_expenses_settings()
 */
//add_filter( 'charitable_settings_tab_fields_extensions', array( Audit_Charitable_Donations_Admin::get_instance(), 'add_admin_expenses_settings' ), 6 );

/**
* Add a sub menu item to the Charitable Main Menu
* 
* @see     Audit_Charitable_Donations_Admin::add_admin_expenses_submenu_item()
*/
add_action( 'admin_menu', array( Audit_Charitable_Donations_Admin::get_instance(), 'add_admin_expenses_submenu_item'), 11);

/**
* Enqueue Admin Scripts
* 
* @see     Audit_Charitable_Donations_Admin::enqueue_admin_scripts()
*/
add_action( 'admin_enqueue_scripts', array( Audit_Charitable_Donations_Admin::get_instance(), 'enqueue_admin_scripts'), 11 );

/**
* Enqueue Admin Styles
* 
* @see     Audit_Charitable_Donations_Admin::enqueue_admin_styles()
*/
add_action( 'admin_enqueue_scripts', array( Audit_Charitable_Donations_Admin::get_instance(), 'enqueue_admin_styles'), 13 );

/**
* Enqueue scripts in footer
*/
add_action( 'admin_footer', array( Audit_Charitable_Donations_Admin::get_instance(), 'media_selector_print_scripts'), 13 );

/**
* Handle Expense Form Response
*/
add_action( 'admin_post_expense_form_save_response', array( Audit_Charitable_Donations_Admin::get_instance(), 'save_charitable_admin_expense') );

add_action('wp_ajax_remove_expense', array( Audit_Charitable_Donations_Admin::get_instance(),'remove_expense') );
