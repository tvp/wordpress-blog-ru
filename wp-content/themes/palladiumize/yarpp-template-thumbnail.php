<?php
/*
	Example template for use with post thumbnails
	Requires WordPress 2.9 and a theme which supports post thumbnails
	Author: mitcho (Michael Yoshitaka Erlewine)
*/
?>
<div class="post-box post-box-related">
	<div class="title">
		<h2><?php echo __('Похожие статьи', PADD_THEME_SLUG); ?></h2>
		<p><?php echo __('Вам могут понравится другиие похожие статьи.', PADD_THEME_SLUG); ?></p>
	</div>
	<div class="interior append-clear">
		<?php ?>
		<?php if ($related_query->have_posts()) : ?>
		<ol>
			<?php 
				while ($related_query->have_posts()) :
					$related_query->the_post();
					if (function_exists('has_post_thumbnail')) :
						if (has_post_thumbnail()) :
			?>
			<li>
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(PADD_THEME_SLUG . '-related-posts'); ?></a><br />
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</li>
			<?php 
						endif;
					endif;
				endwhile;
			?>
		</ol>
		<?php else : ?>
		<p><?php echo __('Похожих статей не найдено.', PADD_THEME_SLUG); ?></p>
		<?php endif; ?>
	</div>
</div>

