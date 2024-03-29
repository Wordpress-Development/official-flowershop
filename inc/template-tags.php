<?php
/**
 * Custom template tags for this theme
 * 
 * @package official-flowershop
 */


if (!function_exists('official_flowershop_CategoriesList')) {
	/**
	 * Display categories list with bootstrap icon
	 * 
	 * @param string $categories_list list of categories.
	 * @return string
	 */
	function official_flowershop_CategoriesList($categories_list = '') 
	{
		return sprintf('<span class="categories-icon glyphicon glyphicon-th-list" title="' . __('Posted in', 'official-flowershop') . '"></span> %1$s', $categories_list);
	}// official_flowershop_CategoriesList
}


if (!function_exists('official_flowershop_Comment')) {
	/**
	 * Displaying a comment
	 * 
	 * @param object $comment
	 * @param array $args
	 * @param integer $depth
	 * @return string the content already echo.
	 */
	function official_flowershop_Comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;

		if ('pingback' == $comment->comment_type || 'trackback' == $comment->comment_type) { 
			echo '<li id="comment-';
				comment_ID();
				echo '" ';
				comment_class('comment-type-pt');
			echo '>';
			echo '<div class="comment-body media">';
				echo '<div class="media-body">';
					_e('Pingback:', 'official-flowershop');
					comment_author_link(); 
					edit_comment_link(__('Edit', 'official-flowershop'), '<span class="edit-link">', '</span>');
				echo '</div>';
			echo '</div>';
		} else {
			echo '<li id="comment-';
				comment_ID();
				echo '" ';
				comment_class(empty($args['has_children']) ? '' : 'parent media');
			echo '>';

			echo '<article id="div-comment-';
				comment_ID();
			echo '" class="comment-body media">';

				// footer
				echo '<footer class="comment-meta pull-left">';
					if (0 != $args['avatar_size']) {
						echo get_avatar($comment, $args['avatar_size']);
					}
				echo '</footer><!-- .comment-meta -->';
				// end footer

				// comment content
				echo '<div class="comment-content media-body">';
					echo '<div class="comment-author vcard">';
						echo '<div class="comment-metadata">';

						// date-time
						echo '<a href="';
							echo esc_url(get_comment_link($comment->comment_ID));
						echo '">';
						echo '<time datetime="';
							comment_time('c');
						echo '">';
						printf(_x('%1$s at %2$s', '1: date, 2: time', 'official-flowershop'), get_comment_date(), get_comment_time());
						echo '</time>';
						echo '</a>';
						// end date-time

						echo ' ';

						edit_comment_link('<span class="fa fa-pencil-square-o "></span>' . __('Edit', 'official-flowershop'), '<span class="edit-link">', '</span>');

						echo '</div><!-- .comment-metadata -->';

						// if comment was not approved
						if ('0' == $comment->comment_approved) {
							echo '<div class="comment-awaiting-moderation text-warning"> <span class="glyphicon glyphicon-info-sign"></span> ';
								_e('Your comment is awaiting moderation.', 'official-flowershop');
							echo '</div>';
						} //endif;

						// comment author says
						printf(__('%s <span class="says">says:</span>', 'official-flowershop'), sprintf('<cite class="fn">%s</cite>', get_comment_author_link()));
					echo '</div><!-- .comment-author -->';

					// comment content body
					comment_text();
					// end comment content body

					// reply link
					comment_reply_link(array_merge($args, array(
						'add_below' => 'div-comment',
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
						'reply_text' => '<span class="fa fa-reply"></span> ' . __('Reply', 'official-flowershop'),
						'login_text' => '<span class="fa fa-reply"></span> ' . __('Log in to Reply', 'official-flowershop')
					)));
					// end reply link
				echo '</div><!-- .comment-content -->';
				// end comment content



			echo '</article><!-- .comment-body -->';
		} //endif;
	}// official_flowershop_Comment
}


if (!function_exists('official_flowershop_CommentsPopupLink')) {
	/**
	 * Custom comment popup link
	 * 
	 * @return string
	 */
	function official_flowershop_CommentsPopupLink() 
	{
		$comment_icon = '<span class="comment-icon glyphicon glyphicon-comment"><small class="comment-total">%d</small></span>';
		$comments_icon = '<span class="comment-icon glyphicon glyphicon-comment"><small class="comment-total">%s</small></span>';
		return comments_popup_link(sprintf($comment_icon, ''), sprintf($comment_icon, '1'), sprintf($comments_icon, '%'), 'btn btn-default btn-xs');
	}// official_flowershop_CommentsPopupLink
}


if (!function_exists('official_flowershop_EditPostLink')) {
	/**
	 * Display edit post link
	 */
	function official_flowershop_EditPostLink() 
	{
		$edit_post_link = get_edit_post_link();
		$edit_btn = '<a class="post-edit-link btn btn-default btn-xs" href="'.$edit_post_link.'" title="' . __('Edit', 'official-flowershop') . '"><i class="edit-post-icon glyphicon glyphicon-pencil" title="' . __('Edit', 'official-flowershop') . '"></i></a>';
		unset($edit_post_link);
		

		if ( current_user_can( 'edit_posts' ) ) { 
			echo $edit_btn;
		}

	}// official_flowershop_EditPostLink
}


if (!function_exists('official_flowershop_FullPageSearchForm')) {
	/**
	 * Display full page search form
	 * 
	 * @return string the search form element
	 */
	function official_flowershop_FullPageSearchForm() 
	{
		$output = '<form class="form-horizontal" method="get" action="' . esc_url(home_url('/')) . '" role="form">';
		$output .= '<div class="form-group">';
		$output .= '<div class="col-xs-10">';
		$output .= '<input type="text" name="s" value="' . esc_attr(get_search_query()) . '" placeholder="' . esc_attr_x('Search &hellip;', 'placeholder', 'official-flowershop') . '" title="' . esc_attr_x('Search &hellip;', 'label', 'official-flowershop') . '" class="form-control" />';
		$output .= '</div>';
		$output .= '<div class="col-xs-2">';
		$output .= '<button type="submit" class="btn btn-default">' . __('Search', 'official-flowershop') . '</button>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</form>';

		return $output;
	}// official_flowershop_FullPageSearchForm
}


if (!function_exists('official_flowershop_GetLinkInContent')) {
	/**
	 * get the link in content
	 * 
	 * @return string
	 */
	function official_flowershop_GetLinkInContent() 
	{
		$content = get_the_content();
		$has_url = get_url_in_content($content);

		if ($has_url) {
			return $has_url;
		} else {
			return apply_filters('the_permalink', get_permalink());
		}
	}// official_flowershop_GetLinkInContent
}


if (!function_exists('official_flowershop_MoreLinkText')) {
	/**
	 * Custom more link (continue reading) text
	 * @return string
	 */
	function official_flowershop_MoreLinkText() 
	{
		return __('Continue reading <span class="meta-nav">&rarr;</span>', 'official-flowershop');
	}// official_flowershop_MoreLinkText
}


if (!function_exists('official_flowershop_Pagination')) {
	/**
	 * display pagination (1 2 3 ...) instead of previous, next of wordpress style.
	 * 
	 * @param string $pagination_align_class
	 * @return string the content already echo
	 */
	function official_flowershop_Pagination($pagination_align_class = 'pagination-center pagination-row') 
	{
		global $wp_query;
			$big = 999999999;
			$pagination_array = paginate_links(array(
				'base' => str_replace($big, '%#%', get_pagenum_link($big)),
				'format' => '/page/%#%',
				'current' => max(1, get_query_var('paged')),
				'total' => $wp_query->max_num_pages,
				'prev_text' => '&laquo;',
				'next_text' => '&raquo;',
				'type' => 'array'
			));

			unset($big);

			if (is_array($pagination_array) && !empty($pagination_array)) {
				echo '<nav class="' . $pagination_align_class . '">';
				echo '<ul class="pagination">';
				foreach ($pagination_array as $page) {
					echo '<li';
					if (strpos($page, '<a') === false && strpos($page, '&hellip;') === false) {
						echo ' class="active"';
					}
					echo '>';
					if (strpos($page, '<a') === false && strpos($page, '&hellip;') === false) {
						echo '<span>' . $page . '</span>';
					} else {
						echo $page;
					}
					echo '</li>';
				}
				echo '</ul>';
				echo '</nav>';
			}

			unset($page, $pagination_array);
	}// official_flowershop_Pagination
}


if (!function_exists('official_flowershop_PostOn')) {
	/**
	 * display post date/time and author
	 * 
	 * @return string
	 */
	function official_flowershop_PostOn() 
	{
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		if (get_the_time('U') !== get_the_modified_time('U')) {
			//$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf($time_string,
			esc_attr(get_the_date('c')),
			esc_html(get_the_date()),
			esc_attr(get_the_modified_date('c')),
			esc_html(get_the_modified_date())
		);

		printf(__('<span class="posted-on">Posted on %1$s</span><span class="byline"> by %2$s</span>', 'official-flowershop'),
			sprintf('<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
				esc_url(get_permalink()),
				esc_attr(get_the_time()),
				$time_string
			),
			sprintf('<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
				esc_url(get_author_posts_url(get_the_author_meta('ID'))),
				esc_attr(sprintf(__('View all posts by %s', 'official-flowershop'), get_the_author())),
				esc_html(get_the_author())
			)
		);
	}// official_flowershop_PostOn
}


if (!function_exists('official_flowershop_TagsList')) {
	/**
	 * display tags list
	 * 
	 * @param string $tags_list
	 * @return string
	 */
	function official_flowershop_TagsList($tags_list = '') 
	{
		return sprintf('<span class="tags-icon glyphicon glyphicon-tags" title="' . __('Tagged', 'official-flowershop') . '"></span>&nbsp; %1$s', $tags_list);
	}// official_flowershop_TagsList
}


if (!function_exists('official_flowershop_TheAttachedImage')) {
	/**
	 * Display attach image with link.
	 * 
	 * @return string image element with link.
	 */
	function official_flowershop_TheAttachedImage() 
	{
		$post                = get_post();
		$attachment_size     = apply_filters('bootstrap_basic_attachment_size', array(1140, 1140));
		$next_attachment_url = wp_get_attachment_url();

		/**
		 * Grab the IDs of all the image attachments in a gallery so we can get the
		 * URL of the next adjacent image in a gallery, or the first image (if
		 * we're looking at the last image in a gallery), or, in a gallery of one,
		 * just the link to that image file.
		 */
		$attachment_ids = get_posts(array(
			'post_parent'    => $post->post_parent,
			'fields'         => 'ids',
			'numberposts'    => -1,
			'post_status'    => 'inherit',
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'order'          => 'ASC',
			'orderby'        => 'menu_order ID'
		));

		// If there is more than 1 attachment in a gallery...
		if (count($attachment_ids) > 1) {
			foreach ($attachment_ids as $attachment_id) {
				if ($attachment_id == $post->ID) {
					$next_id = current($attachment_ids);
					break;
				}
			}


			if ($next_id) {
				// get the URL of the next image attachment...
				$next_attachment_url = get_attachment_link($next_id);
			} else {
				// or get the URL of the first image attachment.
				$next_attachment_url = get_attachment_link(array_shift($attachment_ids));
			}
		}

		printf('<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
			esc_url($next_attachment_url),
			the_title_attribute(array('echo' => false)),
			wp_get_attachment_image($post->ID, $attachment_size, false, array('class' => 'img-responsive aligncenter'))
		);
	}// official_flowershop_TheAttachedImage
}