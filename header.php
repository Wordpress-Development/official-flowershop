<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package official-flowershop
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

	<body <?php body_class(); ?> >

		<!--[if lt IE 8]>
			<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
		<![endif]-->
	
		<?php do_action('before'); ?> 

        <a class="screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'official-flowershop' ); ?></a>

		<section id="topbar">

			<div class="container">

				<?php wp_nav_menu( array( 
					'theme_location' => 'top-menu',
					'container' => false, 
					'menu_class' => 'nav nav-pills navbar-right'

				)); ?>

			</div>

		</section>


		<header id="header" class="<?php if (!is_active_sidebar('en_widgets_area_slideshow')) : echo "header-noslideshow"; else : endif; ?> <?php if (!is_active_sidebar('en_widgets_area_slideshow') && !is_active_sidebar('en_widgets_area_showcase')) : echo "header-styled"; else : endif; ?>">
        
        <nav class="navbar navbar-default">
        
            <div class="<?php if ( get_theme_mod( 'fixed_header_setting','fixed' ) == 'fixed' ) : echo "container"; else : echo "container"; endif; ?>">
            
                <!-- Logo and MenuToggle Button -->
                <div class="navbar-header">
                
                   <!-- Logo or site Branding -->
                    <?php if ( get_theme_mod( 'officialtheme_logo' ) ) : ?>
                    <div class='site-logo'>
                        <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'officialtheme_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
                    </div>
                    <?php else : ?>
            
                    <div class="site-branding">
                        
                            <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
        
                            <?php $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) : ?>
                                <p class="site-description"><?php echo $description; ?></p>
                            <?php endif;
                        ?>
                    </div><!-- .site-branding -->
              
                    <?php endif; ?>
                </div>
                
                 <!-- Menu Toggle Button -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only"><?php _e( 'Toggle Navigation','official-flowershop' ); ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <!-- MainMenu Navigation -->
                <?php if ( has_nav_menu( 'primary' ) ) : ?>
                <nav id="navbar" class="navbar-collapse collapse" role="navigation">
          
                    <?php
                        // Primary navigation menu.
                        wp_nav_menu( array(
                            'menu'              => 'primary',
                            'theme_location'    => 'primary',
                            'depth'             => 2,
                            'container'         => 'div',
                            'container_class'   => '',
                            'container_id'      => 'mainmenu_inside',
                            'menu_class'        => 'nav navbar-nav navbar-right',
                            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                             'walker'            => new wp_bootstrap_navwalker())


                        );
                    ?>

                </nav><!-- .MainMenu Navigation -->
                <?php endif; ?>                
                
                
            </div>
            
        </nav> <!-- .Bootstrap 3 Navigation -->
        
    </header> <!-- .site-header -->

    <div class="fakebox <?php if (!is_active_sidebar('en_widgets_area_slideshow') && !is_active_sidebar('en_widgets_area_showcase')) : echo "header-styled"; else : endif; ?>"></div>

	<!-- SlideShow Widget Area-->
	<?php if (is_active_sidebar('en_widgets_area_slideshow')) : ?>
	<section id="slideshow">
        
    	<?php dynamic_sidebar('en_widgets_area_slideshow'); ?>

	</section>
	<?php endif; ?>

     <!-- Showcase Widget Area-->
    <?php if (is_active_sidebar('en_widgets_area_showcase')) : ?>
    <section id="showcase" class="animatedParent animateOnce" data-sequence="500" data-appear-top-offset="-150">

        <div class="container">

            <div class="row">
                <?php dynamic_sidebar('en_widgets_area_showcase'); ?>
            </div>  

        </div>    

    </section>
    <?php endif; ?>


    <!-- Search Widget Area-->
    <?php if (is_active_sidebar('en_widgets_area_search')) : ?>
    <section id="search" class="animatedParent animateOnce" data-appear-top-offset="-150">

        <div class="container">

            <div id="search_inside">

                <?php dynamic_sidebar('en_widgets_area_search'); ?>

            </div>

        </div>

    </section>
    <?php endif; ?>

    <!-- Banners Widget Area-->
    <?php if (is_active_sidebar('en_widgets_area_banner')) : ?>
    <section id="banner" class="animatedParent animateOnce" data-sequence="500" data-appear-top-offset="-150">

        <div class="container">

            <div class="row">
                <?php dynamic_sidebar('en_widgets_area_banner'); ?>
            </div>  

        </div>    

    </section>
    <?php endif; ?>

	<!-- Promo Widget Area-->
	<?php if (is_active_sidebar('en_widgets_area_promo')) : ?>
    <section id="promo" class="animatedParent animateOnce" data-sequence="500" data-appear-top-offset="-150">

    	<div class="container">

            <hr class="sep">

            <div class="row">
            	<?php dynamic_sidebar('en_widgets_area_promo'); ?>
            </div>  

        </div>    

    </section>
	<?php endif; ?>


      <!-- Products Widget Area-->
    <?php if (is_active_sidebar('en_widgets_area_products')) : ?>
    <section id="woo-products">

        <div class="container">
            <?php dynamic_sidebar('en_widgets_area_products'); ?>
        </div>    

    </section>
    <?php endif; ?>


    <?php if ( get_theme_mod( 'envisintheme_hidefrontpage_setting','no' ) == 'no' || is_front_page()==false ) { ?>
	<section id="content_outter" class="site-content">

		<div class="container">

        <?php if (is_active_sidebar('en_widgets_area_promo')) : ?>    
        <hr class="content_sep">
        <?php endif; ?>

            <div class="row">
    <?php } ?>            


