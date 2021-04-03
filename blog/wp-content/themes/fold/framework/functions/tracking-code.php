<?php

add_action('wp_head', 'za_site_tracking_header');
if ( !function_exists('za_site_tracking_header') ) {	
	function za_site_tracking_header() {
		$tracking = zoomarts_option( 'tracking-code' );
		if ( $tracking !== '' ) {
			echo zoomarts_option( 'tracking-code' );
		}
	}
}

?>