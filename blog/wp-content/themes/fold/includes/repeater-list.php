<!-- Start Post Item -->
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
					
	<?php 
		$format = get_post_format();
		if( false === $format ) { $format = 'standard'; }
	?>
	
	<?php get_template_part( 'includes/content', $format ); ?>
					
</div>
<!-- End Post Item -->