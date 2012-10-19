<?php
/**
 * The Loop
 *
 * Section dedicated for rendering the number of posts in which we will expect
 * to return at least one or more posts.
 *
 */
?>

<?php if (!have_posts()) : ?>

<div id="post-0" class="hentry post error404 not-found">
	<div class="title">
		<h2><?php echo __('Не найдено', PADD_THEME_SLUG); ?></h2>
	</div>
	<div class="content">
		<p><?php echo __('К сожалению, по вашему запросу ничего не найдено.', PADD_THEME_SLUG); ?></p>
	</div>
</div>

<?php else : ?>

	<?php
		$tag = 'h2';
		add_filter('excerpt_length', 'padd_theme_hook_excerpt_index_length');
		$i = '1';
	?>
	<?php while (have_posts()) : ?>
		<?php the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class('append-clear hentry-' . $i); ?>>
			<div class="meta">
				<p><span class="date"><?php the_time(__('d M Y', PADD_THEME_SLUG)); ?></span></p>
			</div>
			<div class="title">
				<<?php echo $tag;?>><a href="<?php the_permalink() ?>" rel="bookmark" title="Постоянная ссылка: <?php the_title_attribute(); ?>"><?php the_title(); ?></a></<?php echo $tag; ?>>
			</div>
			<div class="thumbnail">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Постоянная ссылка: <?php the_title_attribute(); ?>">
					<?php
						$padd_image_def = get_template_directory_uri() . '/images/thumbnail.png';
						if (has_post_thumbnail()) {
							the_post_thumbnail(PADD_THEME_SLUG . '-thumbnail');
						} else {
							echo '<img class="image-thumbnail" alt="Нет изображения" src="' . $padd_image_def . '" />';
						}
					?>
				</a>
			</div>
			<div class="excerpt">
				<?php the_excerpt();?>
				<?php
					if ('post' == get_post_type()) {
						padd_theme_share_button();
					}
				?>
			</div>
			
		</div>
		<?php $i = ($i == '1') ? '2' : '1'; ?>
	<?php endwhile; ?>
	<?php
		remove_filter('excerpt_length', 'padd_theme_hook_excerpt_index_length');
	?>

<?php endif;
