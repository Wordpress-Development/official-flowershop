<?php // officialtheme Custom Social Icons

	// path to theme mod
	$officialtheme_social_icon = get_theme_mod( 'officialtheme_social_icon' );
	$officialtheme_social_link = get_theme_mod( 'officialtheme_social_link' );
	
	// theme mods for icons
	$facebook_icon = $officialtheme_social_icon['facebook'];
	$twitter_icon = $officialtheme_social_icon['twitter'];
	$instagram_icon = $officialtheme_social_icon['instagram'];
	$googleplus_icon = $officialtheme_social_icon['googleplus'];
	$youtube_icon = $officialtheme_social_icon['youtube'];
	
	// theme mods for links
	$facebook_link = $officialtheme_social_link['facebook'];
	$twitter_link = $officialtheme_social_link['twitter'];
	$instagram_link = $officialtheme_social_link['instagram'];
	$googleplus_link = $officialtheme_social_link['googleplus'];
	$youtube_link = $officialtheme_social_link['youtube'];
	
	// Store Parameter for displaying or not the Social Icons
	$officialtheme_social_control = get_theme_mod( 'officialtheme_social_control' );

	// If Social Control is set to true, show social Icons, else show nothing
	if( $officialtheme_social_control == 'true' ) : ?>
    	<ul id="en_custom_social" class="<?php if (!is_active_sidebar('en_widgets_area_slideshow')) : echo "social_visible"; else : endif; ?>">
        	<li class="social_icon social_first">
            	<a href="<?php echo $facebook_link; ?>" target="_blank">
					<img 
                    	src="<?php echo $facebook_icon; ?>"
                        alt="<?php echo 'social 1'; ?>"
                        height="32" width="32">
				</a>
            </li>
            <li class="social_icon social_second">
            	<a href="<?php echo $twitter_link; ?>" target="_blank">
					<img 
                    	src="<?php echo $twitter_icon; ?>"
                        alt="<?php echo 'social 2'; ?>"
                        height="32" width="32">
				</a>
            </li>
            <li class="social_icon social_third">
            	<a href="<?php echo $instagram_link; ?>" target="_blank">
					<img 
                    	src="<?php echo $instagram_icon; ?>"
                        alt="<?php echo 'social 3'; ?>"
                        height="32" width="32">
				</a>
            </li>
            <li class="social_icon social_fourth">
            	<a href="<?php echo $googleplus_link; ?>" target="_blank">
					<img 
                    	src="<?php echo $googleplus_icon; ?>"
                        alt="<?php echo 'social 4'; ?>"
                        height="32" width="32">
				</a>
            </li>
            <li class="social_icon social_fifth">
            	<a href="<?php echo $youtube_link; ?>" target="_blank">
					<img 
                    	src="<?php echo $youtube_icon; ?>"
                        alt="<?php echo 'social 5'; ?>"
                        height="32" width="32">
				</a>
            </li>
        </ul>
    
	<?php else: endif;
	
?>