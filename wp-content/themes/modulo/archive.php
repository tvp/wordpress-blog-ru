<?php get_header(); ?>

<div id="main">

<div id="content-holder" class="row">

    <div id="content" class="eight columns">

            <?php
            global $post;
            if (is_archive() && have_posts()) :

                if (is_category ()) :
            ?>
                    <h2 class="title">Archive for: <?php single_cat_title(); ?></h2>
            <?php elseif (is_tag ()) : ?>
                        <h2 class="title"><?php single_tag_title(); ?></h2>
            <?php elseif (is_day ()) : ?>
                            <h2 class="title"><?php ('Archive'); ?> <?php the_time(get_option('date_format')); ?></h2>
            <?php elseif (is_month ()) : ?>
                                <h2 class="title">Archive: <?php the_time('F Y'); ?></h2>
            <?php elseif (is_author ()) : ?>
                                    <h2 class="title">Archive for <?php the_author(); ?></h2>
            <?php elseif (is_year ()) : ?>
                                        <h2 class="title">Archive <?php the_time('Y'); ?></h2>
            <?php elseif (isset($_GET['paged']) && !empty($_GET['paged'])) : ?>
                                            <h2 class="title">Archive </h2>
            <?php endif; ?>

            <?php endif; ?>

             <?php if (have_posts ()) : while (have_posts ()) : the_post(); ?>

                    <article class="row">

                    <?php if (has_post_thumbnail ()) : ?>

                            <div class="featured-image full">

                                <h2><?php the_title(); ?></h2>

                                <span class="link">

                                    <?php the_post_thumbnail('fi-page'); ?>

                                    <a class="button single" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"  title="link to: <?php the_title(); ?>">Go to page: <?php the_title(); ?></a>


                                </span>


                            </div><?php endif; ?>

                        <?php if (!has_post_thumbnail ()) : ?>

                           <h2>

                                <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>

                            </h2><?php endif; ?>

                        <div class="meta blog three columns first-child">

                            <p class="b_date"><?php the_time('jS M, Y'); ?></p>

                            <p class="b_author">by <?php the_author_posts_link(); ?></p>

                        </div>

                        <div class="post-content eight columns">

                            <?php echo content(55); ?>

                            <?php the_more(); ?>

                        </div>

                    </article><!-- end post -->

            <?php
                endwhile;
            endif;
            ?>

                <div class="navigation">

                    <?php posts_nav_link('sep','<div class="previous"><span>&nbsp;</span>Previous Entries</div>','<div class="next">Next Entries<span>&nbsp;</span></div>'); ?>

                </div>

            </div><!-- end content -->

            <?php get_sidebar(); ?>

        </div>

</div>

<?php get_footer(); ?>
