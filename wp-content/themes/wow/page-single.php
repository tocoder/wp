<?php
/*
 Template Name:Signle page
 */
get_header(); ?>

<div id="info-bar">
	<div id="search">
		<div class="pp_search_container" id="pp_search_container_7560" style="  ">
			<div style="display:none" class="chrome_xp"></div>
			<form autocomplete="off" action="" method="get" class="fr_search_widget" id="fr_pp_search_widget_7560">
				<div class="ctr_search">
					<input type="text" id="pp_course_7560" onblur="if (this.value == '') {this.value = 'Search';}" onfocus="if (this.value == 'Search') {this.value = '';}" value="Search" name="rs" class="txt_livesearch">
					<span class="bt_search" id="bt_pp_search_7560"><i class="icon-search"></i></span>
				</div>
				
				<input type="hidden" name="search_in" value="product">
				<input type="hidden" name="search_other" value="product">
			</form>
		</div>
		<div style="clear:both;"></div>
	</div>	
</div>
<div id="content-wrapper">
	<div id="container">

			<?php get_sidebar('blog'); ?>
			<div class="summary entry-summary">
				<?php
				global $post;
				$id = get_post( $post )->ID;
				$page =	get_page($id);
				
				?>
				<h1 itemprop="name" class="product_title entry-title"><?php echo $page->post_title;?></h1>
				
				<div itemprop="description">
					<p><?php  echo $page->post_content;?></p>
				</div>

			<div id="reviews">
			
			</div>
						
		</div>
	</div>
</div>

	


<?php get_footer(); ?>