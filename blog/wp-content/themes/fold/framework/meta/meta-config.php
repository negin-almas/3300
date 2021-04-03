<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'za_';
	
	
	/**
	 * Post Type Image
	 */
	$meta_boxes['metabox-post-image'] = array(
		'id'         => 'metabox-post-image',
		'title'      => __( 'Image Settings', 'zoomarts' ),
		'pages'      => array( 'post', ),
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true,
		'fields'     => array(
			array(
				'name' => __( 'Image LightBox?', 'zoomarts' ),
				'desc' => __( 'Upload an image or enter a URL.', 'zoomarts' ),
				'id'   => $prefix . 'lightbox_image',
				'type' => 'file',
			),
		),
	);
	
	
	/**
	 * Post Type Gallery
	 */
	$meta_boxes['metabox-post-gallery'] = array(
		'id'         => 'metabox-post-gallery',
		'title'      => __( 'Gallery Settings', 'zoomarts' ),
		'pages'      => array( 'post', ),
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true,
		'fields'     => array(
			array(
				'name'         => __( 'Gallery Images', 'zoomarts' ),
				'desc'         => __( 'Upload Your Gallery images.', 'zoomarts' ),
				'id'           => $prefix . 'gallery_images',
				'type'         => 'file_list',
				'preview_size' => array( 100, 100 ),
			),
		),
	);
	
	
	/**
	 * Post Type Status
	 */
	$meta_boxes['metabox-post-status'] = array(
		'id'         => 'metabox-post-status',
		'title'      => __( 'Status Settings', 'zoomarts' ),
		'pages'      => array( 'post', ),
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true,
		'fields'     => array(
			array(
				'name' => __( 'Embed Status', 'zoomarts' ),
				'desc' => __( 'Embed Status Here , Embed your tweet status heres.', 'zoomarts' ),
				'id'   => $prefix . 'embed_status',
				'type' => 'oembed',
			),
			array(
				'name'    => __( 'Status Background', 'zoomarts' ),
				'desc'    => __( 'Select your preferred color for this status background.<br/> Also you can upload the background image by using <b>featured image.</b>', 'zoomarts' ),
				'id'      => $prefix . 'embed_status_bg_color',
				'type'    => 'colorpicker',
				'default' => '#47C2DC'
			),
		),
	);
	
	
	/**
	 * Post Type Quote
	 */
	$meta_boxes['metabox-post-quote'] = array(
		'id'         => 'metabox-post-quote',
		'title'      => __( 'Quote Settings', 'zoomarts' ),
		'pages'      => array( 'post', ),
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true,
		'fields'     => array(
			array(
				'name' => __( 'Author', 'zoomarts' ),
				'desc' => __( 'Insert the Quote Author.', 'zoomarts' ),
				'id'   => $prefix . 'quote_author',
				'type' => 'text_medium',
			),
			array(
				'name'    => __( 'Show Post Head?', 'zoomarts' ),
				'desc'    => __( 'Show The Post Head.', 'zoomarts' ),
				'id'   => $prefix . 'quote_post_head',
				'type' => 'checkbox',
			),
			array(
				'name'    => __( 'Quote Background', 'zoomarts' ),
				'desc'    => __( 'Select your preferred color for this post background.<br/> Also you can upload the background image by using <b>featured image.</b>', 'zoomarts' ),
				'id'      => $prefix . 'quote_post_bg_color',
				'type'    => 'colorpicker',
				'default' => '#47C2DC'
			),
		),
	);
	
	
	/**
	 * Post Type Link
	 */
	$meta_boxes['metabox-post-link'] = array(
		'id'         => 'metabox-post-link',
		'title'      => __( 'Link Settings', 'zoomarts' ),
		'pages'      => array( 'post', ),
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true,
		'fields'     => array(
			array(
				'name' 		=> __( 'The Link', 'zoomarts' ),
				'desc' 		=> __( 'Insert your link URL, e.g. http://www.zoom-arts.com', 'zoomarts' ),
				'id'   		=> $prefix . 'link_url',
				'type' 		=> 'text_medium',
			),
			array(
				'name'    	=> __( 'Link Background', 'zoomarts' ),
				'desc'    	=> __( 'Select your preferred color for this post background.<br/> Also you can upload the background image by using <b>featured image.</b>', 'zoomarts' ),
				'id'      	=> $prefix . 'link_post_bg_color',
				'type'    	=> 'colorpicker',
				'default' 	=> '#47C2DC'
			),
		),
	);
	
	
	/**
	 * Post Type Video
	 */
	$meta_boxes['metabox-post-video'] = array(
		'id'         => 'metabox-post-video',
		'title'      => __( 'Video Settings', 'zoomarts' ),
		'pages'      => array( 'post', ),
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true,
		'fields'     => array(
			array(
				'name' => __( 'M4V File URL', 'zoomarts' ),
				'desc' => __( 'The URL to the .m4v video file.', 'zoomarts' ),
				'id'   => $prefix . 'video_m4v',
				'type' => 'text',
			),
			array(
				'name' => __( 'OGV File URL', 'zoomarts' ),
				'desc' => __( 'The URL to the .ogv video file.', 'zoomarts' ),
				'id'   => $prefix . 'video_ogv',
				'type' => 'text',
			),
			array(
				'name' => __( 'Video Poster Image', 'zoomarts' ),
				'desc' => __( 'Upload an image or enter a URL.', 'zoomarts' ),
				'id'   => $prefix . 'video_poster',
				'type' => 'text',
			),
			array(
				'name' => __( 'Embedded Code', 'zoomarts' ),
				'desc' => __( 'If you are using something other than self hosted video such as Youtube or Vimeo, paste the video url here.<br/><strong>This field will override the above.</strong>', 'zoomarts' ),
				'id'   => $prefix . 'video_embed_code',
				'type' => 'oembed',
			),
		),
	);
	
	
	/**
	 * Post Type Audio
	 */
	$meta_boxes['metabox-post-audio'] = array(
		'id'         => 'metabox-post-audio',
		'title'      => __( 'Audio Settings', 'zoomarts' ),
		'pages'      => array( 'post', ),
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true,
		'fields'     => array(
			array(
				'name' => __( 'MP3 File URL', 'zoomarts' ),
				'desc' => __( 'The URL to the .mp3 video file.', 'zoomarts' ),
				'id'   => $prefix . 'audio_mp3',
				'type' => 'text',
			),
			array(
				'name' => __( 'OGA File URL', 'zoomarts' ),
				'desc' => __( 'The URL to the .oga video file.', 'zoomarts' ),
				'id'   => $prefix . 'audio_oga',
				'type' => 'text',
			),
			array(
				'name' => __( 'Audio Poster Image', 'zoomarts' ),
				'desc' => __( 'Enter a image url for audio poster.', 'zoomarts' ),
				'id'   => $prefix . 'audio_poster',
				'type' => 'text',
			),
			array(
				'name' => __( 'Embedded Code', 'zoomarts' ),
				'desc' => __( 'If you are using something other than self hosted audio such as Soundcloud, paste the audio url here.<br/><strong>This field will override the above.</strong>', 'zoomarts' ),
				'id'   => $prefix . 'audio_embed_code',
				'type' => 'oembed',
			),
		),
	);
	
	
	/**
	 * Post Options
	 */
	$meta_boxes['metabox-post-options'] = array(
		'id'         => 'metabox-page-options',
		'title'      => __( 'Post Options', 'zoomarts' ),
		'pages'      => array( 'post', ),
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true,
		'fields'     => array(
			array(
				'name'    => __( 'Post Layout', 'zoomarts' ),
				'desc'    => __( 'Select your preferred layout for this post.', 'zoomarts' ),
				'id'      => $prefix . 'post_layout',
				'type'    => 'radio_inline',
				'options' => array(
					'right-sidebar'   => __( 'Left Sidebar', 'zoomarts' ),
					'left-sidebar'     => __( 'Right Sidebar', 'zoomarts' ),
					'centered' => __( 'Centered', 'zoomarts' ),
					'fullwidth' => __( 'Fullwidth', 'zoomarts' )
				),
				'default' => 'right-sidebar'
			),
		),
	);
	
	
	
	/**
	 * Page Options
	 */
	$meta_boxes['metabox-page-options'] = array(
		'id'         => 'metabox-page-options',
		'title'      => __( 'Page Options', 'zoomarts' ),
		'pages'      => array( 'page', ),
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true,
		'fields'     => array(
			array(
				'name' => __( 'Page Subheading', 'zoomarts' ),
				'desc' => __( 'Enter your page subheading.', 'zoomarts' ),
				'id'   => $prefix . 'page_subheading',
				'type' => 'text',
			),
			array(
				'name'    => __( 'Page Header Style', 'zoomarts' ),
				'id'      => $prefix . 'title_style',
				'type'    => 'radio_inline',
				'options' => array(
					'text-left' => __( 'Left', 'zoomarts' ),
					'text-right'   => __( 'Right', 'zoomarts' ),
					'text-center'     => __( 'Center', 'zoomarts' ),
				),
				'default' => 'text-left'
			),
			array(
				'name'    => __( 'Page Layout', 'zoomarts' ),
				'desc'    => __( 'Select your preferred layout for this page.', 'zoomarts' ),
				'id'      => $prefix . 'page_layout',
				'type'    => 'radio_inline',
				'options' => array(
					'right-sidebar'   => __( 'Left Sidebar', 'zoomarts' ),
					'left-sidebar'     => __( 'Right Sidebar', 'zoomarts' ),
					'no-sidebar' => __( 'Centered', 'zoomarts' ),
					'fullwidth' => __( 'Fullwidth', 'zoomarts' )
				),
				'default' => 'right_sidebar'
			),
		),
	);


	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';

}