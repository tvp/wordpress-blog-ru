<?php get_header(); ?>

<div id="main">

<div id="content-holder" class="row">
    
    <div id="content" class="nine columns">

                <?php
                if (get_option_tree('crumbs', '')) {
                    if (function_exists('dimox_breadcrumbs'))
                        dimox_breadcrumbs();
                } ?>

        <article <?php post_class();?>>

                    <?php while (have_posts ()) : the_post(); ?>

                    <?php
                        if(has_post_thumbnail() && get_post_meta(get_the_ID(), 'rw_addpict', false) || has_post_thumbnail() && get_post_meta(get_the_ID(), 'rw_addvideo', true)) {
                        $video = get_post_meta(get_the_ID(), 'rw_addvideo', true);
                        $images = get_post_meta(get_the_ID(), 'rw_addpict', false);
                            echo '<div class="flexslider single">

                                <ul class="slides">
                                ';

                            if(has_post_thumbnail()) {
                                echo '
                                    <li>
                                    ';

                                        the_post_thumbnail();
                                echo '

                                    </li>';
                            }

                            foreach ($images as $att) {
                                $src = wp_get_attachment_image_src($att, 'full');
                                $src = $src[0];
                                echo '
                                    <li>

                                        <img src="' . $src . '" />

                                    </li>';
                                }
                            if ($video != NULL) echo '
                                <li>

                                    <iframe src="' . $video . '?wmode=transparent" width="695" height="420" frameborder="0"></iframe>

                                </li>';

                            echo '
                                  </ul>

                                </div>';
                        }

                        else if(has_post_thumbnail()) : ?>

                            <div class="featured-image full">

                                <h2><?php the_title(); ?></h2>

                                <span class="link">

                                    <?php the_post_thumbnail('folio-single-page'); ?>

                                    <a class="button video" href="<?php
                                $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                                echo $thumbnail[0]; ?>" title="<?php the_title(); ?>" rel="prettyPhoto[pp_gal]"" title="link to: <?php the_title(); ?>">Go to page: <?php the_title(); ?></a>


                                </span>


                            </div><?php endif; ?>
            <?php if(get_the_terms($post->ID, 'services_rendered')==true) { ?>

            <div class="two columns first-child">

                <?php echo get_the_term_list($post->ID, 'services_rendered', '<ul class="services"><li>', '</li><li>', '</li></ul>'); ?>

            </div>

            <div class="ten columns"><?php } else { echo '<div class="twelve columns first-child">'; } ?>

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

                        </article><!-- end post -->

                <?php endwhile; ?>

    </div>

    <aside class="three columns">
        
<?php
                $loop = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => -1));
                ?>

                <?php while ($loop->have_posts()) : $loop->the_post(); global $more; $more = 0;	?>

                        <div class="remained-folio-items">

                            <span class="ov">
                                
                                <?php the_post_thumbnail('portfolio'); ?>

                            <h4>

                                <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>

                            </h4>

                            </span>

                            <a class="r-f" href="<?php the_permalink() ?>">

                                <?php the_post_thumbnail('folio-remained'); ?>

                            </a>

                        </div>

                        <?php endwhile; ?>

    </aside>

</div><!-- end content-holder -->

</div><!-- end main -->

<?php get_footer(); ?>
