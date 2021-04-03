<?php

add_filter( 'su/data/shortcodes', 'remove_unused_shortcodes' );

function remove_unused_shortcodes( $shortcodes ) {
	unset(
		$shortcodes['tab'],
		$shortcodes['spacer'],
		$shortcodes['pullquote'],
		$shortcodes['box'],
		$shortcodes['dummy_image'],
		$shortcodes['dummy_text'],
		$shortcodes['private'],
		$shortcodes['user'],
		$shortcodes['siblings'],
		$shortcodes['service'],
		$shortcodes['post'],
		$shortcodes['posts'],
		$shortcodes['document'],
		$shortcodes['meta'],
		$shortcodes['template'],
		$shortcodes['divider'],
		$shortcodes['feed'],
		$shortcodes['youtube_advanced'],
		$shortcodes['lightbox'],
		$shortcodes['custom_gallery']['atts']['width'],
		$shortcodes['custom_gallery']['atts']['height']
	);
	return $shortcodes;
}



add_filter( 'su/data/shortcodes', 'register_my_custom_shortcode' );

function register_my_custom_shortcode( $shortcodes ) {
	
	$shortcodes['custom_divider'] = array(
		'name' => __( 'Divider', 'zoomarts' ),
		'type' => 'single',
		'group' => 'content other',
		'atts' => array(
			'style' => array(
				'type' => 'select',
				'values' => array(
					'transparent' => __( 'Transparent', 'zoomarts' ),
					'solid' => __( 'Solid Line', 'zoomarts' )
				),
				'default' => 'transparent',
				'name' => __( 'Style', 'zoomarts' ),
				'desc' => __( 'Divider Style', 'zoomarts' )
			),
			'top_margin' => array(
				'type' => 'slider',
				'min' => 0,
				'max' => 400,
				'step' => 1,
				'default' => 25,
				'name' => __( 'Top Margin', 'zoomarts' ),
			),
			'bottom_margin' => array(
				'type' => 'slider',
				'min' => 0,
				'max' => 400,
				'step' => 1,
				'default' => 25,
				'name' => __( 'Bottom Margin', 'zoomarts' ),
			),
			'class' => array(
				'default' => '',
				'name' => __( 'Class', 'zoomarts' ),
				'desc' => __( 'Extra CSS class', 'zoomarts' )
			)
		),
		'desc' => __( 'Space with adjustable margins', 'zoomarts' ),
		'icon' => 'ellipsis-h',
		'function' => 'su_custom_divider_shortcode'
	);
	
	$shortcodes['progress_bar'] = array(
		'name' => __( 'Progress Bar', 'zoomarts' ),
		'type' => 'single',
		'group' => 'content other',
		'atts' => array(
			'progress_label' => array(
				'default' => '',
				'name' => __( 'Progress Bar Label', 'zoomarts' ),
			),
			'progress_value' => array(
				'type' => 'slider',
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => 90,
				'name' => __( 'Progress Bar Value', 'zoomarts' ),
			),
			'progress_delay' => array(
				'type' => 'slider',
				'min' => 0,
				'max' => 4000,
				'step' => 100,
				'default' => 0,
				'name' => __( 'Progress Bar Animation Delay', 'zoomarts' ),
			),
			'class' => array(
				'default' => '',
				'name' => __( 'Class', 'zoomarts' ),
				'desc' => __( 'Extra CSS class', 'zoomarts' )
			)
		),
		'desc' => __( 'Add progress bar block', 'zoomarts' ),
		'icon' => 'ellipsis-h',
		'function' => 'su_custom_progress_bar_shortcode'
	);
	
	$shortcodes['custom_lightbox'] = array(
		'name' => __( 'Image Lightbox', 'zoomarts' ),
		'type' => 'wrap',
		'group' => 'content other',
		'atts' => array(
			'src' => array(
				'default' => '',
				'name' => __( 'Content Source', 'zoomarts' ),
				'desc' => __( 'Insert here lightbox image URL', 'zoomarts' )
			),
			'caption' => array(
				'default' => '',
				'name' => __( 'Caption', 'zoomarts' ),
				'desc' => __( 'Insert here image caption', 'zoomarts' )
			),
			'class' => array(
				'default' => '',
				'name' => __( 'Class', 'zoomarts' ),
				'desc' => __( 'Extra CSS class', 'zoomarts' )
			)
		),
		'desc' => __( 'Add Lightbox Image', 'zoomarts' ),
		'icon' => 'external-link',
		'function' => 'su_custom_lightbox_shortcode'
	);
	
	return $shortcodes;
}



function su_custom_divider_shortcode( $atts ) {
	
	$atts = shortcode_atts( array(
		'style' => 'transparent',
		'top_margin' => '25',
		'bottom_margin' => '25',
		'class' => '',
	), $atts );
	
	$return = '<div class="custom-divider '. $atts['style'] . $atts['class'] .'" style="margin-top:'.$atts['top_margin'].'px; margin-bottom:'.$atts['bottom_margin'].'px;"></div>';
	
	return $return;
	
}

function su_custom_progress_bar_shortcode( $atts ) {
	
	$atts = shortcode_atts( array(
		'progress_label' => '',
		'progress_value' => '',
		'progress_delay' => '400',
		'class' => '',
	), $atts );
	
	$return = '<div class="progress-bar-block '.$atts['class'].'"><div class="progress-label">'.$atts['progress_label'].'</div><div class="progress"><div class="progress-bar" data-progress-animation="'.$atts['progress_value'].'%" data-appear-animation-delay="'.$atts['progress_delay'].'"><span>'.$atts['progress_value'].'%</span></div></div></div>';
	
	return $return;
	
}

function su_custom_lightbox_shortcode( $atts, $content = null ) {
	
	$atts = shortcode_atts( array(
		'src' => false,
		'caption' => '',
		'class' => '',
	), $atts );
	
	$return = '<a class="'. $atts['class'] .'" title="'.$atts['caption'].'" href="'.$atts['src'].'" data-lightbox="'.rand(1, 1000).'">'.$content.'</a>';
	
	return $return;
}