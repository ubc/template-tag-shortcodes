<?php
/**
 * Plugin Name: Template Tag Shortcodes
 * Plugin URI: http://justintadlock.com/archives/2009/03/24/template-tag-shortcodes-wordpress-plugin
 * Description: Turns many of the WordPress template tags into shortcodes that can be used in posts and pages.
 * Version: 0.1.1
 * Author: Justin Tadlock
 * Author URI: http://justintadlock.com
 *
 * Template Tag Shortcodes takes many of the WordPress template
 * tags and turns them into shortcodes.  This allows users to use these
 * within posts.  There are currently over 40 shortcodes to choose from.
 *
 * The shortcodes will only behave as the template tags do.  For example,
 * a function that outputs a list might not add a 'ul' or 'ol' around the list.
 * Basically, no extra HTML formatting is added in any way to the shortcodes.
 * This is the default WP functionality, and the shortcodes adhere to that.
 *
 * Several shortcode functions must use the equivalent get_* function
 * because a value must be returned rather than echoed or printed 
 * when dealing with shortcodes.  Otherwise, the output would not be 
 * placed properly within the post.
 *
 * Shortcodes are based on the WordPress template tags:
 * @link http://codex.wordpress.org/Template_Tags
 *
 * Developers can learn more about the WordPress shortcode API:
 * @link http://codex.wordpress.org/Shortcode_API
 *
 * @copyright 2009
 * @version 0.1.1
 * @author Justin Tadlock
 * @link http://justintadlock.com/archives/2009/03/24/template-tag-shortcodes-wordpress-plugin
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @package TemplateTagShortcodes
 */

/**
 * Add page shortcodes
 */
add_shortcode( 'wp_list_pages', 'shortcode_list_pages' );
add_shortcode( 'wp_dropdown_pages', 'shortcode_dropdown_pages' );

/**
 * Add taxonomy shortcodes
 */
add_shortcode( 'wp_list_categories', 'shortcode_list_categories' );
add_shortcode( 'wp_dropdown_categories', 'shortcode_dropdown_categories' );
add_shortcode( 'the_category', 'shortcode_the_category' );
add_shortcode( 'get_category_link', 'shortcode_get_category_link' );
add_shortcode( 'category_description', 'shortcode_category_description' );

add_shortcode( 'wp_tag_cloud', 'shortcode_tag_cloud' );
add_shortcode( 'the_tags', 'shortcode_the_tags' );
add_shortcode( 'get_tag_link', 'shortcode_get_tag_link' );
add_shortcode( 'tag_description', 'shortcode_tag_description' );		// WP 2.8+

add_shortcode( 'the_terms', 'shortcode_the_terms' );			// WP 2.8+
add_shortcode( 'term_description', 'shortcode_term_description' );		// WP 2.8+

/**
 * Add bookmark/link shortcodes
 */
add_shortcode( 'wp_list_bookmarks', 'shortcode_list_bookmarks' );

/**
 * Add archive shortcodes
 */
add_shortcode( 'wp_get_archives', 'shortcode_get_archives' );

/**
 * Add general shortcodes
 */
add_shortcode( 'bloginfo', 'shortcode_bloginfo' );
add_shortcode( 'allowed_tags', 'shortcode_allowed_tags' );
add_shortcode( 'wp_logout_url', 'shortcode_logout_url' );
add_shortcode( 'wp_login_url', 'shortcode_login_url' );

/**
 * Add post shortcodes
 */
add_shortcode( 'the_title', 'shortcode_the_title' );
add_shortcode( 'the_title_attribute', 'shortcode_the_title_attribute' );
add_shortcode( 'the_ID', 'shortcode_the_ID' );
add_shortcode( 'the_permalink', 'shortcode_the_permalink' );
add_shortcode( 'get_permalink', 'shortcode_get_permalink' );

/**
 * Add date/time shortcodes
 */
add_shortcode( 'the_date', 'shortcode_the_date' );
add_shortcode( 'the_time', 'shortcode_the_time' );
add_shortcode( 'the_modified_date', 'shortcode_the_modified_date' );
add_shortcode( 'the_modified_time', 'shortcode_the_modified_time' );

/**
 * Add author shortcodes
 */
add_shortcode( 'wp_list_authors', 'shortcode_list_authors' );
add_shortcode( 'the_author', 'shortcode_the_author' );
add_shortcode( 'the_author_description', 'shortcode_the_author_description' );
add_shortcode( 'the_author_login', 'shortcode_the_author_login' );
add_shortcode( 'the_author_firstname', 'shortcode_the_author_firstname' );
add_shortcode( 'the_author_lastname', 'shortcode_the_author_lastname' );
add_shortcode( 'the_author_nickname', 'shortcode_the_author_nickname' );
add_shortcode( 'the_author_ID', 'shortcode_the_author_ID' );
add_shortcode( 'the_author_url', 'shortcode_the_author_url' );
add_shortcode( 'the_author_email', 'shortcode_the_author_email' );
add_shortcode( 'the_author_link', 'shortcode_the_author_link' );
add_shortcode( 'the_author_aim', 'shortcode_the_author_aim' );
add_shortcode( 'the_author_yim', 'shortcode_the_author_yim' );
add_shortcode( 'the_author_posts', 'shortcode_the_author_posts' );
add_shortcode( 'the_author_posts_link', 'shortcode_the_author_posts_link' );
add_shortcode( 'the_modified_author', 'shortcode_the_modified_author' );		// WP 2.8+
add_shortcode( 'the_author_meta', 'shortcode_the_author_meta' ); 			// WP 2.8+

/**
 * Add comment shortcodes
 */
add_shortcode( 'comments_link', 'shortcode_comments_link' );

/**
 * Adds a link to the comments of a post.
 *
 * @link http://codex.wordpress.org/Template_Tags/comments_link
 * @since 0.1.1
 */
function shortcode_comments_link() {
	return get_comments_link();
}

/**
 * Displays a posts terms by a specific taxonomy.
 * @uses get_the_term_list()
 *
 * @since 0.1.1
 */
function shortcode_the_terms( $attr ) {

	$attr = wp_parse_args( $attr, array( 
		'id' => get_the_ID(),
		'taxonomy' => 'post_tag', 
		'before' => '', 
		'separator' => '', 
		'after' => ''
	) );

	return get_the_term_list( $attr['id'], $attr['taxonomy'], $attr['before'], $attr['separator'], $attr['after'] );
}

/**
 * @uses category_description()
 * @link http://codex.wordpress.org/Template_Tags/category_description
 *
 * @since 0.1.1
 */
function shortcode_category_description( $attr ) {
	$attr = wp_parse_args( $attr, array( 'category' => 1 ) );
	return category_description( $attr['category'] );
}

/**
 * @uses tag_description()
 * @link http://codex.wordpress.org/Template_Tags/tag_description
 *
 * @since 0.1.1
 */
function shortcode_tag_description( $attr ) {
	$attr = wp_parse_args( $attr, array( 'tag'  => 1 ) );
	return tag_description( $attr['tag'] );
}

/**
 * @uses term_description()
 * @link http://codex.wordpress.org/Function_Reference/term_description
 *
 * @since 0.1.1
 */
function shortcode_term_description( $attr ) {
	$attr = wp_parse_args( $attr, array( 'term'  => null, 'taxonomy' => null ) );
	return term_description( $attr['term'], $attr['taxonomy'] );
}


/**
 * Get the data for a particular author.  This function will only work
 * in WordPress 2.8+.
 * @uses get_the_author_meta()
 * @link http://codex.wordpress.org/Template_Tags/the_author_meta
 * @link http://codex.wordpress.org/Function_Reference/get_the_author_meta
 *
 * @since 0.1.1
 */
function shortcode_the_author_meta( $attr ) {
	$attr = wp_parse_args( $attr, array( 'field'  => 'user_login', 'user_id' => null ) );
	$author_meta = get_the_author_meta( $attr['field'], $attr['user_id'] );
	if ( $attr['field'] == 'email' || $attr['field'] == 'user_email' )

		$author_meta = antispambot( $author_meta );

	return $author_meta;
}

/**
 * Shortcode function for listing pages
 * Uses the wp_list_pages() function
 * @link http://codex.wordpress.org/Template_Tags/wp_list_pages
 *
 * @since 0.1
 * @param array $attr Attributes attributed to the shortcode.
 */
function shortcode_list_pages( $attr ) {

	/*
	* Make sure we have boolean values instead of strings when needed
	*/
	if ( isset( $attr['hierarchical'] ) )
		$attr['hierarchical'] = shortcode_string_to_bool( $attr['hierarchical'] );
	if ( isset( $attr['show_date'] ) )
		$attr['show_date'] = shortcode_string_to_bool( $attr['show_date'] );

	$attr = wp_parse_args( $attr, array(
		'authors'      => '',
		'child_of'     => 0,
		'date_format'  => get_option('date_format'),
		'depth'        => 0,
		'echo'         => false,
		'exclude'      => '',
		'include'      => '',
		'link_after'   => '',
		'link_before'  => '',
		'post_type'    => 'page',
		'post_status'  => 'publish',
		'show_date'    => '',
		'sort_column'  => 'menu_order, post_title',
		'sort_order'   => '',
		'title_li'     => __('Pages'), 
		'walker'       => ''
	) );

	return wp_list_pages( $attr );
}

/**
 * Shortcode function for showing pages in a dropdown select
 * Uses the wp_dropdown_pages() function
 * @link http://codex.wordpress.org/Template_Tags/wp_dropdown_pages
 *
 * @since 0.1
 * @param array $attr Attributes attributed to the shortcode.
 */
function shortcode_dropdown_pages( $attr ) {

	/*
	* Make sure we have boolean values instead of strings when needed
	*/
	if ( isset( $attr['show_date'] ) )
		$attr['show_date'] = shortcode_string_to_bool( $attr['show_date'] );

	$attr = wp_parse_args( $attr, array(
		'depth'                 => 0,
		'child_of'              => 0,
		'selected'              => 0,
		'echo'                  => false,
		'name'                  => 'page_id',
		'id'                    => null, // string
		'show_option_none'      => null, // string
		'show_option_no_change' => null, // string
		'option_none_value'     => null, // string
	) );

	$output = wp_dropdown_pages( $attr );

	return $output;
}

/**
 * Shortcode function for listing categories
 * Uses the wp_list_categories() function
 * @link http://codex.wordpress.org/Template_Tags/wp_list_categories
 *
 * @since 0.1
 * @param array $attr Attributes attributed to the shortcode.
 */
function shortcode_list_categories( $attr ) {

	/*
	* Make sure certain we have boolean values instead of strings when needed
	*/
	if ( isset ( $attr['title_li'] ) )
		$attr['title_li'] = shortcode_string_to_bool( $attr['title_li'] );
	if ( isset ( $attr['hierarchical'] ) )
		$attr['hierarchical'] = shortcode_string_to_bool( $attr['hierarchical'] );
	if ( isset ( $attr['use_desc_for_title'] ) )
		$attr['use_desc_for_title'] = shortcode_string_to_bool( $attr['use_desc_for_title'] );
	if ( isset ( $attr['hide_empty'] ) )
		$attr['hide_empty'] = shortcode_string_to_bool( $attr['hide_empty'] );
	if ( isset ( $attr['show_count'] ) )
		$attr['show_count'] = shortcode_string_to_bool( $attr['show_count'] );
	if ( isset ( $attr['show_last_update'] ) )
		$attr['show_last_update'] = shortcode_string_to_bool( $attr['show_last_update'] );

	$attr = wp_parse_args( $attr, array(
		'show_option_all'    => '',
		'orderby'            => 'name',
		'order'              => 'ASC',
		'style'              => 'list',
		'show_count'         => 0,
		'hide_empty'         => 1,
		'use_desc_for_title' => 1,
		'child_of'           => 0,
		'feed'               => '',
		'feed_type'          => '',
		'feed_image'         => '',
		'exclude'            => '',
		'exclude_tree'       => '',
		'include'            => '',
		'hierarchical'       => 1,
		'title_li'           => __( 'Categories' ),
		'show_option_none'   => __( '' ),
		'number'             => null,
		'echo'               => false,
		'depth'              => 0,
		'current_category'   => 0,
		'pad_counts'         => 0,
		'taxonomy'           => 'category',
		'walker'             => null
	) );

	$output = wp_list_categories( $attr );

	return $output;
}

/**
 * Shortcode function for listing categories in a dropdown select
 * Uses the wp_dropdown_categories() function
 * @link http://codex.wordpress.org/Template_Tags/wp_dropdown_categories
 *
 * @since 0.1
 * @param array $attr Attributes attributed to the shortcode.
 */
function shortcode_dropdown_categories( $attr ) {

	/*
	* Make sure certain we have boolean values instead of strings when needed
	*/
	if ( isset( $attr['hierarchical'] ) )
		$attr['hierarchical'] = shortcode_string_to_bool( $attr['hierarchical'] );
	if ( isset( $attr['hide_empty'] ) )
		$attr['hide_empty'] = shortcode_string_to_bool( $attr['hide_empty'] );
	if ( isset( $attr['show_count'] ) )
		$attr['show_count'] = shortcode_string_to_bool( $attr['show_count'] );
	if ( isset( $attr['show_last_update'] ) )
		$attr['show_last_update'] = shortcode_string_to_bool( $attr['show_last_update'] );

	$attr = wp_parse_args( $attr, array(
		'show_option_all'    => '',
		'show_option_none'   => '',
		'orderby'            => 'ID', 
		'order'              => 'ASC',
		'show_count'         => 0,
		'hide_empty'         => 1, 
		'child_of'           => 0,
		'exclude'            => '',
		'echo'               => false,
		'selected'           => 0,
		'hierarchical'       => 0, 
		'name'               => 'cat',
		'id'                 => '',
		'class'              => 'postform',
		'depth'              => 0,
		'tab_index'          => 0,
		'taxonomy'           => 'category',
		'hide_if_empty'      => false,
	) );

	$output = wp_dropdown_categories( $attr );

	return $output;
}

/**
 * Shortcode function for listing the post's categories
 * Uses the get_the_category_list() function because the_category()
 * does not return a value.
 * @link http://codex.wordpress.org/Template_Tags/the_category
 *
 * @since 0.1
 * @param array $attr Attributes attributed to the shortcode.
 */
function shortcode_the_category( $attr ) {

	$attr = wp_parse_args( $attr, array( 'separator'  => '', 'parents'  => '', 'post_id'  => false,  ) );
		
	return get_the_category_list( $attr['separator'], $attr['parents'], $attr['post_id'] );
}

/**
 * Shortcode function getting a link to a specific category
 * Uses the get_category_link() function
 * @link http://codex.wordpress.org/Function_Reference/get_category_link
 *
 * @since 0.1
 * @param array $attr Attributes attributed to the shortcode.
 */
function shortcode_get_category_link( $attr ) {
	$attr = wp_parse_args( $attr, array( 'category_id'  => null ) );

	return get_category_link( $attr['category_id'] );
}

/**
 * Shortcode function for getting a link to a specific tag
 * Uses the get_tag_link() function
 * @link http://codex.wordpress.org/Function_Reference/get_tag_link
 *
 * @since 0.1
 * @param array $attr Attributes attributed to the shortcode.
 */
function shortcode_get_tag_link( $attr ) {
	$attr = wp_parse_args( $attr, array( 'tag_id'  => null ) );

	return get_tag_link( $attr['tag_id'] );
}

/**
 * Shortcode function for showing a tag cloud
 * Input values are based on wp_tag_cloud().  Since it has no 'echo'
 * parameter, we must port the function to the plugin to return the
 * the tag cloud for use with the shortcode API.
 * @link http://codex.wordpress.org/Template_Tags/wp_tag_cloud
 *
 * @since 0.1
 * @param array $attr Attributes attributed to the shortcode.
 */
function shortcode_tag_cloud( $attr ) {

	$attr = wp_parse_args( $attr, array(
		'smallest'                  => 8, 
		'largest'                   => 22,
		'unit'                      => 'pt', 
		'number'                    => 45,  
		'format'                    => 'flat',
		'separator'                 => "\n",
		'orderby'                   => 'name', 
		'order'                     => 'ASC',
		'exclude'                   => null, 
		'include'                   => null, 
		'topic_count_text_callback' => 'default_topic_count_text',
		'link'                      => 'view', 
		'taxonomy'                  => 'post_tag', 
		'echo'                      => false,
		'child_of'                  => null, // see Note!
	) );

	$attr['echo'] = false;

	return wp_tag_cloud( $attr );
}

/**
 * Shortcode function for listing a post's tags
 * Uses the get_the_tag_list() function because the_tags() function
 * does not return a value.
 * @link http://codex.wordpress.org/Template_Tags/the_tags
 * @link http://codex.wordpress.org/Template_Tags/get_the_tag_list
 *
 * @since 0.1
 * @param array $attr Attributes attributed to the shortcode.
 */
function shortcode_the_tags( $attr ) {
	$attr = wp_parse_args( $attr, array( 'before'  => '', 'separator' => '', 'after' => '' ) );
	return get_the_tag_list( $attr['before'], $attr['separator'], $attr['after'] );
}

/**
 * Shortcode function for listing bookmarks
 * Uses the wp_list_bookmarks() function
 * @link http://codex.wordpress.org/Template_Tags/wp_list_bookmarks
 *
 * @since 0.1
 * @param array $attr Attributes attributed to the shortcode.
 */
function shortcode_list_bookmarks( $attr ) {

	/*
	* Make sure we have boolean values instead of strings when needed
	*/
	if ( isset( $attr['title_li'] ) )
		$attr['title_li'] = shortcode_string_to_bool( $attr['title_li'] );
	if ( isset( $attr['categorize'] ) )
		$attr['categorize'] = shortcode_string_to_bool( $attr['categorize'] );
	if ( isset( $attr['show_description'] ) )
		$attr['show_description'] = shortcode_string_to_bool( $attr['show_description'] );
	if ( isset( $attr['hide_invisible'] ) )
		$attr['hide_invisible'] = shortcode_string_to_bool( $attr['hide_invisible'] );
	if ( isset( $attr['show_rating'] ) )
		$attr['show_rating'] = shortcode_string_to_bool( $attr['show_rating'] );
	if ( isset( $attr['show_updated'] ) )
		$attr['show_updated'] = shortcode_string_to_bool( $attr['show_updated'] );
	if ( isset( $attr['show_images'] ) )
		$attr['show_images'] = shortcode_string_to_bool( $attr['show_images'] );
	if ( isset( $attr['show_private'] ) )
		$attr['show_private'] = shortcode_string_to_bool( $attr['show_private'] );

	$attr = wp_parse_args( $attr, array(
		'orderby'          => 'name',
		'order'            => 'ASC',
		'limit'            => -1,
		'category'         => ' ',
		'exclude_category' => ' ',
		'category_name'    => ' ',
		'hide_invisible'   => 1,
		'show_updated'     => 0,
		'echo'             => 0,
		'categorize'       => 1,
		'title_li'         => __('Bookmarks'),
		'title_before'     => '<h2>',
		'title_after'      => '</h2>',
		'category_orderby' => 'name',
		'category_order'   => 'ASC',
		'class'            => 'linkcat',
		'category_before'  => '<li id=%id class=%class>',
		'category_after'   => '</li>'
	) );

	$attr['echo'] = false;

	return wp_list_bookmarks( $attr );
}

/**
 * Shortcode function for listing archives
 * Uses the wp_get_archives() function
 * @link http://codex.wordpress.org/Template_Tags/wp_get_archives
 *
 * @since 0.1
 * @param array $attr Attributes attributed to the shortcode.
 */
function shortcode_get_archives( $attr ) {

	/*
	* Make sure certain we have boolean values instead of strings when needed
	*/
	if ( isset( $attr['show_post_count'] ) )
		$attr['show_post_count'] = shortcode_string_to_bool( $attr['show_post_count'] );

	$attr = wp_parse_args( $attr, array(
		'type'            => 'monthly',
		'limit'           => '',
		'format'          => 'html', 
		'before'          => '',
		'after'           => '',
		'show_post_count' => false,
		'echo'            => 0,
		'order'           => 'DESC'
	) );

	$attr['echo'] = false;

	return wp_get_archives( $attr );
}

/**
 * Shortcode function for getting blog information
 * Uses the get_bloginfo() function to return a value
 * @link http://codex.wordpress.org/Template_Tags/bloginfo
 * @link http://codex.wordpress.org/Template_Tags/get_bloginfo
 *
 * @since 0.1
 * @param array $attr Attributes attributed to the shortcode.
 */
function shortcode_bloginfo( $attr ) {
	$attr = wp_parse_args( $attr, array( 'show'  => 'name' ) );
	return get_bloginfo( $attr['show'], 'display' );
}

/**
 * Shortcode function for showing the blog's allowed tags
 * Uses the allowed_tags() function
 *
 * @since 0.1
 */
function shortcode_allowed_tags() {
	return allowed_tags();
}

/**
 * Shortcode function for displaying the logout URL
 * Uses the wp_logout_url() function
 * @link http://codex.wordpress.org/Template_Tags/wp_logout_url
 *
 * @since 0.1
 * @param array $attr Attributes attributed to the shortcode.
 */
function shortcode_logout_url( $attr ) {
	return wp_logout_url( $attr['redirect'] );
}

/**
 * Shortcode function for displaying the login URL
 * Uses the wp_login_url() function
 *
 * @since 0.1
 * @param array $attr Attributes attributed to the shortcode.
 */
function shortcode_login_url( $attr ) {
	$attr = wp_parse_args( $attr, array( 'redirect'  => '' ) );
	return wp_login_url( $attr['redirect'] );
}

/**
 * Shortcode function for displaying the current post ID
 * Uses the get_the_ID() function
 * @link http://codex.wordpress.org/Template_Tags/the_ID
 *
 * @since 0.1
 */
function shortcode_the_ID() {
	return get_the_ID();
}

/**
 * Shortcode function for displaying the current post title
 * Uses the_title() function
 * @link http://codex.wordpress.org/Template_Tags/the_title
 *
 * @since 0.1
 * @param array $attr Attributes attributed to the shortcode.
 */
function shortcode_the_title( $attr ) {
	$attr = wp_parse_args( $attr, array( 'before'  => '', 'after' => '', 'display' => false ) );
	$attr['display'] = false;
	return the_title( $attr['before'], $attr['after'], $attr['display'] );
}

/**
 * Shortcode function for showing the attribute-escaped post title
 * Uses the_title_attribute() function
 * @link http://codex.wordpress.org/Template_Tags/the_title_attribute
 *
 * @since 0.1
 * @param array $attr Attributes attributed to the shortcode.
 */
function shortcode_the_title_attribute( $attr ) {
	$attr = wp_parse_args( $attr, array( 'before'  => '', 'after'  => '', 'echo'  => false, 'post' => null  ) );
	$attr['echo'] = false;
	return the_title_attribute( $attr );
}

/**
 * Shortcode function for getting the current post permalink
 * Uses the get_permalink() function
 * @link http://codex.wordpress.org/Template_Tags/the_permalink
 * @link http://codex.wordpress.org/Template_Tags/get_permalink
 *
 * @since 0.1
 */
function shortcode_the_permalink( $attr ) {
	global $post;
	$attr = wp_parse_args( $attr, array( 'post'  => $post->ID, 'leavename' => false ) );
	return get_permalink( $attr['post'], $attr['leavename'] );
}

/**
 * Shortcode function for getting a permalink to a specific post
 * Uses the get_permalink() function
 * @link http://codex.wordpress.org/Template_Tags/get_permalink
 *
 * @since 0.1
 * @param array $attr Attributes attributed to the shortcode.
 */
function shortcode_get_permalink( $attr ) {
	global $post;
	$attr = wp_parse_args( $attr, array( 'post'  => $post->ID, 'leavename' => false ) );
	return get_permalink( $attr['id'] );
}

/**
 * Shortcode function for listing pages
 * Uses the_date() function
 * @link http://codex.wordpress.org/Template_Tags/the_date
 *
 * @since 0.1
 * @param array $attr Attributes attributed to the shortcode.
 */
function shortcode_the_date( $attr ) {
	$attr = wp_parse_args( $attr, array( 'format' => '', 'before' => '', 'after' => '' ) );
	return the_date( $attr['format'], $attr['before'], $attr['after'], false );

}

/**
 * Shortcode function for listing pages
 * Uses the get_the_time() function
 * @link http://codex.wordpress.org/Template_Tags/the_time
 * @link http://codex.wordpress.org/Template_Tags/get_the_time
 *
 * @since 0.1
 * @param array $attr Attributes attributed to the shortcode.
 */
function shortcode_the_time( $attr ) {
	$attr = wp_parse_args( $attr, array( 'format'  => null, 'post' => null ) );
	return get_the_time( $attr['format'], $attr['post'] );
}

/**
 * Shortcode function for listing pages
 * Uses get_the_modified_date() function
 * @link http://codex.wordpress.org/Template_Tags/the_modified_date
 *
 * @since 0.1
 * @param array $attr Attributes attributed to the shortcode.
 */
function shortcode_the_modified_date( $attr ) {
	$attr = wp_parse_args( $attr, array( 'format'  => '' ) );
	return get_the_modified_date( $attr['format'] );
}

/**
 * Shortcode function for listing pages
 * Uses the get_the_modified_time() function
 * @link http://codex.wordpress.org/Template_Tags/the_modified_time
 *
 * @since 0.1
 * @param array $attr Attributes attributed to the shortcode.
 */
function shortcode_the_modified_time( $attr ) {
	$attr = wp_parse_args( $attr, array( 'format'  => null ) );
	return get_the_modified_time( $attr['format'] );
}

/**
 * Shortcode function for listing the site's authors
 * Uses the wp_list_authors() function
 * @link http://codex.wordpress.org/Template_Tags/wp_list_authors
 *
 * @since 0.1
 * @param array $attr Attributes attributed to the shortcode.
 */
function shortcode_list_authors( $attr) {

	/*
	* Make sure we have boolean values instead of strings when needed
	*/
	if ( isset( $attr['optioncount'] ) )
		$attr['optioncount'] = shortcode_string_to_bool( $attr['optioncount'] );
	if ( isset( $attr['exclude_admin'] ) )
		$attr['exclude_admin'] = shortcode_string_to_bool( $attr['exclude_admin'] );
	if ( isset( $attr['show_fullname'] ) )
		$attr['show_fullname'] = shortcode_string_to_bool( $attr['show_fullname'] );
	if ( isset( $attr['hide_empty'] ) )
		$attr['hide_empty'] = shortcode_string_to_bool( $attr['hide_empty'] );

	$attr = wp_parse_args( $attr, array(
		'orderby'       => 'name', 
		'order'         => 'ASC', 
		'number'        => null,
		'optioncount'   => false, 
		'exclude_admin' => true, 
		'show_fullname' => false,
		'hide_empty'    => true,
		'echo'          => false,
		'feed'          => '', 
		'feed_image'    => '',
		'feed_type'     => '',
		'style'         => 'list',
		'html'          => true,
		'exclude'       => '',
		'include'       => ''
	) );

	$attr['echo'] = false;

	return wp_list_authors( $attr );
}

/**
 * Shortcode function for displaying the current post author
 * Uses the get_the_author() function
 * @link http://codex.wordpress.org/Template_Tags/the_author
 *
 * @since 0.1
 */
function shortcode_the_author() {
	return get_the_author();
}

/**
 * Shortcode function for showing the last author to modify the post
 * Uses the get_the_modified_author() function
 * @link http://codex.wordpress.org/Template_Tags/the_modified_author
 *
 * Only for use with WP 2.8+
 *
 * @since 0.1
 */
function shortcode_the_modified_author() {
	return get_the_modified_author();
}

/**
 * Shortcode function for displaying the current post author description
 * Uses the get_the_author_description() function
 * @link http://codex.wordpress.org/Template_Tags/the_author_description
 *
 * @since 0.1
 */
function shortcode_the_author_description() {
	return get_the_author_description();
}

/**
 * Shortcode function for displaying the current post author login
 * Uses the get_the_author_login() function
 * @link http://codex.wordpress.org/Template_Tags/the_author_login
 *
 * @since 0.1
 */
function shortcode_the_author_login() {
	return get_the_author_login();
}

/**
 * Shortcode function for displaying the current post author first name
 * Uses the get_the_author_firstname() function
 * @link http://codex.wordpress.org/Template_Tags/the_author_firstname
 *
 * @since 0.1
 */
function shortcode_the_author_firstname() {
	return get_the_author_firstname();
}

/**
 * Shortcode function for displaying the current post author last name
 * Uses the get_the_author_lastname() function
 * @link http://codex.wordpress.org/Template_Tags/the_author_lastname
 *
 * @since 0.1
 */
function shortcode_the_author_lastname() {
	return get_the_author_lastname();
}

/**
 * Shortcode function for displaying the current post author nickname
 * Uses the get_the_author_nickname() function
 * @link http://codex.wordpress.org/Template_Tags/the_author_nickname
 *
 * @since 0.1
 */
function shortcode_the_author_nickname() {
	return get_the_author_nickname();
}

/**
 * Shortcode function for displaying the current post author ID
 * Uses the get_the_author_id() function
 * @link http://codex.wordpress.org/Template_Tags/the_author_ID
 *
 * @since 0.1
 */
function shortcode_the_author_ID() {
	return get_the_author_id();
}

/**
 * Shortcode function for displaying the current post author URL
 * Uses the get_the_author_url() function
 * @link http://codex.wordpress.org/Template_Tags/the_author_url
 *
 * @since 0.1
 */
function shortcode_the_author_url() {
	return get_the_author_url();
}

/**
 * Shortcode function for displaying the current post author email
 * Uses the get_the_author_email() function
 * @link http://codex.wordpress.org/Template_Tags/the_author_email
 *
 * @since 0.1
 */
function shortcode_the_author_email() {
	return apply_filters( 'the_author_email', antispambot( get_the_author_email() ) );
}

/**
 * Shortcode function for displaying the current post author link
 * Uses the get_the_author_link() function
 * @link http://codex.wordpress.org/Template_Tags/the_author_link
 *
 * @since 0.1
 */
function shortcode_the_author_link() {
	if ( get_the_author_url() )
		return '<a href="' . get_the_author_url() . '" title="' . sprintf(__("Visit %s's website"), get_the_author()) . '" rel="external">' . get_the_author() . '</a>';
	else
		return get_the_author();
}

/**
 * Shortcode function for displaying the current post author AIM
 * Uses the get_the_author_aim() function
 * @link http://codex.wordpress.org/Template_Tags/the_author_aim
 *
 * @since 0.1
 */
function shortcode_the_author_aim() {
	return get_the_author_aim();
}

/**
 * Shortcode function for displaying the current post author YIM
 * Uses the get_the_author_yim() function
 * @link http://codex.wordpress.org/Template_Tags/the_author_yim
 *
 * @since 0.1
 */
function shortcode_the_author_yim() {
	return get_the_author_yim();
}

/**
 * Shortcode function for displaying the current post author posts number
 * Uses the get_the_author_posts() function
 * @link http://codex.wordpress.org/Template_Tags/the_author_posts
 *
 * @since 0.1
 */
function shortcode_the_author_posts() {
	return get_the_author_posts();
}

/**
 * Shortcode function for displaying the current post author archive link
 * @link http://codex.wordpress.org/Template_Tags/the_author_posts_link
 *
 * @since 0.1
 * @param array $attr Attributes attributed to the shortcode.
 */
function shortcode_the_author_posts_link() {
	global $authordata;
	return sprintf(
		'<a href="%1$s" title="%2$s">%3$s</a>',
		get_author_posts_url( $authordata->ID, $authordata->user_nicename ),
		sprintf( __( 'Posts by %s' ), attribute_escape( get_the_author() ) ),
		get_the_author()
	);
}

/**
 * Function for turning string values into booleans
 * This is needed because user input when using shortcodes
 * is automatically turned into a string.  So, we'll take those
 * values and convert them.
 *
 * @since 0.1
 * @param string $value String to convert to a boolean.
 * @return bool|string
 */
function shortcode_string_to_bool( $value ) {

	if ( strtolower( $value ) == 'true' || $value == '1' ) 
		return true;

	elseif ( strtolower( $value ) == 'false' || $value == '0' )
		return false;

	else
		return $value;
}

?>