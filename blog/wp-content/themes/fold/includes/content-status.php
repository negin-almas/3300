<?php
	global $post;
	$embed_status = get_post_meta( $post->ID, 'za_embed_status', true );
	$embed_status_bg_color = get_post_meta( $post->ID, 'za_embed_status_bg_color', true );
	$embed_status_bg_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	$embed_code = wp_oembed_get( $embed_status );
?>

<div class="post-head">
	
	<?php if( !is_singular() ) { ?>
	
		<h2 class="post-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'zoomarts'), get_the_title()); ?>"> <?php the_title(); ?></a>
		</h2>
	
	<?php } else { ?>
	
		<h2 class="post-title"><?php the_title(); ?></h2>
	
	<?php } ?>
	
	<?php get_template_part( 'includes/post', 'meta' ); ?>
	
</div>

<div class="embed-status post-thumb" style="background: <?php echo 'url('.$embed_status_bg_image.')' . $embed_status_bg_color ?>">
	<div class="post-type-icon"><i class="fa fa-twitter"></i></div>
	<div class="embed-status-box">
		<?php echo $embed_code; ?>
	</div>
</div>

<div class="content-area">
	<?php if( !is_singular() ) : ?>
		<?php
		if ( zoomarts_option( 'blog-excerpts', '1' ) == '1' ) {
			$za_excerpt_length = za_excerpt_length();
			za_excerpt( $za_excerpt_length );
		} else {
			the_content();
		} ?>
	<?php else: ?>
		<?php the_content(); ?>
	<?php endif; ?>
</div>

<?php get_template_part( 'includes/post', 'bottom' ); ?>

<?php
	if( is_singular() ) {
		za_set_post_views(get_the_ID());
	}
?>