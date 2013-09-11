<?php
/*
 * Plugin Name: bbPress - Redirect Single Replies to Topics
 * Description: Redirects single reply pages to the parent topic
 * Author: Pippin Williamson
 * Version: 1.0
 */

class BBP_Single_Reply_Redirect {

	public function __construct() {
		add_action( 'bbp_template_redirect', array( $this, 'template_redirect' ) );
	}

	public function template_redirect() {
		if( bbp_is_single_reply() && ! bbp_is_reply_edit() ) {
			wp_redirect( bbp_get_reply_url() ); exit;
		}
	}
}
new BBP_Single_Reply_Redirect();