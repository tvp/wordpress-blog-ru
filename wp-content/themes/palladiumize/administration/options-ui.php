
<div class="wrap">
<div id="icon-themes" class="icon32"><br /></div>
<h2><?php echo sprintf(__('Настройки темы %s', PADD_THEME_SLUG), PADD_THEME_NAME); ?></h2>

<div id="padd-admin-tabs">

	<ul>
		<li><a href="#padd-admin-tab-about"><?php echo __('Информация', PADD_THEME_SLUG); ?></a></li>
		<li><a href="#padd-admin-tab-general"><?php echo __('Общее', PADD_THEME_SLUG); ?></a></li>
		<li><a href="#padd-admin-tab-slideshow"><?php echo __('Слайд-шоу', PADD_THEME_SLUG); ?></a></li>
		<li><a href="#padd-admin-tab-tracker"><?php echo __('Коды', PADD_THEME_SLUG); ?></a></li>
		<li><a href="#padd-admin-tab-sn"><?php echo __('Социальные сети', PADD_THEME_SLUG); ?></a></li>
		<li><a href="#padd-admin-tab-pagenav"><?php echo __('Страницы', PADD_THEME_SLUG); ?></a></li>
		<li><a href="#padd-admin-tab-ads-custom"><?php echo __('Реклама', PADD_THEME_SLUG); ?></a></li>
	</ul>

	<fieldset id="padd-admin-tab-about">
		<h3><?php echo __('О теме', PADD_THEME_SLUG); ?></h3>
		<p><?php echo __('Palladiumize является бесплатной премиум-темой для WordPress. Эта специальная тема WordPress оснащена лучшим фреймворком, панелью настроек и отличным дизайном. Больше <a href="http://www.paddsolutions.com">бесплатных тем WordPress</a>.', PADD_THEME_SLUG) ?></p>
		<h3><?php echo __('Помогите нам', PADD_THEME_SLUG); ?></h3>
		<p><?php echo __('Мы приветсвуем пожертвования, любая сумма важна для нас. Это позволяет нам создавать больше новых бесплатных тем WordPress.', PADD_THEME_SLUG); ?></p>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="MKRFZ5RSPMQNS">
			<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
		</form>
		<h3><?php echo __('Подписка', PADD_THEME_DESC); ?></h3>
		<p><?php echo __('Чтобы быть в курсе новинок, следите за нами на <a href="http://twitter.com/paddsolutions" target="_blank">Twitter</a> или в <a href="http://www.facebook.com/paddsolutions" target="_blank">Facebook</a>. Вы также можете подписаться на нашу <a href="http://feeds.feedburner.com/paddsolutions" target="_blank">RSS</a>-ленту.', PADD_THEME_SLUG); ?></p>
		<h3><?php echo __('Оставайтесь на связи', PADD_THEME_DESC); ?></h3>
		<p><?php echo __('Нам нравится слышать ваше мнение. Вы можете <a href="http://www.paddsolutions.com/contact-us/" target="_blank">написать нам</a>, если вам нужна помощь в настройке, вы хотите заказать рекламу, и т.п.', PADD_THEME_SLUG); ?></p>
		<h3><?php echo __('Условия предоставления', PADD_THEME_DESC); ?></h3>
		<p><?php echo __('Наши темы поставляются "как есть", без какой-либо гарантии. Мы не отвечаем за любой вред или ошибки в результате работы этой темы, вы используете ее на свой собственный риск.', PADD_THEME_SLUG); ?></p>
	</fieldset>

	<fieldset id="padd-admin-tab-general">
		<h3><?php echo __('Общие настройки', PADD_THEME_SLUG); ?></h3>
		<p><?php echo sprintf(__('Общие настройки для темы %s'), PADD_THEME_NAME); ?></p>
		<form method="post" id="padd-theme-admin-options" action="themes.php?page=options-functions.php">
			<table class="form-table">
			<?php
				foreach ($padd_options['general'] as $opt) {
					$opt->set_value(get_option($opt->get_keyword()));
					echo $opt;
				}
			?>
			</table>
			<p class="submit">
				<button class="button button-primary" name="action" type="submit" value="general"><?php echo __('Сохранить настройки', PADD_THEME_SLUG); ?></button>
			</p>
		</form>
	</fieldset>

	<fieldset id="padd-admin-tab-slideshow">
		<h3><?php echo __('Настройки слайд-шоу', PADD_THEME_SLUG); ?></h3>
		<p><?php echo sprintf(__('Настройки слайд-шоу для темы %s.'), PADD_THEME_NAME); ?></p>
		<form method="post" id="padd-theme-admin-options" action="themes.php?page=options-functions.php">
			<table class="form-table">
			<?php
				foreach ($padd_options['slideshow'] as $opt) {
					$opt->set_value(get_option($opt->get_keyword()));
					echo $opt;
				}
			?>
			</table>
			<p class="submit">
				<button class="button button-primary" name="action" type="submit" value="slideshow"><?php echo __('Сохранить настройки', PADD_THEME_SLUG); ?></button>
			</p>
		</form>
	</fieldset>

	<fieldset id="padd-admin-tab-tracker">
		<h3><?php echo __('Настройки кодов статистики', PADD_THEME_SLUG); ?></h3>
		<p><?php echo sprintf(__('Настройки кодов отслеживания статистики для темы %s.'), PADD_THEME_NAME); ?></p>
		<form method="post" id="padd-theme-admin-options" action="themes.php?page=options-functions.php">
			<table class="form-table">
			<?php
				foreach ($padd_options['tracker'] as $opt) {
					$opt->set_value(get_option($opt->get_keyword()));
					echo $opt;
				}
			?>
			</table>
			<p class="submit">
				<button class="button button-primary" name="action" type="submit" value="tracker"><?php echo __('Сохранить настройки', PADD_THEME_SLUG); ?></button>
			</p>
		</form>
	</fieldset>

	<fieldset id="padd-admin-tab-sn">
		<h3><?php echo __('Настройки социальных сетей', PADD_THEME_SLUG); ?></h3>
		<p><?php echo sprintf(__('Настройки социальных сетей для темы %s.'), PADD_THEME_NAME); ?></p>
		<form method="post" id="padd-theme-admin-options" action="themes.php?page=options-functions.php">
			<table class="form-table">
			<?php
				foreach ($padd_options['socialnetwork'] as $opt) {
					$opt->set_value(get_option($opt->get_keyword()));
					echo $opt;
				}
			?>
			</table>
			<p class="submit">
				<button class="button button-primary" name="action" type="submit" value="socialnetwork"><?php echo __('Сохранить настройки', PADD_THEME_SLUG); ?></button>
			</p>
		</form>
	</fieldset>

	<fieldset id="padd-admin-tab-pagenav">
		<h3><?php echo __('Настройки пагинации', PADD_THEME_SLUG); ?></h3>
		<p><?php echo sprintf(__('Настройки постраничной навигации для темы %s.'), PADD_THEME_NAME); ?></p>
		<form method="post" id="padd-theme-admin-options" action="themes.php?page=options-functions.php">
			<table class="form-table">
			<?php
				foreach ($padd_options['pagenav'] as $opt) {
					$opt->set_value(get_option($opt->get_keyword()));
					echo $opt;
				}
			?>
			</table>
			<p class="submit">
				<button class="button button-primary" name="action" type="submit" value="pagenav"><?php echo __('Сохранить настройки', PADD_THEME_SLUG); ?></button>
			</p>
		</form>
	</fieldset>

	<fieldset id="padd-admin-tab-ads-custom">
		<h3><?php echo __('Настройки рекламы', PADD_THEME_SLUG); ?></h3>
		<p><?php echo sprintf(__('Настройки рекламы для %s.'), PADD_THEME_NAME); ?></p>
		<form method="post" id="padd-theme-admin-options" action="themes.php?page=options-functions.php">
			<table class="form-table">
			<?php
				foreach ($padd_options['advertisements'] as $opt) {
					$opt->set_value(get_option($opt->get_keyword()));
					echo $opt;
				}
			?>
			</table>
			<p class="submit">
				<button class="button button-primary" name="action" type="submit" value="advertisements"><?php echo __('Сохранить настройки', PADD_THEME_SLUG); ?></button>
			</p>
		</form>
	</fieldset>
</div>
</div>

