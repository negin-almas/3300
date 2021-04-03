<?php /* Template Name: About Me Page */ 

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
    <div id="main-content" class="container about-me-page">
    
		<div class="row">
			
			<!-- Start Sidebar -->
			<?php if ( $page_layout == 'left-sidebar' ) { get_sidebar(); } ?>
			<!-- End Sidebar -->

			<!-- Start Posts Container -->
			<div class="col-md-8 col-xs-12 <?php echo $cols_class; ?>">
					
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<!-- Start Post Item -->
					<div id="post-<?php the_ID(); ?>" class="page-inner">
						
						<h1 class="page-header <?php echo $title_style; ?>"><?php the_title(); ?></h1>
							
						<?php if ( !empty($page_subheading) ) : ?>
							<h3 class="page-desc <?php echo $title_style; ?>"><?php echo $page_subheading; ?></h3>
						<?php endif; ?>
							
						<!--BEGIN .entry-content -->
						<div class="page-content">
							<?php if ( zoomarts_option('my-pic') !== '' ) : ?> 
								<div class="my-pic">
									<img src="<?php echo zoomarts_option('my-pic', false, 'url'); ?>" alt=""/>
								</div>
							<?php endif; ?>
							<div class="my-social">
								<?php if ( zoomarts_option('my-social-fb') !== '' ) : ?> 
									<a href="<?php echo zoomarts_option('my-social-fb'); ?>"><i class="fa fa-facebook"></i></a>
								<?php endif; ?>
								<?php if ( zoomarts_option('my-social-tw') !== '' ) : ?>
									<a href="<?php echo zoomarts_option('my-social-tw'); ?>"><i class="fa fa-twitter"></i></a>
								<?php endif; ?>
								<?php if ( zoomarts_option('my-social-gp') !== '' ) : ?>
									<a href="<?php echo zoomarts_option('my-social-gp'); ?>"><i class="fa fa-google-plus"></i></a>
								<?php endif; ?>
								<?php if ( zoomarts_option('my-social-dr') !== '' ) : ?>
									<a href="<?php echo zoomarts_option('my-social-dr'); ?>"><i class="fa fa-dribbble"></i></a>
								<?php endif; ?>
								<?php if ( zoomarts_option('my-social-gi') !== '' ) : ?>
									<a href="<?php echo zoomarts_option('my-social-gi'); ?>"><i class="fa fa-github-alt"></i></a>
								<?php endif; ?>
								<?php if ( zoomarts_option('my-social-in') !== '' ) : ?>
									<a href="<?php echo zoomarts_option('my-social-in'); ?>"><i class="fa fa-instagram"></i></a>
								<?php endif; ?>
								<?php if ( zoomarts_option('my-social-li') !== '' ) : ?>
									<a href="<?php echo zoomarts_option('my-social-li'); ?>"><i class="fa fa-linkedin"></i></a>
								<?php endif; ?>
								<?php if ( zoomarts_option('my-social-tu') !== '' ) : ?>
									<a href="<?php echo zoomarts_option('my-social-tu'); ?>"><i class="fa fa-tumblr"></i></a>
								<?php endif; ?>
								<?php if ( zoomarts_option('my-social-fl') !== '' ) : ?>
									<a href="<?php echo zoomarts_option('my-social-fl'); ?>"><i class="fa fa-flickr"></i></a>
								<?php endif; ?>
								<?php if ( zoomarts_option('my-social-pi') !== '' ) : ?>
									<a href="<?php echo zoomarts_option('my-social-pi'); ?>"><i class="fa fa-pinterest"></i></a>
								<?php endif; ?>
								<?php if ( zoomarts_option('my-social-vi') !== '' ) : ?>
									<a href="<?php echo zoomarts_option('my-social-vi'); ?>"><i class="fa fa-vimeo-square"></i></a>
								<?php endif; ?>
								<?php if ( zoomarts_option('my-social-sk') !== '' ) : ?>
									<a href="<?php echo zoomarts_option('my-social-sk'); ?>"><i class="fa fa-skype"></i></a>
								<?php endif; ?>
								<?php if ( zoomarts_option('my-social-yo') !== '' ) : ?>
									<a href="<?php echo zoomarts_option('my-social-yo'); ?>"><i class="fa fa-youtube"></i></a>
								<?php endif; ?>
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
			<?php if ( $page_layout == 'right-sidebar' ) { get_sidebar(); } ?>
			<!-- End Sidebar -->
			
		</div>

    </div>
	<!-- End Main Container -->

<?php get_footer(); ?>