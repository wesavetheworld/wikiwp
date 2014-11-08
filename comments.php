<?php
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if (post_password_required()) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php if (have_comments()) : ?>

	<h2 class="comments-title">
		<?php
			printf(_n('One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'wikiwp'),
				number_format_i18n( get_comments_number() ), get_post()->post_title);
		?>
	</h2>

	<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
	<div id="comment-nav-above" class="navigation comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e('Comment navigation', 'wikiwp'); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( __('&larr; Older Comments', 'wikiwp')); ?></div>
		<div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'wikiwp')); ?></div>
	</div><!-- #comment-nav-above -->
	<?php endif; // Check for comment navigation. ?>

	<ol class="comment-list">
		<?php
			wp_list_comments(array(
				'style'      => 'ol',
				'short_ping' => true,
				'avatar_size'=> 34,
			));
		?>
	</ol><!-- .comment-list -->

	<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
	<div id="comment-nav-below" class="navigation comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e('Comment navigation', 'wikiwp'); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'wikiwp')); ?></div>
		<div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'wikiwp')); ?></div>
	</div><!-- #comment-nav-below -->
	<?php endif; // Check for comment navigation. ?>

	<?php if (false == comments_open()) : ?>
	<p class="no-comments"><?php _e('Comments are closed.', 'wikiwp'); ?></p>
	<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php comment_form(); ?>
	<script type="text/javascript">
		(function() {
			if (window.attachEvent) {
				document.getElementById('comment').attachEvent('onkeyup', u);
			} else {
				document.getElementById('comment').addEventListener('keyup', u);
			}
			function u() {
				this.style.height = '1em';
				this.style.height = this.scrollHeight + 'px';
			}
			u.call(document.getElementById('comment'));
		})();
	</script>
</div><!-- #comments -->
