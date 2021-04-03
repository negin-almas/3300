<ul class="post-meta">
	<li><i class="icon-clock"></i> <?php the_date() ?></li>
	<li><i class="icon-pen"></i> <?php the_category(', '); ?></li>
	<li><i class="icon-bubbles"></i> <?php comments_popup_link(__('0 Comments', 'zoomarts'), __('1 Comment', 'zoomarts'), __('% Comments', 'zoomarts')); ?></li>
	<li><i class="icon-eye"></i> <?php echo za_get_post_views(get_the_ID()); ?></li>
</ul>