<?php
	global $post;
	$audio_embed_code = get_post_meta( $post->ID, 'za_audio_embed_code', true );
	$embed_code = wp_oembed_get( $audio_embed_code );
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
	
	<div class="post-avatar"><?php echo get_avatar( $post->post_author, 70 ); ?></div>
	
</div>

<?php if ( $audio_embed_code ) { ?>

	<div class="post-thumb">
		<div class="post-type-icon"><i class="icon-sound"></i></div>
		<div class="soundcloud"><?php echo $embed_code; ?></div>
	</div>

<?php } else if ( !$audio_embed_code ) { ?>

	<div class="post-thumb">
		<div class="post-type-icon"><i class="icon-sound"></i></div>
		<?php za_post_audio($post->ID); ?>
	</div>

<?php } ?>

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