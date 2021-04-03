<?php

	global $post;
	$link_url = get_post_meta( $post->ID, 'za_link_url', true );
	$link_bg = get_post_meta( $post->ID, 'za_link_post_bg_color', true );
	$thumbnail = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) { }

?>

<div class="post-link" style="background: url(<?php echo $thumbnail; ?>) <?php echo $link_bg; ?>">
	
	<div class="post-type-icon"><i class="icon-hyperlink"></i></div>
	
	<a class="link" href="<?php echo $link_url; ?>">
		<?php the_title(); ?>
	</a>
	
</div>

<?php if( is_singular() ) { ?>

<div class="content-area"><?php the_content(); ?></div>

<?php get_template_part( 'includes/post', 'meta' ); ?>

<?php } ?>

<?php
	if( is_singular() ) {
		za_set_post_views(get_the_ID());
	}
?>