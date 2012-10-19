
			<div class="clear"></div>
		</div>
	</div>

	<div id="footer">
		<div id="footer-pad">
			<p class="copyright">
				<?php echo sprintf(__('&copy; %1$s. %2$s. Все права защищены.', PADD_THEME_SLUG), date('Y'), get_bloginfo('name')); ?> <a href="http://wp-templates.ru/">шаблоны вордпресс</a>.
			</p>
			<?php padd_theme_credits(); ?>
			<div class="clear"></div>
		</div>
	</div>

	</div>
</div>
<?php wp_footer(); ?>
<?php
$tracker = get_option(PADD_PREFIX . '_tracker_bot','');
if (!empty($tracker)) {
	echo stripslashes($tracker);
}
?>
</body>
</html>
