<?php get_header(); ?>

<div id="main">

<div id="content-holder" class="row">

    <div id="content" class="eight columns">

            <?php
            $results = new WP_Query("s=$s&showposts=-1");
            $term = esc_html($s, 1);
            $number = $results->post_count;
            wp_reset_query();
            ?>

            <h2>
            
                <?php echo $number; ?> Entries found for <em><?php echo $term; ?></em>

            </h2>

            <?php if (have_posts ()) : while (have_posts ()) : the_post(); ?>

                    <article class="search-post">

                        <h2>
                            
                            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>

                        </h2>

                            <?php the_excerpt(); ?>

                            <?php the_more(); ?>

                    </article><!-- end post -->

            <?php endwhile; ?>

            <?php else : ?>

                        <article>

                            <p>no entries matched your criteria.</p>

                            <?php get_search_form(); ?>
                        
                        </article>

            <?php endif; ?>

            <div class="navigation">

                <?php posts_nav_link('sep','<div class="previous"><span>&nbsp;</span>Previous Entries</div>','<div class="next">Next Entries<span>&nbsp;</span></div>'); ?>

            </div>

                </div><!-- end content -->

        <?php get_sidebar(); ?>

</div><!-- end content-holder -->

</div><!-- end main -->

    <?php get_footer(); ?>
