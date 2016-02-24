<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package official-flowershop
 */


<?php get_header(); ?> 

	<div class="col-md-12 content-area" id="main-column">
		
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">

				<header class="page-header">
					<h1 class="page-title"><?php _e('Oops! That page can&rsquo;t be found.', 'official-flowershop'); ?></h1>
				</header><!-- .page-header -->


				<div class="page-content">
					<p><?php _e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'official-flowershop'); ?></p>

					<!--search form-->
					<form class="" method="get" action="<?php echo esc_url(home_url('/')); ?>" role="form">



						 <div class="form-group">
						    <label for="s" style="display: none"><?php echo esc_attr_x('Search &hellip;', 'placeholder', 'official-flowershop'); ?></label>
						  <input type="text" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'official-flowershop'); ?>" title="<?php echo esc_attr_x('Search &hellip;', 'label', 'official-flowershop'); ?>" class="form-control" />
						  </div>
							  
					  <button type="submit" class="btn btn-default"><?php _e('Search', 'official-flowershop'); ?></button>


					</form>

					<hr>
					 <p>
						<a class="btn btn-en" href="<?php echo home_url(); ?>">
						<i class="fa fa-home"></i> <?php _e( 'Return Home', 'official-flowershop' ); ?>
						</a>
					</p>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</main>
	</div>

<?php get_footer(); ?> 