<?php /*
  Template Name: Full width page
 */ ?>

<?php get_header(); ?>

<div id="main">

    <div id="content-holder" class="row">

        <div class="twelve columns">
                <?php
                if (get_option_tree('crumbs', '')) {
                    if (function_exists('dimox_breadcrumbs'))
                        dimox_breadcrumbs();
                } ?>

                    <article <?php post_class(); ?>>

                    <?php if (!is_front_page() && !has_post_thumbnail()) : ?>

                            <h2><?php the_title(); ?></h2>

                    <?php endif; ?>
                    <?php while (have_posts ()) : the_post(); ?>
                    <?php if (has_post_thumbnail ()) : ?>

                            <div class="featured-image full">

                                <h2><?php the_title(); ?></h2>

                                <span class="link">

                                    <?php the_post_thumbnail('full'); ?>

                                    <a class="button video" href="<?php
                                $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                                echo $thumbnail[0]; ?>" title="<?php the_title(); ?>" rel="prettyPhoto[pp_gal]"" title="link to: <?php the_title(); ?>">Go to page: <?php the_title(); ?></a>


                                </span>


                            </div><?php endif; ?>

                    <?php the_content(); ?>

                    </article><!-- end post -->

                <?php endwhile; ?>

        </div>

    </div><!-- end content-holder -->

</div>

    <?php get_footer(); ?>