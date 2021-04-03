<?php /* Template Name: Contact Page */
	global $post;
	$title_style = get_post_meta( $post->ID, 'za_title_style', true );
	$page_subheading = get_post_meta( $post->ID, 'za_page_subheading', true );
	$contact_sidebar = zoomarts_option('contact-sidebar');
	$gmap_zoom = zoomarts_option('gmap-zoom');
	$gmap_address = zoomarts_option('gmap-address');
	$cols_offset = '';

	if ( $contact_sidebar == 0 ) {
		$cols_offset = 'col-md-offset-2';
	} elseif ( $contact_sidebar == 1 ) {
		$contact_layout = zoomarts_option('contact-layout');
	}

get_header(); ?>
    
    <!-- Start Main Container -->
    <div id="main-content" class="container contact-page">
    
		<div class="row">
			
			<!-- Start Sidebar -->
			<?php if ( $contact_layout == 'left-sidebar' && $contact_sidebar == 1 ) { get_sidebar(); } ?>
			<!-- End Sidebar -->

			<!-- Start Posts Container -->
			<div class="col-md-8 col-xs-12 <?php echo $cols_offset; ?>">
					
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<!-- Start Post Item -->
					<div id="post-<?php the_ID(); ?>" class="page-inner">

						<h1 class="page-header <?php echo $title_style; ?>"><?php the_title(); ?></h1>
							
						<?php if ( !empty($page_subheading) ) : ?>
							<h3 class="page-desc <?php echo $title_style; ?>"><?php echo $page_subheading; ?></h3>
						<?php endif; ?>
							
						<!--BEGIN .entry-content -->
						<div class="page-content">
							<div class="map-container">
								<div id="gmap" data-address="<?php echo $gmap_address; ?>" data-marker="<?php echo get_template_directory_uri(); ?>/images/marker.png" data-zoom="<?php echo $gmap_zoom; ?>"></div>
							</div>
							<?php the_content(); ?>
							<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:', 'zoomarts').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
						<!--END .entry-content -->
						</div>
							
						<?php comments_template('', true); ?>

					</div>
					<!-- End Post Item -->
					
				<?php endwhile; endif; ?>

			</div>
			<!-- End Posts Container -->
			
			<!-- Start Sidebar -->
			<?php if ( $contact_layout == 'right-sidebar' && $contact_sidebar == 1 ) { get_sidebar(); } ?>
			<!-- End Sidebar -->
			
		</div>

    </div>
	<!-- End Main Container -->

<?php get_footer(); ?>