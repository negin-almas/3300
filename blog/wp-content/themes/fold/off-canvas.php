<?php 

	$off_canvas_pos = zoomarts_option('off-canvas-pos');
	$off_canvas_trans = zoomarts_option('off-canvas-trans');

?>


<div id="st-container" class="st-container">
	
	<div class="<?php echo zoomarts_option('off-canvas-pos'); ?>">
		
		<?php if ( $off_canvas_trans == '3' || $off_canvas_trans == '6' || $off_canvas_trans == '7' || $off_canvas_trans == '8' || $off_canvas_trans == '14' ) : ?>

			<div class="st-pusher">

				<nav class="st-menu st-effect-<?php echo $off_canvas_trans; ?>" id="menu-<?php echo $off_canvas_trans; ?>">
					
					<div class="wrapper">

						<?php dynamic_sidebar( 'off-canvas'); ?> 
					
					</div>

				</nav>

		<?php else: ?>

			<nav class="st-menu st-effect-<?php echo $off_canvas_trans; ?>" id="menu-<?php echo $off_canvas_trans; ?>">
				
				<div class="wrapper">

					<?php dynamic_sidebar( 'off-canvas'); ?> 
					
				</div>
				
			</nav>

			<div class="st-pusher">

		<?php endif; ?>

		<div class="st-content"><!-- this is the wrapper for the content -->