<?php

if ( is_admin() ) return;

add_action('wp_head', 'wpex_styling_css');

if ( !function_exists( 'wpex_styling_css' ) ) {
	
	function wpex_styling_css() {
	
		$custom_css ='';	
		
		if ( zoomarts_option( 'custom_styling', '1' ) !== '1' ) return;		
		
		
		// Off-Canvas Styling
		$off_canvas_bg_color = zoomarts_option('off-canvas-bg-color');
		$off_canvas_text_color = zoomarts_option('off-canvas-text-color');
		$off_canvas_link_color = zoomarts_option('off-canvas-link-color');
		$off_canvas_bg_image = zoomarts_option('off-canvas-bg-image');
		$off_canvas_bg_image_pos = zoomarts_option('off-canvas-bg-image-pos');
		$off_canvas_bg_image_rep = zoomarts_option('off-canvas-bg-image-rep');
		if ( $off_canvas_bg_color) {
			$custom_css .= '.st-menu { background: url('.$menu_background.') '.$off_canvas_bg_image_pos . $off_canvas_bg_image_rep . $off_canvas_bg_color.'; }';
		}
		if ( isset($off_canvas_text_color) ) {
			$custom_css .= '.st-menu, .st-menu .widget .fetched_tweets li, .st-menu .widget .fetched_tweets li a { color: '.$off_canvas_text_color.'; }';
		}
		if ( isset($off_canvas_link_color['regular']) ) {
			$custom_css .= '.st-menu .widget .recentcomments .comment-author, .st-menu .widget.widget_categories ul li a, .st-menu .widget.widget_pages ul li a, .st-menu .widget.widget_meta ul li a, .st-menu .widget.widget_archive ul li a, .st-menu .widget.widget_recent_entries ul li a, .st-menu .widget .smart_post .post-right h3 a, .st-menu .widget .recentcomments .comment-author a, .st-menu #wp-calendar thead th, .st-menu .widget .fetched_tweets li .wdtf-screen-name a { color: '.$off_canvas_link_color['regular'].'; }';
		}
		if ( isset($off_canvas_link_color['hover']) ) {
			$custom_css .= '.st-menu .widget.widget_categories ul li a:hover, .st-menu .widget.widget_pages ul li a:hover, .st-menu .widget.widget_meta ul li a:hover, .st-menu .widget.widget_archive ul li a:hover, .st-menu .widget.widget_recent_entries ul li a:hover, .st-menu .widget .smart_post .post-right h3 a:hover, .st-menu .widget .recentcomments .comment-author a:hover, .st-menu .widget .fetched_tweets li .wdtf-screen-name a:hover, .st-menu .widget .fetched_tweets li .times a:hover, .st-menu .widget .recentcomments .comment-c a:hover, .st-menu .widget .tagcloud a:hover { color: '.$off_canvas_link_color['hover'].'!important; }';
			$custom_css .= '.st-menu .widget .tagcloud a:hover { border-color: '.$off_canvas_link_color['hover'].'; }';
		}
		
		
		// Off-Canvas Styling
		$primary_color = zoomarts_option('primary-color');
		if ( $primary_color !== '' ) {
			$custom_css .= '.post-entry-bottom .post-love-share .post-share a.post-share-link, .error-msg h1, #wp-calendar tbody td a, #wp-calendar tbody td#today, .post-gallery:hover .owl-buttons > div:hover, .lightbox-overlay i, .jp-play:hover i, .jp-pause:hover i, .jp-mute:hover i, .jp-unmute:hover i, .about-me-page .my-social a:hover { color: '.$primary_color.'; }';
			$custom_css .= '.post-entry-bottom .post-love-share .post-share a.post-share-link, .widget h3.widget-title span, #wp-calendar tbody td#today, .about-me-page .my-social a:hover { border-color: '.$primary_color.'; }';
			$custom_css .= 'a.main-button, input[type="submit"], #footer .go-top a, .page-navigation div a:hover, .toggle-item .panel-title a i, .toggle-item .panel-title a:after, .page-pagination li .current, button#load-more:hover, .sharing-modal, .search-modal, .jp-play-bar, .jp-volume-bar-value, .widget .smart_post .post-thumb a, .widget.widget-about .head-bg, .related-posts .post-thumb { background-color: '.$primary_color.'; }';
		}
		
		
		// Links Styling
		$links_color = zoomarts_option('links-color');
		if ( isset($links_color['regular']) ) {
			$custom_css .= 'a { color: '.$links_color['regular'].'; }';
		}
		if ( isset($links_color['hover']) ) {
			$custom_css .= 'a:hover, .widget.widget_categories ul li a:hover, .widget.widget_pages ul li a:hover, .widget.widget_archive ul li a:hover, .widget.widget_recent_entries ul li a:hover, .widget .recentcomments .comment-c a:hover, .sidebar a:hover, .st-menu .widget.widget_categories ul li a:hover, .st-menu .widget.widget_pages ul li a:hover, .st-menu .widget.widget_meta ul li a:hover, .st-menu .widget.widget_archive ul li a:hover, .st-menu .widget.widget_recent_entries ul li a:hover, .st-menu .widget .smart_post .post-right h3 a:hover, .st-menu .widget .recentcomments .comment-author a:hover, .st-menu .widget .fetched_tweets li .wdtf-screen-name a:hover, .st-menu .widget .fetched_tweets li .times a:hover, .st-menu .widget .recentcomments .comment-c a:hover, .st-menu .widget .tagcloud a:hover, .post-head h2.post-title a:hover { color: '.$links_color['hover'].'; }';
			$custom_css .= '.st-menu .widget.widget-about .social-icon a:hover { background-color: '.$links_color['hover'].'!important; }';
			$custom_css .= '.widget .tagcloud a:hover { color: '.$links_color['hover'].'!important; }';
			$custom_css .= '.widget .tagcloud a:hover { border-color: '.$links_color['hover'].'!important; }';
		}
		
		
		// Links Styling
		$header_bg = zoomarts_option('header-bg');
		$logo_color = zoomarts_option('logo-color');
		$tagline_color = zoomarts_option('tagline-color');
		$menu_color = zoomarts_option('menu-color');
		$search_link_color = zoomarts_option('search-link-color');
		$off_canvas_link_color_h = zoomarts_option('off-canvas-link-color-h');
		if ( isset($header_bg) ) {
			$custom_css .= '#header { background-color: '.$header_bg.'; }';
		}
		if ( isset($logo_color) ) {
			$custom_css .= '#header h1 a { color: '.$logo_color.'; }';
		}
		if ( isset($tagline_color) ) {
			$custom_css .= '#header .tagline { color: '.$tagline_color.'; }';
		}
		if ( isset($menu_color['regular']) ) {
			$custom_css .= '.nav-menu li a { color: '.$menu_color['regular'].'; }';
		}
		if ( isset($menu_color['hover']) ) {
			$custom_css .= '.nav-menu li a:hover, .responsive-menu .nav-menu ul ul li a:hover { color: '.$menu_color['hover'].'; }';
		}
		if ( isset($search_link_color['regular']) ) {
			$custom_css .= '.header-left .show-search { color: '.$search_link_color['regular'].'; }';
		}
		if ( isset($search_link_color['hover']) ) {
			$custom_css .= '.header-left .show-search:hover { color: '.$search_link_color['hover'].'; }';
		}
		if ( isset($off_canvas_link_color_h['regular']) ) {
			$custom_css .= '.header-left .show-sidebar { color: '.$search_link_color['regular'].'; }';
		}
		if ( isset($off_canvas_link_color_h['hover']) ) {
			$custom_css .= '.header-left .show-sidebar:hover { color: '.$off_canvas_link_color_h['hover'].'; }';
		}
		if ( isset($off_canvas_link_color_h['active']) ) {
			$custom_css .= '.nav-menu > ul > li.current-menu-item > a, .nav-menu > ul > li.current-menu-ancestor > a { color: '.$off_canvas_link_color_h['active'].'; }';
		}
		
		
		// Off-Canvas Styling
		$header_height = zoomarts_option('header-height');
		if ( $header_height !== '' ) {
			$custom_css .= '#header { height: '.$header_height.'px; line-height: '.$header_height.'px; }';
		}
		
		
		// trim white space for faster page loading
		$custom_css_trimmed =  preg_replace( '/\s+/', ' ', $custom_css );
		
		// output css on front end
		$css_output = "<!-- Custom CSS -->\n<style type=\"text/css\">\n" . $custom_css_trimmed . "\n</style>";
		if( !empty($custom_css) ) {
			echo $css_output;
		}

		
	}
	
}

?>