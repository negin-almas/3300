<?php get_header(); ?>
    
    <!-- Start Main Container -->
    <div id="main-content" class="container">
    
		<div class="row">
			
			<!-- Start Error Msg Container -->
			<div class="error-msg col-md-8 col-xs-12">
					
				<h1><?php _e('404', 'zoomarts') ?></h1>
				<h2><?php _e('Opps! Page Not Found', 'zoomarts') ?></h2>
				<p><?php _e("Sorry, but you are looking for something that isn't here.", 'zoomarts') ?></p>

			</div>
			<!-- End Error Msg Container -->
			
			<!-- Start Sidebar -->
			<?php get_sidebar(); ?>
			<!-- End Sidebar -->
			
		</div>

    </div>
	<!-- End Main Container -->

<?php get_footer(); ?>