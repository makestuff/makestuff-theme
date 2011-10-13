<?php
	function divCommentCallback($comment, $args, $depth) {
		$depth++;
		$GLOBALS['comment_depth'] = $depth;
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP); ?>
				<div class="comment" id="comment-<?php comment_ID();?>">
					<div class="comment-head">
						<?php echo get_avatar($comment, $args['avatar_size'], "http://1.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=50");?>

						<div>
							<h3><?php echo get_comment_author_link() ?> says:</h3>
							<a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)) ?>"><?php printf( __('%1$s at %2$s'), get_comment_date(), get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'), '&nbsp;&nbsp;', ''); ?>

						</div>
					</div>
					<div class="comment-main">
<?php comment_text() ?>
						<?php comment_reply_link(array_merge($args, array('add_below' => 'comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>

					</div>
				<?php
	}
?>
			<div class="post-comments">
				<h2 id="comments"><?php comments_number('No Comments', 'One Comment', '% Comments');?></h2>
<?php if ( have_comments() ) : ?>
<?php wp_list_comments("avatar_size=50&style=div&callback=divCommentCallback"); ?>
<?php endif; ?>

<?php
$fields =  array(
	'author' => '<table><tr><td><label for="author">'.__('Name').' (required):</label></td><td><input id="author" class="textbox" name="author" type="text" value="'.esc_attr($commenter['comment_author']).'" size="30"'.$aria_req.'/></td></tr>',
	'email'  => '<tr><td><label for="email">'.__('Email').' (required):</label></td><td><input id="email" class="textbox" name="email" type="text" value="'.esc_attr($commenter['comment_author_email']).'" size="30"'.$aria_req.'/></td></tr>',
	'url'    => '<tr><td><label for="url">'.__('Website').':</label></td><td><input id="url" class="textbox" name="url" type="text" value="'.esc_attr($commenter['comment_author_url']).'" size="30"/></td></tr></table>'
);
comment_form(
	array(
		'comment_notes_before' => '',
		'comment_notes_after' => '',
		'comment_field' => '<p>You may use TWiki syntax in your comment. Your email address will not be published.</p><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>',
		'fields' => $fields
	)
);
?>
			</div>
