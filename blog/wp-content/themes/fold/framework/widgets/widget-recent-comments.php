<?php
/**
 * WP Flickr Feed Widget
 *
 * @package WordPress
 * @subpackage Fold
 * @since Fold 1.0
*/



class za_recent_comments extends WP_Widget {
	
	function za_recent_comments() {
		 $widget_ops = array('classname' => 'smart_comments','description' => __( "Smart Recent Comments Widget" ,'zoomarts') );
		 $this->WP_Widget('smart_comments', __('Smart Recent Comments','zoomarts'), $widget_ops);
    }
	
	function widget($args , $instance) {
		extract($args);
        $title = ($instance['title']) ? $instance['title'] : __('Recent Comments' , 'zoomarts');
        $limit = ($instance['limit']) ? $instance['limit'] : 4;
		
		echo $before_widget;
		echo $before_title;
		echo $title;
		echo $after_title;
?>

		<ul id="recentcomments">
			
			<?php
				$args = array(
					'status' => 'approve',
					'orderby' => 'comment_date_gmt',
					'order' => 'DESC',
					'count' => false,
					'number'=> $limit
				);
				$comments = get_comments($args);
				foreach($comments as $comment) {	
			?>
			
			<li class="recentcomments clearfix">
				
				<div class="alignleft">
					<?php echo get_avatar( $comment->comment_author_email, 45 ); ?>
				</div>
				
				<div class="comment-right">
					<span class="comment-author">
						<?php echo $comment->comment_author; ?>
					</span>
					<div class="comment-c">
						<a href="<?php echo get_permalink($comment->comment_post_ID); ?>">
							<?php echo trim(mb_substr(strip_tags($comment->comment_content), 0, 55)) ?>
						</a>
					</div>
				</div>
			
			</li>
			
			<?php } ?>
			
		</ul>

		<?php
			echo $after_widget;
			}
	
			function form($instance) {
				if(!isset($instance['title'])) $instance['title'] = __('Recent Comments' , 'zoomarts');
				if(!isset($instance['limit'])) $instance['limit'] = 4;
		?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title ','zoomarts') ?></label>
			<input style="width:100%;" type="text" value="<?php echo esc_attr($instance['title']); ?>" name="<?php echo $this->get_field_name('title'); ?>" id="<?php $this->get_field_id('title'); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('limit'); ?>"><?php _e('Number of comments to show: ','zoomarts') ?></label>
			<input type="text" value="<?php echo esc_attr($instance['limit']); ?>" name="<?php echo $this->get_field_name('limit'); ?>" id="<?php $this->get_field_id('limit'); ?>" size="3" />
		</p>

	<?php } }

	function reg_recent_comments() {
		register_widget('za_recent_comments');
	}
	add_action('widgets_init' , 'reg_recent_comments');

?>