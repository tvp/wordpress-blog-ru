<?php
/*
Template Name: Single Post
*/
?>
<?php get_header(); ?>

<div id="content" class="content content-singular content-single">
	<div id="content-pad">
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php while (have_posts()) : ?>
	<?php the_post(); ?>

<?php
	if (function_exists('bcn_display')) {
		echo '<p class="breadcrumb">';
		bcn_display();
		echo '</p>';
	}
?>
			
<div class="title">
	<h1><?php the_title(); ?></h1>
</div>

<div class="content">
	<?php the_content(); ?>
	<div class="clear"></div>
	<?php wp_link_pages(array('before' => '<p class="pages"><strong>Страницы:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
</div>

<?php
	if (function_exists('related_posts')) {
		related_posts();
	}
?>

<?php comments_template('',true); ?>
			
<?php endwhile; ?>

		</div>
	</div>
</div>

<?php get_sidebar(); ?>

<div class="clear"></div>

<?php get_footer(); ?>