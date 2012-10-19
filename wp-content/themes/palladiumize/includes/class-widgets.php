<?php

class Padd_Widget_Feedburner extends WP_Widget {

	function Padd_Widget_Feedburner() {
		$widget_ops = array(
						'classname' => 'box-feedburner',
						'description' => PADD_THEME_NAME . ' Виджет для формы подписки через Feedburner. Введите имя пользователя Feedburner во вкладке Социальные сети в настройках темы ' . PADD_THEME_NAME . '.'
					);
		$this->WP_Widget(PADD_THEME_SLUG . '_feedburner', PADD_THEME_NAME . ' Подписка через Feedburner', $widget_ops);
		$this->alt_option_name = PADD_THEME_SLUG .  '_widget_feedburner';
	}

	function widget($args,$instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		echo $before_widget . "\n";

		if (!empty($title)) {
			echo $before_title . $title . $after_title . "\n";
		} else {
			echo $before_title . __('Подписка', PADD_THEME_SLUG) . $after_title . "\n";
		}

		padd_theme_widget_feedburner();
		echo $after_widget . "\n";
	}

	function save_settings($settings) {
		$settings['_multiwidget'] = 0;
		update_option( $this->option_name, $settings );
	}
}

class Padd_Widget_SocialNetwork extends WP_Widget {

	function Padd_Widget_SocialNetwork() {
		$widget_ops = array(
						'classname' => 'box-socialnet',
						'description' => PADD_THEME_NAME . ' Виджет для социальных сетей. Ввести данные о пользователе можно во вкладке Социальные сети в настройках темы ' . PADD_THEME_NAME . '.'
					);
		$this->WP_Widget(PADD_THEME_SLUG . '_socialnet', PADD_THEME_NAME . ' Иконки социальных сетей', $widget_ops);
		$this->alt_option_name = PADD_THEME_SLUG .  '_socialnet';
	}

	function widget($args,$instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		echo $before_widget . "\n";

		if (!empty($title)) {
			echo $before_title . $title . $after_title . "\n";
		} else {
			echo $before_title . __('Социальная сеть', PADD_THEME_SLUG) . $after_title . "\n";
		}

		padd_theme_widget_socialnet();
		echo $after_widget . "\n";
	}

	function save_settings($settings) {
		$settings['_multiwidget'] = 0;
		update_option( $this->option_name, $settings );
	}
}

register_widget('Padd_Widget_Feedburner');
register_widget('Padd_Widget_SocialNetwork');