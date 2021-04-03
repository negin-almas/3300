<div class="author-bio clearfix">
	<div class="author-avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), 60 ); ?></div>
	<div class="about-author">
		<div class="author-name"><?php the_author(); ?></div>
		<p><?php echo get_the_author_meta('description'); ?></p>
	</div>
</div>