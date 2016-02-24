<?php 

// officialtheme Custom Social Icons 

// included in footer.php


	// If Social Control is set to true, show social Icons, else show nothing
	if ( get_theme_mod( 'officialtheme_social_control' ) == 'true' ) { ?>


    	<ul id="en_custom_social" class="">
    		
    		<?php if ( get_theme_mod( 'officialtheme_social_icon_1_image' ) != '' ) { ?>
        	<li class="social_icon">
            	<a href="<?php echo esc_url (get_theme_mod( 'officialtheme_social_icon_1_link')); ?>" target="_blank">
					<img src="<?php echo esc_url (get_theme_mod( 'officialtheme_social_icon_1_image')); ?>" alt="<?php esc_html_e( 'Social Icon 1','official-flowershop' ); ?>" height="32" width="32">
				</a>
            </li>
            <?php } ?>

            <?php if ( get_theme_mod( 'officialtheme_social_icon_2_image' ) != '' ) { ?>
            <li class="social_icon">
            	<a href="<?php echo esc_url (get_theme_mod( 'officialtheme_social_icon_2_link')); ?>" target="_blank">
					<img src="<?php echo esc_url (get_theme_mod( 'officialtheme_social_icon_2_image')); ?>" alt="<?php esc_html_e( 'Social Icon 2','official-flowershop' ); ?>" height="32" width="32">
				</a>
            </li>
            <?php } ?>

            <?php if ( get_theme_mod( 'officialtheme_social_icon_3_image' ) != '' ) { ?>
            <li class="social_icon">
            	<a href="<?php echo esc_url (get_theme_mod( 'officialtheme_social_icon_3_link')); ?>" target="_blank">
					<img src="<?php echo esc_url (get_theme_mod( 'officialtheme_social_icon_3_image')); ?>" alt="<?php esc_html_e( 'Social Icon 3','official-flowershop' ); ?>" height="32" width="32">
				</a>
            </li>
            <?php } ?>

            <?php if ( get_theme_mod( 'officialtheme_social_icon_4_image' ) != '' ) { ?>
            <li class="social_icon">
            	<a href="<?php echo esc_url (get_theme_mod( 'officialtheme_social_icon_4_link')); ?>" target="_blank">
					<img src="<?php echo esc_url (get_theme_mod( 'officialtheme_social_icon_4_image')); ?>" alt="<?php esc_html_e( 'Social Icon 4','official-flowershop' ); ?>" height="32" width="32">
				</a>
            </li>
            <?php } ?>

            <?php if ( get_theme_mod( 'officialtheme_social_icon_5_image' ) != '' ) { ?>
            <li class="social_icon">
            	<a href="<?php echo esc_url (get_theme_mod( 'officialtheme_social_icon_5_link')); ?>" target="_blank">
					<img src="<?php echo esc_url (get_theme_mod( 'officialtheme_social_icon_5_image')); ?>" alt="<?php esc_html_e( 'Social Icon 5','official-flowershop' ); ?>" height="32" width="32">
				</a>
            </li>
            <?php } ?>

            <?php if ( get_theme_mod( 'officialtheme_social_icon_6_image' ) != '' ) { ?>
            <li class="social_icon">
            	<a href="<?php echo esc_url (get_theme_mod( 'officialtheme_social_icon_6_link')); ?>" target="_blank">
					<img src="<?php echo esc_url (get_theme_mod( 'officialtheme_social_icon_6_image')); ?>"alt="<?php esc_html_e( 'Social Icon 6','official-flowershop' ); ?>" height="32" width="32">
				</a>
            </li>
            <?php } ?>

        </ul>
    
	<?php }
	
?>