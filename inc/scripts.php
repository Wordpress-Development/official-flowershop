<?php
/**
 * Load Javascript code based from parameters in footer
 * 
 * @package official-flowershop
 */



function official_flowershop_scripts_footer() { ?>

	<script type="text/javascript">
        jQuery(document).ready(function() { 
        	
			// initialize default bootstrap tooltips
			jQuery('[data-toggle="tooltip"]').tooltip(); 
	        
	        // Fixed header
			<?php if ( get_theme_mod( 'fixed_header_setting','fixed') == 'fixed' ) : ?>
			jQuery(document).ready(function() {
			  jQuery('#header').scrollToFixed();
			});
			
			jQuery(window).scroll(function(){

                if ( jQuery(this).scrollTop() > jQuery("#topbar").outerHeight() ) {
                     jQuery("#header").addClass("header_fixed");
                     
                } else {
                     jQuery("#header").removeClass("header_fixed");
                }
            });

			<?php endif; ?>


			// Slider with owl carousel
			<?php if ( is_active_sidebar('en_widgets_area_slider') ) : ?>
			jQuery("#slider_inside").owlCarousel( {

					singleItem:true,

					//itemsDesktop : [1200,4], //items between 1200px and 992px
					//itemsDesktopSmall : [992,3], // betweem 992px and 768px
					//itemsTablet: [768,2], //2 items between 600 and 0
					//itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option

					autoPlay:  <?php echo get_theme_mod( 'officialtheme_slider_autoplay','true'); ?>,
					navigation: <?php echo get_theme_mod( 'officialtheme_slider_navigation','false'); ?>,
					pagination: <?php echo get_theme_mod( 'officialtheme_slider_pagination','false'); ?>
			  
			});
			<?php endif; ?>

			// Social Icons JS
			<?php if ( get_theme_mod( 'officialtheme_social_control','true' ) == 'true' ) : ?>
			jQuery(window).scroll(function(){

                if ( jQuery(this).scrollTop() > jQuery("#slideshow").height() ) {
                   jQuery('ul#en_custom_social').addClass('social_visible');
                     
                } else {
                    jQuery('ul#en_custom_social').removeClass('social_visible');
                }
            });
            <?php endif; ?>


			<?php if (get_theme_mod('officialtheme-gotop','true')=='true')  { ?>
				if (jQuery('#official-top-link').length) {
			    var scrollTrigger = 700, // px

			        backToTop = function () {
			            var scrollTop = jQuery(window).scrollTop();
			            if (scrollTop > scrollTrigger) {
			                jQuery('#official-top-link').addClass('top-link-show');
			            } else {
			                jQuery('#official-top-link').removeClass('top-link-show');
			            }
			        };

			    backToTop();

			    jQuery(window).on('scroll', function () {
			        backToTop();
			    });

			    jQuery('#official-top-link').on('click', function (e) {
			        e.preventDefault();
			        jQuery('html,body').animate({
			            scrollTop: 0
			        }, 700);
			    });
			}
			<?php } ?>


    	});
    
    </script>
	
<?php }

add_action('wp_footer','official_flowershop_scripts_footer');
 