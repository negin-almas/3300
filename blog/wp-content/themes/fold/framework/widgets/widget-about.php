<?php
/**
 * WP About Me Widget
 *
 * @package WordPress
 * @subpackage Fold
 * @since Fold 1.0
*/



// Creating the widget 
class about_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'about_widget', 

			// Widget name will appear in UI
			__('About Widget', 'zoomarts'), 

			// Widget description
			array( 'description' => __( 'Custom About Widget.', 'zoomarts' ), ) 
		);
	}

	
	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		
		$name = $instance['name'];
		$job = $instance['job'];
		$words = $instance['words'];
		
		if ( !empty($instance['small_pic']) ) {
			$small_pic = $instance['small_pic'];
		} else {
			$small_pic = get_template_directory_uri() .'/images/my-pic.png';
		}
		if ( !empty($instance['block_bg']) ) {
			$block_bg = 'url('.$instance['block_bg'].')';
		} else {
			$block_bg = none;
		}
		if ( !empty($instance['fb_url']) ) {
			$fb_url = '<a href="'.$instance['fb_url'].'"><i class="fa fa-facebook"></i></a>';
		}
		if ( !empty($instance['tw_url']) ) {
			$tw_url = '<a href="'.$instance['tw_url'].'"><i class="fa fa-twitter"></i></a>';
		}
		if ( !empty($instance['dr_url']) ) {
			$dr_url = '<a href="'.$instance['dr_url'].'"><i class="fa fa-dribbble"></i></a>';
		}
		if ( !empty($instance['gp_url']) ) {
			$gp_url = '<a href="'.$instance['gp_url'].'"><i class="fa fa-google-plus"></i></a>';
		}
		if ( !empty($instance['gi_url']) ) {
			$gi_url = '<a href="'.$instance['gi_url'].'"><i class="fa fa-github-alt"></i></a>';
		}
		if ( !empty($instance['in_url']) ) {
			$in_url = '<a href="'.$instance['in_url'].'"><i class="fa fa-instagram"></i></a>';
		}
		if ( !empty($instance['li_url']) ) {
			$li_url = '<a href="'.$instance['li_url'].'"><i class="fa fa-linkedin"></i></a>';
		}
		if ( !empty($instance['tu_url']) ) {
			$tu_url = '<a href="'.$instance['tu_url'].'"><i class="fa fa-tumblr"></i></a>';
		}
		if ( !empty($instance['fl_url']) ) {
			$fl_url = '<a href="'.$instance['fl_url'].'"><i class="fa fa-flickr"></i></a>';
		}
		if ( !empty($instance['pi_url']) ) {
			$pi_url = '<a href="'.$instance['pi_url'].'"><i class="fa fa-pinterest"></i></a>';
		}
		if ( !empty($instance['vi_url']) ) {
			$vi_url = '<a href="'.$instance['vi_url'].'"><i class="fa fa-vimeo-square"></i></a>';
		}
		if ( !empty($instance['sk_url']) ) {
			$sk_url = '<a href="'.$instance['sk_url'].'"><i class="fa fa-skype"></i></a>';
		}
		if ( !empty($instance['yt_url']) ) {
			$yt_url = '<a href="'.$instance['yt_url'].'"><i class="fa fa-youtube"></i></a>';
		}
		// before and after widget arguments are defined by themes
		echo '<div class="widget widget-about">';
		echo '<div class="head-bg" style="background-image: '.$block_bg.'">';
		echo '<div class="my-pic"><img alt="'.$name.'" src="'.$small_pic.'"/></div>';
		echo '<div class="my-data"><span class="my-name">'. $name .'</span> <span class="my-job">'. $job .'</span></div>';
		echo '</div>';
		echo '<div class="my-words">'.$words.'</div>';
		echo '<div class="social-icon">';
		echo $fb_url . $tw_url . $dr_url . $gp_url . $gi_url . $in_url . $li_url . $tu_url . $fl_url . $pi_url . $vi_url . $sk_url . $yt_url;
		echo '</div>';
		echo '</div>';
	}

	
	// Widget Backend 
	public function form( $instance ) {
		
		if ( isset( $instance[ 'name' ] ) ) {
			$name = $instance[ 'name' ];
		}
		if ( isset( $instance[ 'job' ] ) ) {
			$job = $instance[ 'job' ];
		}
		if ( isset( $instance[ 'words' ] ) ) {
			$words = $instance[ 'words' ];
		}
		if ( isset( $instance[ 'small_pic' ] ) ) {
			$small_pic = $instance[ 'small_pic' ];
		}
		if ( isset( $instance[ 'block_bg' ] ) ) {
			$block_bg = $instance[ 'block_bg' ];
		}
		if ( isset( $instance[ 'fb_url' ] ) ) {
			$fb_url = $instance[ 'fb_url' ];
		}
		if ( isset( $instance[ 'tw_url' ] ) ) {
			$tw_url = $instance[ 'tw_url' ];
		}
		if ( isset( $instance[ 'dr_url' ] ) ) {
			$dr_url = $instance[ 'dr_url' ];
		}
		if ( isset( $instance[ 'gp_url' ] ) ) {
			$gp_url = $instance[ 'gp_url' ];
		}
		if ( isset( $instance[ 'gi_url' ] ) ) {
			$gi_url = $instance[ 'gi_url' ];
		}
		if ( isset( $instance[ 'in_url' ] ) ) {
			$in_url = $instance[ 'in_url' ];
		}
		if ( isset( $instance[ 'li_url' ] ) ) {
			$li_url = $instance[ 'li_url' ];
		}
		if ( isset( $instance[ 'tu_url' ] ) ) {
			$tu_url = $instance[ 'tu_url' ];
		}
		if ( isset( $instance[ 'fl_url' ] ) ) {
			$fl_url = $instance[ 'fl_url' ];
		}
		if ( isset( $instance[ 'pi_url' ] ) ) {
			$pi_url = $instance[ 'pi_url' ];
		}
		if ( isset( $instance[ 'vi_url' ] ) ) {
			$vi_url = $instance[ 'vi_url' ];
		}
		if ( isset( $instance[ 'sk_url' ] ) ) {
			$sk_url = $instance[ 'sk_url' ];
		}
		if ( isset( $instance[ 'yt_url' ] ) ) {
			$yt_url = $instance[ 'yt_url' ];
		}

		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e( 'Name:', 'zoomarts' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" type="text" value="<?php echo esc_attr( $name ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'job' ); ?>"><?php _e( 'Job:', 'zoomarts' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'job' ); ?>" name="<?php echo $this->get_field_name( 'job' ); ?>" type="text" value="<?php echo esc_attr( $job ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'words' ); ?>"><?php _e( 'Some Words About Yourself:', 'zoomarts' ); ?></label> 
			<textarea rows="4" class="widefat" id="<?php echo $this->get_field_id( 'words' ); ?>" name="<?php echo $this->get_field_name( 'words' ); ?>" type="text"><?php echo esc_attr( $words ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'small_pic' ); ?>"><?php _e( 'Your Picture:', 'zoomarts' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'small_pic' ); ?>" name="<?php echo $this->get_field_name( 'small_pic' ); ?>" type="text" value="<?php echo esc_attr( $small_pic ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'block_bg' ); ?>"><?php _e( 'Block Background:', 'zoomarts' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'block_bg' ); ?>" name="<?php echo $this->get_field_name( 'block_bg' ); ?>" type="text" value="<?php echo esc_attr( $block_bg ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'fb_url' ); ?>"><?php _e( 'Facebook Url:', 'zoomarts' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'fb_url' ); ?>" name="<?php echo $this->get_field_name( 'fb_url' ); ?>" type="text" value="<?php echo esc_attr( $fb_url ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'tw_url' ); ?>"><?php _e( 'Twitter Url:', 'zoomarts' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'tw_url' ); ?>" name="<?php echo $this->get_field_name( 'tw_url' ); ?>" type="text" value="<?php echo esc_attr( $tw_url ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'dr_url' ); ?>"><?php _e( 'Dribbble Url:', 'zoomarts' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'dr_url' ); ?>" name="<?php echo $this->get_field_name( 'dr_url' ); ?>" type="text" value="<?php echo esc_attr( $dr_url ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'gp_url' ); ?>"><?php _e( 'Google Plus Url:', 'zoomarts' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'gp_url' ); ?>" name="<?php echo $this->get_field_name( 'gp_url' ); ?>" type="text" value="<?php echo esc_attr( $gp_url ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'gi_url' ); ?>"><?php _e( 'Github Url:', 'zoomarts' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'gi_url' ); ?>" name="<?php echo $this->get_field_name( 'gi_url' ); ?>" type="text" value="<?php echo esc_attr( $gi_url ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'in_url' ); ?>"><?php _e( 'Instagram Url:', 'zoomarts' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'in_url' ); ?>" name="<?php echo $this->get_field_name( 'in_url' ); ?>" type="text" value="<?php echo esc_attr( $in_url ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'li_url' ); ?>"><?php _e( 'Linkedin Url:', 'zoomarts' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'li_url' ); ?>" name="<?php echo $this->get_field_name( 'li_url' ); ?>" type="text" value="<?php echo esc_attr( $li_url ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'tu_url' ); ?>"><?php _e( 'Tumblr Url:', 'zoomarts' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'tu_url' ); ?>" name="<?php echo $this->get_field_name( 'tu_url' ); ?>" type="text" value="<?php echo esc_attr( $tu_url ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'fl_url' ); ?>"><?php _e( 'Flickr Url:', 'zoomarts' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'fl_url' ); ?>" name="<?php echo $this->get_field_name( 'fl_url' ); ?>" type="text" value="<?php echo esc_attr( $fl_url ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'pi_url' ); ?>"><?php _e( 'Pinterest Url:', 'zoomarts' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'pi_url' ); ?>" name="<?php echo $this->get_field_name( 'pi_url' ); ?>" type="text" value="<?php echo esc_attr( $pi_url ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'vi_url' ); ?>"><?php _e( 'Vimeo Url:', 'zoomarts' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'vi_url' ); ?>" name="<?php echo $this->get_field_name( 'vi_url' ); ?>" type="text" value="<?php echo esc_attr( $vi_url ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'sk_url' ); ?>"><?php _e( 'Skype Url:', 'zoomarts' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'sk_url' ); ?>" name="<?php echo $this->get_field_name( 'sk_url' ); ?>" type="text" value="<?php echo esc_attr( $sk_url ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'yt_url' ); ?>"><?php _e( 'Youtube Url:', 'zoomarts' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'yt_url' ); ?>" name="<?php echo $this->get_field_name( 'yt_url' ); ?>" type="text" value="<?php echo esc_attr( $yt_url ); ?>" />
		</p>
		<?php 
	}

	
}


// Register and load the widget
function about_load_widget() {
	register_widget( 'about_widget' );
}

add_action( 'widgets_init', 'about_load_widget' );