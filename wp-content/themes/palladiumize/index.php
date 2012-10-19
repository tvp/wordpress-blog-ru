<?php
/*
Template Name: Index Page
*/
?>
<?php get_header(); ?>

<div id="content" class="content content-group content-home">
	<div id="content-pad">
		<div class="post-group">
			<?php get_template_part('loop','index'); ?>
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