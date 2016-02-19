<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package official-flowershop
 */

if (is_active_sidebar('en_widgets_area_sidebar_left')) { ?> 
<div class="col-md-3 official-sidebar" id="sidebar-left">

	<?php do_action('en_widgets_area_sidebar_left'); ?> 
	
	<?php dynamic_sidebar('en_widgets_area_sidebar_left'); ?> 

</div>
<?php } ?> 