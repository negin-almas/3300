<?php /* Template Name: Archives */ 

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
    <div id="main-content" class="container archives-page">
    
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
							
							<div class="toggle-item">
								<h4 class="panel-title">
									<a data-toggle="collapse" href="#collapse1">
										<i class="fa fa-list-alt"></i> <?php _e('Latest Posts' , 'zoomarts'); ?>
									</a>
								</h4>
								<div id="collapse1" class="panel-collapse collapse in">
									<ul>
										<?php
											$args = array( 
												'posts_per_page' => 10, 'orderby' => 'date', 'order' => 'DESC'
											);
											$posts_query = new WP_Query($args);
											if($posts_query->have_posts()) : while($posts_query->have_posts()) : $posts_query->the_post();
											if(get_the_title() != ''){ 
												echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
											}
											endwhile; endif; wp_reset_query();
										?>
									</ul>
								</div>
							</div>
							
							<div class="toggle-item">
								<h4 class="panel-title">
									<a data-toggle="collapse" href="#collapse2" class="collapsed">
										<i class="fa fa-calendar-o"></i> <?php _e('Monthly Archives' , 'zoomarts'); ?>
									</a>
								</h4>
								<div id="collapse2" class="panel-collapse collapse">
									<ul><?php wp_get_archives('type=monthly&show_post_count=0'); ?></ul>
								</div>
							</div>
							
							<div class="toggle-item">
								<h4 class="panel-title">
									<a data-toggle="collapse" href="#collapse3" class="collapsed">
										<i class="fa fa-folder-open"></i> <?php _e('Post Categories' , 'zoomarts'); ?>
									</a>
								</h4>
								<div id="collapse3" class="panel-collapse collapse">
									<ul>
										<?php
											$cat = get_categories();
											$cat_array = array();
											foreach($cat as $cate){
												$cat_array[] = '<li><a href="'.get_category_link($cate->term_id).'">'.$cate->name.'</a></li>';
											}
											echo implode(' ',$cat_array);
										?>
									</ul>
								</div>
							</div>
							
							<div class="toggle-item">
								<h4 class="panel-title">
									<a data-toggle="collapse" href="#collapse4" class="collapsed">
										<i class="fa fa-user"></i> <?php _e('Authors' , 'zoomarts'); ?>
									</a>
								</h4>
								<div id="collapse4" class="panel-collapse collapse">
									<ul>
										<?php
											$args = array( 'exclude_admin' => false, 'orderby' => 'post_count', 'order' => 'DESC' );
											wp_list_authors($args);
										?>
									</ul>
								</div>
							</div>
							
							<div class="toggle-item">
								<h4 class="panel-title">
									<a data-toggle="collapse" href="#collapse5" class="collapsed">
										<i class="fa fa-tag"></i> <?php _e('Tags' , 'zoomarts'); ?>
									</a>
								</h4>
								<div id="collapse5" class="panel-collapse collapse">
									<ul>
										<?php
											$tags = get_tags();
											$html = '';
											foreach ( $tags as $tag ) {
												$tag_link = get_tag_link( $tag->term_id );
												$html .= "<li><a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
												$html .= "{$tag->name}</a></li>";
											}
											$html .= '';
											echo $html;
										?>
									</ul>
								</div>
							</div>
							
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