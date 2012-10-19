<?php

/**
 * Checks if the value of the Facebook field is URL or username.
 *
 * @param <type> $string
 * @return boolean
 */
function padd_check_facebook_url($string) {
	$url = false;
	if ('http://' == substr($string, 0, 7)) {
		$url = true;
	}
	return $url;
}

/**
 * Renders the list of social networking websites.
 */
function padd_theme_widget_socialnet() {
	global $padd_socialnet;
	$fburl = get_option(PADD_NAME_SPACE . '_sn_username_facebook');
	if (!padd_check_facebook_url($fburl)) {
		$padd_socialnet['facebook']->set_username($fburl);
		$fburl = (string) $padd_socialnet['facebook'];
	}
	$padd_socialnet['feedburner']->set_username(get_option(PADD_NAME_SPACE . '_sn_username_feedburner'));
	$padd_socialnet['twitter']->set_username(get_option(PADD_NAME_SPACE . '_sn_username_twitter'));
?>
<ul class="socialnet">
	<li class="facebook">
		<?php echo sprintf(__('<a href="%s">Facebook</a>', PADD_THEME_SLUG), $fburl); ?>
	</li>
	<!--
	<li class="twitter">
		<?php echo sprintf(__('<a href="%s">Twitter</a>', PADD_THEME_SLUG), $padd_socialnet['twitter']); ?>
	</li>
	-->
        <li class="vk">
                <a href="http://vk.com/thevenusproject">Вконтакте</a>
        </li>

	<li class="rss">
		<?php echo sprintf(__('<a href="%s">RSS</a>', PADD_THEME_SLUG), $padd_socialnet['feedburner']); ?>
	</li>
</ul>
<?php
}

/**
 * Renders the Feedburner subscription form.
 *
 * @param string $description
 */
function padd_theme_widget_feedburner($description = '') {
	global $padd_socialnet;
	$padd_socialnet['feedburner']->set_username(get_option(PADD_NAME_SPACE . '_sn_username_feedburner'));
?>
<p><?php echo $description; ?></p>
<form id="subscribe" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/emailverifySubmit?uri=<?php echo urlencode($padd_socialnet['feedburner']); ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520'); return true">
	<span class="input"><input type="text" value="Введите свой email" onfocus="if (this.value == 'Введите свой email') {this.value = '';}" onblur="if (this.value == '') { this.value = 'Введите свой email'; }" name="email" /></span>
	<button type="submit"><span>Подписаться</span></button>
	<input type="hidden" value="<?php echo $padd_socialnet['feedburner']->get_username(); ?>" name="uri"/>
	<input type="hidden" value="Подписка на обновления" name="title" />
</form>
<?php
}


/**
 * Renders the twitter widget.
 */
function padd_theme_widget_twitter() {
	global $padd_socialnet;
	$padd_socialnet['twitter']->set_username(get_option(PADD_NAME_SPACE . '_sn_username_twitter'));
	$padd_sb_twitter = get_option(PADD_NAME_SPACE . '_sn_username_twitter');
	$twitter = new Padd_Twitter($padd_sb_twitter,1,false);
	$twitter->show_tweets();
	?>
	<p class="follow"><a href="<?php echo $padd_socialnet['twitter']; ?>">Twitter</a></p>
	<?php
}


/**
 * Renders the banner advertisement
 */
function padd_theme_widget_banner() {
	$ads = get_option(PADD_NAME_SPACE . '_ads_728090_1','');
	echo stripslashes($ads);
}


/**
 * Renders the advertisements.
 */
function padd_theme_widget_sponsors() {
	$ad = get_option(PADD_NAME_SPACE . '_ads_300250_1','');
	echo stripslashes($ad);
}


/**
 * Renders the advertisements.
 */
function padd_theme_widget_sponsors_text() {
	$ad = get_option(PADD_NAME_SPACE . '_ads_468015_1','');
	echo stripslashes($ad);
}


/**
 * Renders the advertisements.
 */
function padd_theme_widget_sponsors_space() {
	$ad = get_option(PADD_NAME_SPACE . '_ads_space_1','');
	echo stripslashes($ad);
}


/**
 * Renders the advertisements.
 */
function padd_theme_widget_sponsors_skyscraper() {
	$ad = get_option(PADD_NAME_SPACE . '_ads_160600_1','');
	echo stripslashes($ad);
}

/**
 * Renders the list of bookmarks.
 */
function padd_theme_widget_bookmarks() {
	$array = array();
	$array[] = 'category_before=';
	$array[] = 'category_after=';
	$array[] = 'categorize=0';
	$array[] = 'title_li=';
	wp_list_bookmarks(implode('&',$array));
}

/**
 * Renders the message in home page.
 */
function padd_theme_widget_motd() {
	$msg = get_option(PADD_NAME_SPACE . '_motd','');
	echo '<p class="motd">' . stripslashes($msg) . '</p>';
}


/**
 * Renders the excerpt of the page.
 */
function padd_theme_page_box($pid,$class) {
?>
<div class="box box-<?php echo $class; ?>">
	<?php
		wp_reset_query();
		query_posts('page_id=' . $pid);
		the_post();
	?>
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<div class="interior">
		<p><?php echo wp_trim_excerpt(''); ?></p>
		<p class="read-more"><a href="<?php the_permalink(); ?>">Далее</a></p>
	</div>
	<?php wp_reset_query(); ?>
</div>
<?php
}

/**
 * Renders the recent posts, optionally with dates.
 *
 * @global WP_DB $wpdb
 * @global string $wp_locale
 * @param array|string $args
 * @return string
 */
function padd_theme_widget_recent_posts($args = '') {
	global $wpdb, $wp_locale;

	$defaults = array(
		'limit' => '',
		'format' => 'html', 'before' => '',
		'after' => '', 'show_post_count' => false,
		'echo' => 1, 'show_date' => true, 'date_format' => 'd.m.Y'
	);

	$r = wp_parse_args($args,$defaults);
	extract($r, EXTR_SKIP);

	if ('' == $type) {
		$type = 'monthly';
	}

	if ('' != $limit) {
		$limit = absint($limit);
		$limit = ' LIMIT ' . $limit;
	}

	$where = apply_filters('getarchives_where',"WHERE post_type = 'post' AND post_status = 'publish'",$r);
	$join = apply_filters('getarchives_join',"", $r);

	$output = '';

	$orderby = "post_date DESC ";
	$query = "SELECT * FROM $wpdb->posts $join $where ORDER BY $orderby $limit";
	$key = md5($query);
	$cache = wp_cache_get('padd_recent_posts','general');
	if (!isset($cache[ $key ])) {
		$arcresults = $wpdb->get_results($query);
		$cache[$key] = $arcresults;
		wp_cache_set('padd_recent_posts',$cache,'general');
	} else {
		$arcresults = $cache[$key];
	}
	if ($arcresults) {
		foreach ((array) $arcresults as $arcresult) {
			if ($arcresult->post_date != '0000-00-00 00:00:00' ) {
				$url = get_permalink($arcresult);
				$arc_title = $arcresult->post_title;
				if ($arc_title) {
					$text = strip_tags(apply_filters('the_title', $arc_title));
				} else {
					$text = $arcresult->ID;
				}
				$img = trim(get_the_post_thumbnail($arcresult->ID, PADD_THEME_SLUG . '-aside'));
				$def = get_template_directory_uri() . '/images/thumbnail-aside.jpg';
				if (empty($img)) {
					$img = '<img src="' . $def . '" alt="Thumbnail" />';
				}
				$output .= '<li>';
				$output .= '<a href="' . get_permalink($arcresult->ID) . '" title="Постоянная ссылка: ' . $text . '">' . $img . '</a>';
				$output .= '<a href="' . get_permalink($arcresult->ID) . '" title="Постоянная ссылка: ' . $text . '" class="post-title">' . $text . '</a> ';
				$output .= '<span class="meta">';
				$output .= date(__('d.m.Y', PADD_THEME_SLUG), strtotime($arcresult->post_date));
				$output .= ', ';
				$comments = '';
				$c = $arcresult->comment_count;
				if ($c == 0) {
					$comments = __('Ваш отзыв', PADD_THEME_SLUG);
				} else if ($c > 1) {
					$comments = sprintf(__('Отзывов (%s)', PADD_THEME_SLUG), $c);
				} else {
					$comments = __('1 отзыв', PADDP_THEME_SLUG);
				}
				$output .= $comments;
				$output .= '</li>';
				//$output .= get_archives_link($url, $text, $format, $before, ' - ' . date($date_format,strtotime($arcresult->post_date)) . $after);
			}
		}
	}

	if ($echo) {
		echo $output;
	} else {
		return $output;
	}
}

/**
 * Renders the list of recent comments.
 *
 * @global object $wpdb
 * @global array $comments
 * @global array $comment
 * @param int $limit
 */
function padd_theme_widget_recent_comments($limit=5) {
	global $wpdb, $comments, $comment;

	if ( !$comments = wp_cache_get( 'recent_comments', 'widget' ) ) {
		$comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_approved = '1' ORDER BY comment_date_gmt DESC LIMIT $limit");
		wp_cache_add( 'recent_comments', $comments, 'widget' );
	}
	echo '<ul class="comments-recent">';
	if ( $comments ) :
		foreach ( (array) $comments as $comment) :
			echo  '<li class="comments-recent">' . sprintf(__('%1$s на %2$s', PADD_THEME_SLUG), get_comment_author_link(), '<a href="'. get_comment_link($comment->comment_ID) . '">' . get_the_title($comment->comment_post_ID) . '</a>') . '</li>';
		endforeach;
	endif;
	echo '</ul>';
}


/**
 * Renders the tabbed widget.
 */
function padd_theme_widget_tabs() {
	?>
<div id="sidebar-tabs">
	<ul class="header">
		<li class="pop"><a href="#tab-pop"><?php echo __('Ссылки', PADD_THEME_SLUG); ?></a></li>
		<li class="rcp"><a href="#tab-rcp"><?php echo __('Архивы', PADD_THEME_SLUG); ?></a></li>
		<li class="rcc"><a href="#tab-rcc"><?php echo __('Рубрики', PADD_THEME_SLUG); ?></a></li>
	</ul>
	<div id="tab-pop">
		<h4><?php echo __('Ссылки', PADD_THEME_SLUG); ?></h4>
		<ul>
			<?php padd_theme_widget_bookmarks(); ?>
		</ul>
	</div>
	<div id="tab-rcp">
		<h4><?php echo __('Архивы', PADD_THEME_SLUG); ?></h4>
		<ul>
			<?php wp_get_archives(); ?>
		</ul>
	</div>
	<div id="tab-rcc">
		<h4><?php echo __('Рубрики', PADD_THEME_SLUG); ?></h4>
		<ul>
			<?php wp_list_categories('title_li='); ?>
		</ul>
	</div>
</div>
	<?php
}

/**
 * Renders the Facebook Like Box.
 *
 * @paran string $id Facebook numerical ID
 * @param int $w Width of the box
 * @param int $h Height of the box
 * @param int $conn Number of connections
 * @param int $stream News feed streaming. 1 to enable, 0 to disable. The default value is 0.
 * @param int $header Like Box header. 1 to show, 0 to hide. The default value is 0.
 */
function padd_theme_widget_facebook_likebox($w=330,$h=270,$conn=10,$stream=0,$header=0) {
	global $padd_socialnet;
	$fburl = get_option(PADD_NAME_SPACE . '_sn_username_facebook');
	if (!padd_check_facebook_url($fburl)) {
		$padd_socialnet['facebook']->set_username($fburl);
		$fburl = (string) $padd_socialnet['facebook'];
	}
?>
<iframe src="http://www.facebook.com/plugins/likebox.php?href=<?php echo urlencode($fburl); ?>&amp;width=<?php echo $w; ?>&amp;connections=<?php echo $conn; ?>&amp;stream=<?php echo $stream == 1 ? 'true' : 'false'; ?>&amp;header=<?php echo $header == 1 ? 'true' : 'false'; ?>&amp;height=<?php echo $h; ?>" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:<?php echo $w; ?>px; height:<?php echo $h; ?>px;"></iframe>
<?php
}


/**
 * Renders the list of comments.
 *
 * @param string $comment
 * @param string $args
 * @param string $depth
 */
function padd_theme_single_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
		<div class="comment">
			<div class="comment-interior append-clear">
				<div class="comment-author append-clear">
					<div class="comment-avatar"><?php echo get_avatar($comment,'33'); ?></div>
					<div class="comment-meta">
						<span class="author"><?php echo sprintf(__('%s пишет:', PADD_THEME_SLUG), get_comment_author_link()); ?></span>
						<span class="time"><?php echo get_comment_date(get_option('date_format')); ?></span>
					</div>
				</div>
				<div class="comment-details">
					<div class="comment-details-interior">
						<?php comment_text(); ?>
						<?php if ($comment->comment_approved == '0') : ?>
						<p class="comment-notice"><?php _e('Спасибо! Ваш комментарий ожидает проверки.', PADD_THEME_SLUG) ?></p>
						<?php endif; ?>
					</div>
				</div>
				<div class="comment-actions clear">
					<?php edit_comment_link(__('Править', PADD_THEME_SLUG),'<span class="edit">','</span> | ') ?>
					<?php comment_reply_link(array_merge( $args, array('respond_id' => 'reply' ,'add_below' => 'reply', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>
			</div>
		</div>
	<?php
}


/**
 * Render the list of trackbacks.
 *
 * @param string $comment
 * @param string $args
 * @param string $depth
 */
function padd_theme_single_trackbacks($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="pings-<?php comment_ID() ?>">
		<?php comment_author_link(); ?>
	<?php
}


/**
 * Renders the featured posts in home page.
 */
function padd_theme_post_featured_posts($exclude=array()) {
	wp_reset_query();
	$featured = get_option(PADD_NAME_SPACE . '_slideshow_cat_id','1');
	$count = get_option(PADD_NAME_SPACE . '_slideshow_cat_limit');
	query_posts('showposts=' . $count . '&cat=' . $featured);
	$padd_image_def = get_template_directory_uri() . '/images/thumbnail-gallery.jpg';
	add_filter('excerpt_length', 'padd_theme_hook_excerpt_featured_length');
?>
<div id="slideshow">
	<div class="list">
	<?php while (have_posts()) : the_post(); ?>
		<div class="item append-clear">
			<div class="image">
				<a href="<?php the_permalink(); ?>" title="Постоянная ссылка: <?php the_title_attribute(); ?>">
				<?php
					$exclude[] = get_the_ID();
					if (has_post_thumbnail()) {
						the_post_thumbnail(PADD_THEME_SLUG . '-gallery', array('title' => get_the_excerpt()));
					} else {
						echo '<img class="thumbnail" src="' . $padd_image_def . '" />';
					}
				?>
				</a>
			</div>
			<div class="meta">
				<h3><a href="<?php the_permalink(); ?>" title="Постоянная ссылка: <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<p class="info">
					<?php echo sprintf(__('<span class="author">%1$s</span> на %2$s', PADD_THEME_SLUG), get_the_author_link(), get_the_date(__('d.m.Y', PADD_THEME_SLUG))); ?>
					&raquo;
					<a href="<?php echo get_comments_link(); ?>"><?php comments_number(__('Ваш отзыв', PADD_THEME_SLUG), __('1 отзыв', PADD_THEME_SLUG), __('Отзывов (%)'), PADD_THEME_SLUG); ?></a>
				</p>
				<?php the_excerpt(); ?>
				<p class="read-more"><a href="<?php the_permalink(); ?>" title="Постоянная ссылка: <?php the_title_attribute(); ?>"><span>Далее</span></a></p>
			</div>
		</div>
	<?php endwhile; ?>
	</div>
</div>
<?php
	wp_reset_query();
	remove_filter('excerpt_length','padd_theme_hook_excerpt_featured_length');
	return $exclude;
}

function padd_theme_share_button($class='share') {
?>
<ul>
	<li class="facebook"><a name="fb_share" type="button_count" share_url="<?php the_permalink(); ?>"><?php echo __('Поделитесь с другими', PADD_THEME_SLUG); ?></a></li>
	<li class="twitter"><a href="http://twitter.com/share?url=<?php echo urlencode(get_permalink());?>&amp;count=horizontal" class="twitter-share-button">Twitter</a></li>
</ul>
<?php
}


/**
 * Renders the theme credits.
 */
function padd_theme_credits() {
	do_action(__FUNCTION__);
}
