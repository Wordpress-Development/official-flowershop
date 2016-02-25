<?php

/**
 * Widgets area 
 */

if (!function_exists('official_flowershop_widgets_area')) {

	function official_flowershop_widgets_area() {
		

		// Slideshow
		register_sidebar (
			array (
				'name' => 'Slideshow', 
				'description' => '',
				'id' => 'en_widgets_area_slideshow', 
				'before_widget' => '<div id="%1$s" class="en_slideshow_widget">', 
				'after_widget' => '</div></div>', 
				'before_title' => '<h3 class="en_widget_title">', 
				'after_title' => '</h3>', 
			)
		);

		// Showcase
		register_sidebar (
			array (
				'name' => 'Showcase', 
				'description' => '',
				'id' => 'en_widgets_area_showcase', 
				'before_widget' => '<div id="%1$s" class="en_showcase_widget animated growIn" data-id="">', 
				'after_widget' => '</div></div>', 
				'before_title' => '<h3 class="en_widget_title">', 
				'after_title' => '</h3>', 
			)
		);
		
		// Sidebar Left
		register_sidebar (
			array (
				'name' => 'Sidebar Left', 
				'id' => 'en_widgets_area_sidebar_left', 
				'before_widget' => '<div id="%1$s" class="en_sidebar_widget">', 
				'after_widget' => '</div></div>', 
				'before_title' => '<h3 class="en_widget_title">',
				'after_title' => '</h3>', 
			)
		);

		// Sidebar Right
		register_sidebar (
			array (
				'name' => 'Sidebar Right', 
				'id' => 'en_widgets_area_sidebar_right', 
				'before_widget' => '<div id="%1$s" class="en_sidebar_widget">', 
				'after_widget' => '</div></div>', 
				'before_title' => '<h3 class="en_widget_title">',
				'after_title' => '</h3>', 
			)
		);
		
		// Promo
		register_sidebar (
			array (
				'name' => 'Promo',
				'id' => 'en_widgets_area_promo', 
				'before_widget' => '<div id="%1$s" class="en_promo_widget animated fadeInRightShort" data-id="">',
				'after_widget' => '</div></div>', 
				'before_title' => '<h3 class="en_widget_title">', 
				'after_title' => '</h3>', 
			)
		);
		
		// slider
		register_sidebar (
			array (
				'name' => 'Slider',
				'id' => 'en_widgets_area_slider', 
				'before_widget' => '<div id="%1$s" class="en_slider_widget">',
				'after_widget' => '</div></div>', 
				'before_title' => '<h3 class="en_widget_title">', 
				'after_title' => '</h3>', 
			)
		);
		
		// Footer
		register_sidebar (
			array (
				'name' => 'Footer',
				'id' => 'en_widgets_area_footer', 
				'before_widget' => '<div id="%1$s" class="en_footer_widget animated fadeInUpShort" data-id="">',
				'after_widget' => '</div></div>', 
				'before_title' => '<h3 class="en_widget_title">', 
				'after_title' => '</h3>', 
			)
		);


		//
		// Template specific
		//

		// Search
		register_sidebar (
			array (
				'name' => 'Search', 
				'description' => '',
				'id' => 'en_widgets_area_search', 
				'before_widget' => '<div id="%1$s" class="en_search_widget animated fadeInRightShort">', 
				'after_widget' => '</div></div>', 
				'before_title' => '<h3 class="en_widget_title">', 
				'after_title' => '</h3>'
			)
		);

		// Banner
		register_sidebar (
			array (
				'name' => 'Banner', 
				'description' => '',
				'id' => 'en_widgets_area_banner', 
				'before_widget' => '<div id="%1$s" class="en_banner_widget animated fadeInDownShort" data-id="">', 
				'after_widget' => '</div></div>', 
				'before_title' => '<h3 class="en_widget_title">', 
				'after_title' => '</h3>'
			)
		);

		// Products
		register_sidebar (
			array (
				'name' => 'Products', 
				'description' => '',
				'id' => 'en_widgets_area_products', 
				'before_widget' => '<div id="%1$s" class="en_products_widget">', 
				'after_widget' => '</div></div>', 
				'before_title' => '<h3 class="en_widget_title"><span>', 
				'after_title' => '</span></h3>'
			)
		);

		// Categories
		register_sidebar (
			array (
				'name' => 'Categories', 
				'description' => '',
				'id' => 'en_widgets_area_categories', 
				'before_widget' => '<div id="%1$s" class="en_categories_widget">', 
				'after_widget' => '</div></div>', 
				'before_title' => '<h3 class="en_widget_title">', 
				'after_title' => '</h3>'
			)
		);
		
	}

}

add_action('widgets_init', 'official_flowershop_widgets_area');



// Bootstrap row-count for some widgets
if (!function_exists('official_flowershop_widget_count')) {

	function official_flowershop_widget_count($params) {

	    $sidebar_id = $params[0]['id'];
		
		// Showcase
	    if ( $sidebar_id == 'en_widgets_area_showcase' ) {

	        $total_widgets = wp_get_sidebars_widgets();
	        $sidebar_widgets = count($total_widgets[$sidebar_id]);

	        $params[0]['before_widget'] = str_replace('class="', 'class="col-md-' . floor(12 / $sidebar_widgets) . ' ', $params[0]['before_widget']);
	    }

		// Promo
	    if ( $sidebar_id == 'en_widgets_area_promo' ) {

	        $total_widgets = wp_get_sidebars_widgets();
	        $sidebar_widgets = count($total_widgets[$sidebar_id]);

	        $params[0]['before_widget'] = str_replace('class="', 'class="col-md-' . floor(12 / $sidebar_widgets) . ' ', $params[0]['before_widget']);
	    }

		
		// Footer 
		if ( $sidebar_id == 'en_widgets_area_footer' ) {

	        $total_widgets = wp_get_sidebars_widgets();
	        $sidebar_widgets = count($total_widgets[$sidebar_id]);

	        $params[0]['before_widget'] = str_replace('class="', 'class="col-md-' . floor(12 / $sidebar_widgets) . ' ', $params[0]['before_widget']);
	    }

	    //
		// Template specific
		//

		// Banner 
		if ( $sidebar_id == 'en_widgets_area_banner' ) {

	        $total_widgets = wp_get_sidebars_widgets();
	        $sidebar_widgets = count($total_widgets[$sidebar_id]);

	        $params[0]['before_widget'] = str_replace('class="', 'class="col-md-' . floor(12 / $sidebar_widgets) . ' ', $params[0]['before_widget']);
	    }

	    return $params;
	}

}

add_filter('dynamic_sidebar_params','official_flowershop_widget_count');




/**
 * Add data Id for CSS3 animate plugin
 */
if (!function_exists('official_flowershop_Data_ID')) {

	function official_flowershop_Data_ID($params) {

		global $my_widget_num; // Global a counter array

		$this_id = $params[0]['id']; // Get the id for the current sidebar we're processing

		$arr_registered_widgets = wp_get_sidebars_widgets(); // Get an array of ALL registered widgets	

		if(!$my_widget_num) {// If the counter array doesn't exist, create it
			$my_widget_num = array();
		}

		if(!isset($arr_registered_widgets[$this_id]) || !is_array($arr_registered_widgets[$this_id])) { // Check if the current sidebar has no widgets
			return $params; // No widgets in this sidebar... bail early.
		}

		if(isset($my_widget_num[$this_id])) { // See if the counter array has an entry for this sidebar
			$my_widget_num[$this_id] ++;
		} else { // If not, create it starting with 1
			$my_widget_num[$this_id] = 1;
		}

		$data_id = 'data-id="' . $my_widget_num[$this_id] . ''; // Add a widget number class for additional styling options

		/* if($my_widget_num[$this_id] == 1) { // If this is the first widget
			$class .= 'widget-first ';
		} elseif($my_widget_num[$this_id] == count($arr_registered_widgets[$this_id])) { // If this is the last widget
			$class .= 'widget-last ';
		} */

		$params[0]['before_widget'] = str_replace('data-id="', $data_id, $params[0]['before_widget']); // Insert our new classes into "before widget"

		return $params;

	}
}

add_filter('dynamic_sidebar_params','official_flowershop_Data_ID');




// Add opening <div class="inside"> tags to every widget position
// All widgets positions have to have two closing divs </div> at after_widget
if (!function_exists('official_flowershop_check_sidebar_params')) {

	function official_flowershop_check_sidebar_params( $params ) {
	    global $wp_registered_widgets;

	    $settings_getter = $wp_registered_widgets[ $params[0]['widget_id'] ]['callback'][0];
	    $settings = $settings_getter->get_settings();
	    $settings = $settings[ $params[1]['number'] ];

	    if ( $params[0][ 'after_widget' ] == '</div></div>' )
	        $params[0][ 'before_widget' ] .= '<div class="inside">';

	    return $params;
	}
}

add_filter( 'dynamic_sidebar_params', 'official_flowershop_check_sidebar_params' );

