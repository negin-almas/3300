<?php
	global $post;
	$gallery_images = get_post_meta( $post->ID, 'za_gallery_images', true );
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

<div class="post-thumb">
	
	<div class="post-type-icon"><i class="icon-pictures"></i></div>
		
	<div class="post-gallery">
		<?php
			foreach ( $gallery_images as $gallery_images ) {
				echo "<div>";
				echo '<img src="'. $gallery_images .'" alt="'. get_the_title() .'" />';
				echo "</div>";
			}
		?>
	</div>
	
</div>

<script>
	jQuery(".post-gallery").owlCarousel({
		autoPlay : 3000,
		stopOnHover : true,
		navigation:true,
		paginationSpeed : 1000,
		goToFirstSpeed : 2000,
		singleItem : true,
		autoHeight : true,
		transitionStyle : "fade",
		lazyLoad : true,
		navigationText: [
			"<i class='fa fa-chevron-left'></i>",
			"<i class='fa fa-chevron-right'></i>"
		],
	});
</script>

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