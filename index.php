<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
 <?php if ( get_theme_mod( 'envisintheme_hidefrontpage_setting' ) == 'no' || is_front_page()==false ) { ?>

 <?php get_sidebar('left'); ?> 
				
	<div class="col-md-<?php echo $main_column_size; ?> content-area" id="main-column">

		<main id="main" class="site-main" role="main">
			<?php if (have_posts()) { ?> 
			<?php 
			// start the loop
			while (have_posts()) {
				the_post();
				
				/* Include the Post-Format-specific template for the content.
				* If you want to override this in a child theme, then include a file
				* called content-___.php (where ___ is the Post Format name) and that will be used instead.
				*/
				get_template_part('content', get_post_format());
			}// end while
			
			official_flowershop_Pagination();
			?> 
			<?php } else { ?> 
			<?php get_template_part('no-results', 'index'); ?>
			<?php } // endif; ?> 
		</main>
	</div>

<?php get_sidebar('right'); ?> 

<?php } ?>

<?php get_footer(); ?> 