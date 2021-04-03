<?php
	global $post;
	$image_lbox = get_post_meta( $post->ID, 'za_lightbox_image', true );
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

<?php if ( has_post_thumbnail() ) { ?>

    <div class="post-thumb">
		<div class="post-type-icon"><i class="icon-image"></i></div>
		<?php if ( $image_lbox ) { ?>
			<a title="<?php echo get_the_title(); ?>" href="<?php echo $image_lbox; ?>" data-lightbox="post-<?php the_ID(); ?>" data-title="<?php get_the_title(); ?>">
				<span class="lightbox-overlay"><i class="fa fa-plus"></i></span>
				<?php the_post_thumbnail('post-thumbnails'); ?>
			</a>
		<?php } else { ?>
			<a title="<?php printf(__('Permanent Link to %s', 'zoomarts'), get_the_title()); ?>" href="<?php the_permalink(); ?>" >
				<?php the_post_thumbnail('post-thumbnails'); ?>
			</a>
		<?php } ?>
	</div>

<?php } else if ( $image_lbox && !has_post_thumbnail() ) { ?>

	<div class="post-thumb">
		<div class="post-type-icon"><i class="icon-image"></i></div>
		<a title="<?php printf(__('Permanent Link to %s', 'zoomarts'), get_the_title()); ?>" href="<?php echo $image_lbox; ?>" data-lightbox="post-<?php the_ID(); ?>" data-title="<?php get_the_title(); ?>">
			<img src="<?php echo $image_lbox; ?>" alt="<?php printf(__('Permanent Link to %s', 'zoomarts'), get_the_title()); ?>" />
		</a>
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