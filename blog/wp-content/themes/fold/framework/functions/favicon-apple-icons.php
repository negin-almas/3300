<?php
/**
 * This function is used to output the site favicons and apple icons
 * Code is echoed into the wp_head hook
 *
 * @package WordPress
 * @subpackage Total
 * @since Total 1.0
*/

add_action( 'wp_head', 'za_favicons_apple_icons' );
if ( ! function_exists( 'za_favicons_apple_icons' ) ) {
	function za_favicons_apple_icons() {
		
		// Vars
		$output = '';
		$favicon = zoomarts_option('favicon', '', 'url');
		$iphone_icon = zoomarts_option('iphone_icon', '', 'url');
		$iphone_icon_retina = zoomarts_option('iphone_icon_retina', '', 'url');
		$ipad_icon = zoomarts_option('ipad_icon', '', 'url');
		$ipad_icon_retina = zoomarts_option('ipad_icon_retina', '', 'url');
		
		// Favicon
		if ( $favicon ) {
			$output .= '<!-- Favicon -->';
			$output .= '<link rel="shortcut icon" href="'. $favicon .'">';
		}
		
		// Apple iPhone Icon
		if ( $iphone_icon ) {
			$output .= '<!-- Apple iPhone Icon -->';
			$output .= '<link rel="apple-touch-icon-precomposed" rel="apple-touch-icon" href="'. $iphone_icon .'">';
		}
		
		// Apple iPhone Retina Icon
		if ( $iphone_icon_retina ) {
			$output .= '<!-- Apple iPhone Retina Icon -->';
			$output .= '<link rel="apple-touch-icon-precomposed" rel="apple-touch-icon" sizes="114x114" href="'. $iphone_icon_retina .'">';
		}
		
		// Apple iPad Icon
		if ( $ipad_icon ) {
			$output .= '<!-- Apple iPhone Icon -->';
			$output .= '<link rel="apple-touch-icon-precomposed" rel="apple-touch-icon" sizes="76x76" href="'. $ipad_icon .'">';
		}
		
		// Apple iPad Retina Icon
		if ( $ipad_icon_retina ) {
			$output .= '<!-- Apple iPhone Icon -->';
			$output .= '<link rel="apple-touch-icon-precomposed" rel="apple-touch-icon" sizes="152x152" href="'. $ipad_icon_retina .'">';
		}
		
		echo $output;
		
	}
}