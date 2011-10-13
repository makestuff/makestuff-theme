		<div id="side">
            <table>
				<tr>
					<td>|</td>
					<td><a href="<?php bloginfo('url');?>">Home</a></td>
					<td>|</td>
					<td><a href="<?php bloginfo('url');?>?page_id=2">About</a></td>
					<td>|</td>
					<td><?php wp_loginout();?></td>
					<td>|</td>
					<td><?php wp_register("", "");?></td>
					<td>|</td>
				</tr>
			</table>
			<form action="<?php bloginfo('url');?>" method="get">
				<table>
					<tr>
						<td>
							<input class="textbox" type="text" value="<?php the_search_query();?>" name="s" />
						</td>
						<td>
							<input id="search" type="submit" value="Search" />
						</td>
					</tr>
				</table>
			</form>
			<ul>
				<li>Subscribe: <a href="<?php bloginfo('rss2_url');?>" title="Subscribe to pages & postings">Entries</a> | <a href="<?php bloginfo('comments_rss2_url');?>" title="Subscribe to comments">Comments</a></li>
				<li>
					<p>Projects</p>
					<ul>
						<?php
							$metaprojects = get_posts("post_parent=0&post_type=page&orderby=menu_order&order=ASC&exclude=2");
							foreach ( $metaprojects as $metaproject ) {
								echo "<li><a href=\"".get_page_link($metaproject->ID)."\">".get_the_title($metaproject)."</a>\n";
								$projects = get_posts("post_parent=".$metaproject->ID."&post_type=page&orderby=menu_order&order=ASC&numberposts=100");
								if ( $projects ) {
									echo "<ul>\n";
									foreach ( $projects as $project ) {
										$description = get_post_meta($project->ID, "description", true);
										if ( $description ) {
											echo "<li><a href=\"".get_page_link($project->ID)."\" title=\"$description\">".get_the_title($project)."</a></li>\n";
										} else {
											echo "<li><a href=\"".get_page_link($project->ID)."\">".get_the_title($project)."</a></li>\n";
										}
									}
									echo "</ul>\n";
								}
								echo "</li>\n";
							}
						?>
					</ul>
				</li>

				<?php wp_list_categories('title_li=<p>Blog Categories</p>'); ?>

				<?php
					echo "<li>\n";
					echo "<p>Blog</p>\n";
					echo "<ul class='archives'>\n";
					echo "<li class='cat-item'><a href='/wordpress'>Recent</a></li>\n";
					echo preg_replace('/ title=\'(.*?)\'/','', wp_get_archives('type=yearly&echo=0'));
					echo "</ul>\n";
					echo "</li>\n";
					if ( is_home() || is_page() || is_single() ) {
						echo "<li>\n";
						$recentPosts = new WP_Query();
						$recentPosts->query('posts_per_page=10');
						echo "<p>Recent Posts</p>\n";
						if ( $recentPosts->have_posts() ) {
							echo "<ul>\n";
							while ( $recentPosts->have_posts() ) {
								$recentPosts->the_post();
								echo "<li class='linkcat'><a href='".get_permalink()."' title=\"".get_post_meta($post->ID, "description", true)."\">".get_the_title()."</a></li>\n";
							}
							echo "</ul>\n";
						}
						echo "</li>\n";
					} else if ( is_year() || is_category() ) {
						echo "<li>\n";
						$recentPosts = new WP_Query();
						$recentPosts->query($GLOBALS['query_string']."&posts_per_page=-1");
						if ( is_year() ) {
							echo "<p>Posts From ".get_the_time('Y')."</p>\n";
						} else if ( is_category() ) {
							echo "<p>Posts About ".single_cat_title("",false)."</p>\n";
						}
						if ( $recentPosts->have_posts() ) {
							echo "<ul>\n";
							while ( $recentPosts->have_posts() ) {
								$recentPosts->the_post();
								echo "<li class='linkcat'><a href='".get_permalink()."' title=\"".get_post_meta($post->ID, "description", true)."\">".get_the_title()."</a></li>\n";
							}
							echo "</ul>\n";
						}
						echo "</li>\n";
					}
				?>

				<li>
					<p>Suppliers</p>
					<ul>
						<li><a href="http://www.rapidonline.com" title="Good place to buy larger quantities of electronic stuff. Cheap products but expensive delivery.">Rapid Electronics</a></li>
						<li><a href="http://uk.farnell.com" title="Good place for ordering small quantities of electronic stuff. Low prices and cheap delivery.">Farnell</a></li>
						<li><a href="http://www.digikey.co.uk" title="For electronic stuff you cannot get elsewhere. Expensive all-round, but good selection (ships by UPS from USA to UK).">DigiKey</a></li>
						<li><a href="http://www.megauk.com" title="Everything you need to make your own printed circuit boards.">Mega Electronics</a></li>
					</ul>
				</li>
			</ul>
		</div>
