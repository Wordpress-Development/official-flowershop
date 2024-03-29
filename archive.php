<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package official-flowershop
 */

get_header(); 

/**
 * determine main column size from actived sidebar
 */
$main_column_size = officialtheme_columns_size_sidebars();

?> 
<?php get_sidebar('left'); ?> 

	
	<div class="col-md-<?php echo $main_column_size; ?> content-area" id="main-column">
					
		<main id="main" class="site-main" role="main">
			
			<?php if (have_posts()) { ?> 
			<header class="page-header">

				<h1 class="page-title">
					<?php
					if (is_category()) :
						single_cat_title();

					elseif (is_tag()) :
						single_tag_title();

					elseif (is_author()) :
						/* Queue the first post, that way we know
						 * what author we're dealing with (if that is the case).
						 */
						the_post();
						printf(__('Author: %s', 'official-flowershop'), '<span class="vcard">' . get_the_author() . '</span>');
						/* Since we called the_post() above, we need to
						 * rewind the loop back to the beginning that way
						 * we can run the loop properly, in full.
						 */
						rewind_posts();

					elseif (is_day()) :
						printf(__('Day: %s', 'official-flowershop'), '<span>' . get_the_date() . '</span>');

					elseif (is_month()) :
						printf(__('Month: %s', 'official-flowershop'), '<span>' . get_the_date('F Y') . '</span>');

					elseif (is_year()) :
						printf(__('Year: %s', 'official-flowershop'), '<span>' . get_the_date('Y') . '</span>');

					elseif (is_tax('post_format', 'post-format-aside')) :
						_e('Asides', 'official-flowershop');

					elseif (is_tax('post_format', 'post-format-image')) :
						_e('Images', 'official-flowershop');

					elseif (is_tax('post_format', 'post-format-video')) :
						_e('Videos', 'official-flowershop');

					elseif (is_tax('post_format', 'post-format-quote')) :
						_e('Quotes', 'official-flowershop');

					elseif (is_tax('post_format', 'post-format-link')) :
						_e('Links', 'official-flowershop');

					else :
						_e('Archives', 'official-flowershop');

					endif;
					?> 
				</h1>
				
				<?php
				// Show an optional term description.
				$term_description = term_description();
				if (!empty($term_description)) {
					printf('<div class="taxonomy-description">%s</div>', $term_description);
				} //endif;
				?>
			</header><!-- .page-header -->
			
			<?php 
			/* Start the Loop */
			while (have_posts()) {
				the_post();

				/* Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part('content', get_post_format());
			} //endwhile; 
			?> 

			<?php official_flowershop_Pagination(); ?> 

			<?php } else { ?> 

			<?php get_template_part('no-results', 'archive'); ?> 

			<?php } //endif; ?> 

		</main>

	</div>

<?php get_sidebar('right'); ?> 

<?php get_footer(); ?> 



