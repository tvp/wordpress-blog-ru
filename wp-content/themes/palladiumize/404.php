<?php
/*
Template Name: 404 Error Page
*/
?>
<?php get_header(); ?>

<div id="content" class="content content-singular content-page">
	<div id="content-pad">
		<div id="post-0" class="hentry not-found">

			<?php
				if (function_exists('bcn_display')) {
					echo '<p class="breadcrumb">';
					bcn_display();
					echo '</p>';
				}
			?>

			<div class="title">
				<h1><?php echo __('Не найдено', PADD_THEME_SLUG); ?></h1>
			</div>
			<div class="content">
				<p><?php echo __('К сожалению, по вашему запросу ничего не найдено.', PADD_THEME_SLUG); ?></p>
			</div>

		</div>
	</div>
</div>

<?php get_sidebar(); ?>

<div class="clear"></div>

<?php get_footer(); ?>