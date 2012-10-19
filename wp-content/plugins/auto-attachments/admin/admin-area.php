<?php
// Stop direct call
if (preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) {
				die('You are not allowed to call this page directly.');
}
?>
<?php
$urlp = plugins_url('/auto-attachments');
?>

<div class='wrap' style="width:65%">


<div id="icon-plugins" class="icon32"></div><h2><?php
_e('Auto Attachments Settings Page', 'autoa');
?> (<?php
echo plugin_get_version();
?>)</h2>
<!-- Right Widgets -->
<div id="dashboard-widgets-wrap" style="float:right;"><div id="dashboard_plugins" class="metabox-holder">
<div width="250px" id="dashboard" class="postbox">
<h3 class='hndle'><span><?php
_e('Contributor', 'autoa');
?></span></h3><div class="inside">
<p style="padding:5px;"><img src="http://www.gravatar.com/avatar/d9e0fb92795db0ad96cf2b37bf0fc042.png" align="right" style="width:80px;height:80px;padding:2px;"><br /><strong>Serkan Algur</strong><ul style="padding:5px;"><li><a href="http://www.kaisercrazy.com" target="_blank"><?php
_e('Personal Blog (Turkish)', 'autoa');
?></a></li><li><a href="http://www.wpfunc.com" target="_blank"><?php
_e('WpFunC (functions share)', 'autoa');
?></a></li><li><a href="http://facebook.com/serkan.algur" target="_blank"><?php
_e('Facebook', 'autoa');
?></a></li><li><a href="http://twitter.com/kaisercrazy" class="twitter-follow-button">Follow @kaisercrazy</a>
<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script></li><li><a href="http://www.friendfeed.com/kaisercrazy" target="_blank"><?php
_e('Friendfeed', 'autoa');
?></a></li><li><a href="mailto:info@kaisercrazy.com"><?php
_e('Email Me', 'autoa');
?></a></li></ul></p>
</div>

</div>
<div width="250px" id="dashboard" class="postbox">
<h3><?php
_e('Preview', 'autoa');
?></h3>
<div class="inside"><br />
<div class='mp3info'><?php
echo get_option('mp3_listen');
?></div>
<div class='videoinfo'><?php
echo get_option('video_watch');
?></div>
<?php
global $blog_id, $current_site;
$ilinkg = explode('/wp-content/', $urlp);
if (isset($blog_id) && $blog_id > 1) {
?>
<div><center><img class='colorbox-1' src="<?php
				echo $urlp;
?>/thumb.php?src=http://<?php
				echo $current_site->domain;
?><?php
				echo $current_site->path;
?>wp-content/<?php
				echo $ilinkg[1];
?>/screenshot-3.png&h=<?php
				echo get_option('thh');
?>&w=<?php
				echo get_option('thw');
?>&zc=1"/></center></div>
<?php
} else {
?>
<div><center><img class='colorbox-1' src="<?php
				echo $urlp;
?>/thumb.php?src=<?php
				echo $urlp;
?>/screenshot-3.png&h=<?php
				echo get_option('thh');
?>&w=<?php
				echo get_option('thw');
?>&zc=1"/></center></div>
<?php
}
?>
</div>
</div>
<style>
.videoinfo,.mp3info,.afileinfo{ width:250px;padding: 5px 0 5px 5px;line-height: 20px;font-size: 14px;margin: 0 0 10px 10px;text-align:justify;text-shadow: 1px 1px 1px #FFF;display:block;font-weight:bold;}
.mp3info{background: #f5f5f5;border: 1px solid #dadada;color: #666666;clear:both;}
.videoinfo{background: #FFFFCC;border: 1px solid #FFCC66;color: #996600;clear:both;}
</style>


</div></div>
<!-- Right Widgets -->
<form method="post" action='<?php
echo $_SERVER["REQUEST_URI"];
?>'>
	<?php
wp_nonce_field('update-options');
?>
<div style="width:545px;float:left;margin-top:10px;">
<div id="openit" class="ui-accordion ui-widget ui-helper-reset">
  <h3 class="ui-accordion-header ui-helper-reset ui-state-default ui-corner-top">
    <a href="#"><?php
_e('<strong>Header Text Settings</strong>', 'autoa');
?></a>
  </h3>
  <div class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom">
    <p><small><?php
_e('You can now change <strong>Header Texts</strong> from here. You can localize to your language :)', 'autoa');
?></small></p>
<p><small><?php
_e('(<strong>*</strong>) <strong sytle="color:red">Highly Required</strong>', 'autoa');
?></small></p>
	<p><strong><?php
_e('Add Header Text for Mp3 Files:', 'autoa');
?></strong><br />
	<input type="text" name="mp3_listen" size="45" value="<?php
echo get_option('mp3_listen');
?>" /><strong>*</strong></p>
	<p><strong><?php
_e('Add Header Text for Video Files:', 'autoa');
?></strong><br />
	<input type="text" name="video_watch" size="45" value="<?php
echo get_option('video_watch');
?>" /><strong>*</strong></p>
	<p><strong><?php
_e('Title Before Attachments:', 'autoa');
?></strong><br />
	<input type="text" name="before_title" size="45" value="<?php
echo get_option('before_title');
?>" /><strong>*</strong><br />
	<small><i><?php
_e('HTML Accepted', 'autoa');
?></i></small></p>
<p id="radio9"><?php
_e('Show this title?', 'autoa');
?> <input type="radio" id="show_b_title_yes" name="show_b_title" value="yes" <?php
if (get_option('show_b_title') == "yes") {
				_e('checked="checked"');
}
?> /><label for="show_b_title_yes"><?php
_e('Yes', 'autoa');
?></label><input type="radio" id="show_b_title_no" name="show_b_title" value="no" <?php
if (get_option('show_b_title') == "no") {
				_e('checked="checked"');
}
?>/><label for="show_b_title_no"><?php
_e('No', 'autoa');
?></label></p>
	
  </div>
    <h3 class="ui-accordion-header ui-helper-reset ui-state-default ui-corner-all">
    <a href="#"><?php
_e('<strong>Page & Homepage Settings</strong>', 'autoa');
?></a>
  </h3>
  <div class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom">
    	<p><strong><?php
_e('Show on Pages', 'autoa');
?></strong></p>
	<span style="font-size: 10px;"><em><?php
_e('If you set this settings "Yes", attachments shown on pages and single pages. If not attachments shown only in posts', 'autoa');
?></em></span>
	<p id="radio"><input type="radio" id="page_ok_yes" name="page_ok" value="yes" <?php
if (get_option('page_ok') == "yes") {
				_e('checked="checked"');
}
?> /><label for="page_ok_yes"><?php
_e('Yes', 'autoa');
?></label><input type="radio" id="page_ok_no" name="page_ok" value="no" <?php
if (get_option('page_ok') == "no") {
				_e('checked="checked"');
}
?>/><label for="page_ok_no"><?php
_e('No', 'autoa');
?></label></p>
	<p><strong><?php
_e('Show on Homepage', 'autoa');
?></strong></p>
	<span style="font-size: 10px;"><em><?php
_e('If you set this settings "Yes", attachments shown on homepage and single pages. If not attachments shown only in posts', 'autoa');
?></em></span>
	<p id="radio1"><input type="radio" id="homepage_ok_yes" name="homepage_ok" value="yes" <?php
if (get_option('homepage_ok') == "yes") {
				_e('checked="checked"');
}
?> /><label for="homepage_ok_yes"><?php
_e('Yes', 'autoa');
?></label><input type="radio" id="homepage_ok_no" name="homepage_ok" value="no" <?php
if (get_option('homepage_ok') == "no") {
				_e('checked="checked"');
}
?>/><label for="homepage_ok_no"><?php
_e('No', 'autoa');
?></label></p>
  </div>
  <h3 class="ui-accordion-header ui-helper-reset ui-state-default ui-corner-all">
    <a href="#"><?php
_e('<strong>Video & Audio Header Settings</strong>', 'autoa');
?></a>
  </h3>
  <div class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom">
    <p><strong><?php
_e('Show Video And Audio Headers?', 'autoa');
?></strong></p>
	<span style="font-size: 10px;"><em><?php
_e('You can decide to show headers', 'autoa');
?></em></span><br />
	<p id="radio2"><strong><?php
_e('Mp3 Headers', 'autoa');
?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="showmp3info_yes" name="showmp3info" value="yes" <?php
if (get_option('showmp3info') == "yes") {
				_e('checked="checked"');
}
?> /><label for="showmp3info_yes"><?php
_e('Yes', 'autoa');
?></label><input type="radio" id="showmp3info_no" name="showmp3info" value="no" <?php
if (get_option('showmp3info') == "no") {
				_e('checked="checked"');
}
?>/><label for="showmp3info_no"><?php
_e('No', 'autoa');
?></label></p>
	<p id="radio3"><strong><?php
_e('Video Headers', 'autoa');
?></strong>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="showvideoinfo_yes" name="showvideoinfo" value="yes" <?php
if (get_option('showvideoinfo') == "yes") {
				_e('checked="checked"');
}
?> /><label for="showvideoinfo_yes"><?php
_e('Yes', 'autoa');
?></label><input type="radio" id="showvideoinfo_no" name="showvideoinfo" value="no" <?php
if (get_option('showvideoinfo') == "no") {
				_e('checked="checked"');
}
?>/><label for="showvideoinfo_no"><?php
_e('No', 'autoa');
?></label></p>
  </div>
    <h3 class="ui-accordion-header ui-helper-reset ui-state-default ui-corner-all">
    <a href="#"><?php
_e('<strong>Gallery Settings</strong>', 'autoa');
?></a>
  </h3>
  <div class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom">
    	<p><strong><?php
_e('Show Gallery?', 'autoa');
?></strong></p>
	<span style="font-size: 10px;text-align:justify;"><em><?php
_e('You can use gallery for show your image attachments without any plugin or else :) Also if you use colorbox or any other gallery lihtbox plugin yopu can disable colorbox usage.', 'autoa');
?></em></span><br />
	<p id="radio4"><input type="radio" id="galeri_yes" name="galeri" value="yes" <?php
if (get_option('galeri') == "yes") {
				_e('checked="checked"');
}
?> /><label for="galeri_yes"><?php
_e('Yes', 'autoa');
?></label><input type="radio" id="galeri_no" name="galeri" value="no" <?php
if (get_option('galeri') == "no") {
				_e('checked="checked"');
}
?>/><label for="galeri_no"><?php
_e('No', 'autoa');
?></label></p>
	<p><strong><?php
_e('Use Colorbox?', 'autoa');
?></strong></p>
	<p id="radio5"><input type="radio" id="use_colorbox_yes" name="use_colorbox" value="yes" <?php
if (get_option('use_colorbox') == "yes") {
				_e('checked="checked"');
}
?> /><label for="use_colorbox_yes"><?php
_e('Yes', 'autoa');
?></label><input type="radio" id="use_colorbox_no" name="use_colorbox" value="no" <?php
if (get_option('use_colorbox') == "no") {
				_e('checked="checked"');
}
?>/><label for="use_colorbox_no"><?php
_e('No', 'autoa');
?></label></p>
	<p><strong><?php
_e('Gallery Thumb Size?', 'autoa');
?></strong></p>
	<input type="text" name="thw" size="3" value="<?php
echo get_option('thw');
?>" />px <strong>(<?php
_e('Width', 'autoa');
?>)</strong>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="text" name="thh" size="3" value="<?php
echo get_option('thh');
?>" />px <strong>(<?php
_e('Height', 'autoa');
?>)</strong>
  </div>
      <h3 class="ui-accordion-header ui-helper-reset ui-state-default ui-corner-all">
    <a href="#"><?php
_e('<strong>Misc. Settings</strong>', 'autoa');
?></a>
  </h3>
  <div class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom">
    	<p><strong><?php
_e('Allow Rar Upload', 'autoa');
?></strong></p>
	<span style="font-size: 10px;"><em><?php
_e('If you select this checkbox rar file upload will be enable. If not rar file upload will not be available', 'autoa');
?></em></span>
	<p id="radio6"><input type="radio" id="rarupload_yes" name="rarupload" value="yes" <?php
if (get_option('rarupload') == "yes") {
				_e('checked="checked"');
}
?> /><label for="rarupload_yes"><?php
_e('Yes', 'autoa');
?></label><input type="radio" id="rarupload_no" name="rarupload" value="no" <?php
if (get_option('rarupload') == "no") {
				_e('checked="checked"');
}
?>/><label for="rarupload_no"><?php
_e('No', 'autoa');
?></label></p>
	<p><strong><?php
_e('List View Of Files', 'autoa');
?></strong></p>
	<span style="font-size: 10px;"><em><?php
_e('If you activate this option your downloadable files seen in a list view.', 'autoa');
?></em></span>
	<p id="radio7"><input type="radio" id="listview_yes" name="listview" value="yes" <?php
if (get_option('listview') == "yes") {
				_e('checked="checked"');
}
?> /><label for="listview_yes"><?php
_e('Yes', 'autoa');
?></label><input type="radio" id="listview_no" name="listview" value="no" <?php
if (get_option('listview') == "no") {
				_e('checked="checked"');
}
?>/><label for="listview_no"><?php
_e('No', 'autoa');
?></label></p>
		<p><strong><?php
_e('Open files in new window?', 'autoa');
?></strong></p>
	<span style="font-size: 10px;"><em><?php
_e('Do you want to open files in new window?.', 'autoa');
?></em></span>
	<p id="radio8"><input type="radio" id="newwindow_yes" name="newwindow" value="yes" <?php
if (get_option('newwindow') == "yes") {
				_e('checked="checked"');
}
?> /><label for="newwindow_yes"><?php
_e('Yes', 'autoa');
?></label><input type="radio" id="newwindow_no" name="newwindow" value="no" <?php
if (get_option('newwindow') == "no") {
				_e('checked="checked"');
}
?>/><label for="newwindow_no"><?php
_e('No', 'autoa');
?></label></p>
	<p><strong><?php
_e('File Icon Size?', 'autoa');
?></strong></p>
	<input type="text" name="fhw" size="3" value="<?php
echo get_option('fhw');
?>" />px <strong>(<?php
_e('Width', 'autoa');
?>)</strong>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="text" name="fhh" size="3" value="<?php
echo get_option('fhh');
?>" />px <strong>(<?php
_e('Height', 'autoa');
?>)</strong>
	<p><strong><?php
_e('Folder Permissions', 'autoa');
?></strong></p>
	<?php
$fperm = substr(decoct(fileperms('../wp-content/plugins/auto-attachments/cache')), 2);
?>
	<p><?php
_e('Cache Folder Permissions: ', 'autoa');
?><b><?php
echo $fperm;
?></b> <?php
if ($fperm == '777')
				echo '<strong style="color:green;">OK!</strong>';
else
				echo '<strong style="color:red;">NOT OK!</strong>';
?></p>
	<p><strong><?php
_e('Jw Player Skin', 'autoa');
?></strong></p><div id="jwpre" style="float:right;"><img src="<?php
echo $urlp;
?>/includes/jw/skins/pic/<?php
echo get_option('jwskin');
?>.png" /></div>

	<span style="font-size: 10px;"><em><?php
_e('You can select JW Player Skin.', 'autoa');
?></em></span>
		<?php
$skins = array(
				"default",
				"darkrv5",
				"facebook",
				"lightrv5",
				"modieus",
				"nemesis",
				"newtube",
				"newtubedark"
);

$optme = get_option('jwskin');
?>
<select name="jwskin" id="jwskin">
<?php
foreach ($skins as $sk) {
				$selected = ($optme == $sk) ? 'selected="selected"' : '';
?>
<option name="jwskin" value="<?php
				echo $sk;
?>" <?php
				echo $selected;
?> /><?php
				echo $sk;
?></option>
<?php
}
?>
</select>

  </div>
</div>
	<input type="hidden" name="serkoup" value="uppo"/>
		
	<p><input type="submit" name="Submit" value="<?php
_e('Save Changes');
?>" class="button-primary" /></p>

	</form>
</div>
</div>
