<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package official-flowershop
 */

  if (is_active_sidebar('en_widgets_area_sidebar_right')) { ?> 
<div class="col-md-3 official-sidebar" id="sidebar-right">

	<?php do_action('en_widgets_area_sidebar_right'); ?> 

	<?php dynamic_sidebar('en_widgets_area_sidebar_right'); ?> 
	
</div>
<?php } ?> 