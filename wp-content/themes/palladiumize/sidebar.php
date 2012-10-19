
<div id="sidebar">
	<div id="sidebar-pad">

		<h2><?php echo __('Навигация', PADD_THEME_SLUG) ?></h2>

		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?>

		<div class="box box-popular-posts">
			<div class="title">
				<h3><?php echo __('Популярное', PADD_THEME_SLUG); ?></h3>
			</div>
			<div class="interior">
				<?php
					if (function_exists('get_mostpopular')) :
						get_mostpopular('pages=0&stats_comments=1&range=all&limit=5&thumbnail_selection=usergenerated&thumbnail_width=50&thumbnail_height=50&do_pattern=1&pattern_form={image}{title}{stats}');
					else :
				?>
				<p>&nbsp;Установите плагин <a href="http://wordpress.org/extend/plugins/wordpress-popular-posts/">Wordpress Popular Posts</a>.</p>
				<?php
					endif;
				?>
			</div>
		</div>

		<div class="box box-search">
			<div class="title">
				<h3><?php echo __('Поиск', PADD_THEME_SLUG); ?></h3>
			</div>
			<div class="interior">
				<?php get_search_form(); ?>
			</div>
		</div>

		<div class="box box-fb-like">
			<div class="title">
				<h3><?php echo __('Facebook', PADD_THEME_SLUG); ?></h3>
			</div>
			<div class="interior">
				<?php padd_theme_widget_facebook_likebox(); ?>
			</div>
		</div>

		<div class="box box-tweet">
			<div class="title">
				<h3>Twitter</h3>
			</div>
			<div class="interior">
				<?php
					$padd_sb_twitter = get_option(PADD_NAME_SPACE . '_sn_username_twitter');
					$twitter = new Padd_Twitter($padd_sb_twitter,4,true);
					$twitter->show_tweets();
				?>
			</div>
		</div>

		<div class="box box-ads">
			<div class="title">
				<h3><?php echo __('Спонсоры', PADD_THEME_SLUG); ?></h3>
			</div>
			<div class="interior">
				<?php padd_theme_widget_sponsors(); ?>
			</div>
		</div>

		<?php endif; ?>

	</div>
</div>


