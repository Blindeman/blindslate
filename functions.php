<?php

add_action('after_setup_theme', 'blindslate_setup');
function blindslate_setup() {
	load_theme_textdomain('blindslate', get_template_directory() . '/languages');
	add_theme_support('title-tag');
	add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(480, 300, array('center', 'top'));
	add_theme_support('html5', array('search-form'));
	global $content_width;
	if (!isset($content_width)) {$content_width = 1920;}
	register_nav_menus(array('main-menu' => esc_html__('Main Menu', 'blindslate')));
}

add_action('wp_enqueue_scripts', 'blindslate_load_scripts');
function blindslate_load_scripts() {
	wp_enqueue_style('blindslate-style', get_stylesheet_uri());
	wp_enqueue_style('bw-google-fonts', 'https://fonts.googleapis.com/css?family=Amatic+SC:700|Open+Sans:300,400,400i,600&display=swap&subset=latin-ext', false);
	wp_enqueue_script('jquery');
}

add_action('wp_footer', 'blindslate_footer_scripts');
function blindslate_footer_scripts() {
	?><script>
        jQuery(document).ready(function ($) {
            var deviceAgent = navigator.userAgent.toLowerCase();
            if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
                $("html").addClass("ios");
                $("html").addClass("mobile");
            }
            if (navigator.userAgent.search("MSIE") >= 0) {
                $("html").addClass("ie");
            } else if (navigator.userAgent.search("Chrome") >= 0) {
                $("html").addClass("chrome");
            } else if (navigator.userAgent.search("Firefox") >= 0) {
                $("html").addClass("firefox");
            } else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
                $("html").addClass("safari");
            } else if (navigator.userAgent.search("Opera") >= 0) {
                $("html").addClass("opera");
            }
        });
    </script><?php
}

add_filter('document_title_separator', 'blindslate_document_title_separator');
function blindslate_document_title_separator($sep) {
	$sep = '|';
	return $sep;
}

add_filter('the_title', 'blindslate_title');
function blindslate_title($title) {
	if ($title == '') {
		return '...';
	} else {
		return $title;
	}
}

add_filter('the_content_more_link', 'blindslate_read_more_link');
function blindslate_read_more_link() {
	if (!is_admin()) {
		return ' <a href="' . esc_url(get_permalink()) . '" class="more-link">...</a>';
	}
}

add_filter('excerpt_more', 'blindslate_excerpt_read_more_link');
function blindslate_excerpt_read_more_link($more) {
	if (!is_admin()) {
		global $post;
		return ' <a href="' . esc_url(get_permalink($post->ID)) . '" class="more-link">...</a>';
	}
}

/*add_filter( 'intermediate_image_sizes_advanced', 'blindslate_image_insert_override' );
function blindslate_image_insert_override( $sizes ) {
unset( $sizes['medium_large'] );
return $sizes;
}*/

add_action('widgets_init', 'blindslate_widgets_init');
function blindslate_widgets_init() {
	register_sidebar(array(
		'name' => esc_html__('Sidebar Widget Area', 'blindslate'),
		'id' => 'primary-widget-area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
}

add_action('wp_head', 'blindslate_pingback_header');
function blindslate_pingback_header() {
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s" />' . "\n", esc_url(get_bloginfo('pingback_url')));
	}
}

add_action('comment_form_before', 'blindslate_enqueue_comment_reply_script');
function blindslate_enqueue_comment_reply_script() {
	if (get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}

function blindslate_custom_pings($comment) {
	?><li <?php comment_class();?> id="li-comment-<?php comment_ID();?>">
        <?php echo comment_author_link(); ?>
    </li><?php
}

add_filter('get_comments_number', 'blindslate_comment_count', 0);
function blindslate_comment_count($count) {
	if (!is_admin()) {
		global $id;
		$get_comments = get_comments('status=approve&post_id=' . $id);
		$comments_by_type = separate_comments($get_comments);
		return count($comments_by_type['comment']);
	} else {
		return $count;
	}
}