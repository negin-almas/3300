<div class="post-entry-bottom clearfix">
	
	<?php if (!is_singular()) : ?>
		<a class="read-more" href="<?php the_permalink(); ?>"><?php _e('Read More', 'zoomarts') ?></a>
	<?php else: ?>
		<?php if( has_tag() ) : ?><div class="post-tags"><span><?php _e('Tags', 'zoomarts') ?>:</span> <?php the_tags(''); ?></div> <?php endif; ?>
	<?php endif; ?>
	
	<div class="post-love-share">
		
		<div class="post-love">
			<?php if( function_exists('zoomarts_love') ) zoomarts_love(); ?>
		</div>
		
		<?php if ( zoomarts_option('post-social-share') == '1' ) : ?>
		
			<div class="post-share">

				<a href="#" class="post-share-link" data-toggle="modal" data-target="#sharing-modal-<?php echo get_the_ID(); ?>"><?php _e('Share', 'zoomarts'); ?> <i class="icon-share"></i></a>

				<div id="sharing-modal-<?php echo get_the_ID(); ?>" class="sharing-modal modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<a class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
					<div class="modal-dialog">
						<h2>اشتراک گذاری: <?php the_title(); ?></h2>
						<div class="social-icons">
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class="fb-share popup"><i class="fa fa-facebook"></i></a>
							<a href="http://twitter.com/home?status=<?php the_title(); ?> <?php the_permalink(); ?>" class="tw-share popup"><i class="fa fa-twitter"></i></a>
							<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="gp-share popup"><i class="fa fa-google-plus"></i></a>
							<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>&amp;summary=<?php the_title(); ?>" class="li-share popup"><i class="fa fa-linkedin"></i></a>
							<a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php  ?>&amp;description=<?php the_title(); ?>" class="pi-share"><i class="fa fa-pinterest"></i></a>
							<a href="mailto:?subject=<?php the_title(); ?>&amp;body=<?php the_permalink(); ?>" class="em-share"><i class="fa fa-envelope"></i></a>
						</div>
					</div>
				</div>

			</div>
		
		<?php endif; ?>
		
	</div>

</div>