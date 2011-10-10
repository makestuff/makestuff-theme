<?php get_header(); ?>
		<div id="main">
			<div class="post-head">
<?php while (have_posts()) : the_post(); ?>
<?php echo '				<img src="http://www.gravatar.com/avatar/'.md5(get_the_author_email()).'" alt=""/>'."\n"; ?>
				<div>
					<h1><a href="<?php the_permalink() ?>" title="<?php echo get_post_meta($post->ID, "description", true); ?>"><?php the_title(); ?></a></h1>
					<p>Posted in <?php the_category(', ') ?> on <?php the_time('F jS, Y') ?> by <?php the_author() ?> &ndash; <?php comments_popup_link('No comments', '1 Comment', '% Comments'); edit_post_link('Edit', ' | ', ''); ?></p>
				</div>
			</div>
			<div class="post-main">
<?php the_content(); ?>
			</div>
<?php comments_template(); ?>
<?php endwhile; ?>
		</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
