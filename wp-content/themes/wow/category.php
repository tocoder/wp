<?php
/**
 * The template for displaying Category pages.
 *
 * Used to display archive-type pages for posts in a category.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
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
<div id="content-wrapper" >
	<div id="container">


			<?php get_sidebar('blog'); ?>
			
			<div class="summary entry-summary" style="float:right;">
				<h1 class="archive-title"><?php printf( __( '%s', 'twentytwelve' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>

						<?php	
							$category_name=single_cat_title( '', false );
							$wp_query = new WP_Query();
							$page = get_option("posts_per_page");
							$wp_query->query('category_name='.$category_name.'&posts_per_page='.$page.'&paged='.$paged);
							
							while ( have_posts() ) : the_post(); 
						?>
						
						
						<div class="post box-container row-fluid blog-2">
						<a class="overlay" href="<?php the_permalink();?>">
							<span class="more"></span>
							<?php
							if( has_post_thumbnail() ) { 
								the_post_thumbnail(get_the_ID());
							}
							?>
						</a>
						<div class="span8 post-content">
							<div class="clearfix meta">
								<p class="serif italic pull-left">Date: <a href="<?php echo get_day_link( get_the_time('Y'), get_the_time('m'),get_the_time('d'));?>"><?php the_time('d M Y');?></a></p>
								<p class="serif italic pull-right"> <i class="icon-comment"></i> <a><?php echo wp_count_comments($post->ID)->total_comments; ?> Comments</a></p>
							</div>
							<h2 class="post-title clr"><?php the_title();?></h2>
							<div class="author">
								<p class="serif italic">Posted by: <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php the_author(); ?></a><?php if ( count( get_the_category() ) ) : ?>
									<?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'twentyten' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
									 
									<?php endif; ?>
									<?php
										$tags_list = get_the_tag_list( '', ', ' );
										if ( $tags_list ):
									?>
										 
										<?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'twentyten' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
										 
									<?php endif; ?></p>
							</div>							<p><?php the_excerpt(); ?></p>
							<p class="italic serif read-more"><a href="<?php the_permalink();?>">Continue Reading ?</a></p>
						</div>
					</div>
						
						
						
					<?php endwhile;?>
		</div>
	</div>
</div>

<?php get_footer(); ?>