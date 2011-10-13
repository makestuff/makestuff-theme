<?php get_header();?>
<div id="main">
	<?php if (have_posts()):?>
		<?php while (have_posts()): the_post();?>
			<?php
				if ( is_page() ) {
					$navTable = "";
					if ( get_post_meta($id, "pagetype", true) == "INTRO" ) {
						$navTable .= "\n<table class=\"pagenav\">\n  <tr>\n";
						$navTable .= "    <td class=\"sel\"><a class=\"sel\">&nbsp;1&nbsp;</a></td>\n";
						$children = get_posts("post_parent=$id&post_type=page&orderby=menu_order&order=ASC&showposts=100");
						$navButtonIndex = 2;
						foreach ( $children as $child ) {
							$navTable .= "    <td><a class=\"lnk\" href=\"".get_page_link($child->ID)."\" title=\"".get_the_title($child)."\">&nbsp;${navButtonIndex}&nbsp;</a></td>\n";
							$navButtonIndex++;
						}
						$navTable .= "  </tr>\n</table>\n";
					} else if ( get_post_meta(get_post($id)->post_parent, "pagetype", true) == "INTRO" ) {
						$navTable .= "\n<table class=\"pagenav\">\n  <tr>\n";
						$pid = get_post($id)->post_parent;
						$navTable .= "    <td><a class=\"lnk\" href=\"".get_page_link($pid)."\" title=\"".get_the_title($pid)." &raquo; Introduction\"\">&nbsp;1&nbsp;</a></td>\n";
						$children = get_posts("post_parent=$pid&post_type=page&orderby=menu_order&order=ASC&showposts=100");
						$navButtonIndex = 2;
						foreach ( $children as $child ) {
							if ( $child->ID == $id ) {
								$navTable .= "    <td class=\"sel\"><a class=\"sel\">&nbsp;${navButtonIndex}&nbsp;</a></td>\n";
							} else {
								$navTable .= "    <td><a class=\"lnk\" href=\"".get_page_link($child->ID)."\" title=\"".get_the_title($child)."\">&nbsp;${navButtonIndex}&nbsp;</a></td>\n";
							}
							$navButtonIndex++;
						}
						$navTable .= "  </tr>\n</table>\n";
					}
					echo $navTable;
				}
			?>
			<div class="post-head">
				<?php if(!is_search()){?><img src="http://www.gravatar.com/avatar/<?php echo md5(get_the_author_email());?>" width="80" height="80" alt=""/><?php }?>
				<div>
					<h1><a href="<?php the_permalink();?>" title="<?php echo get_post_meta($post->ID, "description", true);?>"><?php the_title();?></a></h1>
					<?php if(is_page()):?>
						<p>Page created on <?php the_time('Y-m-d \a\t G:i:s');?> UTC by <?php the_author();?> &ndash; <?php comments_popup_link('No comments', '1 Comment', '% Comments'); edit_post_link('Edit', ' | ', '');?></p>
					<?php else:?>
						<p>Posted in <?php the_category(', ');?> on <?php the_time('Y-m-d \a\t G:i:s');?> by <?php the_author();?> &ndash; <?php comments_popup_link('No comments', '1 Comment', '% Comments'); edit_post_link('Edit', ' | ', '');?></p>
					<?php endif;?>
				</div>
			</div>
			<?php
				if ( !is_search() ) {
					echo "<div class=\"post-main\">";
					the_content();
					if ( !get_post_meta($id, "pagetype", true) ) {
						$projects = get_posts("post_parent=".$id."&post_type=page&orderby=menu_order&order=ASC&showposts=100");
						if ( $projects ) {
							echo "<ul>\n";
							foreach ( $projects as $project ) {
								$description = get_post_meta($project->ID, "description", true);
								if ( $description ) {
									echo "<li><a href=\"".get_page_link($project->ID)."\">".get_the_title($project)."</a>: ".get_post_meta($project->ID, "description", true)."</li>\n";
								} else {
									echo "<li><a href=\"".get_page_link($project->ID)."\">".get_the_title($project)."</a></li>\n";
								}
							}
							echo "</ul>\n";
						}
					}
					echo "</div>";
				}
			?>
			<?php if(is_page()) echo $navTable;?>
			<?php
				if (
					(is_single() || is_page()) &&
					('open' == $post->comment_status || 'open' == $post->ping_status)
				) comments_template();
			?>
		<?php endwhile;?>
		<?php if(!is_single() && !is_page()):?>
			<div class="navigation">
				<div class="alignleft"><?php next_posts_link('&laquo; Older Entries');?></div>
				<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;');?></div>
			</div>
		<?php endif;?>
	<?php else:?>
		<h1>Not Found</h1>
		<div class="post-main">
			<p>Sorry, but you are looking for something that isn't here.</p>
		</div>
	<?php endif;?>
</div>
<?php get_sidebar();?>
<?php get_footer();?>
