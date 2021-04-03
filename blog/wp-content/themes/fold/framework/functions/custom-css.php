<?php

if ( is_admin() ) return;

if ( !function_exists( 'za_custom_css' ) ) {
	
	function za_custom_css() {
	
		$custom_css ='';		

		if ( zoomarts_option( 'custom-css' ) !== '' ) {
			$custom_css .= zoomarts_option( 'custom-css' );
		}
		
		// trim white space for faster page loading
		$custom_css_trimmed =  preg_replace( '/\s+/', ' ', $custom_css );
		
		// output css on front end
		$css_output = "<!-- Custom CSS -->\n<style type=\"text/css\">\n" . $custom_css_trimmed . "\n</style>";
		if( !empty($custom_css) ) {
			echo $css_output;
		}
		
	} //end wpex_custom_css()
	
} // End if
add_action('wp_head', 'za_custom_css');

?>