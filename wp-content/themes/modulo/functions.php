<?php

/* ===================
  REGISTER MENUS
  ========================================================= */
function modesto_get_option($key) {
    global $more;
    $more = 0;
}
if (function_exists('register_nav_menus')) {
    register_nav_menus(
            array(
                'navigation_menu' => 'Navigation Menu',
                'footer_menu' => 'Footer Menu'
            )
    );
}

add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);

function my_css_attributes_filter($var) {
    return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
}


/* ===================
  DEFINING THUMBNAILS
  ========================================================= */

add_theme_support('post-thumbnails');
add_theme_support('automatic-feed-links');
add_image_size('minimal', 45, 45, true);
add_image_size('thumbnail', 143, 143, true);
add_image_size('portfolio', 300, 145, true);
add_image_size('fi-page', 615, 240, true);
add_image_size('booklet', 470, 325, true);
add_image_size('folio-single-page', 695, 300, true);

/* ===================
  HEADER/FOOTER
  ========================================================= */

add_action('wp_enqueue_scripts', 'scripts');

function scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('prettyPhoto', get_bloginfo('template_url') . '/scripts/pretty/js/jquery.prettyPhoto.js', array('jquery'), '3.0.1', true);
    wp_enqueue_style('prettyPhoto', get_bloginfo('template_url') . '/scripts/pretty/css/prettyPhoto.css', true, '2.5.6', 'all');
    $options = get_option('option_tree');

    if (is_front_page() && $options['choose_slider'] == 'Flex slider (responsive/fluid)' || is_singular('portfolio')) {
        wp_enqueue_style('flex', get_bloginfo('template_url') . '/scripts/flex/flexslider.css', true, 'all');
        wp_enqueue_script('flex', get_bloginfo('template_url') . '/scripts/flex/jquery.flexslider-min.js', array('jquery'), '1.8.0');
    }
    if (is_front_page() && $options['choose_slider'] == 'Nivo slider') {
    wp_enqueue_style('Nivo', get_bloginfo('template_url') . '/scripts/nivo/nivo-slider.css', true, 'all');
    wp_enqueue_script('Nivo', get_bloginfo('template_url') . '/scripts/nivo/jquery.nivo.slider.pack.js', array('jquery'));
    }
    if (is_page_template('portfolio-booklet.php')) {
    wp_enqueue_style('booklet', get_bloginfo('template_url') . '/scripts/booklet/jquery.booklet.css', true, 'all');
    wp_enqueue_script('booklet', get_bloginfo('template_url') . '/scripts/booklet/jquery.booklet.min.js', array('jquery'));
    }
    if (is_front_page() && $options['choose_slider'] == 'Carousel slider') {
        wp_enqueue_style('roundabout', get_bloginfo('template_url') . '/scripts/roundabout/roundabout.css', true, 'all');
        wp_enqueue_script('roundabout', get_bloginfo('template_url') . '/scripts/roundabout/jquery.roundabout.min.js', array('jquery'), '1.1');
    }
    if(is_front_page() && get_option_tree('testimonials', ''))
    wp_enqueue_script('testimonials', get_bloginfo('template_url') . '/scripts/testimonialrotator.js', array('jquery'));
    if (is_singular ())
        wp_enqueue_script('comment-reply');
}

/* ============
  REDEFINE OPTIONTREE SLIDER
  ========================================================= */

add_filter( 'image_slider_fields', 'new_slider_fields', 10, 2 );

function new_slider_fields( $image_slider_fields, $id ) {
  if ( $id == 'slides' ) {
    $image_slider_fields[] =
      array(
        'name'  => 'video',
        'type'  => 'text',
        'label' => 'Youtube or vimeo source code',
        'class' => ''
      );
  }
  return $image_slider_fields;
}



/* =================
  LIMIT WORDS IN CONTENT PREVIEW
  ========================================================= */

function content($limit) {
    $content = explode(' ', get_the_content('', false), $limit);
    if (count($content) >= $limit) {
        array_pop($content);
        $content = implode(" ", $content) . '...';
    } else {
        $content = implode(" ", $content);
    }
    $content = preg_replace('/\[.+\]/', '', $content);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
}

/* =============
  BREADCRUMBS
  ========================================================= */

function dimox_breadcrumbs() {

    $delimiter = '<span class="separator">&rarr;</span>';
    $name = 'Home'; //text for the 'Home' link
    $currentBefore = '<p class="current">';
    $currentAfter = '</p>';

    if (!is_home() && !is_front_page() || is_paged()) {

        echo '<div id="crumbs">';

        global $post;
        $home = home_url();
        echo '<a href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';

        if (is_category ()) {
            global $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
            if ($thisCat->parent != 0)
                echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
            echo $currentBefore . 'Archive by category &#39;';
            single_cat_title();
            echo '&#39;' . $currentAfter;
        } elseif (is_day ()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $currentBefore . get_the_time('d') . $currentAfter;
        } elseif (is_month ()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $currentBefore . get_the_time('F') . $currentAfter;
        } elseif (is_year ()) {
            echo $currentBefore . get_the_time('Y') . $currentAfter;
        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());

                $slug = $post_type->rewrite;
                echo '<a href="' . $home . '/' . $slug['slug'] . '/">';
                echo $post_type->labels->singular_name;
                echo '</a>';
                echo $delimiter;

                echo $currentBefore;
                the_title();
                echo $currentAfter;
            } else {

                $cat = get_the_category();
                $cat = $cat[0];
                echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                echo $currentBefore;
                the_title();
                echo $currentAfter;
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post') {

            $post_type = get_post_type_object(get_post_type());
            echo $currentBefore;
            echo $post_type->labels->singular_name;
            echo $currentAfter;
            $cat = get_the_category();
            $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo $currentBefore;
            the_title();
            echo $currentAfter;
        } elseif (is_page() && !$post->post_parent) {
            echo $currentBefore;
            the_title();
            echo $currentAfter;
        } elseif (is_page() && $post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb)
                echo $crumb . ' ' . $delimiter . ' ';
            echo $currentBefore;
            the_title();
            echo $currentAfter;
        } elseif (is_search ()) {
            echo $currentBefore . 'Search results for &#39;' . get_search_query() . '&#39;' . $currentAfter;
        } elseif (is_tag ()) {
            echo $currentBefore . 'Posts tagged &#39;';
            single_tag_title();
            echo '&#39;' . $currentAfter;
        } elseif (is_author ()) {
            global $author;
            $userdata = get_userdata($author);
            echo $currentBefore . 'Articles posted by ' . $userdata->display_name . $currentAfter;
        } elseif (is_404 ()) {
            echo $currentBefore . 'Error 404' . $currentAfter;
        }

        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                echo ' (';
            echo __('Page') . ' ' . get_query_var('paged');
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                echo ')';
        }

        echo '</div>';
    }
}

/* ===================
  OPTIONS
  ========================================================= */

add_filter('the_content', 'do_shortcode');
if (!isset($content_width))
    $content_width = 1000;

/* =================
  CUSTOM MORE LINK
  ========================================================= */

function the_more() {
    global $post;
    if (strpos($post->post_content, '<!--more-->')):
        $the_more = '<a href="' . get_permalink() . '" class="button" title="' . get_the_title() . '">';
        $the_more .= 'Read more';
        $the_more .= '</a>';
        echo $the_more;
    endif;
}


/* ==============================
  CUSTOM GALLERY
  =========================================================== */

function my_gallery($content) {
//remove space between [ and gallery in the following line
    return str_replace('[gallery', '[gallery itemtag="div" icontag="span" captiontag="p" size="booklet"', $content);
}

add_filter('the_content', 'my_gallery');

add_filter('gallery_style', 'my_gallery_style', 99);

function my_gallery_style() {
    return "<div id=\"replace\">";
}

function remove_revisions_metabox() {
    remove_meta_box('revisionsdiv', 'post', 'normal');
    remove_meta_box('revisionsdiv', 'page', 'normal');
}

add_action('admin_menu', 'remove_revisions_metabox');


/* ==============================
  SHORTCODE FORMATTING
  =========================================================== */

//adjusted from http://donalmacarthur.com/articles/cleaning-up-wordpress-shortcode-formatting/
function parse_shortcode_content($content) {

    /* Parse nested shortcodes and add formatting. */
    $content = trim(do_shortcode(shortcode_unautop($content)));

    /* Remove '' from the start of the string. */
    if (substr($content, 0, 4) == '')
        $content = substr($content, 4);

    /* Remove '' from the end of the string. */
    if (substr($content, -3, 3) == '')
        $content = substr($content, 0, -3);

    /* Remove any instances of ''. */
    $content = str_replace(array('<p></p>'), '', $content);
    $content = str_replace(array('<p>  </p>'), '', $content);

    return $content;
}

//move wpautop filter to AFTER shortcode is processed
remove_filter('the_content', 'wpautop');
add_filter('the_content', 'wpautop', 99);
add_filter('the_content', 'shortcode_unautop', 100);

/* ==============================
  CUSTOM POST TYPE - TESTIMONIALS
  =========================================================== */

add_action('init', 'create_crumpsy');

function create_crumpsy() {
    $portfolio_args = array(
        'label' => __('Testimonials'),
        'singular_label' => __('Crumpsy Item'),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => true,
        'supports' => array('title', 'editor', 'thumbnail')
    );
    register_post_type('testimonials', $portfolio_args);
}

/* ==============================
  CUSTOM POST TYPE - PORTFOLIO
  =========================================================== */

add_action('init', 'create_portfolio');

function create_portfolio() {
    $portfolio_args = array(
        'label' => __('Portfolio'),
        'singular_label' => __('Portfolio'),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => true,
        'supports' => array('title', 'editor', 'thumbnail')
    );
    register_post_type('portfolio', $portfolio_args);
}

add_action("admin_init", "add_portfolio");

function add_portfolio() {
    add_meta_box("portfolio_details", "portfolio_options", "portfolio", "normal", "low");
}

add_filter("manage_edit-portfolio_columns", "portfolio_edit_columns");
add_action("manage_posts_custom_column", "portfolio_columns_display");

add_action('init', 'services_rendered', 0);

function services_rendered() {
    register_taxonomy(
            'services_rendered',
            'portfolio',
            array(
                'hierarchical' => true,
                'label' => 'Our job',
                'query_var' => true,
                'rewrite' => true
            )
    );
}

function portfolio_edit_columns($portfolio_columns) {
    $portfolio_columns = array(
        "cb" => "<input type=\"checkbox\" />",
        "title" => "Project Title",
        "description" => "Description",
        "services" => "services",
    );
    return $portfolio_columns;
}

function portfolio_columns_display($portfolio_columns) {
    switch ($portfolio_columns) {
        case "description":
            the_excerpt();
            break;
        case "services":
            global $post;
            echo get_the_term_list($post->ID, 'services_rendered', '<ul><li>', '</li><li>', '</li></ul>');
            break;
    }
}
function enable_more_buttons($buttons) {
  $buttons[] = 'fontselect';

  return $buttons;
}
add_filter("mce_buttons", "enable_more_buttons");
/* ==============================
  TINYMCE SHORTCODE BUTTONS
  =========================================================== */

add_action('init', 'tmce_button');

function tmce_button() {
    if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
        return;
    }
    if (get_user_option('rich_editing') == 'true') {
        add_filter('mce_external_plugins', 'add_plugin');
        add_filter('mce_buttons_3', 'third_row');
        add_filter('mce_buttons_4', 'fourth_row');
    }
}

function third_row($buttons) {
    array_push($buttons, "", "half");
    array_push($buttons, "|", "half_last");
    array_push($buttons, "|,|,|,|,|,|,|,|", "triple");
    array_push($buttons, "|", "triple_last");
    array_push($buttons, "|", "doublethird");
    array_push($buttons, "|,|,|,|,|,|,|,|", "quarter");
    array_push($buttons, "|", "quarter_last");
    array_push($buttons, "|,|,|,|,|,|,|,|", "cleanline");
    return $buttons;
}

function fourth_row($buttons) {
    array_push($buttons, "", "slide");
    array_push($buttons, "|", "chlist");
    array_push($buttons, "|", "dropcap");
    array_push($buttons, "|", "pullquote");
    array_push($buttons, "|", "pullquoter");
    array_push($buttons, "|", "alertbox");
    array_push($buttons, "|", "succesbox");
    array_push($buttons, "|", "newsbox");
    array_push($buttons, "|", "infobox");
    array_push($buttons, "|", "gmap");
    array_push($buttons, "|", "button");
    return $buttons;
}

function add_plugin($plugin_array) {
    $plugin_array['triple'] = get_bloginfo('template_url') . '/scripts/mybuttons.js';
    $plugin_array['doublethird'] = get_bloginfo('template_url') . '/scripts/mybuttons.js';
    $plugin_array['triple_last'] = get_bloginfo('template_url') . '/scripts/mybuttons.js';
    $plugin_array['half'] = get_bloginfo('template_url') . '/scripts/mybuttons.js';
    $plugin_array['half_last'] = get_bloginfo('template_url') . '/scripts/mybuttons.js';
    $plugin_array['quarter'] = get_bloginfo('template_url') . '/scripts/mybuttons.js';
    $plugin_array['quarter_last'] = get_bloginfo('template_url') . '/scripts/mybuttons.js';
    $plugin_array['slide'] = get_bloginfo('template_url') . '/scripts/mybuttons.js';
    $plugin_array['chlist'] = get_bloginfo('template_url') . '/scripts/mybuttons.js';
    $plugin_array['dropcap'] = get_bloginfo('template_url') . '/scripts/mybuttons.js';
    $plugin_array['pullquote'] = get_bloginfo('template_url') . '/scripts/mybuttons.js';
    $plugin_array['pullquoter'] = get_bloginfo('template_url') . '/scripts/mybuttons.js';
    $plugin_array['newsbox'] = get_bloginfo('template_url') . '/scripts/mybuttons.js';
    $plugin_array['succesbox'] = get_bloginfo('template_url') . '/scripts/mybuttons.js';
    $plugin_array['alertbox'] = get_bloginfo('template_url') . '/scripts/mybuttons.js';
    $plugin_array['infobox'] = get_bloginfo('template_url') . '/scripts/mybuttons.js';
    $plugin_array['pullquoter'] = get_bloginfo('template_url') . '/scripts/mybuttons.js';
    $plugin_array['pullquoter'] = get_bloginfo('template_url') . '/scripts/mybuttons.js';
    $plugin_array['button'] = get_bloginfo('template_url') . '/scripts/mybuttons.js';
    $plugin_array['cleanline'] = get_bloginfo('template_url') . '/scripts/mybuttons.js';
    $plugin_array['gmap'] = get_bloginfo('template_url') . '/scripts/mybuttons.js';
    return $plugin_array;
}

include_once TEMPLATEPATH . '/inc/meta/meta-box.php';
include TEMPLATEPATH . '/inc/meta/meta-box-usage.php';
require_once ( TEMPLATEPATH . '/inc/shortcodes.php' );
require_once ( TEMPLATEPATH . '/inc/widgets.php' );
require TEMPLATEPATH . '/option-tree/index.php';
?>
