<?php
ob_start();


/*-----------------------------------------------------------------------------------*/
/* Include Theme Functions
/*-----------------------------------------------------------------------------------*/
require_once( get_template_directory() . '/framework/admin/redux-framework.php' );
require_once( get_template_directory() . '/framework/functions/admin-config.php' );
require_once( get_template_directory() . '/framework/meta/meta-config.php' );
require_once( get_template_directory() .'/framework/functions/excerpts.php' );
require_once( get_template_directory() .'/framework/functions/love/love-plugin.php' );
require_once( get_template_directory() .'/framework/functions/favicon-apple-icons.php' );
require_once( get_template_directory() .'/framework/functions/extend-sc.php' );
require_once( get_template_directory() .'/framework/functions/tracking-code.php' );
require_once( get_template_directory() .'/framework/functions/custom-css.php' );
require_once( get_template_directory() .'/framework/functions/styling.php' );
require_once( get_template_directory() .'/framework/plugins/install-plugin.php' );



/*-----------------------------------------------------------------------------------*/
/*	Load Widgets
/*-----------------------------------------------------------------------------------*/
require_once( get_template_directory() . '/framework/widgets/widget-about.php' );
require_once( get_template_directory() . '/framework/widgets/widget-flickr.php' );
require_once( get_template_directory() . '/framework/widgets/widget-twitter.php' );
require_once( get_template_directory() . '/framework/widgets/widget-recent-posts.php' );
require_once( get_template_directory() . '/framework/widgets/widget-recent-comments.php' );



/*-----------------------------------------------------------------------------------*/
/*	Setup The Theme
/*-----------------------------------------------------------------------------------*/
if (!function_exists('zoomarts_setup')) {
    function zoomarts_setup() {
        add_editor_style();
		add_theme_support( 'post-thumbnails' );
        add_theme_support('automatic-feed-links');
		register_nav_menus( array( 'header_menu' => 'Header Menu' ) );
        load_theme_textdomain('zoomarts', get_template_directory() . '/languages/');
		add_theme_support( 'post-formats', array( 'gallery', 'image', 'link', 'quote', 'video', 'audio', 'status' ) );
    }
}
add_action('after_setup_theme', 'zoomarts_setup');



/*-----------------------------------------------------------------------------------*/
/* Register Sidebars */
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'za_sidebars_init' ) ) {

    function za_sidebars_init() {
		register_sidebar(array(
    		'name' => __('Main Sidebar', 'zoomarts'),
    		'id' => 'main-sidebar',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget' => '</div>',
    		'before_title' => '<h3 class="widget-title"><span>',
    		'after_title' => '</span></h3>',
    	));
		register_sidebar(array(
    		'name' => __('Single Sidebar', 'zoomarts'),
    		'id' => 'single-sidebar',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget' => '</div>',
    		'before_title' => '<h3 class="widget-title"><span>',
    		'after_title' => '</span></h3>',
    	));
		if ( zoomarts_option('off-canvas-checkbox') == '1' ) {
			register_sidebar(array(
				'name' => __('Off-Canvas', 'zoomarts'),
				'id' => 'off-canvas',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widget-title"><span>',
				'after_title' => '</span></h3>',
			));
		}
	}
	
}
add_action( 'widgets_init', 'za_sidebars_init' );



/*-----------------------------------------------------------------------------------*/
/*	Featured Images Sizes
/*-----------------------------------------------------------------------------------*/
add_image_size( 'post-standard', 750,400, true );
add_image_size( 'post-widget', 45, 45, array( 'left', 'top' ) );
add_image_size( 'post-carousel', 290,130, true );
add_image_size( 'related-post', 300, 160, array( center, center ) );



/*-----------------------------------------------------------------------------------*/
/*	Load Jquery Files
/*-----------------------------------------------------------------------------------*/
function theme_scripts() {
	
	/* Register our scripts -----------------------------------------------------*/
	wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.custom.js', 'jquery','2.6.2', false);
	wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery','','3.1.1', true);
	wp_register_script( 'ajax-load-more', get_template_directory_uri() . '/js/ajax-load-more.js', 'jquery', '1.0', true);
	wp_register_script( 'google-map', 'http://maps.google.com/maps/api/js?sensor=false&ver=3.9.1', 'jquery', '3.9.1', true);
	wp_register_script( 'classie', get_template_directory_uri() . '/js/classie.js', 'jquery','1.0', true);
	wp_register_script( 'initmap', get_template_directory_uri() . '/js/initmap.min.js', 'jquery','1.0.6', true);
	wp_register_script( 'retina', get_template_directory_uri() . '/js/retina.min.js', 'jquery','1.3.0', true);
	wp_register_script( 'sidebar-effects', get_template_directory_uri() . '/js/sidebar-effects.js', 'jquery','1.0', true);
	wp_register_script( 'appear', get_template_directory_uri() . '/js/jquery.appear.js', 'jquery','','1.0', true);
	wp_register_script( 'fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', 'jquery','','1.0.3', true);
	wp_register_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', 'jquery','','1.3.2', true);
	wp_register_script( 'lightbox', get_template_directory_uri() . '/js/lightbox.min.js', 'jquery','2.7.1', true);
	wp_register_script( 'social-sharing', get_template_directory_uri() . '/js/social-sharing.js', 'jquery','1.0', true);
	wp_register_script( 'nicescroll', get_template_directory_uri() . '/js/jquery.nicescroll.min.js', 'jquery','3.5.4', true);
	wp_register_script( 'jplayer', get_template_directory_uri() . '/js/jquery.jplayer.min.js', 'jquery', '2.1.0', true);
	wp_register_script( 'main', get_template_directory_uri() . '/js/main.js', 'jquery','','1.0', true);
	wp_register_script( 'custom-js', get_template_directory_uri() . '/js/custom-js.php', 'jquery','','1.0', true);
		
	/* Enqueue our scripts ------------------------------------------------------*/
	wp_enqueue_script('modernizr');
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap-js');
	wp_enqueue_script('ajax-load-more');
	wp_enqueue_script('google-map');
	wp_enqueue_script('initmap');
	wp_enqueue_script('classie');
	wp_enqueue_script('retina');
	wp_enqueue_script('appear');
	wp_enqueue_script('fitvids');
	wp_enqueue_script('owl-carousel');
	wp_enqueue_script('lightbox');
	wp_enqueue_script('social-sharing');
	wp_enqueue_script('nicescroll');
	wp_enqueue_script('sidebar-effects');
	wp_enqueue_script('jplayer');
	wp_enqueue_script('main');
	wp_enqueue_script('custom-js');
	
	// Load Comment Script
	if( is_singular() ) wp_enqueue_script( 'comment-reply' );			
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );



/*-----------------------------------------------------------------------------------*/
/*	Load CSS Files
/*-----------------------------------------------------------------------------------*/
function theme_styles()  {  
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array());
	wp_enqueue_style( 'bootstrap-theme', get_template_directory_uri() . '/css/bootstrap-theme.min.css', array());
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array());
	wp_enqueue_style( 'custom-icons', get_template_directory_uri() . '/css/icons.css', array());
	wp_enqueue_style( 'plugins', get_template_directory_uri() . '/css/plugins.css', array());
	wp_enqueue_style( 'main-styles', get_template_directory_uri() . '/css/style.css', array());
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css', array());	
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );



/*-----------------------------------------------------------------------------------*/
/*	WP Ajax Load More
/*-----------------------------------------------------------------------------------*/
function ajax_load_more( $atts, $content = null ) {	
	extract(shortcode_atts(array(
		'path' 				=> get_template_directory_uri().'/ajax-load-more',
		'post_type' 		=> 'post',
		'category' 			=> '',
		'taxonomy' 			=> '',
		'tag' 				=> '',
		'author' 			=> '',
		'search' 			=> '',
		'post_not_in' 		=> '',
		'display_posts' 	=> '4',
		'scroll' 			=> 'true',
		'max_pages' 		=> '5',
		'transition' 		=> 'slide',
		'button_text' 		=> 'Older Posts' 
   ), $atts));	
   return '<section id="ajax-load-more"><ul class="listing" data-path="'.$path.'" data-post-type="'.$post_type.'" data-category="'.$category.'" data-taxonomy="'.$taxonomy.'" data-tag="'.$tag.'" data-author="'.$author.'" data-post-not-in="'.$post_not_in.'" data-display-posts="'.$display_posts.'" data-search="'.$search.'" data-scroll="'.$scroll.'" data-max-pages="'.$max_pages.'" data-button-text="'.$button_text.'" data-transition="'.$transition.'"></ul></section>';  
}
add_shortcode('ajax_load_more', 'ajax_load_more');



/*-----------------------------------------------------------------------------------*/
/*	Post Views Count
/*-----------------------------------------------------------------------------------*/
function za_get_post_views($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return __( '0 View', 'zoomarts' );
    }
    return $count.__( ' Views', 'zoomarts' );
}
function za_set_post_views($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}



/*-----------------------------------------------------------------------------------*/
/*	Comment Styling
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'za_comment' ) ) {
	function za_comment($comment, $args, $depth) {
	
        $GLOBALS['comment'] = $comment; ?>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

            <div id="comment-<?php comment_ID(); ?>" class="clearfix">
                <div class="avatar">
					<?php echo get_avatar($comment,$size='50'); ?>
				</div>
				<div class="comment-right">
					<div class="comment-author">
						<?php printf(__('<cite class="fn">%s</cite>', 'zoomarts'), get_comment_author_link()) ?>
					</div>
					<div class="comment-meta">
						<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a> -
						<?php edit_comment_link(__('Edit', 'zoomarts'),'  ','') ?> &middot; <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
					</div>
					<?php if ($comment->comment_approved == '0') { ?>
						<em class="moderation"><?php _e('Your comment is awaiting moderation.', 'zoomarts') ?></em>
						<br />
					<?php } ?>
					<div class="comment-body">
						<?php comment_text() ?>
					</div>
				</div>
            </div>
	<?php
	}
}



/*-----------------------------------------------------------------------------------*/
/*	Output Video Post
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'za_post_video' ) ) {
	
    function za_post_video($postid) {
    	$m4v = get_post_meta($postid, 'za_video_m4v', true);
    	$ogv = get_post_meta($postid, 'za_video_ogv', true);
    	$poster = get_post_meta($postid, 'za_video_poster', true);
    ?>
			
    <script type="text/javascript">
    	jQuery(document).ready(function($){
    		if($().jPlayer) {
    			$("#jquery_jplayer_<?php echo $postid; ?>").jPlayer({
    				ready: function () {
    					$(this).jPlayer("setMedia", {
    						<?php if($m4v != '') : ?>
    						m4v: "<?php echo $m4v; ?>",
    						<?php endif; ?>
    						<?php if($ogv != '') : ?>
    						ogv: "<?php echo $ogv; ?>",
    						<?php endif; ?>
    						<?php if ($poster != '') : ?>
    						poster: "<?php echo $poster; ?>"
    						<?php endif; ?>
    					});
    				},
					size: { width: "100%", height: "auto" },
    				swfPath: "<?php echo get_template_directory_uri(); ?>/js",
    				cssSelectorAncestor: "#jp_interface_<?php echo $postid; ?>",
    				supplied: "<?php if($m4v != '') : ?>m4v, <?php endif; ?><?php if($ogv != '') : ?>ogv, <?php endif; ?> all"
    			});
    			$('#jquery_jplayer_<?php echo $postid; ?>').bind($.jPlayer.event.playing, function(event) {
    			    $(this).add('#jp_interface_<?php echo $postid; ?>').hover( function() {
    			        $('#jp_interface_<?php echo $postid; ?>').stop().animate({ opacity: 1 }, 400);
			        }, function() {
			            $('#jp_interface_<?php echo $postid; ?>').stop().animate({ opacity: 0 }, 400);
			        });
    			});
    			$('#jquery_jplayer_<?php echo $postid; ?>').bind($.jPlayer.event.pause, function(event) {
    			    $('#jquery_jplayer_<?php echo $postid; ?>').add('#jp_interface_<?php echo $postid; ?>').unbind('hover');
    			    $('#jp_interface_<?php echo $postid; ?>').stop().animate({ opacity: 1 }, 400);
			        
    			});
    		}
    	});
    </script>

    <div id="jquery_jplayer_<?php echo $postid; ?>" class="jp-jplayer jp-jplayer-video"></div>
    <div class="jp-video-container">
        <div class="jp-video">
            <div class="jp-type-single">
				<div id="jp_interface_<?php echo $postid; ?>" class="jp-interface">
					<a href="#" class="jp-play" tabindex="1"><i class="fa fa-play"></i></a>
					<a href="#" class="jp-pause" tabindex="1"><i class="fa fa-pause"></i></a>
					<span class="jp-current-time" tabindex="1"></span>
					<div class="jp-progress">
                        <div class="jp-seek-bar">
                            <div class="jp-play-bar"></div>
                        </div>
                    </div>
					<span class="jp-duration" tabindex="1"></span>
					<a href="#" class="jp-mute" tabindex="1"><i class="fa fa-volume-down"></i></a>
					<a href="#" class="jp-unmute" tabindex="1"><i class="fa fa-volume-off"></i></a>
					<div class="jp-volume-bar-container">
                        <div class="jp-volume-bar">
                            <div class="jp-volume-bar-value"></div>
                        </div>
                    </div>
				</div>
            </div>
        </div>
    </div>
	<?php 
    }
}



/*-----------------------------------------------------------------------------------*/
/*	Output Audio Post
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'za_post_audio' ) ) {
	
    function za_post_audio($postid, $width = 560) {
    	$mp3 = get_post_meta($postid, 'za_audio_mp3', TRUE);
    	$ogg = get_post_meta($postid, 'za_audio_ogg', TRUE);
    	$poster = get_post_meta($postid, 'za_audio_poster', TRUE);
    	$height = ($height) ? $height : 75;
    ?>
		<script type="text/javascript">	
			jQuery(document).ready(function($){
				if($().jPlayer) {
					$("#jquery_jplayer_<?php echo $postid; ?>").jPlayer({
						ready: function () {
							$(this).jPlayer("setMedia", {
								<?php if($poster != '') : ?>
								poster: "<?php echo $poster; ?>",
								<?php endif; ?>
								<?php if($mp3 != '') : ?>
								mp3: "<?php echo $mp3; ?>",
								<?php endif; ?>
								<?php if($ogg != '') : ?>
								oga: "<?php echo $ogg; ?>",
								<?php endif; ?>
								end: ""
							});
						},
						size: { width: "100%", height: "auto" },
						swfPath: "<?php echo get_template_directory_uri(); ?>/js",
						cssSelectorAncestor: "#jp_interface_<?php echo $postid; ?>",
						supplied: "<?php if($ogg != '') : ?>oga,<?php endif; ?><?php if($mp3 != '') : ?>mp3, <?php endif; ?> all"
					});
					$('#jquery_jplayer_<?php echo $postid; ?>').bind($.jPlayer.event.pause, function(event) {
						$('#jquery_jplayer_<?php echo $postid; ?>').add('#jp_interface_<?php echo $postid; ?>').unbind('hover');
					});
				}
			});
		</script>
			
		<div id="jquery_jplayer_<?php echo $postid; ?>" class="jp-jplayer jp-jplayer-audio"></div>
        <div class="jp-audio-container">
			<div class="jp-audio">
				<div class="jp-type-single">
					<div id="jp_interface_<?php echo $postid; ?>" class="jp-interface">
						<a href="#" class="jp-play" tabindex="1"><i class="fa fa-play"></i></a>
						<a href="#" class="jp-pause" tabindex="1"><i class="fa fa-pause"></i></a>
						<span class="jp-current-time" tabindex="1"></span>
						<div class="jp-progress">
							<div class="jp-seek-bar">
								<div class="jp-play-bar"></div>
							</div>
						</div>
						<span class="jp-duration" tabindex="1"></span>
						<a href="#" class="jp-mute" tabindex="1"><i class="fa fa-volume-down"></i></a>
						<a href="#" class="jp-unmute" tabindex="1"><i class="fa fa-volume-off"></i></a>
						<div class="jp-volume-bar-container">
							<div class="jp-volume-bar">
								<div class="jp-volume-bar-value"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
	<?php 
    }
}



/*-----------------------------------------------------------------------------------*/
/*	Standard Pagination
/*-----------------------------------------------------------------------------------*/
function pagination() {
	
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	
    if (empty($pages)) { $pages = 1; }

    if (1 != $pages) {
		$big = 9999; // need an unlikely integer
        echo "<div class='page-pagination'>";
		$pagination = paginate_links(
			array(
				'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'end_size' => 3,
                'mid_size' => 6,
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages,
                'type' => 'list',
                'prev_text' => '<i class="fa fa-angle-left"></i>',
                'next_text' => '<i class="fa fa-angle-right"></i>',
			)
		);
        echo $pagination;
        echo "</div>";
    }
}



/*-----------------------------------------------------------------------------------*/
/*	Exclude a Page from Search Results
/*-----------------------------------------------------------------------------------*/
add_filter( 'pre_get_posts', 'za_exclude_pages' );
function za_exclude_pages( $query ) {
    if ( $query->is_search )
		$query->set( 'post_type', 'post' );
    return $query;
};

wp_embed_register_handler( 'aparat', '#http://(?:www)\.aparat\.com\/v\/(.*?)\/?$#i', 'wp_embed_handler_aparat');

function wp_embed_handler_aparat( $matches, $attr, $url, $rawattr ) {

$output = sprintf(
			'<iframe src="http://www.aparat.com/video/video/embed/videohash/%s/vt/frame" allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" width="640" height="360"></iframe>',
			$matches[1]
		);

	return apply_filters( 'embed_aparat', $output, $matches, $attr, $url, $rawattr );
}


ob_end_clean();
?>