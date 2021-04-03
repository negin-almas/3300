<?php

/**
	ReduxFramework Sample Config File
	For full documentation, please visit http://reduxframework.com/docs/
**/


/** 
	Most of your editing will be done in this section.
	Here you can override default values, uncomment args and change their values.
	No $args are required, but they can be overridden if needed.
	
**/
$args = array();


// For use with a tab example below
$tabs = array();


// BEGIN Sample Config

// Setting dev mode to true allows you to view the class settings/info in the panel.
// Default: true
$args['dev_mode'] = false;

// Set the icon for the dev mode tab.
// If $args['icon_type'] = 'image', this should be the path to the icon.
// If $args['icon_type'] = 'iconfont', this should be the icon name.
// Default: info-sign
//$args['dev_mode_icon'] = 'info-sign';

// Set the class for the dev mode tab icon.
// This is ignored unless $args['icon_type'] = 'iconfont'
// Default: null
//args['dev_mode_icon_class'] = 'el-icon-large';

// Set a custom option name. Don't forget to replace spaces with underscores!
$args['opt_name'] = 'zoomarts_options';

// Setting system info to true allows you to view info useful for debugging.
// Default: false
//$args['system_info'] = false;

// Theme Panel Main Display Name
$args['display_name'] = __('پنل تنظیمات قالب','zoomarts');
$args['display_version'] = false;

// If you want to use Google Webfonts, you MUST define the api key.
$args['google_api_key'] = 'AIzaSyAX_2L_UzCDPEnAHTG7zhESRVpMPS4ssII';

// Define the starting tab for the option panel.
// Default: '0';
$args['last_tab'] = '0';

// Define the option panel stylesheet. Options are 'standard', 'custom', and 'none'
// If only minor tweaks are needed, set to 'custom' and override the necessary styles through the included custom.css stylesheet.
// If replacing the stylesheet, set to 'none' and don't forget to enqueue another stylesheet!
// Default: 'standard'
$args['admin_stylesheet'] = 'standard';

// Enable the import/export feature.
// Default: true
//$args['show_import_export'] = false;

// Set the icon for the import/export tab.
// If $args['icon_type'] = 'image', this should be the path to the icon.
// If $args['icon_type'] = 'iconfont', this should be the icon name.
// Default: refresh
//$args['import_icon'] = 'refresh';

// Set the class for the import/export tab icon.
// This is ignored unless $args['icon_type'] = 'iconfont'
// Default: null
$args['import_icon_class'] = 'el-icon-large';

// Set a custom menu icon.
$args['menu_icon'] = '';

// Set a custom title for the options page.
// Default: Options
$args['menu_title'] = __('تنظیمات قالب', 'zoomarts');

// Set a custom page title for the options page.
// Default: Options
$args['page_title'] = __('تنظیمات قالب', 'zoomarts');

// Set a custom page slug for options page (wp-admin/themes.php?page=***).
// Default: redux_options
$args['page_slug'] = 'zoomarts_options';

// Show Default
$args['default_show'] = false;

// Default Mark
$args['default_mark'] = '';

// Set a custom page capability.
// Default: manage_options
//$args['page_cap'] = 'manage_options';

// Set the menu type. Set to 'menu' for a top level menu, or 'submenu' to add below an existing item.
// Default: menu
//$args['page_type'] = 'submenu';

// Set the parent menu.
// Default: themes.php
// A list of available parent menus is available at http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
//$args['page_parent'] = 'options_general.php';

// Set a custom page location. This allows you to place your menu where you want in the menu order.
// Must be unique or it will override other items!
// Default: null
//$args['page_position'] = null;

// Set a custom page icon class (used to override the page icon next to heading)
$args['page_icon'] = 'icon-themes';

// Set the icon type. Set to 'iconfont' for Elusive Icon, or 'image' for traditional.
// Redux no longer ships with standard icons!
// Default: iconfont
//$args['icon_type'] = 'image';

// Disable the panel sections showing as submenu items.
// Default: true
$args['allow_sub_menu'] = false;

// Set the help sidebar for the options page.                                        
//$args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'zoomarts');

// Add content after the form.
$args['footer_text'] = '';

// Set footer/credit line.
$args['footer_credit'] = '';

// Declare sections array
$sections = array();




//Patterns Reader
$bg_patterns_path = get_template_directory() . '../sample/patterns/';
$bg_patterns_url  = get_template_directory_uri() . '../sample/patterns/';
$bg_patterns      = array();

if ( is_dir( $bg_patterns_path ) ) :
        
  if ( $bg_patterns_dir = opendir( $bg_patterns_path ) ) :
          $bg_patterns = array();

    while ( ( $bg_patterns_file = readdir( $bg_patterns_dir ) ) !== false ) {

      if( stristr( $bg_patterns_file, '.png' ) !== false || stristr( $bg_patterns_file, '.jpg' ) !== false ) {
              $name = explode(".", $bg_patterns_file);
              $name = str_replace('.'.end($name), '', $bg_patterns_file);
              $bg_patterns[] = array( 'alt'=>$name,'img' => $bg_patterns_url . $bg_patterns_file );
      }
    }
  endif;
endif;



//====  General Options  =========================================================
$sections[] = array(
	'icon'      => 'el-icon-wrench',
	'title'     => __('عمومی', 'zoomarts'),
	'fields'    => array(
		array(
			'id'		=>'favicon',
			'url'		=> true,
			'type' 		=> 'media',
			'title' 	=> __('Favicon', 'zoomarts'),
			'default' 	=> array( 'url' => get_template_directory_uri() .'/images/favicon.png' ),
			'subtitle' 	=> __('favicon دلخواه خود را آپلود کنید.', 'zoomarts'),
		),
		array(
			'id'		=>'iphone_icon',
			'url'		=> true,
			'type' 		=> 'media', 
			'title' 	=> __('Apple iPhone Icon ', 'zoomarts'),
			'default' 	=> array( 'url' => get_template_directory_uri() .'/images/iphone-icon.png' ),
			'subtitle' 	=> __('Upload your custom iPhone icon (60px by 60px).', 'zoomarts'),
		),
		array(
			'id'		=>'iphone_icon_retina',
			'url'		=> true,
			'type' 		=> 'media', 
			'title' 	=> __('Apple iPhone Retina Icon ', 'zoomarts'),
			'default' 	=> array( 'url' => get_template_directory_uri() .'/images/iphone-icon-retina.png' ),
			'subtitle' 	=> __('Upload your custom iPhone retina icon (120px by 120px).', 'zoomarts'),
		),
		array(
			'id'		=>'ipad_icon',
			'url'		=> true,
			'type'		=> 'media', 
			'title' 	=> __('Apple iPad Icon ', 'zoomarts'),
			'default' 	=> array( 'url' => get_template_directory_uri() .'/images/ipad-icon.png' ),
			'subtitle' 	=> __('Upload your custom iPad icon (76px by 76px).', 'zoomarts'),
		),
		array(
			'id'		=>'ipad_icon_retina',
			'url'		=> true,
			'type'		=> 'media', 
			'title'		=> __('Apple iPad Retina Icon ', 'zoomarts'),
			'default' 	=> array( 'url' => get_template_directory_uri() .'/images/ipad-icon-retina.png' ),
			'subtitle' 	=> __('Upload your custom iPad retina icon (152px by 152px).', 'zoomarts'),
		),
		array(
			'id'		=>'tracking-code',
			'type'	 	=> 'textarea',      
			'title' 	=> __('کد آمارگیر', 'zoomarts'), 
			'subtitle' 	=> __('کد آمارگیر Google Analytics (یا سایر آمارگیرها) خود را اینجا کپی کنید. این کد به بخش footer سایت شما اضافه خواهد شد.', 'zoomarts'),
		),
	)
 );


//====  Layout Options  =========================================================
$sections[] = array(
	'icon'      => 'el-icon-website',
	'title'     => __('طرح بندی', 'zoomarts'),
	'fields'    => array(
		array(
			'id'		=> 'home-layout',
			'type'      => 'image_select',
			'title'     => __('طرح خانه.', 'zoomarts'),
			'subtitle'  => __('طرح مورد نظر خود را برای صفحه خانگی انتخاب کنید.', 'zoomarts'),
			'desc'     	=> __('<strong>سایدبار راست، سایدبار چپ، تمام صفحه، وسط چین</strong>', 'zoomarts'),
			'options'   => array(
				'left-sidebar' 	=> array('alt' => '2 Column Right',   'img' => ReduxFramework::$_url . 'assets/img/2cr.png'),
				'right-sidebar' => array('alt' => '2 Column Left',   'img' => ReduxFramework::$_url . 'assets/img/2cl.png'),
				'fullwidth' 	=> array('alt' => 'Fullwidth',  'img' => ReduxFramework::$_url . 'assets/img/1col.png'),
				'centered' 		=> array('alt' => 'Fullwidth',  'img' => ReduxFramework::$_url . 'assets/img/1clc.png'),
			),
			'default' 	=> 'right-sidebar',
		),
		array(
			'id'		=> 'archive-layout',
			'type'      => 'image_select',
            'title'     => __('طرح بندی بایگانی.', 'zoomarts'),
			'subtitle'	=> __('طرح مورد نظر خود را برای صفحه بایگانی انتخاب کنید.', 'zoomarts'),
			'desc'     	=> __('<strong>سایدبار راست، سایدبار چپ، تمام صفحه، وسط چین</strong>', 'zoomarts'),
             'options'	=> array(
				 'left-sidebar'		=> array('alt' => '2 Column Right',   'img' => ReduxFramework::$_url . 'assets/img/2cr.png'),
				 'right-sidebar' 	=> array('alt' => '2 Column Left',   'img' => ReduxFramework::$_url . 'assets/img/2cl.png'),
				 'fullwidth'		=> array('alt' => 'Fullwidth',  'img' => ReduxFramework::$_url . 'assets/img/1col.png'),
				 'centered' 		=> array('alt' => 'Fullwidth',  'img' => ReduxFramework::$_url . 'assets/img/1clc.png'),
			 ),
			'default' 	=> 'right-sidebar',
		),
		array(
			'id'        => 'search-layout',
			'type'      => 'image_select',
			'title'     => __('طرح بندی صفحه نتایج جستجو.', 'zoomarts'),
			'subtitle'	=> __('طرح مورد نظر خود را برای صفحه نتایج جستجو انتخاب کنید.', 'zoomarts'),
			'desc'		=> __('<strong>سایدبار راست، سایدبار چپ، تمام صفحه، وسط چین</strong>', 'zoomarts'),
			'options'   => array(
				'left-sidebar' 		=> array('alt' => '2 Column Right',   'img' => ReduxFramework::$_url . 'assets/img/2cr.png'),
				'right-sidebar' 	=> array('alt' => '2 Column Left',   'img' => ReduxFramework::$_url . 'assets/img/2cl.png'),
				'fullwidth' 		=> array('alt' => 'Fullwidth',  'img' => ReduxFramework::$_url . 'assets/img/1col.png'),
				'centered' => array('alt' => 'Fullwidth',  'img' => ReduxFramework::$_url . 'assets/img/1clc.png'),
			),
			'default' 	=> 'right-sidebar',
		),
		array(
			'id'        => 'category-layout',
			'type'      => 'image_select',
			'title'     => __('طرح بندی دسته‌بندی‌ها.', 'zoomarts'),
			'subtitle'	=> __('طرح مورد نظر خود را برای صفحه دسته‌بندی‌ها انتخاب کنید.', 'zoomarts'),
			'desc'     	=> __('<strong>سایدبار راست، سایدبار چپ، تمام صفحه، وسط چین</strong>', 'zoomarts'),
			'options'   => array(
				'left-sidebar' 		=> array('alt' => '2 Column Right',   'img' => ReduxFramework::$_url . 'assets/img/2cr.png'),
				'right-sidebar' 	=> array('alt' => '2 Column Left',   'img' => ReduxFramework::$_url . 'assets/img/2cl.png'),
				'fullwidth' 		=> array('alt' => 'Fullwidth',  'img' => ReduxFramework::$_url . 'assets/img/1col.png'),
				'centered' 			=> array('alt' => 'Fullwidth',  'img' => ReduxFramework::$_url . 'assets/img/1clc.png'),
			),
			'default' 	=> 'right-sidebar',
		),
	)
);


//====  Header & Footer Options  =========================================================
$sections[] = array(
	'icon'      => 'el-icon-screen',
	'title'     => __('سربرگ و پاورقی', 'zoomarts'),
	'fields'    => array(
		array(
			'id'		=>'multi-info',
			'type' 		=> 'info',
			'desc' 		=> __('تنظیمات سربرگ', 'zoomarts'),
		),
		array(
			'id'        => 'custom-logo-checkbox',
			'type'      => 'switch',
			'title'     => __('لوگوی تصویری؟', 'zoomarts'),
			'default'       => 1,
			'on'        => 'فعال',
			'off'       => 'غیر فعال',
		),
		array(
			'id'        => 'custom-logo',
			'type'      => 'media',
			'url'       => true,
			'title'     => __('لوگو', 'zoomarts'),
			'subtitle'  => __('لوگوی دلخواه خود را آپلود کنید.', 'zoomarts'),
			'required'  => array('custom-logo-checkbox', '=', 1),
			'default' => array( 'url' => get_template_directory_uri() .'/images/logo.png' ),
		),
		array(
			'id'        => 'retina-logo',
			'type'      => 'media',
			'url'       => true,
			'title'     => __('لوگوب رتینا', 'zoomarts'),
			'subtitle'  => __('لوگوی رتینای خود را آپلود کنید. (غیرضروری).', 'zoomarts'),
			'required'  => array('custom-logo-checkbox', '=', 1),
			'default' => array( 'url' => get_template_directory_uri() .'/images/retina-logo.png' ),
		),
		array(
			'id'        => 'tagline-text',
			'type'      => 'text',
			'title'     => __('شعار؟', 'zoomarts'),
			'subtitle'  => __('این متن در کنار لوگو نمایش داده خواهد شد.', 'zoomarts'),
		),
		array(
			'id'		=> 'header-height',
			'type'		=> 'slider',
			'title' 	=> __('ارتفاع سربرگ', 'zoomarts'),
			'subtitle'      => __('ارتفاع دلخواه خود را برای سربرگ بر حسب پیکسل وارد کنید.', 'zoomarts'),
			'default'       => 78,
			'min'           => 1,
			'step'          => 1,
			'max'           => 200,
		),
		array(
			'id'        => 'header-search',
			'type'      => 'switch',
			'title'     => __('جستجوی سربرگ', 'zoomarts'),
			'subtitle'  => __('تغییر وضعیت تابع جستجو در سربرگ فعال یا غیر فعال.', 'zoomarts'),
			'default'   => 1,
			'on'        => 'فعال',
			'off'       => 'غیر فعال',
		),
		array(
			'id'		=>'multi-info',
			'type' 		=> 'info',
			'desc' 		=> __('تنظیمات پاورقی', 'zoomarts'),
		),
		array(
			'id'        => 'footer-back-top-link',
			'type'      => 'switch',
			'title'     => __('دکمه بازگشت به بالا', 'zoomarts'),
			'subtitle' 	=> __('تغییر وضعیت دکمه بازگشت به بالا.', 'zoomarts'),
			'default'   => 1,
			'on'        => 'فعال',
			'off'       => 'غیرفعال',
		),
		array(
			'id'		=>'footer_copyright_text',
			'type' 		=> 'textarea',
			'title' 	=> __('کپی‌رایت', 'zoomarts'),
			'subtitle' 	=> __('متن کپی رایت دلخواه خود را اینجا وارد کنید.', 'zoomarts'),
			'default' 	=> '© 1393 فارسی سازی توسط <a href="http://rtl-theme.com">راست چین</a>، با افتخار نیرو گرفته از <a href="http://rtl-theme.com/category/wordpress">وردپرس</a>',
		),
		array(
			'id'        => 'footer-social-checkbox',
			'type'      => 'switch',
			'title'     => __('آیکون های شبکه های اجتماعی پاورقی؟', 'zoomarts'),
			'subtitle' 	=> __('', 'zoomarts'),
			'default'   => 1,
			'on'        => 'فعال',
			'off'       => 'غیرفعال',
		),
		array(
			'id'        => 'footer-social-fb',
			'type'      => 'text',
			'title'     => __('Facebook URL', 'zoomarts'),
			'required'  => array('footer-social-checkbox', '=', 1),
		),
		array(
			'id'        => 'footer-social-tw',
			'type'      => 'text',
			'title'     => __('Twitter URL', 'zoomarts'),
			'required'  => array('footer-social-checkbox', '=', 1),
		),
		array(
			'id'        => 'footer-social-gp',
			'type'      => 'text',
			'title'     => __('Google+ URL', 'zoomarts'),
			'required'  => array('footer-social-checkbox', '=', 1),
		),
		array(
			'id'        => 'footer-social-dr',
			'type'      => 'text',
			'title'     => __('Dribbble URL', 'zoomarts'),
			'required'  => array('footer-social-checkbox', '=', 1),
		),
		array(
			'id'        => 'footer-social-gi',
			'type'      => 'text',
			'title'     => __('Github URL', 'zoomarts'),
			'required'  => array('footer-social-checkbox', '=', 1),
		),
		array(
			'id'        => 'footer-social-in',
			'type'      => 'text',
			'title'     => __('Instagram URL', 'zoomarts'),
			'required'  => array('footer-social-checkbox', '=', 1),
		),
		array(
			'id'        => 'footer-social-li',
			'type'      => 'text',
			'title'     => __('Linkedin URL', 'zoomarts'),
			'required'  => array('footer-social-checkbox', '=', 1),
		),
		array(
			'id'        => 'footer-social-tu',
			'type'      => 'text',
			'title'     => __('Tumblr URL', 'zoomarts'),
			'required'  => array('footer-social-checkbox', '=', 1),
		),
		array(
			'id'        => 'footer-social-fl',
			'type'      => 'text',
			'title'     => __('Flickr URL', 'zoomarts'),
			'required'  => array('footer-social-checkbox', '=', 1),
		),
		array(
			'id'        => 'footer-social-pi',
			'type'      => 'text',
			'title'     => __('Pinterest URL', 'zoomarts'),
			'required'  => array('footer-social-checkbox', '=', 1),
		),
		array(
			'id'        => 'footer-social-vi',
			'type'      => 'text',
			'title'     => __('Vimeo URL', 'zoomarts'),
			'required'  => array('footer-social-checkbox', '=', 1),
		),
		array(
			'id'        => 'footer-social-sk',
			'type'      => 'text',
			'title'     => __('Skype URL', 'zoomarts'),
			'required'  => array('footer-social-checkbox', '=', 1),
		),
		array(
			'id'        => 'footer-social-yo',
			'type'      => 'text',
			'title'     => __('Youtube URL', 'zoomarts'),
			'required'  => array('footer-social-checkbox', '=', 1),
		),
	)
);


//====  Off-Canvas Options  =========================================================
$sections[] = array(
	'icon'      => 'el-icon-check',
	'title'     => __('تنظیمات Off-Canvas', 'zoomarts'),
	'fields'    => array(
		array(
			'id'        => 'off-canvas-checkbox',
			'type'      => 'switch',
			'title'     => __('Off-Canvas', 'zoomarts'),
			'default'   => 1,
			'on'        => 'فعال',
			'off'       => 'غیرفعال',
		),
		array(
			'id'        => 'off-canvas-pos',
			'type'      => 'image_select',
			'title'     => __('موقعیت Off-Canvas', 'zoomarts'),
			'options'   => array(
				'position-right' 	=> array('alt' => '2 Column Right',   'img' => ReduxFramework::$_url . 'assets/img/2cr.png'),
				'position-left' 	=> array('alt' => '2 Column Left',   'img' => ReduxFramework::$_url . 'assets/img/2cl.png'),
			), 
			'default' 	=> 'position-right',
			'required'  => array('off-canvas-checkbox', '=', 1),
		),
		array(
			'id'        => 'off-canvas-trans',
			'type'      => 'select',
			'title'     => __('افکت های انتقال', 'zoomarts'),
			'subtitle'  => __('Here is some inspiration for showing them in style using CSS transitions.', 'zoomarts'),
			'options'   => array(
				'3' 		=> 'Push',
				'2' 		=> 'Reveal',
				'10' 		=> 'Scale Up',
				'12' 		=> 'Open Door',
				'13' 		=> 'Fall Down',
				'4' 		=> 'Slide Along',
				'6' 		=> 'Rotate Pusher',
				'7' 		=> '3D Rotate In',
				'8' 		=> '3D Rotate Out',
				'1' 		=> 'Slide In On Top',
				'5' 		=> 'Reverse Slide Out',
				'14' 		=> 'Delayed 3D Rotate',
				'9' 		=> 'Scale Down Pusher',
				'11' 		=> 'Scale &amp; rotate pusher',
			),
			'default'   => '3',
			'required'  => array('off-canvas-checkbox', '=', 1),
		),
	)
);



//====  Blog Options  =========================================================
$sections[] = array(
	'icon'      => 'el-icon-edit',
	'title'     => __('تنظیمات وبلاگ', 'zoomarts'),
	'fields'    => array(
		array(
			'id' 		=> 'blog-pagination-style',
			'type'		=> 'button_set',
			'title' 	=> __('شیوه‌ی صفحه بندی', 'zoomarts'),
			'subtitle' 	=> __('سبک دلخواه خود برای صفحه بندی وبلاگ را انتخاب کنید.', 'zoomarts'),
			'default' 	=> 'load-more',
			'options'   => array(
				'standard'    => __('استاندارد','zoomarts'),
				'next-prev'   => __('بعد و قبل','zoomarts'),
				'load-more'   => __('بارگذاری آژاکس','zoomarts'),
			)
		),
		array(
			'id' 		=> 'pagination-load-more-posts-num',
			'type' 		=> 'slider',
			'title'		=> __('نمایش مطالب', 'zoomarts'),
			'subtitle' 	=> __('تعداد مطالبی که در هر بار بارگذاری خواهند شد (posts_per_page). <strong>پیشفرض: 5</strong>', 'zoomarts'),
			'default' 	=> 5,
			'min' 		=> 1,
			'step' 		=> 1,
			'max' 		=> 20,
			'required' 	=> array('blog-pagination-style','equals','load-more'),
		),
		array(
			'id'            => 'pagination-load-more-transtion',
			'type'          => 'button_set',
			'title'         => __('انیمیشن بارگذاری', 'zoomarts'),
			'subtitle'      => __('انیمیشن بارگذاری مطالب را انتخاب کنید.', 'zoomarts'),
			'default'       => 'fade',
			'options'   	=> array(
				'fade'   		=> __('محو شدن','zoomarts'),
				'slide'    		=> __('کشویی','zoomarts'),
			),
			'required'      => array('blog-pagination-style','equals','load-more'),
		),
		array(
			'id'			=>'blog-excerpts',
			'type' 			=> 'switch', 
			'title' 		=> __('ورود خودکار گزیده', 'zoomarts'),
			'subtitle'		=> __('', 'zoomarts'),
			'default' 		=> '1',
			'on' 			=> __('فعال', 'zoomarts' ),
			'off' 			=> __('غیرفعال', 'zoomarts' ),
		),
		array(
			'id'            => 'entry_excerpt_length',
			'type'          => 'slider',
			'title'         => __('طول گزیده‌ی وارد شده', 'zoomarts'),
			'subtitle'      => __('میخواهید گزیده‌ی مطالب چند کلمه باشد؟', 'zoomarts'),
			'default'       => 80,
			'min'           => 1,
			'step'          => 1,
			'max'           => 200,
			'required'      => array('blog-excerpts','equals','1'),
		),
		array(
			'id'			=>'post-social-share',
			'type' 			=> 'switch', 
			'title' 		=> __('اشتراک گذاری', 'zoomarts'),
			'subtitle'		=> __('', 'zoomarts'),
			'default' 		=> '1',
			'on' 			=> __('فعال', 'zoomarts' ),
			'off' 			=> __('غیرفعال', 'zoomarts' ),
		),
		array(
			'id'			=>'post-author-bio',
			'type' 			=> 'switch',
			'title' 		=> __('بیوگرافی نویسنده', 'zoomarts'),
			'subtitle'		=> __('', 'zoomarts'),
			'default' 		=> '1',
			'on' 			=> __('فعال', 'zoomarts' ),
			'off' 			=> __('غیرفعال', 'zoomarts' ),
		),
		array(
			'id'			=>'post-related-posts',
			'type' 			=> 'switch', 
			'title' 		=> __('مطالب مرتبط', 'zoomarts'),
			'subtitle'		=> __('', 'zoomarts'),
			'default' 		=> '1',
			'on' 			=> __('فعال', 'zoomarts' ),
			'off' 			=> __('غیرفعال', 'zoomarts' ),
		),
	)
);



//====  Styling Options  =========================================================
$sections[] = array(
	'icon' 			=> 'el-icon-adjust',
	'icon_class'	=> 'el-icon-large',
	'title' 		=> __('ظاهر طراحی', 'zoomarts'),
	'submenu' 		=> true,
	'fields' 		=> array(
		array(
			'id'			=>'custom_styling',
			'type' 			=> 'switch', 
			'title' 		=> __('ظاهر طراحی دلخواه', 'zoomarts'),
			'subtitle'		=> __('', 'zoomarts'),
			'default' 		=> '1',
			'on' 			=> __('فعال', 'zoomarts' ),
			'off' 			=> __('غیرفعال', 'zoomarts' ),
		),
		array(
			'id'			=>'multi-info',
			'type'	 		=> 'info',
			'desc' 			=> __('اصلی', 'zoomarts'),
			'required'      => array('custom_styling','equals','1'),
		),
		array(
			'id'			=>'primary-color',
			'type' 			=> 'color',
			'title' 		=> __('Primary Color', 'zoomarts'),
			'subtitle' 		=> __('Pick a primary color.', 'zoomarts'),
			'desc' 			=> __('Theme Primary color has all of accent colors of this theme.', 'zoomarts'),
			'transparent'	=>false,
			'validate' 		=> 'color',
			'required'      => array('custom_styling','equals','1'),
		),
		array(
			'id'			=>'links-color',
			'type' 			=> 'link_color',
			'title' 		=> __('Links Color', 'zoomarts'),
			'subtitle' 		=> __('Pick a links color.', 'zoomarts'),
			'transparent'	=>false,
			'default' 		=> array(
				'show_regular' 		=> true,
				'show_hover' 		=> true,
				'show_active'	 	=> true
			),
			'required'      => array('custom_styling','equals','1'),
		),
		array(
			'id'			=>'multi-info',
			'type'	 		=> 'info',
			'desc' 			=> __('Header', 'zoomarts'),
			'required'      => array('custom_styling','equals','1'),
		),
		array(
			'id'			=>'header-bg',
			'type' 			=> 'color',
			'title' 		=> __('Header Background', 'zoomarts'),
			'subtitle' 		=> __('Pick a header background color.', 'zoomarts'),
			'transparent'	=>false,
			'validate' 		=> 'color',
			'required'      => array('custom_styling','equals','1'),
		),
		array(
			'id'			=>'logo-color',
			'type' 			=> 'color',
			'title' 		=> __('Logo Color', 'zoomarts'),
			'subtitle' 		=> __('Pick a Logo color.', 'zoomarts'),
			'transparent'	=>false,
			'validate' 		=> 'color',
			'required'  => array('custom-logo-checkbox', '=', 0),
			'required'      => array('custom_styling','equals','1'),
		),
		array(
			'id'			=>'tagline-color',
			'type' 			=> 'color',
			'title' 		=> __('Tagline Color', 'zoomarts'),
			'subtitle' 		=> __('Pick a tagline text color.', 'zoomarts'),
			'transparent'	=>false,
			'validate' 		=> 'color',
			'required'      => array('custom_styling','equals','1'),
		),
		array(
			'id'			=>'menu-color',
			'type' 			=> 'link_color',
			'title' 		=> __('Menu Link Color', 'zoomarts'),
			'subtitle' 		=> __('Pick a menu link color.', 'zoomarts'),
			'transparent'	=>false,
			'default' 		=> array(
				'show_regular' 		=> true,
				'show_hover' 		=> true,
				'show_active'	 	=> true
			),
			'required'      => array('custom_styling','equals','1'),
		),
		array(
			'id'			=>'search-link-color',
			'type' 			=> 'link_color',
			'title' 		=> __('Search Link Color', 'zoomarts'),
			'subtitle' 		=> __('Pick a search link color.', 'zoomarts'),
			'transparent'	=>false,
			'default' 		=> array(
				'show_regular' 		=> true,
				'show_hover' 		=> true,
				'show_active'	 	=> true
			),
			'required'      => array('custom_styling','equals','1'),
		),
		array(
			'id'			=>'off-canvas-link-color-h',
			'type' 			=> 'link_color',
			'title' 		=> __('Off-Canvas Link Color', 'zoomarts'),
			'subtitle' 		=> __('Pick a off-canvas link color.', 'zoomarts'),
			'transparent'	=>false,
			'default' 		=> array(
				'show_regular' 		=> true,
				'show_hover' 		=> true,
				'show_active'	 	=> true
			),
			'required'      => array('custom_styling','equals','1'),
		),
		array(
			'id'			=>'multi-info',
			'type'	 		=> 'info',
			'desc' 			=> __('Off-Canvas', 'zoomarts'),
			'required'      => array('custom_styling','equals','1'),
		),
		array(
			'id'			=>'off-canvas-text-color',
			'type' 			=> 'color',
			'title' 		=> __('Off-Canvas Text Color', 'zoomarts'),
			'subtitle' 		=> __('Pick a Off-Canvas text color.', 'zoomarts'),
			'transparent'	=>false,
			'validate' 		=> 'color',
			'required'      => array('custom_styling','equals','1'),
		),
		array(
			'id'			=>'off-canvas-link-color',
			'type' 			=> 'link_color',
			'title' 		=> __('Off-Canvas Link Color', 'zoomarts'),
			'subtitle' 		=> __('Pick a Off-Canvas link color.', 'zoomarts'),
			'transparent'	=>false,
			'default' 		=> array(
				'show_regular' 		=> true,
				'show_hover' 		=> true,
				'show_active'	 	=> true
			),
			'required'      => array('custom_styling','equals','1'),
		),
		array(
			'id'			=>'off-canvas-bg-color',
			'type' 			=> 'color',
			'title' 		=> __('Off-Canvas Background Color', 'zoomarts'),
			'subtitle' 		=> __('Select your custom hex color.', 'zoomarts'),
			'transparent'	=>false,
			'validate' 		=> 'color',
			'required'      => array('custom_styling','equals','1'),
		),
		array(
			'id'        	=> 'off-canvas-bg-image',
			'type'      	=> 'media',
			'url'       	=> true,
			'title'     	=> __('Off-Canvas Background Image', 'zoomarts'),
			'subtitle'  	=> __('Upload your custom Off-Canvas Background Image. <strong>(Optional)</strong>', 'zoomarts'),
			'required'      => array('custom_styling','equals','1'),
        ),
		array(
			'id'        	=> 'off-canvas-bg-image-pos',
			'type'      	=> 'select',
			'title'     	=> __('Background Position', 'zoomarts'),
			'default'   	=> '1',
			'options'   	=> array(
                'left top' 			=> 'left top', 
                'left center' 		=> 'left center', 
				'left bottom' 		=> 'left bottom', 
				'right top' 		=> 'right top', 
				'right center' 		=> 'right center', 
				'right bottom' 		=> 'right bottom', 
				'center top' 		=> 'center top',
				'center center' 	=> 'center center',
				'center bottom' 	=> 'center bottom',
            ),
			'required'      => array('custom_styling','equals','1'),
			'subtitle'  	=> __('Select the background position. <strong>(Optional)</strong>', 'zoomarts'),
        ),
		array(
			'id'        	=> 'off-canvas-bg-image-rep',
			'type'      	=> 'select',
			'title'     	=> __('Background Repeat', 'zoomarts'),
			'default'   	=> '1',
			'options'   	=> array(
                'repeat' 			=> 'Repeat', 
                'no-repeat' 		=> 'No Repeat', 
            ),
			'required'      => array('custom_styling','equals','1'),
			'subtitle'  	=> __('Select the background repeat. <strong>(Optional)</strong>', 'zoomarts'),
        ),
		array(
			'id'			=>'multi-info',
			'type'	 		=> 'info',
			'desc' 			=> __('Custom CSS', 'zoomarts'),
		),
		array(
			'id'        	=> 'custom-css',
			'type'      	=> 'textarea',
			'mode' 			=> 'css',
			'theme' 		=> 'chrome',
			'title'     	=> __('Custom CSS', 'zoomarts'),
			'subtitle'  	=> __('Quickly add some CSS to your theme to make design adjustements by adding it to this block. It is a much better solution then manually editing style.css', 'zoomarts'),
			'validate' 		=> 'css',
        ),
	)
);


//====  Typography  =========================================================
$sections[] = array(
	'icon' 			=> 'el-icon-font',
	'icon_class' 	=> 'el-icon-large',
	'title' 		=> __('Typography', 'zoomarts'),
	'submenu' 		=> true,
	'fields' 		=> array(
		array(
			'id'			=>'multi-info',
			'type'	 		=> 'info',
			'desc' 			=> __('Body', 'zoomarts'),
		),
		array(
			'id'			=> 'body_font',
			'type' 			=> 'typography', 
			'title' 		=> __('Body', 'wpex'),
			'compiler'		=> false,
			'google'		=> true,
			'font-backup'	=> false,
			'font-style'	=> true,
			'subsets'		=> true,
			'font-size'		=> true,
			'line-height'	=> true,
			'text-align'	=> false,
			'word-spacing'	=> false,
			'letter-spacing'=> false,
			'color'			=> true,
			'preview'		=> true,
			'output'		=> array('body'),
			'units'			=> 'px',
			'subtitle'		=> __('Select your custom font options for your main body font.', 'wpex'),
			'default'=> array(
				'color'=>'#7f7f7f',
				'font-family'=>'WIranian',
				'font-weight'=>'300',
				'font-size'=>'16px',
				'line-height'=>'30px',
			),
		),
		array(
			'id'			=>'multi-info',
			'type'	 		=> 'info',
			'desc' 			=> __('Headings', 'zoomarts'),
		),
		array(
			'id'			=> 'h1_font',
			'type' 			=> 'typography', 
			'title' 		=> __('H1 Heading', 'wpex'),
			'compiler'		=> false,
			'google'		=> true,
			'font-backup'	=> false,
			'font-style'	=> false,
			'subsets'		=> true,
			'font-size'		=> true,
			'line-height'	=> true,
			'text-align'	=> false,
			'word-spacing'	=> false,
			'letter-spacing'=> false,
			'color'			=> true,
			'preview'		=> true,
			'output'		=> array('h1'),
			'units'			=> 'px',
			'subtitle'		=> __('Select your custom font options for H1 font.', 'wpex'),
			'default'=> array(
				'color'=>'#777',
				'font-family'=>'BYekan',
				'font-weight'=>'300',
				'font-size'=>'22px',
				'line-height'=>'30px',
			),
		),
		array(
			'id'			=> 'h2_font',
			'type' 			=> 'typography', 
			'title' 		=> __('H2 Heading', 'wpex'),
			'compiler'		=> false,
			'google'		=> true,
			'font-backup'	=> false,
			'font-style'	=> false,
			'subsets'		=> true,
			'font-size'		=> true,
			'line-height'	=> true,
			'text-align'	=> false,
			'word-spacing'	=> false,
			'letter-spacing'=> false,
			'color'			=> true,
			'preview'		=> true,
			'output'		=> array('h2'),
			'units'			=> 'px',
			'subtitle'		=> __('Select your custom font options for H2 font.', 'wpex'),
			'default'=> array(
				'color'=>'#777',
				'font-family'=>'BYekan',
				'font-weight'=>'300',
				'font-size'=>'22px',
				'line-height'=>'30px',
			),
		),
		array(
			'id'			=> 'h3_font',
			'type' 			=> 'typography', 
			'title' 		=> __('H3 Heading', 'wpex'),
			'compiler'		=> false,
			'google'		=> true,
			'font-backup'	=> false,
			'font-style'	=> false,
			'subsets'		=> true,
			'font-size'		=> true,
			'line-height'	=> true,
			'text-align'	=> false,
			'word-spacing'	=> false,
			'letter-spacing'=> false,
			'color'			=> true,
			'preview'		=> true,
			'output'		=> array('h3'),
			'units'			=> 'px',
			'subtitle'		=> __('Select your custom font options for H3 font.', 'wpex'),
			'default'=> array(
				'color'=>'#777',
				'font-family'=>'BYekan',
				'font-weight'=>'300',
				'font-size'=>'18px',
				'line-height'=>'24px',
			),
		),
		array(
			'id'			=> 'h4_font',
			'type' 			=> 'typography', 
			'title' 		=> __('H4 Heading', 'wpex'),
			'compiler'		=> false,
			'google'		=> true,
			'font-backup'	=> false,
			'font-style'	=> false,
			'subsets'		=> true,
			'font-size'		=> true,
			'line-height'	=> true,
			'text-align'	=> false,
			'word-spacing'	=> false,
			'letter-spacing'=> false,
			'color'			=> true,
			'preview'		=> true,
			'output'		=> array('h4'),
			'units'			=> 'px',
			'subtitle'		=> __('Select your custom font options for H4 font.', 'wpex'),
			'default'=> array(
				'color'=>'#777',
				'font-family'=>'BYekan',
				'font-weight'=>'300',
				'font-size'=>'18px',
				'line-height'=>'22px',
			),
		),
		array(
			'id'			=> 'h5_font',
			'type' 			=> 'typography', 
			'title' 		=> __('H5 Heading', 'wpex'),
			'compiler'		=> false,
			'google'		=> true,
			'font-backup'	=> false,
			'font-style'	=> false,
			'subsets'		=> true,
			'font-size'		=> true,
			'line-height'	=> true,
			'text-align'	=> false,
			'word-spacing'	=> false,
			'letter-spacing'=> false,
			'color'			=> true,
			'preview'		=> true,
			'output'		=> array('h5'),
			'units'			=> 'px',
			'subtitle'		=> __('Select your custom font options for H5 font.', 'wpex'),
			'default'=> array(
				'color'=>'#777',
				'font-family'=>'BYekan',
				'font-weight'=>'300',
				'font-size'=>'13px',
				'line-height'=>'22px',
			),
		),
		array(
			'id'			=> 'h6_font',
			'type' 			=> 'typography', 
			'title' 		=> __('H6 Heading', 'wpex'),
			'compiler'		=> false,
			'google'		=> true,
			'font-backup'	=> false,
			'font-style'	=> false,
			'subsets'		=> true,
			'font-size'		=> true,
			'line-height'	=> true,
			'text-align'	=> false,
			'word-spacing'	=> false,
			'letter-spacing'=> false,
			'color'			=> true,
			'preview'		=> true,
			'output'		=> array('h6'),
			'units'			=> 'px',
			'subtitle'		=> __('Select your custom font options for H6 font.', 'wpex'),
			'default'=> array(
				'color'=>'#777',
				'font-family'=>'BYekan',
				'font-weight'=>'300',
				'font-size'=>'12px',
				'line-height'=>'18px',
			),
		),
		array(
			'id'			=>'multi-info',
			'type'	 		=> 'info',
			'desc' 			=> __('Header', 'zoomarts'),
		),
		array(
			'id'			=> 'logo_font',
			'type' 			=> 'typography', 
			'title' 		=> __('Logo Font', 'wpex'),
			'compiler'		=> false,
			'google'		=> true,
			'font-backup'	=> false,
			'font-style'	=> false,
			'subsets'		=> true,
			'font-size'		=> true,
			'line-height'	=> true,
			'text-align'	=> false,
			'word-spacing'	=> false,
			'letter-spacing'=> false,
			'color'			=> false,
			'preview'		=> true,
			'output'		=> array('#header h1'),
			'units'			=> 'px',
			'subtitle'		=> __('Select your custom font options for Logo.', 'wpex'),
			'default'=> array(
				'font-family'=>'BYekan',
				'font-weight'=>'700',
				'font-size'=>'40px',
				'line-height'=>'40px',
			),
		),
		array(
			'id'			=> 'menu_font',
			'type' 			=> 'typography', 
			'title' 		=> __('Menu Font', 'wpex'),
			'compiler'		=> false,
			'google'		=> true,
			'font-backup'	=> false,
			'font-style'	=> false,
			'subsets'		=> true,
			'font-size'		=> true,
			'line-height'	=> false,
			'text-align'	=> false,
			'word-spacing'	=> false,
			'letter-spacing'=> false,
			'color'			=> false,
			'preview'		=> true,
			'output'		=> array('.nav-menu li a'),
			'units'			=> 'px',
			'subtitle'		=> __('Select your custom font options for your main navigation menu.', 'wpex'),
			'default'=> array(
				'font-family'=>'BYekan',
				'font-weight'=>'300',
				'font-size'=>'13px',
			),
		),
		array(
			'id'			=> 'menu_dropdown_font',
			'type' 			=> 'typography', 
			'title' 		=> __('Menu Dropdowns Font', 'wpex'),
			'compiler'		=> false,
			'google'		=> true,
			'font-backup'	=> false,
			'font-style'	=> false,
			'subsets'		=> true,
			'font-size'		=> true,
			'line-height'	=> false,
			'text-align'	=> false,
			'word-spacing'	=> false,
			'letter-spacing'=> false,
			'color'			=> true,
			'preview'		=> true,
			'output'		=> array('.nav-menu ul ul li a'),
			'units'			=> 'px',
			'subtitle'		=> __('Select your custom font options for your main navigation menu dropdowns.', 'wpex'),
			'default'=> array(
				'font-family'=>'WIranian',
				'font-weight'=>'300',
				'font-size'=>'12px',
				'color'=>'#ddd',
			),
		),
		array(
			'id'			=>'multi-info',
			'type'	 		=> 'info',
			'desc' 			=> __('Other', 'zoomarts'),
		),
		array(
			'id'			=> 'page_title_font',
			'type' 			=> 'typography', 
			'title' 		=> __('Page Title Font', 'wpex'),
			'compiler'		=> false,
			'google'		=> true,
			'font-backup'	=> false,
			'font-style'	=> false,
			'subsets'		=> true,
			'font-size'		=> true,
			'line-height'	=> true,
			'text-align'	=> false,
			'word-spacing'	=> false,
			'letter-spacing'=> false,
			'color'			=> true,
			'preview'		=> true,
			'output'		=> array('.page-inner .page-header'),
			'units'			=> 'px',
			'subtitle'		=> __('Select your custom font options for your main navigation menu.', 'wpex'),
			'default'=> array(
				'font-family'=>'BYekan',
				'font-weight'=>'300',
				'font-size'=>'22px',
				'line-height'=>'30px',
				'color'=>'#666',
			),
		),
		array(
			'id'			=> 'page_subheading_font',
			'type' 			=> 'typography', 
			'title' 		=> __('Page Subheading Font', 'wpex'),
			'compiler'		=> false,
			'google'		=> true,
			'font-backup'	=> false,
			'font-style'	=> false,
			'subsets'		=> true,
			'font-size'		=> true,
			'line-height'	=> true,
			'text-align'	=> false,
			'word-spacing'	=> false,
			'letter-spacing'=> false,
			'color'			=> true,
			'preview'		=> true,
			'output'		=> array('.page-desc'),
			'units'			=> 'px',
			'subtitle'		=> __('Select your custom font options for your main navigation menu.', 'wpex'),
			'default'=> array(
				'font-family'=>'BYekan',
				'font-weight'=>'300',
				'font-size'=>'13px',
				'line-height'=>'22px',
				'color'=>'#aaa',
			),
		),
		array(
			'id'			=> 'post_title_font',
			'type' 			=> 'typography', 
			'title' 		=> __('Post Title Font', 'wpex'),
			'compiler'		=> false,
			'google'		=> true,
			'font-backup'	=> false,
			'font-style'	=> false,
			'subsets'		=> true,
			'font-size'		=> true,
			'line-height'	=> true,
			'text-align'	=> false,
			'word-spacing'	=> false,
			'letter-spacing'=> false,
			'color'			=> false,
			'preview'		=> true,
			'output'		=> array('.post-head h2.post-title'),
			'units'			=> 'px',
			'subtitle'		=> __('Select your custom font options for your main navigation menu.', 'wpex'),
			'default'=> array(
				'font-family'=>'BYekan',
				'font-weight'=>'300',
				'font-size'=>'22px',
				'line-height'=>'30px',
			),
		),
	)
);


//====  About Me Page  =========================================================
$sections[] = array(
	'icon' 			=> 'el-icon-user',
	'icon_class' 	=> 'el-icon-large',
	'title' 		=> __('صفحه درباره من', 'zoomarts'),
	'submenu' 		=> true,
	'fields' 		=> array(
		array(
			'id'		=>'my-pic',
			'url'		=> true,
			'type' 		=> 'media',
			'title' 	=> __('تصویر شما', 'zoomarts'),
			'subtitle' 	=> __('تصویر خود را آپلود کنید.', 'zoomarts'),
		),
		array(
			'id'        => 'my-social-fb',
			'type'      => 'text',
			'title'     => __('Facebook URL', 'zoomarts'),
			'required'  => array('footer-social-checkbox', '=', 1),
		),
		array(
			'id'        => 'my-social-tw',
			'type'      => 'text',
			'title'     => __('Twitter URL', 'zoomarts'),
			'required'  => array('footer-social-checkbox', '=', 1),
		),
		array(
			'id'        => 'my-social-gp',
			'type'      => 'text',
			'title'     => __('Google+ URL', 'zoomarts'),
			'required'  => array('footer-social-checkbox', '=', 1),
		),
		array(
			'id'        => 'my-social-dr',
			'type'      => 'text',
			'title'     => __('Dribbble URL', 'zoomarts'),
			'required'  => array('footer-social-checkbox', '=', 1),
		),
		array(
			'id'        => 'my-social-gi',
			'type'      => 'text',
			'title'     => __('Github URL', 'zoomarts'),
			'required'  => array('footer-social-checkbox', '=', 1),
		),
		array(
			'id'        => 'my-social-in',
			'type'      => 'text',
			'title'     => __('Instagram URL', 'zoomarts'),
			'required'  => array('footer-social-checkbox', '=', 1),
		),
		array(
			'id'        => 'my-social-li',
			'type'      => 'text',
			'title'     => __('Linkedin URL', 'zoomarts'),
			'required'  => array('footer-social-checkbox', '=', 1),
		),
		array(
			'id'        => 'my-social-tu',
			'type'      => 'text',
			'title'     => __('Tumblr URL', 'zoomarts'),
			'required'  => array('footer-social-checkbox', '=', 1),
		),
		array(
			'id'        => 'my-social-fl',
			'type'      => 'text',
			'title'     => __('Flickr URL', 'zoomarts'),
			'required'  => array('footer-social-checkbox', '=', 1),
		),
		array(
			'id'        => 'my-social-pi',
			'type'      => 'text',
			'title'     => __('Pinterest URL', 'zoomarts'),
			'required'  => array('footer-social-checkbox', '=', 1),
		),
		array(
			'id'        => 'my-social-vi',
			'type'      => 'text',
			'title'     => __('Vimeo URL', 'zoomarts'),
			'required'  => array('footer-social-checkbox', '=', 1),
		),
		array(
			'id'        => 'my-social-sk',
			'type'      => 'text',
			'title'     => __('Skype URL', 'zoomarts'),
			'required'  => array('footer-social-checkbox', '=', 1),
		),
		array(
			'id'        => 'my-social-yo',
			'type'      => 'text',
			'title'     => __('Youtube URL', 'zoomarts'),
			'required'  => array('footer-social-checkbox', '=', 1),
		),
	)
);


//====  Contact Page  =========================================================
$sections[] = array(
	'icon' 			=> 'el-icon-phone',
	'icon_class' 	=> 'el-icon-large',
	'title' 		=> __('صفحه تماس', 'zoomarts'),
	'submenu' 		=> true,
	'fields' 		=> array(
		array(
			'id'			=>'contact-sidebar',
			'type' 			=> 'switch',
			'title' 		=> __('سایدبار صفحه', 'zoomarts'),
			'default' 		=> 'off',
			'on'	 		=> __('فعال', 'zoomarts' ),
			'off' 			=> __('غیرفعال', 'zoomarts' ),
		),
		array(
			'id'        	=> 'contact-layout',
			'type'      	=> 'image_select',
			'title'     	=> __('طرح بندی صفحه', 'zoomarts'),
			'subtitle'		=> __('', 'zoomarts'),
			'options'   	=> array(
				'left-sidebar' 			=> array('alt' => '2 Column Right',   'img' => ReduxFramework::$_url . 'assets/img/2cr.png'),
				'right-sidebar' 		=> array('alt' => '2 Column Left',   'img' => ReduxFramework::$_url . 'assets/img/2cl.png'),
			), 
			'default' 		=> 'left-sidebar',
			'required'  	=> array('contact-sidebar', '=', 1),
		),
		array(
			'id'        	=> 'gmap-address',
			'type'      	=> 'text',
			'title'     	=> __('آدرس نقشه', 'zoomarts'),
			'subtitle'		=> __('آدرس GPS خود را وارد کنید <br/><strong>برای یافتن آدرس GPS خود <a href="http://www.rtl-theme.com/tools/mapmarker/" title="اینجا">اینجا</a> کلیک کنید.</strong>', 'zoomarts'),
			'default'       => '36.24427342837055,50.05371106250004',
		),
		array(
			'id'            => 'gmap-zoom',
			'type'          => 'slider',
			'title'         => __('بزرگنمایی نقشه', 'zoomarts'),
			'default'       => 15,
			'min'           => 1,
			'step'          => 1,
			'max'           => 18,
		),
	)
);


global $ReduxFramework;
$ReduxFramework = new ReduxFramework($sections, $args, $tabs);

// Function used to retrieve theme option values
if ( ! function_exists('zoomarts_option') ) {
	function zoomarts_option($id, $fallback = false, $param = false ) {
		global $zoomarts_options;
		if ( $fallback == false ) $fallback = '';
		$output = ( isset($zoomarts_options[$id]) && $zoomarts_options[$id] !== '' ) ? $zoomarts_options[$id] : $fallback;
		if ( !empty($zoomarts_options[$id]) && $param ) {
			$output = $zoomarts_options[$id][$param];
		}
		return $output;
	}
}