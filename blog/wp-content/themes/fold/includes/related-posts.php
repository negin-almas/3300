<?php

$rela_post = $post;
global $post;
$tags = wp_get_post_tags($post->ID);

if ($tags) {
	$tag_ids = array();
	foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
	$args=array(
		'tag__in' => $tag_ids,
		'post__not_in' => array($post->ID),
		'posts_per_page'=>3,
		'caller_get_posts'=>1,
	);
	$my_query = new wp_query( $args );  

?>
			
<div class="related-posts">
	<div class="row">
		<div class="col-md-12"><h3 class="related-posts-title"><?php _e('Related Posts', 'zoomarts') ?></h3></div>
		
		<?php while( $my_query->have_posts() ) {  
				$my_query->the_post();
		?>
		
		<div class="related-post col-md-4">
			
			<?php if ( has_post_thumbnail() ) : ?>
			
				<div class="post-thumb">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'related-post' ); ?>
					</a>
				</div>
			
			<?php else: ?>
			
				<div class="post-thumb">
					<a href="<?php the_permalink(); ?>">
						<?php echo '<img alt="'.get_the_title().'" src="'.get_template_directory_uri() .'/images/related-post-thumb.png'.'" />'; ?>
					</a>
				</div>
			
			<?php endif; ?>
			
			<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
			<span><?php comments_popup_link(__('0 Comments', 'zoomarts'), __('1 Comment', 'zoomarts'), __('% Comments', 'zoomarts')); ?> |</span>
			<span><?php echo za_get_post_views(get_the_ID()); ?></span>
		
		</div>
		
		<?php } ?>
		
	</div>
</div>

<?php } ?>

<?php
$post = $rela_post;
wp_reset_query();
?>
