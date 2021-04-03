    <!-- Start Footer -->
	<div id="footer" class="footer">
		
		<div class="container clearfix">
			
			<?php if ( zoomarts_option('footer-back-top-link') == '1' ) : ?>
			
				<div class="go-top">
					<a href="#"><i class="fa fa-angle-up"></i></a>
				</div>
			
			<?php endif; ?>
			
			<?php if ( zoomarts_option('footer-social-checkbox') == '1' ) : ?>
			
				<div class="social-icons">
					<?php if ( zoomarts_option('footer-social-fb') !== '' ) : ?> 
						<a href="<?php echo zoomarts_option('footer-social-fb'); ?>"><i class="fa fa-facebook"></i></a>
					<?php endif; ?>
					<?php if ( zoomarts_option('footer-social-tw') !== '' ) : ?>
						<a href="<?php echo zoomarts_option('footer-social-tw'); ?>"><i class="fa fa-twitter"></i></a>
					<?php endif; ?>
					<?php if ( zoomarts_option('footer-social-gp') !== '' ) : ?>
						<a href="<?php echo zoomarts_option('footer-social-gp'); ?>"><i class="fa fa-google-plus"></i></a>
					<?php endif; ?>
					<?php if ( zoomarts_option('footer-social-dr') !== '' ) : ?>
						<a href="<?php echo zoomarts_option('footer-social-dr'); ?>"><i class="fa fa-dribbble"></i></a>
					<?php endif; ?>
					<?php if ( zoomarts_option('footer-social-gi') !== '' ) : ?>
						<a href="<?php echo zoomarts_option('footer-social-gi'); ?>"><i class="fa fa-github-alt"></i></a>
					<?php endif; ?>
					<?php if ( zoomarts_option('footer-social-in') !== '' ) : ?>
						<a href="<?php echo zoomarts_option('footer-social-in'); ?>"><i class="fa fa-instagram"></i></a>
					<?php endif; ?>
					<?php if ( zoomarts_option('footer-social-li') !== '' ) : ?>
						<a href="<?php echo zoomarts_option('footer-social-li'); ?>"><i class="fa fa-linkedin"></i></a>
					<?php endif; ?>
					<?php if ( zoomarts_option('footer-social-tu') !== '' ) : ?>
						<a href="<?php echo zoomarts_option('footer-social-tu'); ?>"><i class="fa fa-tumblr"></i></a>
					<?php endif; ?>
					<?php if ( zoomarts_option('footer-social-fl') !== '' ) : ?>
						<a href="<?php echo zoomarts_option('footer-social-fl'); ?>"><i class="fa fa-flickr"></i></a>
					<?php endif; ?>
					<?php if ( zoomarts_option('footer-social-pi') !== '' ) : ?>
						<a href="<?php echo zoomarts_option('footer-social-pi'); ?>"><i class="fa fa-pinterest"></i></a>
					<?php endif; ?>
					<?php if ( zoomarts_option('footer-social-vi') !== '' ) : ?>
						<a href="<?php echo zoomarts_option('footer-social-vi'); ?>"><i class="fa fa-vimeo-square"></i></a>
					<?php endif; ?>
					<?php if ( zoomarts_option('footer-social-sk') !== '' ) : ?>
						<a href="<?php echo zoomarts_option('footer-social-sk'); ?>"><i class="fa fa-skype"></i></a>
					<?php endif; ?>
					<?php if ( zoomarts_option('footer-social-yo') !== '' ) : ?>
						<a href="<?php echo zoomarts_option('footer-social-yo'); ?>"><i class="fa fa-youtube"></i></a>
					<?php endif; ?>
				</div>
			
			<?php endif; ?>
			<?php if  ( zoomarts_option('footer_copyright_text') != '' ) : ?>
				<p><?php echo zoomarts_option('footer_copyright_text'); ?></p>
			<?php else: ?>
				<p><?php _e( '&copy; Copyright 2014 <a href="http://rtl-theme.com">Rtl-Theme</a> / Powered by <a href="http://wordpress.org">WordPress</a>', 'zoomarts' ); ?></p>
			<?php endif; ?>
			
		</div>
		
	</div>
    <!-- End Footer -->

<?php if ( zoomarts_option('off-canvas-checkbox') == '1' ) : ?>
	</div>
	</div>
	</div>
	</div>
<?php endif; ?>


</body>

<?php wp_footer(); ?>
</html>