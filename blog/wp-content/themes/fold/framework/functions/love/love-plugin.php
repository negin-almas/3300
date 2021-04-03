<?php
/*
Name: ZoOmArts Love
Description: Adds a "Love It" link to posts
Author: Ahmed Ebraheem | ZoOmArts
Author URI: http://zoom-arts.com
*/


class ZoomartsLove {
	
	 function __construct()   {	
        add_action('wp_enqueue_scripts', array(&$this, 'enqueue_scripts'));
        add_action('wp_ajax_zoomarts-love', array(&$this, 'ajax'));
		add_action('wp_ajax_nopriv_zoomarts-love', array(&$this, 'ajax'));
	}
	
	function enqueue_scripts() {
		
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'zoomarts-love', get_template_directory_uri() . '/framework/functions/love/js/love.js', 'jquery', '1.0', TRUE );
		
		wp_localize_script( 'zoomarts-love', 'zoomartsLove', array(
			'ajaxurl' => admin_url('admin-ajax.php')
		));
	}
	
	function ajax($post_id) {
		
		//update
		if( isset($_POST['loves_id']) ) {
			$post_id = str_replace('zoomarts-love-', '', $_POST['loves_id']);
			echo $this->love_post($post_id, 'update');
		} 
		
		//get
		else {
			$post_id = str_replace('zoomarts-love-', '', $_POST['loves_id']);
			echo $this->love_post($post_id, 'get');
		}
		
		exit;
	}
	
	
	function love_post($post_id, $action = 'get') 
	{
		if(!is_numeric($post_id)) return;
	
		switch($action) {
		
			case 'get':
				$love_count = get_post_meta($post_id, '_zoomarts_love', true);
				if( !$love_count ){
					$love_count = 0;
					add_post_meta($post_id, '_zoomarts_love', $love_count, true);
				}
				
				return '<span class="love-count">'. $love_count .'</span> <i class="icon-heart2"></i>';
				break;
				
			case 'update':
				$love_count = get_post_meta($post_id, '_zoomarts_love', true);
				if( isset($_COOKIE['zoomarts_love_'. $post_id]) ) return $love_count;
				
				$love_count++;
				update_post_meta($post_id, '_zoomarts_love', $love_count);
				setcookie('zoomarts_love_'. $post_id, $post_id, time()*20, '/');
				
				return '<span class="love-count">'. $love_count .'</span> <i class="icon-heart2"></i>';
				break;
		
		}
	}


	function add_love() {
		global $post;

		$output = $this->love_post($post->ID);
  
  		$class = 'post-love-link';
  		$title = __('Love this', 'zoomarts');
		if( isset($_COOKIE['zoomarts_love_'. $post->ID]) ){
			$class = 'post-love-link loved';
			$title = __('You already love this!', 'zoomarts');
		}
		
		return '<a href="#" class="'. $class .'" id="zoomarts-love-'. $post->ID .'" title="'. $title .'">'. $output .'</a>';
	}
	
}


global $zoomarts_love;
$zoomarts_love = new ZoomartsLove();

// get the ball rollin' 
function zoomarts_love() {
	global $zoomarts_love;
	echo $zoomarts_love->add_love(); 
}

?>
