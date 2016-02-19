<?php
/**
 * For store widget hook action/filter.
 * 
 * @package official-flowershop
 */


if (!function_exists('official_flowershop_WidgetHooksGetCalendar')) {
	/**
	 * change WordPress calendar widget table to add bootstrap class into it.
	 * 
	 * @todo change code in this function when WordPress allowed to hook into that widget.
	 * @param string $calendar
	 * @return string
	 */
	function official_flowershop_WidgetHooksGetCalendar($calendar) 
	{
		$new_calendar = preg_replace('#(<table*\s)(id="wp-calendar")#i', '$1 id="wp-calendar" class="table"', $calendar);

		return $new_calendar;
	}// official_flowershop_WidgetHooksGetCalendar
}
add_filter('get_calendar', 'official_flowershop_WidgetHooksGetCalendar', 10, 1);

