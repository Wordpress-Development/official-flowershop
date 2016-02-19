<?php


/**
 *  Customize
 */


function officialtheme_customize ( $wp_customize ) {
	
	
	// Custom Style 
	$wp_customize->add_section( 'officialtheme_color_section' , array(
		'title'       => __( 'Template Style', 'official-flowershop' ),
		'priority'    => 0,
		'description' => sprintf(__('Chose your prefered colors for your website. We reccomend that you change only the Primary Color but feel free if you want to change other color settings as well. <br> <strong>NOTE To see changes please save the settings and check your frontend.</strong>', 'official-flowershop')),

	) );
	
	$wp_customize->add_setting( 'officialtheme_bg_primary' );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,  'officialtheme_bg_primary', array(
		'default'     => '#A0D4A4',
		'transport'   => 'refresh',
		'label'      => __( 'Primary Color', 'official-flowershop' ),
		'section'    => 'officialtheme_color_section',
		'settings'   => 'officialtheme_bg_primary',
	) ) );

	$wp_customize->add_setting( 'officialtheme_bg_secondary' );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,  'officialtheme_bg_secondary', array(
		'default'     => '#474747',
		'transport'   => 'refresh',
		'label'      => __( 'Secondary Color', 'official-flowershop' ),
		'section'    => 'officialtheme_color_section',
		'settings'   => 'officialtheme_bg_secondary',
	) ) );

	$wp_customize->add_setting( 'officialtheme_bg_light' );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,  'officialtheme_bg_light', array(
		'default'     => '#f5f5f5',
		'transport'   => 'refresh',
		'label'      => __( 'Light Color', 'official-flowershop' ),
		'section'    => 'officialtheme_color_section',
		'settings'   => 'officialtheme_bg_light',
	) ) );

	$wp_customize->add_setting( 'officialtheme_bg_body' );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,  'officialtheme_bg_body', array(
		'default'     => '#ffffff',
		'transport'   => 'refresh',
		'label'      => __( 'Body Color', 'official-flowershop' ),
		'section'    => 'officialtheme_color_section',
		'settings'   => 'officialtheme_bg_body',
	) ) );



	/* Logo  */
	$wp_customize->add_section( 'officialtheme_logo_section' , array(
		'title'       => __( 'Logo', 'official-flowershop' ),
		'priority'    => 20,
		'description' => __( 'Upload a logo to replace the default site name and description in the header (if you dont upload one the default settings will be applied)', 'official-flowershop' ),
	) );
	
	$wp_customize->add_setting( 'officialtheme_logo' );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'officialtheme_logo', array(
		'label'    => __( 'Logo', 'official-flowershop' ),
		'section'  => 'officialtheme_logo_section',
		'settings' => 'officialtheme_logo',
	) ) );
	
	
	/* Fixed Header */
	 $wp_customize->add_section(
        'header_fixed_section',
        array(
            'title' => __( 'Fixed Header', 'official-flowershop' ),
            'description' => __( 'Choose weither you want the header (navigation) to be fixed or not', 'official-flowershop' ),
            'priority' => 40,
        )
    );
	
	$wp_customize->add_setting(
		'fixed_header_setting',
		array(
			'default' => 'fixed',
		)
	);
	
	$wp_customize->add_control(
		'fixed_header_setting',
		array(
			'type' => 'radio',
			'label' => __( 'Header Layout', 'official-flowershop' ),
			'section' => 'header_fixed_section',
			'choices' => array(
				'fixed' => __( 'Fixed', 'official-flowershop' ),
				'static' => __( 'Static', 'official-flowershop' ),
			),
		)
	);


	// Hide frontpage content
	 $wp_customize->add_section(
        'envisintheme_hidefrontpage_section',
        array(
            'title' => __( 'Hide Frontpage content', 'official-flowershop' ), '',
            'description' => __( 'Choose weither you want to hide the content of the frontpage or not', 'official-flowershop' ),
            'priority' => 50,
        )
    );
	
	$wp_customize->add_setting(
		'envisintheme_hidefrontpage_setting',
		array(
			'default' => 'no',
		)
	);
	
	$wp_customize->add_control(
		'envisintheme_hidefrontpage_setting',
		array(
			'type' => 'radio',
			'label' => __( 'Frontpage Content', 'official-flowershop' ),
			'section' => 'envisintheme_hidefrontpage_section',
			'choices' => array(
				'yes' => __( 'Yes', 'official-flowershop' ),
				'no' => __( 'No', 'official-flowershop' ),
			),
		)
	);


	/* Go to Top */
	 $wp_customize->add_section(
        'officialtheme-gotop-section',
        array(
            'title' => __( 'Go to Top', 'official-flowershop' ),
            'description' => __( 'Provide a link to offer your users the ability to easily go back to the top of the page', 'official-flowershop' ),
            'priority' => 60,
        )
    );
	
	$wp_customize->add_setting(
		'officialtheme-gotop',
		array(
			'default' => 'true',
		)
	);
	
	$wp_customize->add_control(
		'officialtheme-gotop',
		array(
			'type' => 'radio',
			'label' => __( 'Enabled Go to Top Link?', 'official-flowershop' ),
			'section' => 'officialtheme-gotop-section',
			'choices' => array(
				'true' => __( 'Yes', 'official-flowershop' ),
				'false' => __( 'No', 'official-flowershop' ),
			),
		)
	);
	
	
	/*************************
	 * Social Media & Links
	**************************/
	$wp_customize->add_section( 'officialtheme_social_section', array(
		'title'       => __( 'Social Media Links', 'official-flowershop' ),
		'description' => __( 'Upload your social Icon, and set the URL to redirect your users to your Social Websites', 'official-flowershop' ),
		'priority'    => 30,
	) );
	
	// Radio to display social links or not
	$wp_customize->add_setting('officialtheme_social_control', array(
        'default'        => 'true',
    ));
    $wp_customize->add_control('radio_control', array(
        'label'      => __('Display Social Icons?', 'official-flowershop'),
        'section'    => 'officialtheme_social_section',
        'settings'   => 'officialtheme_social_control',
        'type'       => 'radio',
        'choices'    => array(
            'true' => __('Show Social Icons', 'official-flowershop'),
            'false' => __('Hide Social Icons', 'official-flowershop'),
        ),
    ));
	
	// Array for default ICON settings
	$social_icons_default_settings = array(
			'default' => 'icon.png',
	);
	// Array for default LINK settings
	$social_links_default_settings = array(
			'default' => '#',
	);
	
	// Facebook Settings
	$wp_customize->add_setting('officialtheme_social_icon[facebook]', $social_icons_default_settings);
	$wp_customize->add_setting('officialtheme_social_link[facebook]', $social_links_default_settings);
	// Twitter Settings
	$wp_customize->add_setting('officialtheme_social_icon[twitter]', $social_icons_default_settings);
	$wp_customize->add_setting('officialtheme_social_link[twitter]', $social_links_default_settings);
	// Instagram Settings
	$wp_customize->add_setting('officialtheme_social_icon[instagram]', $social_icons_default_settings);
	$wp_customize->add_setting('officialtheme_social_link[instagram]', $social_links_default_settings);
	// GooglePlus Settings
	$wp_customize->add_setting('officialtheme_social_icon[googleplus]', $social_icons_default_settings);
	$wp_customize->add_setting('officialtheme_social_link[googleplus]', $social_links_default_settings);
	// Youtube Settings
	$wp_customize->add_setting('officialtheme_social_icon[youtube]', $social_icons_default_settings);
	$wp_customize->add_setting('officialtheme_social_link[youtube]', $social_links_default_settings);

	// Facebook Controls
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'facebook_icon', array(
		'label'      => __('First Social Icon', 'official-flowershop'),
		'section'    => 'officialtheme_social_section',
		'settings'   => 'officialtheme_social_icon[facebook]',
	)));
	$wp_customize->add_control('facebook_link', array(
		'label'      => __('First Social Link', 'official-flowershop'),
		'section'    => 'officialtheme_social_section',
		'settings'   => 'officialtheme_social_link[facebook]',
	));
	// Twitter Controls
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'twitter_icon', array(
		'label'      => __('Second Social Icon', 'official-flowershop'),
		'section'    => 'officialtheme_social_section',
		'settings'   => 'officialtheme_social_icon[twitter]',
	)));
	$wp_customize->add_control('twitter_link', array(
		'label'      => __('Second Social Link', 'official-flowershop'),
		'section'    => 'officialtheme_social_section',
		'settings'   => 'officialtheme_social_link[twitter]',
	));
	// Instagram Controls
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'instagram_icon', array(
		'label'      => __('Third Social Icon', 'official-flowershop'),
		'section'    => 'officialtheme_social_section',
		'settings'   => 'officialtheme_social_icon[instagram]',
	)));
	$wp_customize->add_control('instagram_link', array(
		'label'      => __('Third Social Link', 'official-flowershop'),
		'section'    => 'officialtheme_social_section',
		'settings'   => 'officialtheme_social_link[instagram]',
	));
	// GooglePlus Controls
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'googleplus_icon', array(
		'label'      => __('Fourth Social Icon', 'official-flowershop'),
		'section'    => 'officialtheme_social_section',
		'settings'   => 'officialtheme_social_icon[googleplus]',
	)));
	$wp_customize->add_control('googleplus_link', array(
		'label'      => __('Fourth Social Link', 'official-flowershop'),
		'section'    => 'officialtheme_social_section',
		'settings'   => 'officialtheme_social_link[googleplus]',
	));
	// YouTube Controls
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'youtube_icon', array(
		'label'      => __('Fifth Social Icon', 'official-flowershop'),
		'section'    => 'officialtheme_social_section',
		'settings'   => 'officialtheme_social_icon[youtube]',
	)));
	$wp_customize->add_control('youtube_link', array(
		'label'      => __('Fifth Social Link', 'official-flowershop'),
		'section'    => 'officialtheme_social_section',
		'settings'   => 'officialtheme_social_link[youtube]',
	));



	//
	// Template specific
	//

	// slider 
	$wp_customize->add_section( 'officialtheme_slider_section' , array(
		'title'       => __( 'Slider Background', 'official-flowershop' ),
		'priority'    => 50,
		'description' => __( 'Upload your background image to display on the slider section with parallax effect (Remove the background image to display background as color)', 'official-flowershop' ),
	) );
	
	$wp_customize->add_setting( 'officialtheme_slider' );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'officialtheme_slider', array(
		'label'    => __( 'Slider Background Image', 'official-flowershop' ),
		'section'  => 'officialtheme_slider_section',
		'settings' => 'officialtheme_slider',
	) ) );


	$wp_customize->add_setting(
		'officialtheme_slider_parallax',
		array(
			'default' => 'yes',
		)
	);
	
	$wp_customize->add_control(
		'officialtheme_slider_parallax',
		array(
			'type' => 'radio',
			'label' => __( 'Enable Parallax Effect?', 'official-flowershop' ),
			'section' => 'officialtheme_slider_section',
			'choices' => array(
				'yes' => __( 'Yes', 'official-flowershop' ),
				'no' => __( 'No', 'official-flowershop' ), 
			),
		)
	);

	$wp_customize->add_setting(
		'officialtheme_slider_autoplay',
		array(
			'default' =>  'true',
		)
	);
	
	$wp_customize->add_control(
		'officialtheme_slider_autoplay',
		array(
			'type' => 'radio',
			'label' => __( 'Enable Autoplay?', 'official-flowershop' ),
			'section' => 'officialtheme_slider_section',
			'choices' => array(
				'true' => __( 'Yes', 'official-flowershop' ), 
				'false' => __( 'No', 'official-flowershop' ), 
			),
		)
	);

	$wp_customize->add_setting(
		'officialtheme_slider_navigation',
		array(
			'default' => 'true',
		)
	);
	
	$wp_customize->add_control(
		'officialtheme_slider_navigation',
		array(
			'type' => 'radio',
			'label' => __( 'Enable Naivgation (prev/next) ?', 'official-flowershop' ),
			'section' => 'officialtheme_slider_section',
			'choices' => array(
				'true' => __( 'Yes', 'official-flowershop' ), 
				'false' => __( 'No', 'official-flowershop' ), 
			),
		)
	);

	$wp_customize->add_setting(
		'officialtheme_slider_pagination',
		array(
			'default' =>  'true',
		)
	);
	
	$wp_customize->add_control(
		'officialtheme_slider_pagination',
		array(
			'type' => 'radio',
			'label' => __( 'Enable Pagination (bullets)?', 'official-flowershop' ), 
			'section' => 'officialtheme_slider_section',
			'choices' => array(
				'true' => __( 'Yes', 'official-flowershop' ), 
				'false' => __( 'No', 'official-flowershop' ), 
			),
		)
	);

	// Copyright image
	$wp_customize->add_section( 'officialtheme_cards_section' , array(
		'title'       => __( 'Accepted Cards Image', 'official-flowershop' ),
		'priority'    => 60,
		'description' => __( 'Chosse an iamge to display on the footer as your accepted credit cards image', 'official-flowershop' ),
	) );
	
	$wp_customize->add_setting( 'officialtheme_cards' );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'officialtheme_cards', array(
		'label'    => __( 'Accepted Cards Image', 'official-flowershop' ),
		'section'  => 'officialtheme_cards_section',
		'settings' => 'officialtheme_cards',
	) ) );


	// CSS3 Animate it
	$wp_customize->add_section( 'officialtheme_animations_section' , array(
		'title'       => __( 'CSS3 Animations', 'official-flowershop' ),
		'priority'    => 20,
		'description' => __( 'CSS3 animations are used to further increase the beauty in your website by providing some cool  transition effects when page scrolls', 'official-flowershop' ),
	) );

	$wp_customize->add_setting(
		'officialtheme_animations',
		array(
			'default' =>  'true',
		)
	);
	
	$wp_customize->add_control(
		'officialtheme_animations',
		array(
			'type' => 'radio',
			'label' => __('Enable CSS3 Animations ?', 'official-flowershop' ),
			'section' => 'officialtheme_animations_section',
			'choices' => array(
				'true' => __( 'Yes', 'official-flowershop' ), 
				'false' => __( 'No', 'official-flowershop' ), 
			),
		)
	);
	
	// Remove some options from customizer 
	$wp_customize->remove_section('background_image');
	$wp_customize->remove_section('colors');

}

add_action( 'customize_register', 'officialtheme_customize' );





