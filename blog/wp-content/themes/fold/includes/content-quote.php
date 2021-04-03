<?php 

	global $post;
	$quote_author = get_post_meta( $post->ID, 'za_quote_author', true );
	$quote_post_head = get_post_meta( $post->ID, 'za_quote_post_head', true );
	$quote_bg = get_post_meta( $post->ID, 'za_quote_post_bg_color', true );
	$thumbnail = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

?>

<?php if( !is_singular() && !empty($quote_post_head) || is_singular() ) { ?>

	<div class="post-head">

		<?php if( !is_singular() ) { ?>

			<h2 class="post-title">
				
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'zoomarts'), get_the_title()); ?>"> <?php the_title(); ?></a>
				
			</h2>

		<?php } else { ?>

			<h2 class="post-title"><?php the_title(); ?></h2>

		<?php } ?>

		<?php get_template_part( 'includes/post', 'meta' ); ?>

		<div class="post-avatar"><?php echo get_avatar( $post->post_author, 70 ); ?></div>

	</div>

<?php } ?>

<div class="post-quote-bg" style="background: url(<?php echo $thumbnail; ?>) <?php echo $quote_bg; ?>">
		
	<div class="post-type-icon"><i class="icon-quote"></i></div>
		
	<a title="<?php printf(__('Permanent Link to %s', 'zoomarts'), get_the_title()); ?>" href="<?php the_permalink(); ?>">
			
		<div class="quote">
				
			<div><?php the_content(); ?></div>
				
			<span class="author"><?php echo $quote_author; ?></span>
				
		</div>
			
	</a>
</div>

<?php
	if( is_singular() ) {
		za_set_post_views(get_the_ID());
	}
?>