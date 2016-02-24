<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package official-flowershop
 */


?>
			
			<?php if ( get_theme_mod( 'envisintheme_hidefrontpage_setting','no' ) == 'no' || is_front_page()==false ) { ?>
	 		</div>
			
		</div>

	</section>
	<?php } ?>

	 <!-- Categories Widget Area-->
    <?php if (is_active_sidebar('en_widgets_area_categories')) : ?>
    <section id="woo_categories">

        <div class="container">

            <hr class="sep"></hr>
            
            <?php dynamic_sidebar('en_widgets_area_categories'); ?>

        </div>    

    </section>
    <?php endif; ?>


	<!-- slider Widget Area-->
	<?php if (is_active_sidebar('en_widgets_area_slider')) : ?>

	<?php if (get_theme_mod('officialtheme_slider_parallax','yes')=='yes' && get_theme_mod( 'officialtheme_slider'))  { ?>	
	<div id="official-slider" class="parallax-window" data-parallax="scroll" data-speed="0.2" data-image-src="<?php echo esc_url( get_theme_mod( 'officialtheme_slider' ) ); ?>">
	
	<?php } else { ?>
	<div id="official-slider" class="no-parallax" style="background-image:url(<?php echo esc_url( get_theme_mod( 'officialtheme_slider' ) ); ?>)">
	<?php } ?>

		 <div class="container">

	 		<div id="slider_inside">
				
				<?php if (dynamic_sidebar('en_widgets_area_slider')) : else : endif; ?>

			</div>	

		</div>	


	</div>
	<?php endif; ?>

				
	<!-- Footer Widget Area-->
	<footer id="footer" class="animatedParent animateOnce" data-sequence="500" data-appear-top-offset="-150">
		
	    <div class="container">

	    	<?php if (!is_active_sidebar('en_widgets_area_slider')) : ?>
	    	<hr class="sep">
	    	<?php endif; ?>
	    	
	    	<?php if (is_active_sidebar('en_widgets_area_footer')) : ?>
	        <div class="row">
		
				<?php if (dynamic_sidebar('en_widgets_area_footer')) : else : endif; ?>
	        
	        </div>

	        <hr class="copyright_sep">
	        <?php endif; ?>

			<div id="copyright">

				<p class="copyright-info">
					<?php echo '&copy'; ?> <?php echo date('Y'); ?> <?php echo get_bloginfo( 'name' ); ?>

					<span class="sep"> | </span>

					<?php printf( esc_html__( 'Designer: %1$s', 'official-flowershop' ), '<a href="http://www.officialtheme.com" target="_blank">OfficialTheme</a>' ); ?>

				</p>


				<?php  if (get_theme_mod( 'officialtheme_cards')!="")  { ?>	
				<p class="copyright-cards">
					<img src="<?php echo esc_url (get_theme_mod( 'officialtheme_cards')); ?>" alt="<?php _e( 'Accepted Cards','official-flowershop' ); ?>" class="img-responsive" />	
				</p>
				<?php } ?>	

			</div>
	
	        
	    </div>    
	    
	</footer>

	<?php if (get_theme_mod('officialtheme-gotop','true')=='true')  { ?>	
	<a href="#" id="official-top-link" title="<?php printf (esc_html__( 'Go to Top', 'official-flowershop')); ?>">&uarr;</a>
	<?php } ?>
	
	<!--wordpress footer-->
	<?php wp_footer(); ?> 

	<?php include (get_template_directory() . '/inc/social_icons.php'); ?>

	</body>
</html>