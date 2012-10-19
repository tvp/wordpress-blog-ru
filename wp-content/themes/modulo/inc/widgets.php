<?php
register_sidebar(array(
    'name' => 'Sidebar area',
    'id' => 'sidebar',
    'description' => __('This is general sidebar area, content placed here will be displayed if others area will be empty'),
    'before_widget' => '<div id="%1$s" class="%2$s sidebar-wg">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
));

register_sidebar(array(
    'name' => 'Archive area',
    'id' => 'sidebar-archives',
    'description' => __('Content placed here will be visible only at archive pages'),
    'before_widget' => '<div id="%1$s" class="%2$s sidebar-wg">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
));

register_sidebar(array(
    'name' => 'Posts area',
    'id' => 'sidebar-post',
    'description' => __('Content placed here will be visible only at single post page'),
    'before_widget' => '<div id="%1$s" class="%2$s sidebar-wg">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
));

register_sidebar(array(
    'name' => 'Pages area',
    'id' => 'sidebar-pages',
    'description' => __('Content placed here will be visible only at pages with sidebar column'),
    'before_widget' => '<div id="%1$s" class="%2$s sidebar-wg">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
));

register_sidebar(array(
    'name' => 'Home Page area',
    'id' => 'sidebar-page-home',
    'description' => __('Content placed here will be visible only at home/front page'),
    'before_widget' => '<div id="%1$s" class="%2$s sidebar-wg">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
));

register_sidebar(array(
    'name' => 'Footer area',
    'id' => 'footer-main',
    'description' => __('This is the footer widget area, to use it just drag here available widgets...'),
    'before_widget' => '<div id="%1$s" class="%2$s wg columns">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
));

add_filter('widget_text', 'do_shortcode');

/* ==============================
  RECENT POSTS with THUMBNAILS
  ========================================================= */

class Recentposts_thumbnail extends WP_Widget {

    function Recentposts_thumbnail() {
        parent::WP_Widget(false, $name = 'Thumbnail Recent Posts');
    }

    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
?>
<?php echo $before_widget; ?>
<?php
        if ($title)
            echo $before_title . $title . $after_title; else
            echo '<div class="tp">';
?>

<?php
        global $post;
        if (get_option('rpthumb_qty'))
            $rpthumb_qty = get_option('rpthumb_qty'); else
            $rpthumb_qty = 5;
        $q_args = array(
            'numberposts' => $rpthumb_qty,
        );
        $rpthumb_posts = get_posts($q_args);
        foreach ($rpthumb_posts as $post) :
            setup_postdata($post);
?>

            <div class="thumb-posts">
    <?php
            if (has_post_thumbnail() && !get_option('rpthumb_thumb')) { ?>

                <a class="tpimg" href="<?php the_permalink(); ?>">

                <?php the_post_thumbnail('minimal');  ?>

                </a>
           <?php } ?>
            <a href="<?php the_permalink(); ?>">
                <span class="title"><?php the_title(); ?></span>
                <span class="date"><?php the_time(__('M j, Y')) ?></span>
            </a>
        </div>

<?php endforeach; ?>

<?php echo $after_widget; ?>
<?php
        }

        function update($new_instance, $old_instance) {
            $instance = $old_instance;
            $instance['title'] = strip_tags($new_instance['title']);
            update_option('rpthumb_qty', $_POST['rpthumb_qty']);
            update_option('rpthumb_thumb', $_POST['rpthumb_thumb']);
            return $instance;
        }

        function form($instance) {
            $title = esc_attr($instance['title']);
?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
            <p><label for="rpthumb_qty">Number of posts:  </label><input type="text" name="rpthumb_qty" id="rpthumb_qty" size="2" value="<?php echo get_option('rpthumb_qty'); ?>"/></p>
            <p><label for="rpthumb_thumb">Hide thumbnails:  </label><input type="checkbox" name="rpthumb_thumb" id="rpthumb_thumb" <?php echo (get_option('rpthumb_thumb')) ? 'checked="checked"' : ''; ?>/></p>
<?php
        }

    }

    add_action('widgets_init', create_function('', 'return register_widget("Recentposts_thumbnail");'));

    /* ==============
      DISPLAY NEWS
      ============================================================= */

    class News extends WP_Widget {

        function News() {
            global $theme, $short, $version, $domain, $options;
            $widget_ops = array('classname' => 'news', 'description' => __('Recent news in', $domain) . ' ' . $theme);
            $this->WP_Widget('news', $theme . ' ' . __('News', $domain), $widget_ops);
        }

        function widget($args, $instance) {

            global $theme, $short, $version, $domain, $options;

            ob_start();
            extract($args);

            $title = apply_filters('widget_title', empty($instance['title']) ? __('Recent News', $domain) : $instance['title']);
            if (!$number = (int) $instance['number'])
                $number = 10;
            else if ($number < 1)
                $number = 1;
            else if ($number > 15)
                $number = 15;

            $news_cat = $instance['news_cat'];

            $r = new WP_Query(array('cat' => $news_cat, 'showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'caller_get_posts' => 1));
            if ($r->have_posts()) :
?>
<?php echo $before_widget; ?>
<?php echo $before_title . $title . $after_title; ?>
                <ul class="news-list">
    <?php while ($r->have_posts()) : $r->the_post(); ?>
                    <li><a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php
                    if (get_the_title ())
                        the_title(); else
                        the_ID(); ?> </a><p><?php the_time(modesto_get_option('date_format')); ?> in <?php the_category(', '); ?></p></li>
    <?php endwhile; ?>
                </ul>
<?php echo $after_widget; ?>
<?php
                    wp_reset_query();  // Restore global post data stomped by the_post().
                endif;
            }

            function update($new_instance, $old_instance) {
                $instance = $old_instance;
                $instance['title'] = strip_tags($new_instance['title']);
                $instance['number'] = (int) $new_instance['number'];
                $instance['news_cat'] = $new_instance['news_cat'];

                return $instance;
            }

            function form($instance) {
                $title = isset($instance['title']) ? esc_attr($instance['title']) : __('Recent News', $domain);
                if (!isset($instance['number']) || !$number = (int) $instance['number'])
                    $number = 5;

                $news_cat = $instance['news_cat'];

                $pn_categories_obj = get_categories('hide_empty=0');
                $pn_categories = array();
?>

                <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: </label>
                    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
                <p><label for="<?php echo $this->get_field_id('news_cat'); ?>">Category:</label>
                    <select class="widefat" id="<?php echo $this->get_field_id('news_cat'); ?>" name="<?php echo $this->get_field_name('news_cat'); ?>">
                        <option value=""><?php _e('All', $domain) ?></option>
        <?php
                foreach ($pn_categories_obj as $pn_cat) {
                    // if($pn_cat->cat_ID==$news_cat) : $selected = ' select="selected"'; else : ''; endif;
                    echo '<option value="' . $pn_cat->cat_ID . '" ' . selected($pn_cat->cat_ID, $news_cat) . '>' . $pn_cat->cat_name . '</option>';
                }
        ?>
            </select></p>

        <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:'); ?></label>
            <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /><br />
            <small><?php _e('(at most 15)'); ?></small></p>
<?php
            }

        }

        register_widget('News');


        /* ========
          SEARCH
          ============================================================= */

        class Search extends WP_Widget {

            function Search() {
                global $theme, $short, $version, $domain, $options;
                $widget_ops = array('classname' => 'search', 'description' => __('Search form for', $domain) . ' ' . $theme);
                $this->WP_Widget('search', $theme . ' ' . __('Search', $domain), $widget_ops);
            }

            function widget($args, $instance) {

                global $theme, $short, $version, $domain, $options;
                extract($args);

                $title = empty($instance['text']) ? __('Search', $domain) : strip_tags($instance['title']);
?>
<?php echo $before_widget; ?>
<?php echo $before_title . $title . $after_title; ?>

<?php get_search_form(); ?>

<?php echo $after_widget; ?>
<?php
            }

            function update($new_instance, $old_instance) {

                $instance['title'] = strip_tags($new_instance['title']);

                return $new_instance;
            }

            function form($instance) {

                global $theme, $short, $version, $domain, $options;

                $instance = wp_parse_args((array) $instance, array('title' => ''));
                $title = empty($instance['text']) ? __('Search', $domain) : strip_tags($instance['title']);
?>

                <p>
                    <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title'); ?>:
                        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
                    </label>
                </p>

<?php
            }

        }

        register_widget('Search');


        /* =========================
          DISPLAY TWITTER ENTRIES
          ============================================================= */

        define('MAGPIE_CACHE_ON', 1); //2.7 Cache Bug
        define('MAGPIE_CACHE_AGE', 180);
        define('MAGPIE_INPUT_ENCODING', 'UTF-8');
        define('MAGPIE_OUTPUT_ENCODING', 'UTF-8');

        $twitter_options['widget_fields']['title'] = array('label' => 'Title:', 'type' => 'text', 'default' => '');
        $twitter_options['widget_fields']['username'] = array('label' => 'Username:', 'type' => 'text', 'default' => '');
        $twitter_options['widget_fields']['num'] = array('label' => 'Number of links:', 'type' => 'text', 'default' => '5');
        $twitter_options['widget_fields']['update'] = array('label' => 'Show timestamps:', 'type' => 'checkbox', 'default' => true);
        $twitter_options['widget_fields']['linked'] = array('label' => 'Linked:', 'type' => 'text', 'default' => '#');
        $twitter_options['widget_fields']['hyperlinks'] = array('label' => 'Discover Hyperlinks:', 'type' => 'checkbox', 'default' => true);
        $twitter_options['widget_fields']['twitter_users'] = array('label' => 'Discover @replies:', 'type' => 'checkbox', 'default' => true);
        $twitter_options['widget_fields']['encode_utf8'] = array('label' => 'UTF8 Encode:', 'type' => 'checkbox', 'default' => false);


        $twitter_options['prefix'] = 'twitter';

// Display Twitter messages
        function twitter_messages($username = '', $num = 1, $list = false, $update = true, $linked = '#', $hyperlinks = true, $twitter_users = true, $encode_utf8 = false) {

            global $twitter_options;
            include_once(ABSPATH . WPINC . '/rss.php');

            $messages = fetch_rss('http://twitter.com/statuses/user_timeline/' . $username . '.rss');

            if ($list)
                echo '<ul class="twitter">';

            if ($username == '') {
                if ($list)
                    echo '<li>';
                echo 'RSS not configured';
                if ($list)
                    echo '</li>';
            } else {
                if (empty($messages->items)) {
                    if ($list)
                        echo '<li>';
                    echo 'No public Twitter messages.';
                    if ($list)
                        echo '</li>';
                } else {
                    $i = 0;
                    foreach ($messages->items as $message) {
                        $msg = " " . substr(strstr($message['description'], ': '), 2, strlen($message['description'])) . " ";
                        if ($encode_utf8)
                            $msg = utf8_encode($msg);
                        $link = $message['link'];

                        if ($list)
                            echo '<li class="twitter-item">'; elseif ($num != 1)
                            echo '<p class="twitter-message">';

                        if ($hyperlinks) {
                            $msg = hyperlinks($msg);
                        }
                        if ($twitter_users) {
                            $msg = twitter_users($msg);
                        }

                        if ($linked != '' || $linked != false) {
                            if ($linked == 'all') {
                                $msg = '<a href="' . $link . '" class="twitter-link">' . $msg . '</a>';  // Puts a link to the status of each tweet
                            } else {
                                $msg = $msg . '<a href="' . $link . '" class="twitter-link">' . $linked . '</a>'; // Puts a link to the status of each tweet
                            }
                        }

                        echo $msg;


                        if ($update) {
                            $time = strtotime($message['pubdate']);

                            if (( abs(time() - $time) ) < 86400)
                                $h_time = sprintf(__('%s ago'), human_time_diff($time));
                            else
                                $h_time = date(__('Y/m/d'), $time);

                            echo sprintf(__('%s', 'twitter-for-wordpress'), ' <span class="twitter-timestamp"><abbr title="' . date(__('Y/m/d H:i:s'), $time) . '">' . $h_time . '</abbr></span>');
                        }

                        if ($list)
                            echo '</li>'; elseif ($num != 1)
                            echo '</p>';

                        $i++;
                        if ($i >= $num)
                            break;
                    }
                }
            }
            if ($list)
                echo '</ul>';
        }

// Link discover stuff

        function hyperlinks($text) {
            // Props to Allen Shaw & webmancers.com
            // match protocol://address/path/file.extension?some=variable&another=asf%
            //$text = preg_replace("/\b([a-zA-Z]+:\/\/[a-z][a-z0-9\_\.\-]*[a-z]{2,6}[a-zA-Z0-9\/\*\-\?\&\%]*)\b/i","<a href=\"$1\" class=\"twitter-link\">$1</a>", $text);
            $text = preg_replace('/\b([a-zA-Z]+:\/\/[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i', "<a href=\"$1\" class=\"twitter-link\">$1</a>", $text);
            // match www.something.domain/path/file.extension?some=variable&another=asf%
            //$text = preg_replace("/\b(www\.[a-z][a-z0-9\_\.\-]*[a-z]{2,6}[a-zA-Z0-9\/\*\-\?\&\%]*)\b/i","<a href=\"http://$1\" class=\"twitter-link\">$1</a>", $text);
            $text = preg_replace('/\b(?<!:\/\/)(www\.[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i', "<a href=\"http://$1\" class=\"twitter-link\">$1</a>", $text);

            // match name@address
            $text = preg_replace("/\b([a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]*\@[a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]{2,6})\b/i", "<a href=\"mailto://$1\" class=\"twitter-link\">$1</a>", $text);
            //mach #trendingtopics. Props to Michael Voigt
            $text = preg_replace('/([\.|\,|\:|\¡|\¿|\>|\{|\(]?)#{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/#search?q=$2\" class=\"twitter-link\">#$2</a>$3 ", $text);
            return $text;
        }

        function twitter_users($text) {
            $text = preg_replace('/([\.|\,|\:|\¡|\¿|\>|\{|\(]?)@{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/$2\" class=\"twitter-user\">@$2</a>$3 ", $text);
            return $text;
        }

// Twitter widget stuff
        function widget_twitter_init() {

            if (!function_exists('register_sidebar_widget'))
                return;

            $check_options = get_option('widget_twitter');
            if ($check_options['number'] == '') {
                $check_options['number'] = 1;
                update_option('widget_twitter', $check_options);
            }

            function widget_twitter($args, $number = 1) {

                global $twitter_options;

                // $args is an array of strings that help widgets to conform to
                // the active theme: before_widget, before_title, after_widget,
                // and after_title are the array keys. Default tags: li and h2.
                extract($args);

                // Each widget can store its own options. We keep strings here.
                include_once(ABSPATH . WPINC . '/rss.php');
                $options = get_option('widget_twitter');

                // fill options with default values if value is not set
                $item = $options[$number];
                foreach ($twitter_options['widget_fields'] as $key => $field) {
                    if (!isset($item[$key])) {
                        $item[$key] = $field['default'];
                    }
                }

                $messages = fetch_rss('http://twitter.com/statuses/user_timeline/' . $item['username'] . '.rss');


                // These lines generate our output.
                echo $before_widget . $before_title . '<a href="http://twitter.com/' . $item['username'] . '" class="twitter_title_link">' . $item['title'] . '</a>' . $after_title;
                twitter_messages($item['username'], $item['num'], true, $item['update'], $item['linked'], $item['hyperlinks'], $item['twitter_users'], $item['encode_utf8']);
                echo $after_widget;
            }

            // This is the function that outputs the form to let the users edit
            // the widget's title. It's an optional feature that users cry for.
            function widget_twitter_control($number) {

                global $twitter_options;

                // Get our options and see if we're handling a form submission.
                $options = get_option('widget_twitter');
                if (isset($_POST['twitter-submit'])) {

                    foreach ($twitter_options['widget_fields'] as $key => $field) {
                        $options[$number][$key] = $field['default'];
                        $field_name = sprintf('%s_%s_%s', $twitter_options['prefix'], $key, $number);

                        if ($field['type'] == 'text') {
                            $options[$number][$key] = strip_tags(stripslashes($_POST[$field_name]));
                        } elseif ($field['type'] == 'checkbox') {
                            $options[$number][$key] = isset($_POST[$field_name]);
                        }
                    }

                    update_option('widget_twitter', $options);
                }

                foreach ($twitter_options['widget_fields'] as $key => $field) {

                    $field_name = sprintf('%s_%s_%s', $twitter_options['prefix'], $key, $number);
                    $field_checked = '';
                    if ($field['type'] == 'text') {
                        $field_value = htmlspecialchars($options[$number][$key], ENT_QUOTES);
                    } elseif ($field['type'] == 'checkbox') {
                        $field_value = 1;
                        if (!empty($options[$number][$key])) {
                            $field_checked = 'checked="checked"';
                        }
                    }

                    printf('<p style="text-align:right;" class="twitter_field"><label for="%s">%s <input id="%s" name="%s" type="%s" value="%s" class="%s" %s /></label></p>',
                            $field_name, __($field['label']), $field_name, $field_name, $field['type'], $field_value, $field['type'], $field_checked);
                }

                echo '<input type="hidden" id="twitter-submit" name="twitter-submit" value="1" />';
            }

            function widget_twitter_setup() {
                $options = $newoptions = get_option('widget_twitter');

                if (isset($_POST['twitter-number-submit'])) {
                    $number = (int) $_POST['twitter-number'];
                    $newoptions['number'] = $number;
                }

                if ($options != $newoptions) {
                    update_option('widget_twitter', $newoptions);
                    widget_twitter_register();
                }
            }

            function widget_twitter_page() {
                $options = $newoptions = get_option('widget_twitter');
?>
<?php
            }

            function widget_twitter_register() {

                $options = get_option('widget_twitter');
                $dims = array('width' => 300, 'height' => 300);
                $class = array('classname' => 'widget_twitter');

                for ($i = 1; $i <= 9; $i++) {
                    $name = sprintf(__('Twitter'), $i);
                    $id = "twitter-$i"; // Never never never translate an id
                    wp_register_sidebar_widget($id, $name, $i <= $options['number'] ? 'widget_twitter' : /* unregister */ '', $class, $i);
                    wp_register_widget_control($id, $name, $i <= $options['number'] ? 'widget_twitter_control' : /* unregister */ '', $dims, $i);
                }

                add_action('sidebar_admin_setup', 'widget_twitter_setup');
                add_action('sidebar_admin_page', 'widget_twitter_page');
            }

            widget_twitter_register();
        }

// Run our code later in case this loads prior to any required plugins.
        add_action('widgets_init', 'widget_twitter_init');


/* ========================
DISPLAY FLICKR CONTENT
============================================================= */

        class Flickr extends WP_Widget {

            function Flickr() {
                global $theme, $short, $version, $domain, $options;
                $widget_ops = array('classname' => 'flickr', 'description' => __('Display flickr badge in', $domain) . ' ' . $theme);
                $this->WP_Widget('flickr', $domain . ' ' . __('Flickr', $domain), $widget_ops);
            }

            function widget($args, $instance) {

                global $theme, $short, $version, $domain, $options;

                extract($args);

                $title = empty($instance['title']) ? __('<span style="color:#3993ff">Flick<span style="color:#ff1c92">r</span></span> Fotos', $domain) : apply_filters('widget_title', $instance['title']);
                $user = empty($instance['user']) ? modesto_get_option('flickr') : $instance['user'];

                if (!$nr = (int) $instance['flickr_nr'])
                    $nr = 6;
                else if ($nr < 1)
                    $nr = 3;
                else if ($nr > 15)
                    $nr = 15;
?>
<?php
                if ($big) : echo '<div class="widget_flickr wide">';
                else : echo $before_widget;
                endif;
?>
<?php echo $before_title . $title . $after_title; ?>

                <div id="flickr-content"></div>

                <script type="text/javascript">
                    jQuery(document).ready(function(){
                        jQuery('#flickr-content').jflickrfeed({
                            limit: <?php echo $nr; ?>,
                            qstrings: {
                                id: '<?php echo $user; ?>'
                            },
                            itemTemplate:
                                '<div class="flickr-image">' +
                                '<a href="{{link}}" title="{{title}}" rel="prettyPhoto">' +
                                '<img src="{{image_s}}" alt="{{title}}" width="45" height="45"/>' +
                                '</a>' +
                                '</div>'
                        });
                    });
                </script>

<?php echo $after_widget; ?>
<?php
            }

            function update($new_instance, $old_instance) {

                $instance['title'] = strip_tags($new_instance['title']);
                $instance['user'] = strip_tags($new_instance['user']);
                $instance['flickr_nr'] = (int) $new_instance['flickr_nr'];

                return $new_instance;
            }

            function form($instance) {

                global $theme, $short, $version, $domain, $options;

                $instance = wp_parse_args((array) $instance, array('title' => '', 'user' => '', 'flickr_nr' => ''));
                $title = strip_tags($instance['title']);
                $user = empty($instance['user']) ? modesto_get_option('flickr') : $instance['user'];
                if (!$nr = (int) $instance['flickr_nr'])
                    $nr = 6;
?>

                <p>
                    <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title'); ?>:
                        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
                    </label>
                </p>

                <p>
                    <label for="<?php echo $this->get_field_id('user'); ?>"><?php _e('User ID'); ?>:
                        <input class="widefat" id="<?php echo $this->get_field_id('user'); ?>" name="<?php echo $this->get_field_name('user'); ?>" type="text" value="<?php echo esc_attr($user); ?>" />
                    </label>
                    <small>Don't know your ID? Head on over to <a href="http://idgettr.com">idgettr</a> to find it.</small>
                </p>

                <p>
                    <label for="<?php echo $this->get_field_id('flickr_nr'); ?>"><?php _e('Number of fotos to show', $domain); ?>:</label>
                    <input id="<?php echo $this->get_field_id('flickr_nr'); ?>" name="<?php echo $this->get_field_name('flickr_nr'); ?>" type="text" value="<?php echo $nr; ?>" size="3" /><br />
                    <small><?php _e('(at most 15)'); ?></small>
                </p>

<?php
            }

        }

        register_widget('Flickr');


        /* ===============
          ABOUT WIDGET
          ============================================================= */

        class About extends WP_Widget {

            function About() {
                global $theme, $short, $version, $domain, $options;
                $widget_ops = array('classname' => 'widget_about', 'description' => __('Display about section in', $domain) . ' ' . $theme);
                $this->WP_Widget('about', $theme . ' ' . __('About', $domain), $widget_ops);
            }

            function widget($args, $instance) {

                global $theme, $short, $version, $domain, $options;

                extract($args);

                $title = empty($instance['title']) ? __('About Us', $domain) : $instance['title'];
                $avatar = $instance['about_avatar'] ? '1' : '0';
                $text = empty($instance['about_text']) ? __('Your text about you.', $domain) : $instance['about_text'];
                $link = (int) $instance['about_link'];
                $label = empty($instance['about_label']) ? __('More', $domain) : $instance['about_label'];
?>
<?php
                echo $before_widget;
                echo $before_title . $title . $after_title; ?>

<?php if ($avatar) : ?>
<?php echo get_avatar(get_bloginfo('admin_email'), '55'); ?>
<?php endif; ?>

                    <p><?php echo nl2br($text); ?></p>

<?php if ($link) : ?><p><a href="<?php echo get_permalink($link); ?>" class="button"><span><?php echo $label; ?></span></a></p><?php endif; ?>

<?php echo $after_widget; ?>
<?php
                    }

                    function update($new_instance, $old_instance) {

                        $instance['title'] = empty($new_instance['title']) ? __('About Us', $domain) : $new_instance['title'];
                        $instance['about_avatar'] = $new_instance['about_avatar'] ? 1 : 0;
                        $instance['about_text'] = strip_tags($new_instance['about_text']);
                        $instance['about_link'] = (int) $new_instance['about_link'];
                        $instance['about_label'] = empty($new_instance['about_label']) ? __('More', $domain) : $new_instance['about_label'];

                        return $new_instance;
                    }

                    function form($instance) {

                        $instance = wp_parse_args((array) $instance, array('title' => '', 'about_avatar' => '', 'about_text' => '', 'about_link' => '', 'about_label' => '', 'about_big' => ''));
                        $title = empty($instance['title']) ? __('About Us', $domain) : $instance['title'];
                        $avatar = $instance['about_avatar'] ? '1' : '0';
                        $text = empty($instance['about_text']) ? __('Your text about you.', $domain) : $instance['about_text'];
                        $link = $instance['about_link'];
                        $label = empty($instance['about_label']) ? __('More', $domain) : $instance['about_label'];
?>

                        <p>
                            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title'); ?>:
                                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
                            </label>
                        </p>

                        <p>
                            <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('about_avatar'); ?>" name="<?php echo $this->get_field_name('about_avatar'); ?>"<?php checked($avatar); ?> />
                            <label for="<?php echo $this->get_field_id('about_avatar'); ?>">Show admin\'s avatar</label>
                        </p>

                        <p>
                            <label for="<?php echo $this->get_field_id('about_text'); ?>">Text:
                                <textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id('about_text'); ?>" name="<?php echo $this->get_field_name('about_text'); ?>"><?php echo esc_attr($text); ?></textarea>
                            </label>
                        </p>

                        <p>
                            <label for="<?php echo $this->get_field_id('about_link'); ?>">Post/page ID for link:</label>
                            <input id="<?php echo $this->get_field_id('about_link'); ?>" name="<?php echo $this->get_field_name('about_link'); ?>" type="text" value="<?php echo $link; ?>" size="3" />
                        </p>

                        <p>
                            <label for="<?php echo $this->get_field_id('about_label'); ?>">Link label:
                                <input class="widefat" id="<?php echo $this->get_field_id('about_label'); ?>" name="<?php echo $this->get_field_name('about_label'); ?>" type="text" value="<?php echo esc_attr($label); ?>" />
                            </label>
                        </p>

<?php
                    }

                }

                register_widget('About');


                /* ====================
                  UNREGISTER WIDGETS
                  ============================================================= */

                function unregister_default_wp_widgets() {

                    unregister_widget('WP_Widget_Search');
				unregister_widget('WP_Recent_News');
                    unregister_widget('WP_Widget_Recent_Posts');
                }

                add_action('widgets_init', 'unregister_default_wp_widgets', 1);
?>
