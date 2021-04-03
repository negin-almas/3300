<?php

	global $post;
	$page_layout = zoomarts_option('category-layout');
	$cols_class = 'col-md-8';

	if ( $page_layout == 'centered' ) {
		$cols_class = 'col-md-8 col-md-offset-2';
	} elseif ( $page_layout == 'fullwidth' ) {
		$cols_class = 'col-md-12';
	}

 get_header(); ?>
    
    <!-- Start Main Container -->
    <div id="main-content" class="container">
		
		<div class="row">
			<div class="<?php echo $cols_class; ?>">
				<h2 class="page-header"><?php _e('Category', 'zoomarts') ?> <span>&#8220;<?php single_cat_title( '', true ); ?>&#8221;</span></h2>
			</div>
		</div>
		
		<div class="row">
			
			<!-- Start Sidebar -->
			<?php if ( $page_layout == 'left-sidebar' ) { get_sidebar(); } ?>
			<!-- End Sidebar -->
			
			<?php if ( zoomarts_option('blog-pagination-style') == 'load-more' ) : ?>
			
				<!-- Start Posts Container -->
				<div id="ajax-load-more" class="blog-posts <?php echo $cols_class; ?>">

					<div class="listing" data-path="<?php echo get_template_directory_uri(); ?>" data-post-type="post" data-category="<?php single_cat_title( '', true ); ?>" data-taxonomy="" data-tag="" data-search="" data-display-posts="<?php echo zoomarts_option('pagination-load-more-posts-num'); ?>" data-scroll="true" data-max-pages="5" data-button-text="<?php _e('Older Posts', 'zoomarts'); ?>" data-transition="<?php echo zoomarts_option('pagination-load-more-transtion'); ?>"></div>

				</div>
				<!-- End Posts Container -->
			
			<?php else : ?>
			
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

						</div>
						<!-- End Post Item -->
					
					<?php endwhile; ?>
					
						<?php if ( zoomarts_option('blog-pagination-style') == 'standard' ) : ?>
					
							<?php pagination(); ?>
					
						<?php else : ?>
					
							<!-- BEGIN Page Navigation -->
							<div class="page-navigation clearfix">
								<div class="nav-next"><?php next_posts_link('<span>' . __('Older Entries', 'zoomarts') . '</span> <i class="fa fa-angle-right"></i>') ?></div>
								<div class="nav-previous"><?php previous_posts_link('<i class="fa fa-angle-left"></i> <span>' . __('Newer Entries', 'zoomarts') . '</span>') ?></div>
							<!-- END Page Navigation -->
							</div>
					
						<?php endif; ?>
					
					<?php else : ?>
					
						<div class="no-results-msg">
							<p><?php _e('No results found! Please make sure all words are spelled correctly', 'zoomarts') ?></p>
						</div>
					
					<?php endif; ?>

				</div>
				<!-- End Posts Container -->
			
			<?php endif ?>
			
			<!-- Start Sidebar -->
			<?php if ( $page_layout == 'right-sidebar' ) { get_sidebar(); } ?>
			<!-- End Sidebar -->
			
		</div>

    </div>
	<!-- End Main Container -->

<?php get_footer(); ?>