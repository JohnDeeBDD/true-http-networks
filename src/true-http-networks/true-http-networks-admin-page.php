<?php

namespace TrueHttpNetworks;

if ( ! current_user_can('manage_options') ) {
    wp_die( __( 'Sorry, you are not allowed to manage networks on this site.' ) );
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $AdminPageSendMessageFormListener = new AdminPageSendMessageFormListener;
	$AdminPageSendMessageFormListener->listen();
}
$title       = __( 'True HTTP Networks' );
//$parent_file = 'options-general.php';
require_once( ABSPATH . 'wp-admin/admin-header.php' );
?>
<div class="wrap">
<h1><?php echo esc_html( $title ); ?></h1>
<form method="post" novalidate="novalidate">
	<table class="form-table">
		<tr>
			<th scope="row"><label for=""><?php _e('Select Network', 'true-http-networks') ?></label></th>
				<td>
					<?php 
					$ListOfNetworks = new ListOfNetworks();
					       $ListOfNetworks->echoListOfNetworksDropdown();
					?>
				</td>
		</tr>
		<tr>
			<th scope="row"><label for=""><?php _e('Send Message','true-http-networks') ?></label></th>
			<td>
				<input name="outbound-message-title" type="text" id="outbound-message-title" placeholder = "enter a title" class="regular-text" />
				<p class="description" id="tagline-description"><?php _e( 'This will be sent via HTTP.', 'true-http-networks' ) ?></p>
				<br />
				<textarea rows="4" cols="50" name = "outbound-message-body" id = "outbound-message-body" placeholder="<?php _e( 'enter a message', 'true-http-networks');?>"></textarea>
				<br />
				<input name="send-message" type="submit" id="send-message" />
			</td>
		</tr>
	</table>
</form>

<script>
	jQuery(document).ready(function(){
		//alert('jQuery is working!');
	});
</script>
</div><!-- END: .wrap -->