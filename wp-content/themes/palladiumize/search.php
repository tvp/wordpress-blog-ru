<?php
/*
Template Name: Search Result
*/
?>
<?php get_header(); ?>

<div id="content" class="content content-group content-search">
	<div id="content-pad">
		<div class="post-group">
			<div class="content-title">
				<h1><?php echo sprintf(__('Результаты поиска: %s', PADD_THEME_SLUG), get_search_query()); ?></h1>
			</div>
			<?php get_template_part('loop','search'); ?>
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