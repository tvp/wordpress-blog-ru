<?php

$padd_options = array();

$padd_options['general'] = array(
	new Padd_Theme_Input(
		PADD_NAME_SPACE . '_favicon_url',
		__('Ссылка на фавиконку', PADD_THEME_SLUG),
		__('Введите адрес, где расположена фавиконка. Должен начинаться с <code>http://</code> или <code>https://</code>.', PADD_THEME_SLUG),
		array('type' => 'upload', 'width' => 500, 'switch_no' => 1)
	),
	new Padd_Theme_Input(
		PADD_NAME_SPACE . '_show_trackbacks',
		__('Показывать трекбеки', PADD_THEME_SLUG),
		__('Отметьте, если хотите показывать трекбеки.', PADD_THEME_SLUG),
		array('type' => 'checkbox')
	),
);

$padd_options['slideshow'] = array(
    new Padd_Theme_Input(
		PADD_NAME_SPACE . '_slideshow_enable',
		__('Показывать слайд-шоу', PADD_THEME_SLUG),
		__('Отметьте, если хотите показывать слайд-шоу.', PADD_THEME_SLUG),
		array('type' => 'checkbox')
	),
    new Padd_Theme_Input(
		PADD_NAME_SPACE . '_slideshow_cat_id',
		__('Рубрика слайд-шоу', PADD_THEME_SLUG),
		__('Рубрика, записи из котрой должны показываться в качестве слайд-шоу на главной под основным меню.', PADD_THEME_SLUG),
		array('type' => 'category', 'width' => 250)
	),
	new Padd_Theme_Input(
		PADD_NAME_SPACE . '_slideshow_cat_limit',
		__('Количество слайдов', PADD_THEME_SLUG),
		__('Введите количество слайдов для показа. Рекомендуется 3 и более.', PADD_THEME_SLUG),
		array('type' => 'textfield', 'width' => 100)
	),
	new Padd_Theme_Input(
		PADD_NAME_SPACE . '_slideshow_effect',
		__('Эффект слайд-шоу', PADD_THEME_SLUG),
		__('Эффект при показе слайдов.', PADD_THEME_SLUG),
		array('type' => 'dropdown', 'choices' => array(
			'none' => __('None', PADD_THEME_SLUG),
			'fade' => __('Fade', PADD_THEME_SLUG),
			'growX' => __('Grow', PADD_THEME_SLUG),
			'scrollHorz' => __('Horizontal Scroll', PADD_THEME_SLUG),
			'scrollVert' => __('Vertical Scroll', PADD_THEME_SLUG),
			'cover' => __('Cover', PADD_THEME_SLUG),
			'uncover' => __('Uncover', PADD_THEME_SLUG),
			'wipe' => __('Wipe', PADD_THEME_SLUG)
		))
	),
	new Padd_Theme_Input(
		PADD_NAME_SPACE . '_slideshow_slide_wait',
		__('Длительность показа слайда', PADD_THEME_SLUG),
		__('Количество секунд ожидания перед сменой слайда.', PADD_THEME_SLUG),
		array('type' => 'textfield', 'width' => 100)
	),
	new Padd_Theme_Input(
		PADD_NAME_SPACE . '_slideshow_slide_speed',
		__('Скорость прокрутки', PADD_THEME_SLUG),
		__('Количство миллисекунд за которые сменяется слайд.', PADD_THEME_SLUG),
		array('type' => 'textfield', 'width' => 100)
	),
);

$padd_options['tracker'] = array(
	new Padd_Theme_Input(
		PADD_NAME_SPACE . '_tracker_head',
		__('Код 1', PADD_THEME_SLUG),
		__('Код, который вы хотите поместить в области <code>&lt;head&gt;</code>.', PADD_THEME_SLUG),
		array('type' => 'textarea')
	),
	new Padd_Theme_Input(
		PADD_NAME_SPACE . '_tracker_top',
		__('Код 2', PADD_THEME_SLUG),
		__('Код, который вы хотите поместить сразу после открытия тега <code>&lt;body&gt;</code>.', PADD_THEME_SLUG),
		array('type' => 'textarea')
	),
	new Padd_Theme_Input(
		PADD_NAME_SPACE . '_tracker_bot',
		__('Код 3', PADD_THEME_SLUG),
		__('Код, который вы хотите поместить сразу после закрытия тега <code>&lt;body&gt;</code>.', PADD_THEME_SLUG),
		array('type' => 'textarea')
	),
);

$padd_options['socialnetwork'] = array(
    new Padd_Theme_Input(
		PADD_NAME_SPACE . '_sn_username_facebook',
		__('Имя в Facebook или адрес', PADD_THEME_SLUG),
		__('Ваше имя в <a href="http://www.facebook.com">Facebook</a>. Имя пользователя <em>не является</em> вашим e-mail. <a href="http://www.facebook.com/help.php?page=897">Прочтите Вопросы и Ответы</a> для более подробной информации.', PADD_THEME_SLUG),
		array('type' => 'textfield', 'width' => 250)
	),
    new Padd_Theme_Input(
		PADD_NAME_SPACE . '_sn_username_feedburner',
		__('Имя в Feedburner', PADD_THEME_SLUG),
		__('Введите ваше имя в Feedburner.', PADD_THEME_SLUG),
		array('type' => 'textfield', 'width' => 250)
	),
	new Padd_Theme_Input(
		PADD_NAME_SPACE . '_sn_username_twitter',
		__('Имя в Twitter', PADD_THEME_SLUG),
		__('Ваше имя в <a href="http://twitter.com">Twitter</a>. Вы можете оставить поле пустым, но мы рекомендуем вам <a href="http://twitter.com/signup">создать аккаунт</a>.', PADD_THEME_SLUG),
		array('type' => 'textfield', 'width' => 250)
	)
);
 
$padd_options['pagenav'] = array(
	new Padd_Theme_Input(
		PADD_NAME_SPACE . '_pgn_pages_to_show',
		__('Количество страниц для показа', PADD_THEME_SLUG),
		__('Количество страниц для показа в постраничной навигации.', PADD_THEME_SLUG),
		array('type' => 'textfield', 'width' => 100)
	), 
	new Padd_Theme_Input(
		PADD_NAME_SPACE . '_pgn_larger_page_numbers',
		__('Количество больших чисел для показа', PADD_THEME_SLUG),
		__('Большие числа в дополнение к стандартной нумерации страниц. Полезно для многостраничных блогов.<br />Пример: Страницы 1, 2, 3, 4, 5, 10, 20, 30, 40, 50.<br />Введите 0, чтобы отключить. ', PADD_THEME_SLUG),
		array('type' => 'textfield', 'width' => 100)
	), 
	new Padd_Theme_Input(
		PADD_NAME_SPACE . '_pgn_larger_page_numbers_multiple',
		__('Множитель для больших чисел', PADD_THEME_SLUG),
		__('Если множитель 5, будут показаны страницы: 5, 10, 15, 20, 25. Если множитель 10, будут показаны страницы: 10, 20, 30, 40, 50.', PADD_THEME_SLUG),
		array('type' => 'textfield', 'width' => 100)
	),  
);

$padd_options['advertisements'] = array(
	new Padd_Theme_Input(
		PADD_NAME_SPACE . '_ads_300250_1',
		__('Реклама (300 &times; 250)', PADD_THEME_SLUG),
		__('Ссылка/Картинка, которая будет помещена в боковом меню. Это может быть HTML код, Google Adsense и т.п.', PADD_THEME_SLUG),
		array('type' => 'textarea')
	),
);


/**
 * A function that will save the options.
 *
 * @global array $options_general
 * @global array $options_socialbookmarking
 * @global array $options_yourads
 */
function padd_theme_add_admin() {
	global $padd_options;

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_GET['page'] == basename(__FILE__) ) {

		foreach ($padd_options[$_POST['action']] as $opt) {
			if (isset($_REQUEST[$opt->get_keyword()])) {
				update_option($opt->get_keyword(),$_REQUEST[$opt->get_keyword()]);
			} else {
				update_option($opt->get_keyword(),'');
			}
		}
		header("Location: themes.php?page=options-functions.php&saved=true#padd-admin-tab-" . $_POST['action']);
		break;

	}

	add_theme_page(sprintf(__('Настройки %s', PADD_THEME_SLUG), PADD_THEME_NAME), sprintf(__('Настройки %s', PADD_THEME_SLUG), PADD_THEME_NAME), 'edit_theme_options', basename(__FILE__), 'padd_theme_admin');
}


function padd_theme_admin_head() {
	echo '<link rel="stylesheet" href="' . get_template_directory_uri() . '/administration/css/style.css' . '" type="text/css" media="screen" />';
	echo '<script type="text/javascript" src="' . get_template_directory_uri() . '/js/jquery.cookie.js"></script>';
	echo '<script type="text/javascript" src="' . get_template_directory_uri() . '/administration/js/script.js.php"></script>';
}

if (is_admin() && $_GET['page'] == 'options-functions.php') {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('jquery-ui-tabs');
	wp_enqueue_style('thickbox');
	add_action('admin_head','padd_theme_admin_head');
}


/**
 * Renders the user interface for custom theme settings.
 *
 * @global array $options_general
 * @global array $options_socialbookmarking
 * @global array $options_yourads
 */
function padd_theme_admin() {
	global $padd_options;

	if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>' . sprintf(__('Настройки %s сохранены.', PADD_THEME_SLUG), PADD_THEME_NAME) . '</strong></p></div>';
	if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>' . sprintf(__('Настройки %s сброшены.', PADD_THEME_SLUG), PADD_THEME_NAME) . '</strong></p></div>';

	require PADD_THEME_PATH .  DIRECTORY_SEPARATOR . 'administration' . DIRECTORY_SEPARATOR . 'options-ui.php';
}
add_action('admin_menu', 'padd_theme_add_admin');

?>
