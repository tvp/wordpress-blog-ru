<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
// Do not delete these lines
if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die('Please do not load this page directly. Thanks!');

if (post_password_required ()) {
?>
    <p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'sophis'); ?></p>
<?php
    return;
}
?>

<!-- You can start editing here. -->

<div id="commentarea">
    <?php if (have_comments ()) : ?>
        <h3 id="comments"><?php comments_number(__('No Responses', 'sophis'), __('One Response', 'sophis'), __('% Responses', 'sophis')); ?> <?php printf(__('to &#8220;%s&#8221;', 'sophis'), the_title('', '', false)); ?></h3>

        <ol class="commentlist">
        <?php wp_list_comments(); ?>
    </ol>

         <div class="navigation">
  <?php paginate_comments_links(); ?>
 </div>

    <?php else : // this is displayed if there are no comments so far ?>

    <?php if (comments_open ()) : ?>
                <!-- If comments are open, but there are no comments. -->

    <?php else : // comments are closed ?>
                    <!-- If comments are closed. -->
                    <p class="nocomments">Comments are closed</p>
                </div>
<?php endif; ?>
<?php endif; ?>


<?php if (comments_open ()) : ?>

<?php comment_form(
	array(
		'comment_notes_after' => ' ',
	)
); ?>
                        </div><!-- end commentarea -->
<?php endif; // if you delete this the sky will fall on your head  ?>

