<?php class wptt_TwitterTweets extends WP_Widget{

		function form($instance){
		$defaults=$this->get_defaults();
		$instance 			= wp_parse_args( (array) $instance, $defaults );
		$widget_title 				= $instance['title'];
		$name 				= $instance['name'];
		$tweets_count 			= $instance['tweets_cnt'];
		$accessTokenSecret 	= trim($instance['accessTokenSecret']);
		$replies_excl 	= $instance['replies_excl'];
		$consumerSecret 	= trim($instance['consumerSecret']);
		$accessToken 		= trim($instance['accessToken']);
		$cache_transient 			= $instance['timeRef'];
		//$dataShowCount 		= $instance['dataShowCount'];
		$disp_screen_name = $instance['disp_scr_name'];
		$timeto_store 			= $instance['store_time'];
		$consumerKey 		= trim($instance['consumerKey']);
		if (!in_array('curl', get_loaded_extensions())) {
			echo '<p style="background-color:pink;padding:10px;border:1px solid red;"><strong>cURL is not installed!</strong></p>';
		}
		include('widget_html.php');
	}
	function get_defaults()
	{
		$data = array(
				'title' 				=> 'Latest Tweets'
				, 'name' 				=> ''
				, 'tweets_cnt' 			=> 3
				, 'store_time' 			=> 4
				, 'replies_excl'		=> true
				, 'disp_scr_name'	=> false
				, 'consumerKey' 		=> ''
				, 'consumerSecret' 		=> ''
				, 'accessToken' 		=> ''
				, 'accessTokenSecret'	=> ''
				, 'dataLang'			=> 'en'
				, 'timeRef'				=> false
				, 'showAvatar'			=> true
		);
		return $data;
	}
	function wpltf_enqueue_js($hook) {
		if( $hook != 'widgets.php' )
			return;


		global $wp_version;
		if ( 3.5 <= $wp_version ){
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'wp-color-picker' );
		}
		else {
			wp_enqueue_style( 'farbtastic' );
			wp_enqueue_script( 'farbtastic' );
		}
		wp_enqueue_script('admin_js', get_template_directory_uri() . '/framework/widgets/twitter/js/admin_script.js' , dirname(__FILE__), array('jquery'));
		wp_enqueue_script('user_validate', get_template_directory_uri() . '/framework/widgets/twitter/js/validate.js' , dirname(__FILE__), array('jquery'));
	}
	function sanitize_links($tweet) {
		if(isset($tweet->retweeted_status)) {
			$rt_section = current(explode(":", $tweet->text));
			$text = $rt_section.": ";
			$text .= $tweet->retweeted_status->text;
		} else {
			$text = $tweet->text;
		}
		$text = preg_replace('/((http)+(s)?:\/\/[^<>\s]+)/i', '<a href="$0" target="_blank" rel="nofollow">$0</a>', $text );
		$text = preg_replace('/[@]+([A-Za-z0-9-_]+)/', '<a href="http://twitter.com/$1" target="_blank" rel="nofollow">@$1</a>', $text );
		$text = preg_replace('/[#]+([A-Za-z0-9-_]+)/', '<a href="http://twitter.com/search?q=%23$1" target="_blank" rel="nofollow">$0</a>', $text );
		return $text;

	}
	function update($new_instance, $old_instance){
		$instance = $old_instance;

		$instance['title'] 				= strip_tags( $new_instance['title'] );
		$instance['name'] 				= strip_tags( $new_instance['name'] );
		$instance['tweets_cnt'] 			= $new_instance['tweets_cnt'];
		$instance['store_time'] 			= $new_instance['store_time'];
		//$instance['dataShowCount']		= $new_instance['dataShowCount'];
		$instance['disp_scr_name']	= $new_instance['disp_scr_name'];
		$instance['consumerKey'] 		= trim($new_instance['consumerKey']);
		$instance['consumerSecret'] 	= trim($new_instance['consumerSecret']);
		$instance['accessToken'] 		= trim($new_instance['accessToken']);
		$instance['accessTokenSecret'] 	= trim($new_instance['accessTokenSecret']);
		$instance['replies_excl'] 	= $new_instance['replies_excl'];
		$instance['timeRef'] 			= $new_instance['timeRef'];
		return $instance;
	}
	
	function __construct()  {
		add_action('admin_enqueue_scripts', array(&$this, 'wpltf_enqueue_js'));
		$widget_data = array('classname' => 'wptt_TwitterTweets', 'description' => 'A simple widget which lets you add your latest tweets in just a few clicks on your website.' );
		$this->WP_Widget('wptt_TwitterTweets', 'Twitter Feeds', $widget_data);
	}
	
	function widget($args, $instance){
		extract($args, EXTR_SKIP);

		echo $before_widget;
		$wpltf_wdgt_title 				= empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
		$wpltf_wdgt_name 				= $instance['name'];
		$wpltf_wdgt_consumerSecret 		= trim($instance['consumerSecret']);
		$wpltf_wdgt_accessTokenSecret 	= trim($instance['accessTokenSecret']);
		$widget_replies_excl 	= isset( $instance['replies_excl'] ) ? $instance['replies_excl'] : false;
		$wpltf_wdgt_accessToken 		= trim($instance['accessToken']);
		$wpltf_wdgt_tweets_cnt 			= $instance['tweets_cnt'];
		$wpltf_wdgt_store_time 			= $instance['store_time'];
		$wpltf_wdgt_consumerKey 		= trim($instance['consumerKey']);
		//$wpltf_wdgt_dataShowCount 		= isset( $instance['dataShowCount'] ) ? $instance['dataShowCount'] : false;
		$wpltf_wdgt_disp_scr_name 	= isset( $instance['disp_scr_name'] ) ? $instance['disp_scr_name'] : false;
		$wpltf_wdgt_timeRef 			= isset( $instance['timeRef'] ) ? $instance['timeRef'] : false;
		$wpltf_wdgt_showAvatar 			= true;
		if (!empty($wpltf_wdgt_title))
			echo $before_title . $wpltf_wdgt_title . $after_title;
		if($wpltf_wdgt_consumerKey=='' || $wpltf_wdgt_consumerSecret ==''|| $wpltf_wdgt_accessTokenSecret=='' || $wpltf_wdgt_accessToken=='' )
		{
			echo '<div class="isa_error">Bad Authentication data.<br/>Please enter valid API Keys.</div>';
		}
		else
		{
?>			<ul class="fetched_tweets">
			<?php
			
			$tweets_count 			= $wpltf_wdgt_tweets_cnt; 		
			$name 				= $wpltf_wdgt_name;			
			$timeto_store 			= $wpltf_wdgt_store_time; 	
			$consumerSecret 	= trim($wpltf_wdgt_consumerSecret);
			$accessToken 		= trim($wpltf_wdgt_accessToken);
			$accessTokenSecret 	= trim($wpltf_wdgt_accessTokenSecret);
			$replies_excl 	= $widget_replies_excl;
			$consumerKey 		= trim($wpltf_wdgt_consumerKey);
			//$dataShowCount 		= ($wpltf_wdgt_dataShowCount != "true") ? "false" : "true";
			$disp_screen_name	= ($wpltf_wdgt_disp_scr_name != "true") ? "false" : "true"; 
			$cache_transient 			= $wpltf_wdgt_timeRef;
			$showAvatar 		= $wpltf_wdgt_showAvatar;
			$transName = 'list-tweets-'.$name; 
			$backupName = $transName . '-backup'; 
			if(false === ($tweets = get_transient($transName) ) ) :
			include 'twitteroauth/twitteroauth.php';

			$api_call = new TwitterOAuth(
				$consumerKey,   		
				$consumerSecret,   
				$accessToken,   	
				$accessTokenSecret
			);
			$totalToFetch = ($replies_excl) ? max(50, $tweets_count * 3) : $tweets_count;
			
			$fetchedTweets = $api_call->get(
				'statuses/user_timeline',
				array(
					'screen_name'     => $name,
					'count'           => $totalToFetch,
					'replies_excl' => $replies_excl
				)
			);
			
			if($api_call->http_code != 200) :
				$tweets = get_option($backupName);

			else :
				$limitToDisplay = min($tweets_count, count($fetchedTweets));
				
				for($i = 0; $i < $limitToDisplay; $i++) :
					$tweet = $fetchedTweets[$i];
			    	$name = $tweet->user->name;
			    	$screen_name = $tweet->user->screen_name;
			    	$permalink = 'http://twitter.com/'. $name .'/status/'. $tweet->id_str;
			    	$tweet_id = $tweet->id_str;
			    	$image = $tweet->user->profile_image_url;
					$text = $this->sanitize_links($tweet);
			    	$time = $tweet->created_at;
			    	$time = date_parse($time);
			    	$uTime = mktime($time['hour'], $time['minute'], $time['second'], $time['month'], $time['day'], $time['year']);
			    	$tweets[] = array(
			    		'text' => $text,
			    		'scr_name'=>$screen_name,
			    		'favourite_count'=>$tweet->favorite_count,
			    		'retweet_count'=>$tweet->retweet_count,
			    		'name' => $name,
			    		'permalink' => $permalink,
			    		'image' => $image,
			    		'time' => $uTime,
			    		'tweet_id' => $tweet_id
			    		);
				endfor;
				set_transient($transName, $tweets, 60 * $timeto_store);
				update_option($backupName, $tweets);
				endif;
			endif;	
			function twitter_time_diff( $from, $to = '' ) {
			    $diff = human_time_diff($from,$to);
			    $replace = array(
			        ' hour' => 'h',
			        ' hours' => 'h',
			        ' day' => 'd',
			        ' days' => 'd',
			        ' minute' => 'm',
			        ' minutes' => 'm',
			        ' second' => 's',
			        ' seconds' => 's',
			    );
			    return strtr($diff,$replace);
			}
			if($tweets) : ?>
			    <?php foreach($tweets as $t) : ?>
			        <li class="tweets_avatar clearfix">
			        	<?php
			        	echo '<div class="tweet_wrap"><div class="wdtf-user-card ltr">';
			        		if ($showAvatar){
			        			
			        			echo '<img ';
			        			echo 'width="50px" height="50px"';
			        			echo 'src="'.$t['image'].'" alt="Tweet Avatar" class="';
			        			echo '"/>';
			        		}
			        	echo '<div class="clear"></div></div>';	
			        	?>
						
			       		<div class="tweet_data">
			        		<?php echo $t['text']; ?>
							<div class="tweet-bottom clearfix">
								<?php
									if(!isset($screen_name)){$screen_name = $name;}
									if($disp_screen_name!='false') {
										echo '<div class="wdtf-screen-name">';
										echo "<a href=\"https://twitter.com/{$screen_name}\" target=\"_blank\" dir=\"ltr\">@{$screen_name}</a></div>";
									}
								?>
								<div class="times">
									<a href="http://www.twitter.com/<?php echo $screen_name; ?>" target="_blank" title="Follow <?php echo $name; ?> on Twitter [Opens new window]">
										<?php
											if($cache_transient == "true"){
												$timeDisplay = twitter_time_diff($t['time'], current_time('timestamp'));
											}else{
												$timeDisplay = human_time_diff($t['time'], current_time('timestamp'));
											}
											$displayAgo = " ago";
											printf(__('%1$s%2$s'), $timeDisplay, $displayAgo);
										?>
									</a>
								</div>
			        		</div>
						</div>
						
			        </li>
			    <?php endforeach; ?>

			<?php else : ?>
			    <li>Waiting for twitter.com...Try reloading the page again </li>
			<?php endif; ?>
			</ul>
			<?php
		}
			echo $after_widget;
		}

}

?>
