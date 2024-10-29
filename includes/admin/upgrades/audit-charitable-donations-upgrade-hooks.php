<?php
/**
 * Audit Charitable Donations Upgrade Hooks.
 *
 * Action/filter hooks used for Audit Charitable Donations Upgrades.
 *
 * @package     Audit Charitable Donations/Functions/Upgrades
 * @version     1.0.0
 * @author      Himani
 * @copyright   Copyright (c) 2018, Himani Lotia
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Check if there is an upgrade that needs to happen and if so, display a notice to begin upgrading.
 *
 * @see     Audit_Charitable_Donations_Upgrade::add_upgrade_notice()
 */
add_action( 'admin_notices', array( Audit_Charitable_Donations_Upgrade::get_instance(), 'add_upgrade_notice' ) );
