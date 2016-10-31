<?php
/*
 * Plugin Name: bbPress - Redirect Single Replies to Topics
 * Description: Redirects single reply pages to the parent topic
 * Author: Pippin Williamson
 * Version: 1.1
 */

class BBP_Single_Reply_Redirect {

	public function __construct() {
		add_action( 'bbp_template_redirect', array( $this, 'template_redirect' ) );
	}

	public function template_redirect() {
		if( bbp_is_single_reply() ) {
			/*
			 * Possibilities:
			 *   1) is a GET request to reply EDIT page => don't redirect
			 *   2) is a POST request to reply page, indicating an edit is being posted => don't redirect
			 *   3) is a GET request to reply page => REDIRECT
			 */			
			if( ! bbp_is_reply_edit() && $_SERVER[ 'REQUEST_METHOD' ] !== 'POST' ) {
				wp_redirect( bbp_get_reply_url() ); exit;
			}
		}
	}
}
new BBP_Single_Reply_Redirect();