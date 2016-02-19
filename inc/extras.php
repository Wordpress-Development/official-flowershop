<?php
/**
 * Hook functions that replaced core features.
 * 
 * @package official-flowershop
 */


if (!function_exists('official_flowershop_CommentReplyLinkClass')) {
	/**
	 * modify comment reply link by adding bootstrap button class.
	 * 
	 * @todo Change comment link class modification to use WordPress hook action/filter when it's available.
	 * @param string $class
	 * @return string
	 */
	function official_flowershop_CommentReplyLinkClass($class) 
	{
		$class = str_replace("class='comment-reply-link", "class='comment-reply-link btn btn-default btn-sm", $class);
		$class = str_replace("class=\"comment-reply-login", "class=\"comment-reply-login btn btn-default btn-sm", $class);

		return $class;
	}// official_flowershop_CommentReplyLinkClass
}
add_filter('comment_reply_link', 'official_flowershop_CommentReplyLinkClass');


if (!function_exists('official_flowershop_ExcerptMore')) {
	function official_flowershop_ExcerptMore($more) 
	{
		return ' &hellip;';
	}// official_flowershop_ExcerptMore
}
add_filter('excerpt_more', 'official_flowershop_ExcerptMore');


if (!function_exists('official_flowershop_ImageSendToEditor')) {
	/**
	 * remove rel attachment that is not valid html element
	 * @param string $html
	 * @param integer $id
	 * @return string
	 */
	function official_flowershop_ImageSendToEditor($html, $id) 
	{
		if ($id > 0) {
			$html = str_replace('rel="attachment wp-att-'.$id.'"', '', $html);
		}

		return $html;
	}// official_flowershop_ImageSendToEditor
}
add_filter('image_send_to_editor', 'official_flowershop_ImageSendToEditor', 10, 2);


if (!function_exists('official_flowershop_LinkPagesLink')) {
	/**
	 * replace pagination in posts/pages content to support bootstrap pagination class.
	 * 
	 * @param string $link
	 * @param integer $i
	 * @return string
	 */
	function official_flowershop_LinkPagesLink($link, $i) 
	{
		if (strpos($link, '<a') === false) {
			return '<li class="active"><a href="#">' . $link . '</a></li>';
		} else {
			return '<li>' . $link . '</li>';
		}
	}// official_flowershop_LinkPagesLink
}
add_filter('wp_link_pages_link', 'official_flowershop_LinkPagesLink', 10, 2);




if (!function_exists('official_flowershop_WpTitle')) {
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 * 
	 * copy from underscore theme.
	 */
	function official_flowershop_WpTitle($title, $sep) 
	{
		global $page, $paged;

		if (is_feed()) {
			return $title;
		}

		// Add the blog name
		$title .= get_bloginfo('name');

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo('description', 'display');
		if ($site_description && (is_home() || is_front_page())) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ($paged >= 2 || $page >= 2) {
			$title .= " $sep " . sprintf(__('Page %s', 'official-flowershop'), max($paged, $page));
		}

		return $title;
	}// official_flowershop_WpTitle
}
add_filter('wp_title', 'official_flowershop_WpTitle', 10, 2);

