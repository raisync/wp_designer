<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die (esc_html__('Please do not load this page directly. Thanks!','Chameleon'));
	if ( post_password_required() ) { ?>
	<p class="nocomments"><?php esc_html_e('This post is password protected. Enter the password to view comments.','Chameleon') ?></p>
<?php return; } ?>
<?php if ('open' == $post->comment_status) : ?>
<div id="comment-wrap">
	<?php if ( have_comments() ) : ?>
		<h3 id="comments"><?php comments_number(esc_html__('No Comments','Chameleon'), esc_html__('One comment in this topic','Chameleon'), '% '.esc_html__('comments in this topic','Chameleon') );?></h3>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="comment_navigation_top">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'Chameleon' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'Chameleon' ) ); ?></div>
			</div> <!-- .navigation -->
		<?php endif; // check for comment navigation ?>
		<?php if ( ! empty($comments_by_type['comment']) ) : ?>
			<ol class="commentlist">
				<?php wp_list_comments( array('type'=>'comment','callback'=>'et_custom_comments_display') ); ?>
			</ol>
		<?php endif; ?>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="comment_navigation_bottom">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'Chameleon' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'Chameleon' ) ); ?></div>
			</div> <!-- .navigation -->
		<?php endif; // check for comment navigation ?>
		<?php if ( ! empty($comments_by_type['pings']) ) : ?>
			<div id="trackbacks">
				<h3 id="trackbacks-title"><?php esc_html_e('Trackbacks/Pingbacks','Chameleon') ?></h3>
				<ol class="pinglist">
					<?php wp_list_comments('type=pings&callback=et_list_pings'); ?>
				</ol>
			</div>
		<?php endif; ?>
	<?php else : // this is displayed if there are no comments so far ?>
	   <div id="comment-section" class="nocomments">
		  <?php if ('open' == $post->comment_status) : ?>
			 <!-- If comments are open, but there are no comments. -->
		  <?php else : // comments are closed ?>
			 <!-- If comments are closed. -->
				<div id="respond">
					<?php echo 'Comments are disabled for this post';?>
				</div> <!-- end respond div -->
		  <?php endif; ?>
	   </div>
	<?php endif; ?>
	<?php if ('open' == $post->comment_status) : ?>
		<?php comment_form( array('submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="%3$s btn btn-medium" value="%4$s" />', 'label_submit' => esc_attr__( 'SUBMIT', 'Chameleon' ), 'title_reply' => '<span>' . esc_attr__( 'Write Feedback', 'Chameleon' ) . '</span>', 'title_reply_to' => esc_attr__( 'Write Feedback to %s' )) ); ?>
	<?php else: ?>
	<?php endif; // if you delete this the sky will fall on your head ?>
</div>
<?php else : // comments are closed ?>
<?php endif; ?>