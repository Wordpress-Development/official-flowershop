<?php
/**
 * Template for displaying a single post
 * 
 * @package official-flowershop
 */

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php official_flowershop_PostOn(); ?> 
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?> 
		<div class="clearfix"></div>
		<?php
		/**
		 * This wp_link_pages option adapt to use bootstrap pagination style.
		 * The other part of this pager is in inc/template-tags.php function name official_flowershop_LinkPagesLink() which is called by wp_link_pages_link filter.
		 */
		wp_link_pages(array(
			'before' => '<div class="page-links">' . __('Pages:', 'official-flowershop') . ' <ul class="pagination">',
			'after'  => '</ul></div>',
			'separator' => ''
		));
		?> 
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list(__(', ', 'official-flowershop'));

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list('', __(', ', 'official-flowershop'));
			
			echo official_flowershop_CategoriesList($category_list);
			if ($tag_list) {
				echo ' ';
				echo official_flowershop_TagsList($tag_list);
			}
			echo ' ';
			printf(__('<span class="glyphicon glyphicon-link"></span> <a href="%1$s" title="Permalink to %2$s" rel="bookmark">permalink</a>.', 'official-flowershop'), get_permalink(), the_title_attribute('echo=0'));
		?> 

		<?php official_flowershop_EditPostLink(); ?> 
	</footer><!-- .entry-meta -->
</article><!-- #post -->