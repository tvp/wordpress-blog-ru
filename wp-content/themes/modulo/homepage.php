<?php /*
  Template Name: Home page
 */ ?>

<div id="main"<?php $options = get_option('option_tree'); if (($options['choose_slider'] == 'Flex slider (responsive/fluid)')) {echo ' class="slider-enabled"';} elseif($options['choose_slider'] == 'Carousel slider' || ($options['choose_slider'] == 'Nivo slider')) {echo ' class="slider-disabled roundabout"';} else {echo ' class="slider-disabled"';}?>>
    <?php if(get_option_tree('featured_folio', '')) { ?>
    
    <div id="featured-portfolio" class="row">

                <?php
                            query_posts(array('post_type' => 'portfolio', 'post__in' => get_option_tree('featured_folio', '', false, true), 'showposts' => 3));
                            global $more;
                            if (have_posts ()) : while (have_posts ()) : the_post();
                            $images = get_post_meta(get_the_ID(), 'rw_addpict', false);
                            $video = get_post_meta(get_the_ID(), 'rw_lightbox_addvideo', true);
                            ?>

        <div class="four columns shadow">

            <article>

            <div class="thumbnail">

                <span class="link">

                <?php the_post_thumbnail(); ?>

                </span>

                <div class="excerpt">

                <h4>

                    <a href="<?php the_permalink(); ?>">

                    <?php the_title(); ?>

                    </a>

                </h4>

                <?php echo content(6); ?>

                </div>

                <a class="button<?php if($video == false) echo ' single'?>" href="<?php the_permalink(); ?>" title="link to: <?php the_title(); ?>">Go to page: <?php the_title(); ?></a>
                <?php if($video == true) { ?>
                <a class="button video" href="<?php echo $video; ?>" title="watch video" rel="prettyPhoto">View video</a><?php } ?>
                
            </div>

            </article>

        </div>
        <?php endwhile; endif; wp_reset_query(); ?>
    </div>
    <?php } ?>
    <div id="content-holder" class="row">

        <div class="eight columns">
                <?php
                if (get_option_tree('crumbs', '')) {
                    if (function_exists('dimox_breadcrumbs'))
                        dimox_breadcrumbs();
                } ?>

                    <article <?php post_class(); ?>>

                    <?php if (!is_front_page()) : ?>

                        <h2><?php the_title(); ?></h2>

                    <?php endif; ?>

                    <?php while (have_posts ()) : the_post(); ?>

                    <?php the_content(); ?>

                    </article><!-- end post -->

                <?php endwhile; ?>

        </div>

        <?php get_sidebar(); ?>

    </div><!-- end content-holder -->

</div><!-- end main -->
    <?php get_footer(); ?>