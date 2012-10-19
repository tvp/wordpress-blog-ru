<?php



if (!function_exists('padd_theme_setup')) {
	function padd_theme_setup() {
		remove_action('wp_head','wp_generator');
		
		add_theme_support('post-thumbnails');
		add_theme_support('automatic-feed-links');

		// Make theme available for translation
		// Translations can be filed in the /languages/ directory
		load_theme_textdomain(PADD_THEME_SLUG, PADD_THEME_PATH . DIRECTORY_SEPARATOR . 'languages' );

		$locale = get_locale();
		$locale_file = PADD_THEME_PATH . DIRECTORY_SEPARATOR . 'languages' . DIRECTORY_SEPARATOR . $locale . '.php';
		if (is_readable($locale_file)) {
			require_once($locale_file);
		}
		
		register_nav_menus(array(
			'main' => __('Main Menu', PADD_THEME_SLUG),
		));
		
		set_post_thumbnail_size(PADD_LIST_THUMB_W,PADD_LIST_THUMB_H,true);
		add_image_size(PADD_THEME_SLUG . '-thumbnail',PADD_LIST_THUMB_W,PADD_LIST_THUMB_H,true);
		add_image_size(PADD_THEME_SLUG . '-gallery',PADD_GALL_THUMB_W,PADD_GALL_THUMB_H,true);
		add_image_size(PADD_THEME_SLUG . '-related-posts',136,70,true);
		add_image_size(PADD_THEME_SLUG . '-aside',45,45,true);
		
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script('theme', get_stylesheet_directory_uri() . '/js/frontend.js.php', array('jquery'), PADD_THEME_VERS, true);		
		wp_enqueue_script('share-facebook','http://static.ak.fbcdn.net/connect.php/js/FB.Share', NULL, NULL, true);
		wp_enqueue_script('share-twitter','http://platform.twitter.com/widgets.js', NULL, NULL, true);
	}
}
add_action('after_setup_theme', 'padd_theme_setup');

function padd_theme_widgets_init() {
	register_sidebar(array(
		'name' => __('Sidebar', PADD_THEME_SLUG),
		'before_widget' => '<div id="%1$s" class="box %2$s">',
		'after_widget' => '</div></div>',
		'before_title' => '<div class="title"><h3>',
		'after_title' => '</h3></div><div class="interior">',
	));
}
add_action('widgets_init', 'padd_theme_widgets_init');

add_filter('excerpt_more', 'padd_theme_hook_excerpt_index_more');
add_filter('get_comments_number', 'padd_theme_hook_count_comments',0);
add_filter('wp_page_menu_args', 'padd_theme_hook_menu_args');
