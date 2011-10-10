<?php get_header(); ?>
	<div id="main">
	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<?php echo '<div style="float:left;margin-top:26px;margin-right:20px;"><img src="http://www.gravatar.com/avatar/'.md5(get_the_author_email()).'" border="0" alt=""/></div>'; ?>
				<div style="float:left;">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php echo get_post_meta($post->ID, "description", true); ?>"><?php the_title(); ?></a>&nbsp;<g:plusone size="small" href="<?php the_permalink() ?>"/></h2>
				<small>Posted in <?php the_category(', ') ?> on <?php the_time('F jS, Y') ?>  by <?php the_author() ?> &ndash; <?php comments_popup_link('Be the first to comment', '1 Comment', '% Comments'); ?> <?php edit_post_link('Edit', ' | ', ''); ?> </small>
				</div>
				<div class="entry">
					<?php the_content('<span class="more">read more &raquo;</span>') ?>
				</div>

				<?php if(is_single()) {?><p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?></p><?php } ?>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
