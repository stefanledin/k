<?php
	
	/*
	Include scripts
	 */
	function includeScripts() {
		wp_enqueue_script('jquery');	
		wp_enqueue_script('foundation', get_template_directory_uri() . '/javascripts/foundation.min.js', null, null, true);	
		wp_enqueue_script('plugins', get_template_directory_uri() . '/javascripts/plugins.js', null, null, true);	
		wp_enqueue_script('main', get_template_directory_uri() . '/javascripts/main.js', 'jquery', null, true);	
	}
	
	add_action('wp_enqueue_scripts', 'includeScripts');

	/*
	Remove "more-jump"
	 */
	function remove_more_jump_link($link) { 
		$offset = strpos($link, '#more-');
		if ($offset) {
			$end = strpos($link, '"',$offset);
		}
		if ($end) {
			$link = substr_replace($link, '', $offset, $end-$offset);
		}
		return $link;
	}
	add_filter('the_content_more_link', 'remove_more_jump_link');

	/*
	Remove width and height from images
	 */
	add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
	add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

	function remove_thumbnail_dimensions( $html ) {
	    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
	    return $html;
	}

	/*
	Thumbnail support
	 */
	add_theme_support('post-thumbnails');
