<aside id="sidebar">
	<div id="recent-posts-2" class="widget widget_recent_entries mobile_none">		
		<h2 class="widgettitle">Virtual Barrack</h2>		
		<ul>
		<?php  $custom_query = new WP_Query('posts_per_page=6&orderby=post_date&order&DESC');
		
		?>		
		<?php
			
			while ( $custom_query->have_posts()) : $custom_query->the_post();
			
		?>
			<li> <i class="icon-caret-right"></i> <a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></li>
		<?php
		
			endwhile;
			wp_reset_postdata();
		?>
		</ul>
	</div>
	<!--
	<div id="categories-2" class="widget widget_categories">
		<h2 class="widgettitle">Categories</h2>		
		<ul>
			<?php wp_list_categories('show_count=0&title_li=');?>
		</ul>
	</div>
	<div id="archives-2" class="widget widget_archive">
		<h2 class="widgettitle">Archives</h2>		
		<ul>
			<?php wp_get_archives('type=monthly'); ?>
		</ul>
	</div>
	-->
</aside>

