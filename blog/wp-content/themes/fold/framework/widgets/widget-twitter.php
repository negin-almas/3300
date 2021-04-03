<?php
/**
 * WP Twitter Feeds Widget
 *
 * @package WordPress
 * @subpackage Fold
 * @since Fold 1.0
*/



include('twitter/twitter_usr_validation.php');
require_once('twitter/controller/twitter_widget.class.php');

add_action( 'widgets_init', 'wpltf_reg_widget');

function wpltf_reg_widget() {
	register_widget("wptt_TwitterTweets");
}

?>
