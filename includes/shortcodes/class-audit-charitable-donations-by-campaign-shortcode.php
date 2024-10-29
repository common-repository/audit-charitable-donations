<?php
/**
 * Admin Expenses by Campaign shortcode class.
 *
 * @package   Charitable Admin Expenses/Shortcodes/Log Audit
 * @author    Himani Lotia
 * @copyright Copyright (c) 2018, Himani Lotia
 * @license   http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since     1.0.0
 * @version   1.0.0
 */
 
 // Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! class_exists( 'Audit_Charitable_Donations_by_Campaign_Shortcode' ) ) :

	/**
	* Charitable_Expenses_by_Campaign_Shortcode class
	* 
	* @since 1.0.0
	*/
	class Audit_Charitable_Donations_by_Campaign_Shortcode {
		
		/**
		* Display the shortcode output. This is the callback @method for the Expenses shortcode
		* @since   1.0.0
		*
		* @param  array $atts The user-defined shortcode attributes.
		* @return string
		*/
		public static function charitable_admin_expenses_by_campaign() {
		wp_enqueue_script('footable-min-js');
		wp_enqueue_style('footable-min-css');
		wp_enqueue_style('audit-charitable-donations-public');
		$shortcode_data = get_charitable_campaigns_and_expenses_total();
		$expenses       = get_admin_expenses();
		ob_start(); ?>
		<?php $no_receipt = array(); ?>
		<table class="table" data-toggle-column="first">
	<thead>
		<tr>
			<th><?php _e('Campaigns', 'audit-charitable-donations'); ?></th>
			<th><?php _e('Donated', 'audit-charitable-donations'); ?></th>
			<th><?php _e('Utilized', 'audit-charitable-donations'); ?></th>
			<th data-breakpoints="all" class="hide-column"><?php __('Expense', 'audit-charitable-donations'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($shortcode_data as $data):?>
		<?php $no_receipt[$data['campaign_id']] = true;?>
		<input type="hidden" value="<?php echo $data['campaign_id'];?>" />
		<tr>
			<td><?php echo $data['campaign_title'];?></td>
			<td><?php echo $data['donated'];?></td>
			<td><?php echo $data['utilized'];?></td>
			<td><table class="table">
				<tr>
				<th colspan="4"><?php echo $data['campaign_title']; ?>-Receipts</th>
				</tr>
				<tr>
					<th><?php _e('Receipt Title', 'audit-charitable-donations'); ?></th>
					<th><?php _e('Receipt Date', 'audit-charitable-donations'); ?></th>
					<th><?php _e('Receipt Amount', 'audit-charitable-donations'); ?></th>
					<th><?php _e('View Receipt', 'audit-charitable-donations'); ?></th>
				</tr>
				<?php foreach($expenses as $expense):
				if($expense->expense_campaign_id == $data['campaign_id']):
				$no_receipt[$data['campaign_id']] = false;
				$url = wp_get_attachment_url($expense->expense_receipt_id);
				?> 
				<tr>
					<td><?php echo $expense->expense_title; ?></td>
					<td><?php echo date('Y-m-d', strtotime($expense->expense_date)); ?></td>
					<td><?php echo $expense->expense_amount; ?></td>
					<td>
					<?php if(!empty($url)) {?>
					<a id='expense-receipt' target="_blank" href="<?php echo $url; ?>">View</a>
					<?php } else {?>
					<?php _e('No Receipt', 'audit-charitable-donations'); ?>
					<?php } ?>
				</td>
				</tr>
				<?php endif; ?>
				<?php endforeach; ?>
				<tr>
					<?php if($no_receipt[$data['campaign_id']]) :?>
					<td colspan="4"><?php _e('No receipt available', 'audit-charitable-donations'); ?></td>
					<?php endif; ?>
				</tr>
			</table></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php
			return ob_get_clean();
		}
	}
endif;
?>
<script>
jQuery(function($){
	$('.table').footable();
});
</script>
 