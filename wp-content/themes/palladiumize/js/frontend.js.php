<?php

require '../../../../wp-load.php';

header('Content-Type: text/javascript');

if (function_exists('ob_start') && function_exists('ob_end_flush')) {
	ob_start('ob_gzhandler');
}

include 'jquery.cookie.js';
echo "\n\n\n";
include 'jquery.superfish.js';
echo "\n\n\n";
include 'jquery.cycle.js';
echo "\n\n\n";
?>

function padd_toggle(classname,value) {
	jQuery(classname).focus(function() {
		if (value == jQuery(classname).val()) {
			jQuery(this).val('');
		}
	});
	jQuery(classname).blur(function() {
		if ('' == jQuery(classname).val()) {
			jQuery(this).val(value);
		}
	});
}

<?php
	$slideshow = get_option(PADD_NAME_SPACE . '_slideshow_enable','1');
	if ('1' == $slideshow) :
?>
function padd_create_slideshow() {
	jQuery('div#slideshow div.list').cycle({
		fx: '<?php echo get_option(PADD_NAME_SPACE . '_slideshow_effect', 'scrollHorz'); ?>',
		speed: <?php echo get_option(PADD_NAME_SPACE . '_slideshow_slide_speed', '1000'); ?>,
		timeout: <?php echo get_option(PADD_NAME_SPACE . '_slideshow_slide_wait','3') * 1000; ?>,
		cleartypeNoBg: true,
		activePagerClass: 'jqc-active',
		prev: '#jqc-prev',
		next: '#jqc-next',
		pager: '#jqc-pages',
 	});

}
<?php
	endif;
?>

jQuery(document).ready(function() {
	jQuery.noConflict();

	jQuery('div#menubar div > ul').superfish({
		autoArrows: true,
		hoverClass: 'hover',
		speed: 500,
		animation: { opacity: 'show', height: 'show' }
	});

	<?php
		$slideshow = get_option(PADD_NAME_SPACE . '_slideshow_enable','1');
		if ('1' == $slideshow) :
	?>
	padd_create_slideshow();
	<?php
		endif;
	?>

	jQuery('div#sidebar .box-popular-posts ul li:odd').css('background-color','#f4f4f4');
	jQuery('input#s').val('<?php echo __('Введите ключевое слово', PADD_THEME_SLUG); ?>');
	padd_toggle('input#s','<?php echo __('Введите ключевое слово', PADD_THEME_SLUG); ?>');
	jQuery('div.search form').click(function () {
		jQuery('input#s').focus();
	});

});

<?php

if (function_exists('ob_start') && function_exists('ob_end_flush')) {
	ob_end_flush();
}
