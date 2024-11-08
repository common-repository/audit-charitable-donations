<?php
 //wp_enqueue_style( 'bootstrap-css' );
$campaigns = isset($view_args['campaigns']) ? $view_args['campaigns'] : '';
/*if ( isset( $_POST['submit_image_selector'] ) && isset( $_POST['image_attachment_id'] ) ) :
		update_option( 'media_selector_attachment_id', absint( $_POST['image_attachment_id'] ) );
	endif; */
$expenses = get_admin_expenses();
?>
<style>
	
</style>
<div id="add_expense">
	<form method="post" id="charitable_expense" class="charitable-form" action="<?php echo admin_url('admin-post.php'); ?>">
	<input type="hidden" name="action" value="expense_form_save_response"/>
	<input type="hidden" name="cae_add_user_meta_nonce" value="<?php echo $view_args['cae_nonce'] ?>" />
	
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row"><?php _e('Expense Title', 'audit-charitable-donations'); ?></th>
					<td><input required type="text" id="charitable_campaign_expense_title" name="<?php echo "expense";?>[expense_title]" value="" class="charitable-settings-field"/>
					<div class="charitable-help"><?php __('The name of the expense made', 'audit-charitable-donations'); ?></div>
					</td>
				</tr>
				<tr>
					<th scope="row"><?php _e('Amount', 'audit-charitable-donations'); ?></th>
					<td><input required type="number" id="charitable_campaign_expense_amount" name="<?php echo "expense";?>[expense_amount]" value="" class="charitable-settings-field"/>
					<div class="charitable-help"><?php _e('Enter the Expense Amount', 'audit-charitable-donations'); ?></div>
					</td>
				</tr>
				<tr>
					<th scope="row"><?php _e('Date', 'audit-charitable-donations'); ?></th>
					<td><input required type="date" id="datepicker" name="<?php echo "expense";?>[expense_date]" value="" class="charitable-settings-field" />
					<div class="charitable-help"><?php _e('Enter the date an expense was made', 'audit-charitable-donations'); ?></div>
					</td>
				</tr>
				<tr>
					<th scope="row"><?php _e('Select Appropriate Campaign', 'audit-charitable-donations'); ?></th>
					<td>
						<select required id="charitable_campaign_list" name="<?php echo "expense";?>[expense_campaign_id]" class="charitable-settings-field">
							<option value=""><?php _e('Select a Campaign', 'charitable-admin-exoenses'); ?></option>
							<?php
							foreach ($campaigns as $campaign) : ?>
							<option value="<?php echo $campaign['id'] ?>"><?php echo $campaign['title']; ?></option>
							<?php endforeach;
							?>
						</select>
						<div class="charitable-help"><?php _e('Choose an Activity for the expense made', 'audit-charitable-donations'); ?></div>
					</td>
				</tr>
				<tr>
					<th scope="row"><?php __('Upload Receipt', 'audit-charitable-donations'); ?></th>
					<td>
					<img id='image-preview' src='<?php echo wp_get_attachment_url( get_option( 'media_selector_attachment_id' ) ); ?>' height='100'>
					<input id="upload_image_button" type="button" class="button" value="<?php _e( 'Upload image' ); ?>" />
					<input type='hidden' name="<?php echo "expense";?>[expense_receipt_id]" id='image_attachment_id' value='<?php echo get_option( 'media_selector_attachment_id' ); ?>'>
					<!--<input type="submit" name="submit_image_selector" value="Save" class="button-primary"> -->
			
					</td>
				</tr>
				
			</tbody>
		</table>
		<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Add Expense"></p>
	</form>
</div>
<div class="clear"></div>
<div id="expenses">
	<table class="charitable-creator-expenses table" cellpadding="3px" cellspacing="0px" border="1px black solid;" style="
    width: 90%;
    margin-left:  auto;
    margin-right:  auto;
">
		<thead>
			<tr><th colspan="6" style="text-align: center;"><?php _e('Campaign Expenses Overview', 'audit-charitable-donations'); ?></th></tr>
			<tr>
				<th scope="col" style="text-align: center;"><?php _e('Date', 'audit-charitable-donations'); ?></th>
				<th scope="col" style="text-align: center;"><?php _e('Expense Title', 'audit-charitable-donations'); ?></th>
				<th scope="col" style="text-align: center;"><?php _e('Expense Amount', 'audit-charitable-donations'); ?></th>
				<th scope="col" style="text-align: center;"><?php _e('For the Campaigns', 'audit-charitable-donations'); ?></th>
				<th scope="col" style="text-align: center;"><?php _e('Receipt', 'audit-charitable-donations'); ?></th>
				<th scope="col" style="text-align: center;"><?php _e('Delete', 'audit-charitable-donations'); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php 
			if(!empty($expenses)) {
			foreach($expenses as $expense) :?>
			<?php
			$url = wp_get_attachment_url($expense->expense_receipt_id); 
			?>
			<input type="hidden" value="<?php echo $expense->expense_campaign_id; ?>" id="data_<?php echo $expense->expense_id;?>_campaign" />
			<input type="hidden" value="<?php echo $url; ?>" id="data_<?php echo $expense->expense_id;?>_receipt" />
			<tr id="data_<?php echo $expense->expense_id; ?>" style="text-align: center;">
				<td class="expense_date"><?php echo date('Y-m-d', strtotime($expense->expense_date)); ?></td>
				<td class="expense_title"><?php echo $expense->expense_title; ?></td>
				<td class="expense_amount"><?php echo $expense->expense_amount; ?></td>
				<td><?php echo get_the_title($expense->expense_campaign_id); ?></td>
				<td>
				<?php if(!empty($url)) {?>
				<a id='expense-receipt' target="_blank" href="<?php echo $url; ?>">Receipt</a>
				<?php } else {?>
				No Receipt
				<?php } ?>
				</td>
				<td>
				<button type="button" class="btn btn-xs btn-default command-delete" id="<?php echo $expense->expense_id; ?>"><i class="fa fa-remove"></i></button></td>
			</tr>
			<?php endforeach; 
			} else {
			?>
			<tr><td colspan="6" style="text-align:center;"><?php _e('No Expenses','charitale-track-donations'); ?></td></tr>
			<?php } ?>
		</tbody>
	</table>
</div>

 
