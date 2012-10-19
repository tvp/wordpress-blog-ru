<?php

require '../../../../wp-load.php';

header('Content-Type: text/css');

if (function_exists('ob_start') && function_exists('ob_end_flush')) {
	ob_start('ob_gzhandler');
}
include 'fonts.css';
include 'base.css';
include 'required.css';
include 'layout.css';
include 'header.css';

if (file_exists('headbar.css')) {
	include 'headbar.css';
}

include 'navigation.css';
include 'content.css';
include 'pagination.css';
include 'sidebar.css';

if (file_exists('footbar.css')) {
	include 'footbar.css';
}

include 'footer.css';
include 'jquery.cycle.css.php';


if (function_exists('ob_start') && function_exists('ob_end_flush')) {
	ob_end_flush();
}