<div class="sidebar col-md-4 col-xs-12">
	<div class="sidebar-inner">
	
		<?php if( is_single() ){ ?>
			<?php dynamic_sidebar( 'single-sidebar'); ?> 
		<?php } else { ?>
			<?php dynamic_sidebar( 'main-sidebar'); ?> 
		<?php } ?>
		
	</div>
</div>