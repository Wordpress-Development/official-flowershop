<?php

/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package official_flowershop
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
			<?php 
			while (have_posts()) {
				the_post();

				get_template_part('content', get_post_format());

				echo "\n\n";
				
				official_flowershop_Pagination();

				echo "\n\n";
				
				// If comments are open or we have at least one comment, load up the comment template
				if (comments_open() || '0' != get_comments_number()) {
					comments_template();
				}

				echo "\n\n";

			} //endwhile;
			?> 
		</main>
	</div>

<?php get_sidebar('right'); ?> 

<?php } ?>

<?php get_footer(); ?> 