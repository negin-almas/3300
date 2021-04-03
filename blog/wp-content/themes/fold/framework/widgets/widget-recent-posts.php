<?php
/**
 * WP Smart Recent Post Widget
 *
 * @package WordPress
 * @subpackage Fold
 * @since Fold 1.0
*/



// Adds Smart_Recent_Post_Widget widget 
class Smart_Recent_Post_Widget extends WP_Widget {

	// Register widget with WordPress.
	public function __construct() {
		parent::__construct(
	 		'smart_recent_post_widget', // Base ID
			'آخرین مطالب هوشمند', // Name
			array( 'description' => __( 'A widget displays recent post', 'zoomarts' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
	  extract( $args );
		$title = empty($instance['title']) ? 'Smart Recent Post' : apply_filters('widget_title', $instance['title']);
		$no_post = empty($instance['no_post']) ? '5' : apply_filters('widget_no_post', $instance['no_post']);
		$post_category = empty($instance['post_category']) ? '' : apply_filters('widget_category', implode(",", $instance['post_category']));
		$order = empty($instance['post_order']) ? 'DESC' : apply_filters('widget_order', $instance['post_order']);
		$feature_image = empty($instance['images']) ? 'N' : apply_filters('widget_images', $instance['images']);

		echo $before_widget;
		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title; ?>
                <div class="smart_post">
                    <ul>
                        <?php
                        global $post;
                        $args = array( 'numberposts' => $no_post, 'category' => $post_category, 'orderby' => 'post_date', 'order' => $order, 'post_type' => 'post' );
                        $myposts = get_posts( $args );
                        foreach( $myposts as $post ) :	setup_postdata($post); ?>
                            <li class="clearfix">
								<div class="post-thumb">
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
										<?php if($feature_image == 'Y') {
											if(get_the_post_thumbnail(get_the_ID())) {
												the_post_thumbnail( 'post-widget' );
											} else {
												echo '<img alt="'.get_the_title().'" src="'.get_template_directory_uri() .'/images/widget-post-thumb.png'.'" />';
											}
										} ?>
									</a>
								</div>
								<div class="post-right">
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<div class="post-meta">
										<span><?php comments_popup_link(__('0 Comments', 'zoomarts'), __('1 Comment', 'zoomarts'), __('% Comments', 'zoomarts')); ?></span>
										<span><?php echo za_get_post_views(get_the_ID()); ?></span>
									</div>
								</div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>	
	<?php echo $after_widget;
	}
                   
	

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['images'] = strip_tags( $new_instance['images'] );
		$instance['post_order'] = strip_tags( $new_instance['post_order'] );
		$instance['no_post'] = strip_tags( $new_instance['no_post'] );
		$instance['post_category'] = $new_instance['post_category'];
		return $instance;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'Smart Recent Post', 'zoomarts' );
		}
                if ( isset( $instance[ 'no_post' ] ) ) {
			$no_post = $instance[ 'no_post' ];
		}
		else {
			$no_post = __( '', 'zoomarts' );
		}
                if ( isset( $instance[ 'images' ] ) ) {
			$images = $instance[ 'images' ];
		}
		else {
			$images = __( '', 'zoomarts' );
		}
                if ( isset( $instance[ 'post_order' ] ) ) {
			$post_order = $instance[ 'post_order' ];
		}
		else {
			$post_order = __( '', 'zoomarts' );
		}
		if ( isset( $instance[ 'post_category' ] ) ) {
			$post_category = $instance[ 'post_category' ];
		}
		else {
			$post_category = __( '', 'zoomarts' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'zoomarts' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        <p> <label for="<?php echo $this->get_field_name( 'no_post' ); ?>"> <?php _e('Number of post to show', 'zoomarts'); ?> </label>: <input type="text" name="<?php echo $this->get_field_name( 'no_post' ); ?>" id="<?php echo $this->get_field_name( 'no_post' ); ?>" style=" width: 50px;"  value="<?php echo esc_attr($no_post) ?>" />
        </p>
        <p><label for="<?php echo $this->get_field_name( 'images' ); ?>"><?php _e('Featured Image?', 'zoomarts') ; ?></label> <input type="radio" name="<?php echo $this->get_field_name( 'images' ); ?>" id="yes" value="Y" <?php if(esc_attr($images) == "Y"){ echo "checked";} ?> /> بله 
        <input type="radio" name="<?php echo $this->get_field_name( 'images' ); ?>" id="no" value="N" <?php if(esc_attr($images) == "N"){ echo "checked";} ?> /> خیر </p>
    	<p>
        <label for="<?php echo $this->get_field_name( 'post_order' ); ?>"><?php _e('Post Order:', 'zoomarts'); ?></label> <select name="<?php echo $this->get_field_name( 'post_order' ); ?>" id="<?php echo $this->get_field_name( 'post_order' ); ?>">
		<option value="DESC" <?php if(esc_attr($post_order) == "DESC") { echo "selected"; } ?>>DESC</option>
        <option value="ASC" <?php if(esc_attr($post_order) == "ASC") { echo "selected"; } ?>>ASC</option>
 		</select>
		</p>
       	<p>
            <label for="<?php echo $this->get_field_id('post_category'); ?>"><?php _e('Select categories to include in the recent posts list:', 'zoomarts');?> 
            
                <?php
                   $categories=  get_categories('hide_empty=0');
                     echo "<br/>";
                     foreach ($categories as $cat) {
                         $option='<input type="checkbox" id="'. $this->get_field_id( 'post_category' ) .'[]" name="'. $this->get_field_name( 'post_category' ) .'[]"';
                            if (is_array($post_category)) {
                                foreach ($post_category as $cats) {
                                    if($cats == $cat->term_id) {
                                         $option = $option.' checked="checked"';
                                    }
                                }
                            }
                            $option .= ' value="'.$cat->term_id.'" />';
        
                            $option .= $cat->cat_name;
                            
                            $option .= '<br />';
                            echo $option;
                         }
                    
                    ?>
            </label>
        </p>
		<?php 
	}
         public function get_excerpt($count){
                            global $post;
                                $permalink = get_permalink($post->ID);
                                $excerpt = get_the_content();
                                $excerpt = strip_tags($excerpt);
                                $excerpt = substr($excerpt, 0, $count);
                                $excerpt = $excerpt.'...';
                                return $excerpt;
         } // function ends get_excerpt($count)
} // class Smart_Recent_Post_Widget

// register Smart_Recent_Post_Widget widget
add_action( 'widgets_init', create_function( '', 'register_widget( "smart_recent_post_widget" );' ) );

?>