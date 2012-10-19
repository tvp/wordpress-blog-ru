<?php
/*
Plugin Name: Auto Attachments
Plugin URI: http://www.kaisercrazy.com/cms-sistemleri/wordpress/auto-attachments-0-5-5.html
Description: This plugin makes your attachments more effective. Supported attachment types are Word, Excel, Pdf, PowerPoint, zip, rar, tar, tar.gz, mp3, flv, mp4 
Version: 0.5.6
Author: Serkan Algur
Author URI: http://www.kaisercrazy.com
License: GNU
*/

// Stop direct call
if (preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF']))
		{
				die('You are not allowed to call this page directly.');
		}


function multilingual_aa()
		{
				// Internationalization, first(!)
				load_plugin_textdomain('autoa', false, dirname(plugin_basename(__FILE__)) . '/languages');
				// Other init stuff, be sure to it after load_plugins_textdomain if it involves translated text(!)
		}
add_action('init', 'multilingual_aa');

//ACTIVATE (MULTISITES)
register_activation_hook(__FILE__, 'aa_install');
function aa_install()
		{
				global $wpdb;
				
				if (function_exists('is_multisite') && is_multisite())
						{
								// check if it is a network activation - if so, run the activation function for each blog id
								if (isset($_GET['networkwide']) && ($_GET['networkwide'] == 1))
										{
												$old_blog = $wpdb->blogid;
												// Get all blog ids
												$blogids  = $wpdb->get_col($wpdb->prepare("SELECT blog_id FROM $wpdb->blogs"));
												foreach ($blogids as $blog_id)
														{
																switch_to_blog($blog_id);
																_aa_install();
														}
												switch_to_blog($old_blog);
												return;
										}
						}
				_aa_install();
		}
function _aa_install()
		{
				add_option('mp3_listen', 'Files to Listen');
				add_option('video_watch', 'Files to Watch');
				add_option('before_title', 'Here is the attachments of this Post');
				add_option('show_b_title', 'yes');
				add_option('rarupload', 'yes');
				add_option('showmp3info', 'yes');
				add_option('showvideoinfo', 'yes');
				add_option('galeri', 'yes');
				add_option('thw', '100');
				add_option('thh', '100');
				add_option('fhw', '48');
				add_option('fhh', '48');
				add_option('page_ok', 'no');
				add_option('use_colorbox', 'no');
				add_option('homepage_ok', 'no');
				add_option('listview', 'no');
				add_option('newwindow', 'no');
				add_option('jwskin', '');
		}
//DeACTIVATE (MULTISITES)
register_deactivation_hook(__FILE__, 'aa_uninstall');
function aa_uninstall()
		{
				global $wpdb;
				
				if (function_exists('is_multisite') && is_multisite())
						{
								// check if it is a network activation - if so, run the activation function for each blog id
								if (isset($_GET['networkwide']) && ($_GET['networkwide'] == 1))
										{
												$old_blog = $wpdb->blogid;
												// Get all blog ids
												$blogids  = $wpdb->get_col($wpdb->prepare("SELECT blog_id FROM $wpdb->blogs"));
												foreach ($blogids as $blog_id)
														{
																switch_to_blog($blog_id);
																_aa_uninstall();
														}
												switch_to_blog($old_blog);
												return;
										}
						}
				_aa_uninstall();
		}
function _aa_uninstall()
		{
				delete_option('mp3_listen');
				delete_option('video_watch');
				delete_option('before_title');
				delete_option('show_b_title');
				delete_option('rarupload');
				delete_option('showmp3info');
				delete_option('showvideoinfo');
				delete_option('galeri');
				delete_option('thw');
				delete_option('thh');
				delete_option('fhw');
				delete_option('fhh');
				delete_option('page_ok');
				delete_option('use_colorbox');
				delete_option('homepage_ok');
				delete_option('listview');
				delete_option('jwskin');
				delete_option('newwindow');
		}

//Add RAR upload allow
$rarupload1 = get_option('rarupload');
if ($rarupload1 == 'yes')
		{
				function yeni_mime_type($mimes)
						{
								$yeni_mime = array(
												'rar' => 'application/x-rar-compressed'
								);
								return array_merge($mimes, $yeni_mime);
						}
				
				add_filter('upload_mimes', 'yeni_mime_type');
		}

//Admin Area Accordion

function admin_aa_scripts()
		{
				$urlp = plugins_url('/auto-attachments/includes');
				wp_enqueue_script('jquery');
				wp_register_script('auto-attachments1', '' . $urlp . '/js/ui.ms.js', array(
								'jquery'
				));
				wp_enqueue_script('auto-attachments1');
				wp_enqueue_script('jquery-ui-accordion');
				wp_register_script('auto-attachmentss', '' . $urlp . '/js/aa.js', array(
								'jquery-ui-accordion'
				));
				wp_enqueue_script('auto-attachmentss');
				
		}
add_action('admin_print_scripts', 'admin_aa_scripts');

function admin_aa_styles()
		{
				$urlp = plugins_url('/auto-attachments/includes');
				wp_enqueue_style('customcss', '' . $urlp . '/js/css/custom/ui.css');
				
		}
add_action('admin_print_styles', 'admin_aa_styles');
//Admin Area Accordion


//Add Css into Header (Header Text Options (added with v0.2.6))
add_action('wp_head', 'addHeaderCode');
function addHeaderCode()
		{
				$urlp = plugins_url('/auto-attachments');
				echo '<link type="text/css" rel="stylesheet" href="' . $urlp . '/a-a.css" />' . "\n";
				//With 0.2.6 you can decide show or hide :)
				if (get_option('showmp3info') == '')
						{
								echo '<style>div.mp3info {display:none;}</style>';
						}
				if (get_option('showvideoinfo') == '')
						{
								echo '<style>div.videoinfo {display:none;}</style>';
						}
		}
//Colorbox usage (added with 0.2.7)
$colorboxusage = get_option('use_colorbox');
if ($colorboxusage == 'yes')
		{
				add_action('wp_print_scripts', 'enqueue_aa_scripts');
				add_action('wp_print_styles', 'enqueue_aa_styles');
				function enqueue_aa_scripts()
						{
								$urlp = plugins_url('/auto-attachments/includes');
								wp_enqueue_script('jquery');
								wp_enqueue_script('colorbox_script', '' . $urlp . '/js/colorbox/jquery.colorbox-min.js', array(
												'jquery'
								));
								wp_enqueue_script('colorbox_js', '' . $urlp . '/js/colorbox/mycolorbox.js', array(
												'jquery'
								));
						}
				function enqueue_aa_styles()
						{
								$urlp = plugins_url('/auto-attachments/includes');
								wp_enqueue_style('colorbox_css', '' . $urlp . '/js/colorbox/colorbox.css');
						}
		}

//Admin Area
//Custom Admin Area Settinngs
add_action('admin_menu', 'aa_admin_page');

function aa_admin_page()
		{
				add_options_page(__('Auto Attachments', 'autoa'), __('Auto Attachments', 'autoa'), '8', 'auto_attachments', 'aa_settings');
		}
function aa_settings()
		{
				global $_POST, $wpdb;
				$error_audio = "";
				$error_video = "";
				// Check if values filled	
				//Audio Header Text
				$mp3fill     = get_option('mp3_listen');
				if ($mp3fill == '')
						{
								$error_audio = __('Please Fill Audio Header Text Area.', 'autoa');
						}
				else
						{
								$mp3fill = $_POST['mp3_listen'];
						}
				//Video Header Text
				$videofill = get_option('video_watch');
				if ($videofill == '')
						{
								$error_video = __('Please Fill Video Header Text Area.', 'autoa');
						}
				else
						{
								$videofill = $_POST['video_watch'];
						}
				//display it in that fancy fading div
				if ($error_audio != '')
						{
								echo '<div id="message" class="error"><p><b>' . $error_audio . '</b></p></div>';
						}
				if ($error_video != '')
						{
								echo '<div id="message" class="error"><p><b>' . $error_video . '</b></p></div>';
						}
				//Checking Finish
				
				//Update Option (Changed with 0.5 [Multisite Supp.])
				if ($_POST['serkoup'] == 'uppo')
						{
								//Form data sent
								$mp3_listen = $_POST['mp3_listen'];
								update_option('mp3_listen', $mp3_listen);
								$video_watch = $_POST['video_watch'];
								update_option('video_watch', $video_watch);
								$before_title = $_POST['before_title'];
								update_option('before_title', $before_title);
								$show_b_title = $_POST['show_b_title'];
								update_option('show_b_title', $show_b_title);
								$rarupload = $_POST['rarupload'];
								update_option('rarupload', $rarupload);
								$showmp3info = $_POST['showmp3info'];
								update_option('showmp3info', $showmp3info);
								$showvideoinfo = $_POST['showvideoinfo'];
								update_option('showvideoinfo', $showvideoinfo);
								$galeri = $_POST['galeri'];
								update_option('galeri', $galeri);
								$thw = $_POST['thw'];
								update_option('thw', $thw);
								$thh = $_POST['thh'];
								update_option('thh', $thh);
								$thw = $_POST['fhw'];
								update_option('fhw', $thw);
								$thh = $_POST['fhh'];
								update_option('fhh', $thh);
								$thh = $_POST['newwindow'];
								update_option('newwindow', $thh);
								$page_ok = $_POST['page_ok'];
								update_option('page_ok', $page_ok);
								$use_colorbox = $_POST['use_colorbox'];
								update_option('use_colorbox', $use_colorbox);
								$homepage_ok = $_POST['homepage_ok'];
								update_option('homepage_ok', $homepage_ok);
								$listview = $_POST['listview'];
								update_option('listview', $listview);
								$jw_skin = $_POST['jwskin'];
								update_option('jwskin', $jw_skin);
?>
			<div class="updated"><p><strong><?php
								_e('Options saved.');
?></strong></p></div>
			<?php
						}
				
				
				//Start to write admin area
				include 'admin/admin-area.php'; //I included because HTML Codes too Mainstream :)
				//Admin area finish
		}

// Function Area 
function get_attachment_icons()
		{
				$urlp              = plugins_url('/auto-attachments/includes');
				$before_title_text = get_option('before_title');
				$b_title		   = get_option('show_b_title');
				$aa_string         = "<div class='dIW2'>";
				if ($b_title=='yes') {
				$aa_string .= "$before_title_text<br />";
				} else {}
				if (get_option('listview') == 'yes')
						{
								$aa_string .= "<ul>";
						}
				if ($files = get_children(array( //do only if there are attachments of these qualifications
								'post_parent' => get_the_ID(),
								'post_type' => 'attachment',
								'numberposts' => -1,
								'post_mime_type' => array(
												"application/pdf",
												"application/msword",
												"application/vnd.ms-powerpoint",
												"application/vnd.ms-excel",
												"application/zip",
												"application/x-rar-compressed",
												"application/x-tar",
												"application/x-gzip",
												"application/vnd.oasis.opendocument.spreadsheet",
												"application/vnd.oasis.opendocument.formula",
												"text/plain",
												"application/vnd.openxmlformats-officedocument.wordprocessingml.document",
												"application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
												"application/vnd.openxmlformats-officedocument.presentationml.presentation",
												"application/x-compress",
												"application/mathcad",
												"application/postscript"
								) //MIME Type condition (changed into this format with 0.4.1)
				)))
						{
								foreach ($files as $file) //setup array for more than one file attachment
										{
												$fhh = get_option('fhh');
												$fhw = get_option('fhw');
												if (get_option('newwindow') == 'yes')
														{
																$target = 'target_="_blank"';
														}
												else
														{
																$target = "";
														}
												$file_link       = wp_get_attachment_url($file->ID); //get the url for linkage
												$file_name_array = explode("/", $file_link);
												$file_post_mime  = str_replace("/", "-", $file->post_mime_type);
												$file_name       = array_reverse($file_name_array); //creates an array out of the url and grabs the filename
												if (get_option('listview') == 'yes')
														{
																$aa_string .= "<li>";
																$aa_string .= "<a style='font-weight:bold;text-decoration:none;' href='$file_link' $target><span class='ikon kaydet'></span>" . $file->post_title . "</a> ";
																$aa_string .= "</li>";
														}
												else
														{
																$aa_string .= "<div class='dI'>";
																$aa_string .= "<a href='$file_link' $target>";
																$aa_string .= "<img src='$urlp/images/mime/" . $file_post_mime . ".png' width='$fhw' height='$fhh'/>";
																$aa_string .= "</a>";
																$aa_string .= "<br>";
																$aa_string .= "<a class='dItitle' href='$file_link'>" . $file->post_title . "</a>";
																$aa_string .= "</div>";
														}
										}
						}
				if (get_option('listview') == 'yes')
						{
								$aa_string .= "</ul>";
						}
				$aa_string .= "</div><div style='clear:both;'></div>";
				//Audio Files
				$mp3s = get_children(array( //do only if there are attachments of these qualifications
								'post_parent' => get_the_ID(),
								'post_type' => 'attachment',
								'numberposts' => -1,
								'post_mime_type' => 'audio' //MIME Type condition
				));
				
				if (!empty($mp3s)):
								$urlp = plugins_url('/auto-attachments/includes');
								$skin = get_option('jwskin');
								$aa_string .= "<div class='dIW'><div class='mp3info'>" . get_option('mp3_listen') . "</div><ul>";
								$aa_string .= "<script language='javascript' type='text/javascript' src='$urlp/jw/swfobject.js'></script>";
								foreach ($mp3s as $mp3):
												$aa_string .= "<li>";
												if (!empty($mp3->post_title)): //checking to make sure the post title isn't empty
												endif;
												if (!empty($mp3->post_content)): //checking to make sure something exists in post_content (description)
												endif;
												$aa_string .= "<div id='mediaspace" . $mp3->ID . "'></div>";
												$aa_string .= "<script type='text/javascript'>";
												$aa_string .= "var so = new SWFObject('$urlp/jw/player.swf','ply','470','24','9','#000000');";
												$aa_string .= "so.addParam('allowfullscreen','false');";
												$aa_string .= "so.addParam('allowscriptaccess','always');";
												$aa_string .= "so.addParam('wmode','opaque');";
												$aa_string .= "so.addVariable('file','" . $mp3->guid . "');";
												$aa_string .= "so.addVariable('skin','" . $urlp . "/jw/skins/" . $skin . ".zip');";
												$aa_string .= "so.write('mediaspace" . $mp3->ID . "');";
												$aa_string .= "</script>";
												$aa_string .= "<span class='mp3title'>" . $mp3->post_title . " - " . $mp3->post_content . "</span>";
												$aa_string .= "</li>";
								endforeach;
								$aa_string .= "</ul></div>";
				endif;
				
				//Video Support flv, mp4, etc. added with 0.2
				$videoss = get_children(array( //do only if there are attachments of these qualifications
								'post_parent' => get_the_ID(),
								'post_type' => 'attachment',
								'numberposts' => -1,
								'post_mime_type' => 'video' //MIME Type condition
				));
				
				if (!empty($videoss)):
								$urlp = plugins_url('/auto-attachments/includes');
								$aa_string .= "<div class='dIW'><div class='videoinfo'>" . get_option('video_watch') . "</div><ul>";
								$aa_string .= "<script language='javascript' type='text/javascript' src='$urlp/jw/swfobject.js'></script>";
								foreach ($videoss as $videos):
												$aa_string .= "<li'>";
												
												if (!empty($videos->post_title)): //checking to make sure the post title isn't empty
												endif;
												if (!empty($videos->post_content)): //checking to make sure something exists in post_content (description)
												endif;
												$aa_string .= "<div id='mediaspace" . $videos->ID . "'></div>";
												$aa_string .= "<script type='text/javascript'>";
												$aa_string .= "var so = new SWFObject('$urlp/jw/player.swf','ply','435','325','9','#000000');";
												$aa_string .= "so.addParam('allowfullscreen','true');";
												$aa_string .= "so.addParam('allowscriptaccess','always');";
												$aa_string .= "so.addParam('wmode','opaque');";
												$aa_string .= "so.addVariable('file','" . $videos->guid . "');";
												$aa_string .= "so.addVariable('skin','" . $urlp . "/jw/skins/" . $skin . ".zip');";
												$aa_string .= "so.write('mediaspace" . $videos->ID . "');";
												$aa_string .= "</script>";
												$aa_string .= "<span class='mp3title'>" . $videos->post_title . " - " . $videos->post_content . "</span>";
												$aa_string .= "</li>";
								endforeach;
								$aa_string .= "</ul></div>";
				endif;
				
				
				if (get_option('galeri') == 'yes')
						{
								global $blog_id, $current_site;
								if ($galeriresim = get_children(array( //do only if there are attachments of these qualifications
												'post_parent' => get_the_ID(),
												'post_type' => 'attachment',
												'numberposts' => -1,
												'post_mime_type' => 'image' //MIME Type condition
								)))
										{
												$aa_string .= "<div class='dIW1'><div class='galeri'>";
												foreach ($galeriresim as $galerir) //setup array for more than one file attachment
														{
																$thh             = get_option('thh');
																$thw             = get_option('thw');
																$urlp            = plugins_url('/auto-attachments');
																$file_link       = wp_get_attachment_url($galerir->ID); //get the url for linkage
																$file_name_array = explode("/", $galrerir_link);
																$aa_string .= "<a href='" . $galerir->guid . "' rel='example4'>";
																if (isset($blog_id) && $blog_id > 1) //fix for TimThumb
																		{
																				$image_link_parts = explode("/files/", $galerir->guid); //fix for TimThumb
																				$aa_string .= "<img class='colorbox-1' src='$urlp/thumb.php?src=http://" . $current_site->domain . $current_site->path . "wp-content/blogs.dir/" . $blog_id . "/files/" . $image_link_parts[1] . "&h=$thh&w=$thw&zc=1'/>";
																		}
																else
																		{
																				$aa_string .= "<img class='colorbox-1' src='$urlp/thumb.php?src=" . $galerir->guid . "&h=$thh&w=$thw&zc=1'/>";
																				$aa_string .= "</a>";
																		}
														}
												$aa_string .= "</div></div>";
										}
								
						}
				
				$aa_string .= "<div style='clear:both;'></div>";

				// Last Check for attachments (Needed After "Before Title option") Thanks Kris! :)
				$aargu= get_children(array('post_parent' => get_the_ID(),'post_type' => 'attachment','numberposts' => -1,));
				if (!empty($aargu)):return $aa_string;endif;
		}

//Insert code after the_content (!important) Changed into 3 parts with 0.5 (after this suggestion http://wordpress.org/support/topic/plugin-auto-attachments-does-not-show-attachments-for-posts-on-the-home-page?replies=2#post-2627965 )
add_filter('the_content', 'insertintoContent');
$page_ok_     = get_option('page_ok');
$homepage_ok_ = get_option('homepage_ok');
function insertintoContent($content)
		{
				if (is_single())
						{
								$content .= get_attachment_icons();
						}
				return $content;
		}
// Home Page Function Corrected with 0.5.2
if ($homepage_ok_ == 'yes')
		{
				function insertintoHome($content)
						{
								if (is_home())
										{
												$content .= get_attachment_icons();
										}
								return $content;
						}
				add_filter('the_content', 'insertintoHome');
		}

if ($page_ok_ == 'yes')
		{
				// Page Function Corrected with 0.5.2
				function insertintoPage($content)
						{
								if (is_page())
										{
												$content .= get_attachment_icons();
										}
								return $content;
						}
				add_filter('the_content', 'insertintoPage');
		}
//Show Plugin Version into Admin Page
function plugin_get_version()
		{
				if (!function_exists('get_plugins'))
								require_once(ABSPATH . 'wp-admin/includes/plugin.php');
				$plugin_folder = get_plugins('/' . plugin_basename(dirname(__FILE__)));
				$plugin_file   = basename((__FILE__));
				return $plugin_folder[$plugin_file]['Version'];
		}


?>