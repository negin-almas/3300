<?php

	global $post;
	$post_layout = get_post_meta( $post->ID, 'za_post_layout', true );
	$cols_class = 'col-md-8';

	if ( $post_layout == 'centered' ) {
		$cols_class = 'col-md-8 col-md-offset-2';
	} elseif ( $post_layout == 'fullwidth' ) {
		$cols_class = 'col-md-12';
	}

 get_header(); ?>
    
    <!-- Start Main Container -->
    <div id="main-content" class="container">
    
		<div class="row">
			
			<!-- Start Sidebar -->
			<?php if ( $post_layout == 'left-sidebar' ) { get_sidebar(); } ?>
			<!-- End Sidebar -->
			
			<!-- Start Posts Container -->
			<div class="blog-posts <?php echo $cols_class; ?>">
					
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<!-- Start Post Item -->
					<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

						<?php 
							$format = get_post_format();
							if( false === $format ) { $format = 'standard'; }
						?>

						<?php get_template_part( 'includes/content', $format ); ?>
						
						<?php if ( zoomarts_option('post-author-bio') == '1' ) {
							get_template_part( 'includes/author', 'info' );
						} ?>
						
						<?php if ( zoomarts_option('post-related-posts') == '1' ) {
							get_template_part( 'includes/related', 'posts' );
						} ?>
						
						<?php comments_template('', true); ?>

					</div>
					<!-- End Post Item -->
					
				<?php endwhile; ?>
					
					<!-- BEGIN Page Navigation -->
					<div class="page-navigation clearfix">
						<div class="nav-next"><?php next_posts_link('<span>' . __('Older Entries', 'zoomarts') . '</span> <i class="fa fa-angle-right"></i>') ?></div>
						<div class="nav-previous"><?php previous_posts_link('<i class="fa fa-angle-left"></i> <span>' . __('Newer Entries', 'zoomarts') . '</span>') ?></div>
					<!-- END Page Navigation -->
					</div>
					
				<?php else : ?>
					
					<!-- END No Posts MSG -->
					<div class="no-results-msg">
						<p><?php _e("No results found! Please make sure all words are spelled correctly", "zoomarts") ?></p>
					</div>
					<!-- END No Posts MSG -->
					
				<?php endif; ?>

			</div>
			<!-- End Posts Container -->
			
			<!-- Start Sidebar -->
			<?php if ( $post_layout == 'right-sidebar' ) { get_sidebar(); } ?>
			<!-- End Sidebar -->
			
		</div>

    </div>
	<!-- End Main Container -->

<?php get_footer(); ?>