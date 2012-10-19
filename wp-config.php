<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи, язык WordPress и ABSPATH. Дополнительную информацию можно найти
 * на странице {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется сценарием создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'venus');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'V3ufG0k1c');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется снова авторизоваться.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'zL} *{j&oW|PwT8*~P1SQlIWR1%P9pG}P{PJqO<GbC[RS}kGHDhhy]<PIE3u7X!w');
define('SECURE_AUTH_KEY',  'x|1vG7k}<Q-$RgAFh)j:#U_.|+9rXgC,r_MX-j2Pfz6tHU!vX*`+$V)zyTF}g[H2');
define('LOGGED_IN_KEY',    's.ghVMS4 FCwgK-WhVgxubRmntm(1L}l#8Q{ip5~g+y}0+KUa7`Z2/8@z-a~%MwG');
define('NONCE_KEY',        'az)OoTctI |FD7QMrhP LJJI]-ZQ<M`Az-Ij2[bKHuzI05EymmasiG<=mn1aW,oM');
define('AUTH_SALT',        'TaWgaEE*:$TVz}-x@xx|-1dEpE^3hQ>Pk=GEg#oiF!MCQZE+G8q+Fi8o0I#aW4V`');
define('SECURE_AUTH_SALT', 'FI#pJ+-{A=E]+PH;Rc27mjVU;.}||V*_QX+wFRaQ<57q_fspAr}YH`aadt+CY<n4');
define('LOGGED_IN_SALT',   'S@cxp3q<Ih>qK${S[CKQ!IV:ARu1]F~NUX3-d&|f-Tk(]PR<TX#J+H#.fPGO6QK/');
define('NONCE_SALT',       'w0/[8h#ugDSEqcCE7IbGd}WKF+W<N7Ek]{6_D7KZepXhb]bkrK|J7H/3lp-l-@%9');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько блогов в одну базу данных, если вы будете использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Язык локализации WordPress, по умолчанию английский.
 *
 * Измените этот параметр, чтобы настроить локализацию. Соответствующий MO-файл
 * для выбранного языка должен быть установлен в wp-content/languages. Например,
 * чтобы включить поддержку русского языка, скопируйте ru_RU.mo в wp-content/languages
 * и присвойте WPLANG значение 'ru_RU'.
 */
define('WPLANG', 'ru_RU');

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Настоятельно рекомендуется, чтобы разработчики плагинов и тем использовали WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
