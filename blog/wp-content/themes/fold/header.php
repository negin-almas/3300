<!DOCTYPE html <?php language_attributes(); ?>>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<title><?php wp_title(''); ?><?php if( wp_title('', false) ) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>
<?php wp_head(); ?>
</head>

<body <?php body_class( ); ?>>
	
	<?php if ( zoomarts_option('off-canvas-checkbox') == '1' ) { get_template_part( 'off-canvas' ); } ?>

	<!-- Start Header -->
    <div id="header" class="header">
        <div class="container">
        
            <div class="logo">
				<?php if ( zoomarts_option('custom-logo-checkbox') == 1 ) : ?>
                	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo zoomarts_option('custom-logo', false, 'url'); ?>" data-at2x="<?php echo zoomarts_option('retina-logo', false, 'url'); ?>" alt="<?php get_bloginfo( 'name' ) ?>" /></a>
				<?php else : ?>
					<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo get_bloginfo( 'name' ); ?></a></h1>
				<?php endif; ?>
            </div>
			
			<?php if ( zoomarts_option('tagline-text') !== '' ) : ?><p class="tagline"><?php echo zoomarts_option('tagline-text'); ?></p><?php endif; ?>
			<?php if ( zoomarts_option('tagline-text') == '' ) : ?><p class="tagline"><?php echo esc_attr( get_bloginfo( 'description', 'display' ) ); ?></p><?php endif; ?>

            <div class="header-left">
                <?php wp_nav_menu( array( 'theme_location' => 'header_menu', 'container_class' => 'nav-menu' ) ); ?>
                <?php if ( zoomarts_option('header-search') == '1' ) : ?>
				<a href="#" data-toggle="modal" data-target="#search-modal" class="show-search"><i class="fa fa-search"></i></a>
				<?php endif; ?>
				<?php if ( zoomarts_option('off-canvas-checkbox') == '1' ) : ?>
				<a data-effect="st-effect-<?php echo zoomarts_option('off-canvas-trans'); ?>" href="" class="show-sidebar"><i class="fa fa-bars"></i></a>
				<?php endif; ?>
            </div>
			
			<div class="responsive-menu">
				<a class="toggle-menu" href="#"><?php _e( 'Show Menu', 'zoomarts' ); ?> <i class="fa fa-bars"></i></a>
				<?php wp_nav_menu( array( 'theme_location' => 'header_menu', 'container_class' => 'nav-menu collapse' ) ); ?>
			</div>
        
        </div>
    </div>
	<!-- End Header -->
	
	<div id="search-modal" class="search-modal modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<a class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
		<div class="modal-dialog">
			<form role="search" method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input type="search" class="field" name="s" value="<?php _e( 'Enter your keywords...', 'zoomarts' ); ?>" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" />
				<button type="submit" id="searchsubmit"><i class="fa fa-search"></i></button>
			</form>
		</div>
	</div>