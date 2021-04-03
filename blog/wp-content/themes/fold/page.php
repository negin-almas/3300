<?php

	global $post;
	$title_style = get_post_meta( $post->ID, 'za_title_style', true );
	$page_subheading = get_post_meta( $post->ID, 'za_page_subheading', true );
	$page_layout = get_post_meta( $post->ID, 'za_page_layout', true );
	$cols_class = 'col-md-8';

	if ( $page_layout == 'no-sidebar' ) {
		$cols_class = 'col-md-8 col-md-offset-2';
	} elseif ( $page_layout == 'fullwidth' ) {
		$cols_class = 'col-md-12';
	}

get_header(); ?>
    
    <!-- Start Main Container -->
    <div id="main-content" class="container contact-page">
    
		<div class="row">
			
			<!-- Start Sidebar -->
			<?php if ( $page_layout == 'left-sidebar' ) { get_sidebar(); } ?>
			<!-- End Sidebar -->

			<!-- Start Posts Container -->
			<div class="col-xs-12 <?php echo $cols_class; ?>">
					
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<!-- Start Post Item -->
					<div id="post-<?php the_ID(); ?>" class="page-inner">

						<h1 class="page-header <?php echo $title_style; ?>"><?php the_title(); ?></h1>
							
						<?php if ( !empty($page_subheading) ) : ?>
							<h3 class="page-desc <?php echo $title_style; ?>"><?php echo $page_subheading; ?></h3>
						<?php endif; ?>
							
						<!--BEGIN .entry-content -->
						<div class="page-content">
							<?php the_content(); ?>
							<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:', 'zoomarts').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
						<!--END .entry-content -->
						</div>
							
						<?php comments_template(''); ?>

					</div>
					<!-- End Post Item -->
					
				<?php endwhile; endif; ?>

			</div>
			<!-- End Posts Container -->
			
			<!-- Start Sidebar -->
			<?php if ( $page_layout == 'right-sidebar' ) { get_sidebar(); } ?>
			<!-- End Sidebar -->
			
		</div>

    </div>
	<!-- End Main Container -->

<?php get_footer(); ?>