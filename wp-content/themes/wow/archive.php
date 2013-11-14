<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Twelve already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
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
<div id="content-wrapper">
	<div id="container">
		

			<?php get_sidebar('blog'); ?>
			
			<div class="summary entry-summary" style="float:right;">
				<h1 itemprop="name" class="product_title entry-title "  >
				<?php
					if ( is_day() ) :
						printf( __( '%s', 'twentytwelve' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( '%s', 'twentytwelve' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'twentytwelve' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( '%s', 'twentytwelve' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'twentytwelve' ) ) . '</span>' );
					else :
						_e( '', 'twentytwelve' );
					endif;
				?>
				</h1>
				<div class="span8 post-content">
						<div class="clearfix meta">
							<p class="serif italic pull-left">Date: <a href="<?php echo get_month_link( get_the_time('Y'), get_the_time('m'));?>"><?php the_time('d M Y');?></a></p>
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
						</div>
						<p><?php the_excerpt(); ?></p>
						<p class="italic serif read-more"><a href="<?php the_permalink();?>">Continue Reading ?</a></p>
					</div>
			</div>
	
	</div>
</div>


<?php get_footer(); ?>