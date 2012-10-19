<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
<?php
$icon = get_option(PADD_NAME_SPACE . '_favicon_url','');
if (!empty($icon)) {
	echo '<link rel="shortcut icon" href="' . $icon . '" />' . "\n";
	echo '<link rel="icon" href="' . $icon . '" />' . "\n";
}
?>
<?php wp_head(); ?>
<?php
$tracker = get_option(PADD_NAME_SPACE . '_tracker_head','');
if (!empty($tracker)) {
	echo stripslashes($tracker);
}
?>
</head>

<body <?php body_class(); ?>>
<?php
$tracker = get_option(PADD_NAME_SPACE . '_tracker_top','');
if (!empty($tracker)) {
	echo stripslashes($tracker);
}
?>
<div id="container">
	<div id="container-pad">

	<p class="no-display"><a href="#skip-to-content"><?php echo __('К содержанию', PADD_THEME_SLUG); ?></a></p>

	<div id="header">
		<div id="header-pad" class="append-clear">
			<div class="box box-masthead">
				<?php $tag = (is_home()) ? 'h1' : 'p'; ?>
				<<?php echo $tag; ?> class="title"><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></<?php echo $tag; ?>>
				<p class="description">// <?php bloginfo('description'); ?></p>
			</div>

			<div class="box box-socialnet">
				<h3>Социальные сети</h3>
				<div class="interior">
					<?php padd_theme_widget_socialnet(); ?>
				</div>
			</div>
		</div>
	</div>

	<div id="menubar">
		<div id="menubar-pad">
			<div class="box box-mainmenu">
				<h3>Основное меню</h3>
				<div class="interior">
					<?php
						wp_nav_menu(array(
							'theme_location' => 'main',
							'container' => null,
						));
					?>
				</div>
			</div>
		</div>
	</div>

	<a name="skip-to-content"></a>

<?php if (is_home()) : ?>
	<?php
		$accordion = get_option(PADD_NAME_SPACE . '_accordion_enable','1');
		if ('1' == $accordion) :
	?>
	<div id="featured">
		<div id="featured-pad">
			<div class="box box-featured">
				<?php padd_theme_post_featured_posts(); ?>
			</div>
		</div>
	</div>
	<?php
		endif;
	?>

<?php endif; ?>



	<div id="body">
		<div id="body-pad">
