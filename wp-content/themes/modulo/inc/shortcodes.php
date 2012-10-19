<?php

/* ====================
  COLUMNS
  ============================================================= */

function half_first($atts, $content = null) {
    return '
<div class="six columns first-child">' . $content . '</div>
';
}

function half($atts, $content = null) {
    return '
<div class="six columns">' . $content . '</div>
';
}

add_shortcode('half_first', 'half_first');
add_shortcode('half', 'half');

function quarter_first($atts, $content = null) {
    return '
<div class="three columns first-child">' . $content . '</div>
';
}

function quarter($atts, $content = null) {
    return '
<div class="three columns">' . $content . '</div>
';
}

add_shortcode('quarter_first', 'quarter_first');
add_shortcode('quarter', 'quarter');

function third_first($atts, $content = null) {
    return '
<div class="four columns first-child">' . $content . '</div>
';
}

function double_third($atts, $content = null) {
    return '
<div class="eight columns first-child">' . $content . '</div>
';
}

function third($atts, $content = null) {
    return '
<div class="four columns">' . $content . '</div>
';
}

add_shortcode('third_first', 'third_first');
add_shortcode('double_third', 'double_third');
add_shortcode('third', 'third');


function cleanline($atts, $content = null, $code="") {
    $return = '<div class="clear-mess">' . $content . '</div>';
    return $return;
}

add_shortcode('cline', 'cleanline');

/* =======
  BOXES
  ============================================================= */

function alertbox($atts, $content = null, $code="") {
    $return = '<div class="alertbox"><p>' . $content . '</p></div>';
    return $return;
}

add_shortcode('alert', 'alertbox');


function infobox($atts, $content = null, $code="") {
    $return = '<div class="infobox"><p>' . $content . '</p></div>';
    return $return;
}

add_shortcode('info', 'infobox');


function newsbox($atts, $content = null, $code="") {
    $return = '<div class="newsbox"><p>' . $content . '</p></div>';
    return $return;
}

add_shortcode('news', 'newsbox');

function succbox($atts, $content = null, $code="") {
    $return = '<div class="succesbox"><p>' . $content . '</p></div>';
    return $return;
}

add_shortcode('succ', 'succbox');



/* ==========
  DROPCAP&PULL QUOTE
  ============================================================= */

function dropcap($atts, $content=null, $code="") {

    $return = '<span class="dropcap">';

    $return .= $content;

    $return .= '</span>';

    return $return;
}

add_shortcode('dropcap', 'dropcap');

function pullquote($atts, $content=null, $code="") {

    $return = '<span class="pullquote">';

    $return .= $content;

    $return .= '</span>';

    return $return;
}

add_shortcode('pullquote', 'pullquote');

function pullquote_r($atts, $content=null, $code="") {

    $return = '<span class="pullquote right">';

    $return .= $content;

    $return .= '</span>';

    return $return;
}

add_shortcode('pullquote_r', 'pullquote_r');



/* =======
  LISTS
  ============================================================= */

function ch_list($atts, $content = null) {
    return '<div class="check-list">' . $content . '</div>';
}

add_shortcode('check_list', 'ch_list');


/* =======
  SLIDE
  ============================================================= */

function slide($atts, $content = null) {
	extract(shortcode_atts(array(
		"title" => ''
	), $atts));
	
        $return = '<div class="toggle_slide"><h3 class="trigger"><span>&nbsp;</span><a href="#">'.$title.'</a></h3><div class="toggle_container">';

	$return .= $content;

	$return .= '</div></div>';

        return $return;
}

add_shortcode('slide', 'slide');

/* ============
  GOOGLE MAP
  ========================================================= */

function fn_googleMaps($atts, $content = null) {
    extract(shortcode_atts(array(
                "width" => '',
                "height" => '160',
                "src" => ''
                    ), $atts));
    return '<div class="gmap"><iframe width="' . $width . '" height="' . $height . '" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="' . $src . '"></iframe></div>';
}

add_shortcode("googlemap", "fn_googleMaps");

/* ==================
  BUTTON SHORTCODE
  ============================================================= */

function button($atts) {
    extract(shortcode_atts(array(
                'text' => 'Your Linktext',
                'url' => '',
                'p' => 'false'
                    ), $atts));

    $link = $url ? $url : get_permalink();

    if ($p != 'false') :
        return wpautop('<a href="' . $link . '" class="button"><span>' . $text . '</span></a>');
    else :
        return '<a href="' . $link . '" class="button"><span>' . $text . '</span></a>';
    endif;
}

add_shortcode('button', 'button');
?>