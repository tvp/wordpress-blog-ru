<?php
/*
Template Name: Archive
*/
?>
<?php get_header(); ?>

<div id="content" class="content content-group content-archive">
	<div id="content-pad">
		<div class="post-group">
			<?php the_post(); ?>
			<div class="content-title">
				<?php if (is_day()) : ?>
				<h1><?php echo sprintf(__('Архив по дням: %s', PADD_THEME_SLUG), get_the_date()); ?></h1>
				<?php elseif (is_month()) : ?>
				<h1><?php echo sprintf(__('Архив по месяцам: %s', PADD_THEME_SLUG), get_the_date(__('F Y', PADD_THEME_SLUG))); ?></h1>
				<?php elseif (is_year()) : ?>
				<h1><?php echo sprintf(__('Архив по годам: %s', PADD_THEME_SLUG), get_the_date(__('Y', PADD_THEME_SLUG))); ?></h1>
				<?php elseif (is_author()) : ?>
				<h1><?php echo sprintf(__('Страница автора %s', PADD_THEME_SLUG), get_the_author()); ?></h1>
				<?php elseif (is_category()) : ?>
				<h1><?php echo sprintf(__('Рубрика: %s', PADD_THEME_SLUG), single_cat_title('',false)); ?></h1>
				<?php elseif (is_tag()) : ?>
				<h1><?php echo sprintf(__('Метка: %s', PADD_THEME_SLUG), single_tag_title('',false)); ?></h1>
				<?php else : ?>
				<h1><?php echo __('Архив сайта', PADD_THEME_SLUG)?></h1>
				<?php endif; ?>
			</div>
			<?php rewind_posts(); ?>
			<?php get_template_part('loop','archive'); ?>
			<?php
				if (!is_singular()) :
					Padd_Theme_PageNavigation::render();
				endif;
			?>
		</div>
	</div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
