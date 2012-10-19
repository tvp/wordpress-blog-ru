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

                                    <a class="button video" href="<?php
                                $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                                echo $thumbnail[0]; ?>" title="<?php the_title(); ?>" rel="prettyPhoto[pp_gal]"" title="link to: <?php the_title(); ?>">Go to page: <?php the_title(); ?></a>


                                </span>


                            </div><?php endif; ?>

                        <?php if (!has_post_thumbnail ()) : ?>

                           <h2>

                                <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>

                            </h2><?php endif; ?>

                        <div class="meta blog three columns first-child">

                            <p class="b_date"><?php the_time('jS M, Y'); ?></p>

                            <p class="b_author">by <?php the_author_posts_link(); ?></p>

                            <p class="b_cat">in <?php the_category(', '); ?></p>

                            <p class="b_tags">Tagged as <?php the_tags(' ', ' ', ' '); ?></p>

                            <p class="b_comm"><?php echo comments_popup_link('0', '1', '%', 'comments-link', 'off'); ?></p>

                        </div>

                        <div class="post-content nine columns">

                            <?php the_content(); ?>

                            <ul class="social buttons">

                                  <li class="gplus">

                                    <g:plusone size="medium" callback="plusone_vote" href="<?php get_permalink(); ?>"></g:plusone>

                                  </li>

                                  <li>

                                    <a href="http://twitter.com/share" data-url="<?php the_permalink(); ?>"
                                      data-text="< ?php the_title(); ?>" data-via="yoast"
                                      class="twitter-share-button">Tweet</a>

                                  </li>

                                  <li>

                                    <fb:like href="<?php the_permalink() ?>" send="false"
                                      showfaces="false" width="120" layout="button_count"
                                      action="like"/>

                                  </fb:like>

                                  </li>

                                  <div id="fb-root"></div>

                                </ul>

                            </div>

                            <?php wp_link_pages(); ?>

                <?php comments_template('', true); ?>
            
            </article><!-- end post -->

            <?php endwhile; endif; ?>

                </div><!-- end content -->

        <?php get_sidebar(); ?>

</div><!-- end content-holder -->

</div><!-- end main -->

</div>

    <?php get_footer(); ?>
