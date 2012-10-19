<?php

require '../../../../../wp-load.php';

header('Content-Type: text/javascript');

if (function_exists('ob_start') && function_exists('ob_end_flush')) {
	ob_start('ob_gzhandler');
}

?>
function padd_admintabs_init() {
	if (!jQuery("#padd-admin-tabs").length) {
		return;
	}

	var jQversion = undefined == jQuery.ui ? [0,0,0] : undefined == jQuery.ui.version ? [0,1,0] : jQuery.ui.version.split('.');
	switch(true) {
		case jQversion[0] >= 1 && jQversion[1] >= 7:
			jQuery("#padd-admin-tabs").tabs({ cookie: { expires: 30 } });
			break;
		default:
			jQuery("#padd-admin-tabs > ul").tabs({ cookie: { expires: 30 } });
	}
}

jQuery(document).ready(function() {
	padd_admintabs_init();
	var popswitch = 0;

	<?php
		echo $padd_options['general'][0]->get_js_upload_click();
	?>

	window.send_to_editor = function(html) {
		imgurl = jQuery('img',html).attr('src');
		switch (popswitch) {
			<?php
				echo $padd_options['general'][0]->get_js_upload_switch();
			?>
		}
		popswitch = 0;
		tb_remove();
	}

	<?php $ids = array('cat_id', 'cat_limit', 'effect', 'slide_wait', 'slide_speed'); ?>

	if (!jQuery('#padd_slideshow_enable').is(':checked')) {
		<?php foreach ($ids as $id) : ?>
		jQuery('#tr-padd_slideshow_enable<?php echo $id; ?>').hide();
		<?php endforeach; ?>
	}

	jQuery('#padd_slideshow_enable').click(function () {
		if (jQuery('#padd_slideshow_enable').is(':checked')) {
			<?php foreach ($ids as $id) : ?>
			jQuery('#tr-padd_slideshow_<?php echo $id; ?>').fadeIn(1000);
			<?php endforeach; ?>
		} else {
			<?php foreach ($ids as $id) : ?>
			jQuery('#tr-padd_slideshow_<?php echo $id; ?>').fadeOut(1000);
			<?php endforeach; ?>
		}
	});
});

<?php

if (function_exists('ob_start') && function_exists('ob_end_flush')) {
	ob_end_flush();
}