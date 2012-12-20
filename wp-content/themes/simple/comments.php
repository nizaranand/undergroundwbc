<!-- Check password protection -->
<?php if ( post_password_required() ): ?>  
     <p><?php _e( 'This post is password protected. Enter the password to view and post comments.' , 'mytheme' ); ?></p>  
<?php  
        return;  
      endif;  
?>  
<!-- ENDS Check password protection -->

<!-- comments list -->
<div class="comments-header"><span class="n-comments"><?php comments_number('0', '1', '%') ?></span><span class="text"> Comments</span></div>
<?php if ( $comments ) : ?>
<ol class="comments-list">
	<?php foreach($comments as $comment) :	?>
	<!-- comment -->
	<li id="comment-<?php comment_ID() ?>">
		<div class="comment-wrap">
			<?php if($comment->comment_approved == '0') :?>
				<p class="awaiting-approval">Your comment is awaiting approval</p>
			<?php endif; ?>
			<!-- avatar -->
			<?php echo get_avatar(get_comment_author_email(), '90', $default_avatar); ?>
			 <!-- ENDS avatar -->
			 <div class="comments-right">
			 	<p class="meta-date"><?php comment_date() ?> @ <?php comment_time() ?></p>
			 	<p><strong><?php comment_author_link() ?></strong></p>
			 	<div class="brief"><p><?php comment_text() ?></p></div>
			 	<p class="edit-comment"><?php edit_comment_link('EDIT') ?></p>
			 	<?php // comment_reply_link(); // comming soon	?> 
			 </div>
		</div>
	</li>
	<!-- ENDS comment -->	
	<?php endforeach; ?>
</ol>
<?php else : ?>
	<p class="no-comments">No comments yet</p>
<?php endif; ?>
<!-- ENDS comments list -->
	
	
<!-- comments form -->
<?php if(comments_open() ) : ?>
<?php if(get_option('comment_registration') && !$user_ID) : ?>
		<p class="message">You must be <a href="<?php echo get_option('siteurl') ?>/wp-login.php?redirect_to<?php echo urlencode(get_permalink()) ?>" class="color2">Logged in</a> to post a comment.</p>
	<?php else : ?>
<div class="leave-comment">
	<h3>LEAVE A COMMENT</h3>	
	<!-- form -->
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		<fieldset>
			<?php if($user_ID) : ?>
				<p class="logged-in-as">Logged in as <a href="<?php echo get_option('siteurl') ?>/wp-admin/profile.php"><?php echo $user_identity ?></a>. <a href="<?php echo get_option('siteurl') ?>/wp-login.php?action=logout" title="log out f this account" class="color2" >Log out &raquo</a></p>
			<?php else : ?>
			<p><label for="autor">NAME <?php if($req) echo '*' ?></label>
			<input type="text" name="author" id="author" value="<?php echo $comment_author ?>" tabindex="1" /></p>
			<p><label for="email">EMAIL (Will not be published) <?php if($req) echo '*' ?></label>
			<input type="text" name="email" id="email" value="<?php echo $comment_author_email ?>" tabindex="2" /></p>
			<p><label for="url">WEBSITE</label><input type="text" name="url" id="url" value="<?php echo $comment_author_url ?>" tabindex="3" /></p>
			<?php endif; ?>
			<p><label for="comment">COMMENTS</label>
			<textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>
			<p><input type="submit" name="submit" id="submit" tabindex="5" value="SEND" /></p>
			<p><input type="hidden" name="comment_post_ID" value="<?php echo $id ?>" /></p>
			<?php comment_id_fields(); ?> 
		</fieldset>
	</form>
	<!-- ENDS form -->
</div>
<?php endif; else : ?>	
	<p class="message">The comments are closed.</p>
<?php endif; ?>
<!-- ENDS comments form -->				

