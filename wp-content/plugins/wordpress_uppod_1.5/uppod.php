<?php
/*
Plugin Name: Uppod
Plugin URI: http://uppod.ru/help/q=wordpress
Author: Uppod
Description: Медиаплеер Uppod
Author URI: http://uppod.ru
Version: 1.5
*/

// SETTINGS
$uppod_settings['uppod.swf']='http://venus-ukraine.com/uppod.swf';
$uppod_settings['swfobject.js']='http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js';
$uppod_settings['adobe_update']='Необходимо обновить <a href="http://get.adobe.com/flashplayer/" target="_blank">Adobe Flash Player</a>';
$uppod_settings['wmode']='';
$uppod_settings['bgcolor']='#ffffff';

//VIDEO
$uppod['video']['style']='';
$uppod['video']['width']='500';
$uppod['video']['height']='375';

$uppod['video']['style2']='';
$uppod['video']['width2']='400';
$uppod['video']['height2']='300';

//AUDIO
$uppod['audio']['style']='http://venus-ukraine.com/audio133-335.txt';
$uppod['audio']['width']='370';
$uppod['audio']['height']='65';

//PHOTO
$uppod['photo']['style']='';
$uppod['photo']['width']='400';
$uppod['photo']['height']='300';

function Uppod($atts, $content = null){
    global $uppod;
	global $uppod_settings;
    $o='';
    $fv='';
	$style='';
	$center=false;
    if($atts['video']){
		$m='video';
	}
	if($atts['audio']){
		$m='audio';
	}
	if($atts['photo']){
		$m='photo';
	}
	if($atts['align']){
		$atts['align']=='left'?$style='float:left;':'';
		$atts['align']=='right'?$style='float:right;':'';
		$atts['align']=='center'?$center=true:'';
	}
	if($atts['margin']){
		$style.='margin:'.$atts['margin'].'px;';
	}
	$atts['type']?$t=$atts['type']:$t='';
	foreach($atts as $k => $value) {
		$k!=$m&&$k!='align'&&$k!='margin'?$fv.=',"'.$k.'":"'.$value.'"':'';
	}
	
	$num=rand(0,1000);
    if(isset($m)){
    	strpos($atts[$m],',')===false?(strpos($atts[$m],'.txt')==strlen($atts[$m])-4?$fv.=',"pl":"'.$atts[$m].'"':$fv.=',"file":"'.$atts[$m].'"'):$fv.=',"pl":"'.Uppod_Pl($atts[$m]).'"';
    	if($uppod_settings['uppod.swf']=='http://'|$uppod_settings['uppod.swf']==''){
    		$o='Ошибка: в настройках плагина Uppod не указана ссылка на плеер (<a href="http://uppod.ru/help/q=wordpress">подробнее</a>)';
    	}else{
			$o=($center?'<center>':'').'<div id="'.$m.'player'.$num.'" '.($style!=''?'style="'.$style.'"':'').'>'.$uppod_settings['adobe_update'].'</div>'.($center?'</center>':'').'<script type="text/javascript">var flashvars = {'.($uppod[$m]['style'.$t]!=''?'"st":"'.$uppod[$m]['style'.$t].'"':'"m":"'.$m.'"').$fv.'};var params = {allowFullScreen:"true", allowScriptAccess:"always",id:"'.$m.'player'.$num.'",bgcolor:"'.$uppod_settings['bgcolor'].'"'.($uppod_settings['wmode']!=''?',"wmode":"'.$uppod_settings['wmode'].'"':'').'}; new swfobject.embedSWF("'.$uppod_settings['uppod.swf'].'", "'.$m.'player'.$num.'", "'.$uppod[$m]['width'.$t].'", "'.$uppod[$m]['height'.$t].'", "10.0.0.0", false, flashvars, params);</script>';
		}
	}
    return $o;
}
function Uppod_SWFObject() {
	global $uppod_settings;
	echo '<script src="'.$uppod_settings['swfobject.js'].'" type="text/javascript"></script>';
}
function Uppod_Pl($str) {
	$pl="{'playlist':[";
	$obj=split(',',$str);
	for($i=0;$i<count($obj);$i++){
		$pl.="{'file':'".$obj[$i]."'},";
	}
	return chop($pl,',')."]}";
}
add_action('wp_head', 'Uppod_SWFObject');
add_shortcode('uppod', 'Uppod')
?>