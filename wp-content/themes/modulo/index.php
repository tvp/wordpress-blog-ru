<?php get_header(); ?>

<div id="main">

<div id="content-holder" class="row">

    <div id="content" class="eight columns">

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

                            <p class="b_comm"><?php echo comments_popup_link('0', '1', '%', 'comments-link', 'off'); ?></p>

                        </div>

                        <div class="post-content nine columns">
                            <?php echo content(75); ?>

                            <?php the_more(); ?>

                        </div>

                    </article><!-- end post -->

            <?php
                endwhile;
            endif;
            ?>

                <div class="navigation twelve columns first-child">

                    <?php posts_nav_link('sep','<div class="previous"><span>&nbsp;</span>Previous Entries</div>','<div class="next">Next Entries<span>&nbsp;</span></div>'); ?>

                </div>

            </div><!-- end content -->

            <?php get_sidebar(); ?>

        </div>

</div>

<?php get_footer(); ?>
