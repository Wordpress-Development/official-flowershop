<?php
/**
 * Template for quote post format
 * 
 * @package bootstrap-basic
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php the_content(official_flowershop_MoreLinkText()); ?> 
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
		<?php if ('post' == get_post_type()) { // Hide category and tag text for pages on Search ?> 
		<div class="entry-meta-category-tag">
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list(__(', ', 'official-flowershop'));
				if (!empty($categories_list)) {
			?> 
			<span class="cat-links">
				<?php echo official_flowershop_CategoriesList($categories_list); ?> 
			</span>
			<?php } // End if categories ?> 

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list('', __(', ', 'official-flowershop'));
				if ($tags_list) {
			?> 
			<span class="tags-links">
				<?php echo official_flowershop_TagsList($tags_list); ?> 
			</span>
			<?php } // End if $tags_list ?> 
		</div><!--.entry-meta-category-tag-->
		<?php } // End if 'post' == get_post_type() ?> 

		<div class="entry-meta-comment-tools">
			<?php if (! post_password_required() && (comments_open() || '0' != get_comments_number())) { ?> 
			<span class="comments-link"><?php official_flowershop_CommentsPopupLink(); ?></span>
			<?php } //endif; ?> 

			<?php official_flowershop_EditPostLink(); ?> 
		</div><!--.entry-meta-comment-tools-->
	</footer><!-- .entry-meta -->
</article><!-- #post -->