<?php
/*-----------------------------------------------------------------------------------*/
/*  Begin processing our comments
/*-----------------------------------------------------------------------------------*/
?>

<!-- BEGIN #comments -->
<div id="comments">

<?php 
    /* Password protected? ----------------------------------------------------------*/
    if ( post_password_required() ) : 
?>
    	<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'zoomarts' ); ?></p>
        </div><!-- #comments -->
<?php
	/* Stop processing comments.php, but don't kill the script entirely -------------*/
		return;
	endif;

/*-----------------------------------------------------------------------------------*/
/*	Display the Comments & Pings
/*-----------------------------------------------------------------------------------*/

	if ( have_comments() ) :
	    
	    echo '<div class="entry-icon"></div>';
	    
        /* Display Comments ---------------------------------------------------------*/    
        if ( ! empty($comments_by_type['comment']) ) : // if there are normal comments ?>
	
	        <h3 class="comments-title">
	            <?php comments_number(__('0 Comments', 'zoomarts'), __('1 Comment', 'zoomarts'), __('% Comments', 'zoomarts')); ?>
	        </h3>
	
        	<ol class="commentlist">
            	<?php wp_list_comments( 'type=comment&callback=za_comment' ); ?>
            </ol>

        <?php endif; // end normal comments 
        
        /* Display Pings -------------------------------------------------------------*/
        if ( ! empty($comments_by_type['pings']) ) : // if there are pings ?>
		
    		<h3 class="pings-title"><?php _e('Trackbacks for this post', 'zoomarts') ?></h3>
		
    		<ol class="pinglist">
            	<?php wp_list_comments( 'type=pings&callback=zoomarts_list_pings' ); ?>
            </ol>

        <?php endif; // end pings 
		
		/* Display Comment Navigation -----------------------------------------------*/
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    		<div class="comment-navigation">
    			<div class="nav-previous"><?php previous_comments_link(); ?></div>
    			<div class="nav-next"><?php next_comments_link(); ?></div>
    		</div>
		<?php endif; // end comment pagination check
		
		
/*-----------------------------------------------------------------------------------*/
/*	Deal with no comments or closed comments
/*-----------------------------------------------------------------------------------*/
	elseif ( ! comments_open() && have_comments() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		
		<p class="nocomments"><?php _e('Comments are closed.', 'zoomarts') ?></p>
		
	<?php endif;

/*-----------------------------------------------------------------------------------*/
/*	Comment Form
/*-----------------------------------------------------------------------------------*/

	if ( comments_open() ) : ?>
        <!-- BEGIN #respond -->
    	<div class="respond">
	    	<?php 

				$commenter = wp_get_current_commenter();
				$req = get_option( 'require_name_email' );
				$aria_req = ( $req ? " aria-required='true'" : '' );

	    	    $fields = array(
                    'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
                    'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'zoomarts' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
                    'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out &raquo;</a>', 'zoomarts' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
					'comment_notes_before' => '',
                    'comment_notes_after' => '',
                    'title_reply' => __('Leave a Reply', 'zoomarts'),
                    'title_reply_to' => __('Leave a Reply to %s', 'zoomarts'),
                    'cancel_reply_link' => __('Cancel Reply', 'zoomarts'),
                    'label_submit' => __('Post Comment', 'zoomarts'),
					'comment_field' => '<p class="comment-form-comment"><label for="comment">' .  __( 'Comment', 'zoomarts' ) . ' <span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="7" aria-required="true"></textarea></p>',
					
					'fields' => apply_filters( 'comment_form_default_fields', array(
						
						'author' =>' <p class="comment-form-author">' .
						'<label for="author">' . __( 'Name', 'domainreference' ) .
						( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
						'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
						'" size="40"' . $aria_req . ' /></p>',
						
						'email' => '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) .
						( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
						'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
						'" size="40"' . $aria_req . ' /></p>',
						
						'url' => '<p class="comment-form-url"><label for="url">' .
						__( 'Website', 'domainreference' ) . '</label>' .
						'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
						'" size="40" /></p>'
					))
					
					
	    	    );
	    		    	
	    	    comment_form($fields); ?>

    	<!-- END #respond -->    
    	</div>

	<?php endif; // end if comments open check ?>
	
<!-- END #comments -->
</div>