<?php get_header(); ?>

<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>

<?php get_header(); ?>
<div id="main">

    <div id="content-holder" class="row">

    <?php if (have_posts ()) : while (have_posts ()) : the_post(); ?>

                <?php
                    $images = get_post_meta(get_the_ID(), 'rw_addpict', false);
                    $video = get_post_meta(get_the_ID(), 'rw_lightbox_addvideo', true);
                    $terms = get_the_terms($post->ID, 'services_rendered');
                    unset($draught_links);
                    foreach ($terms as $term) {
                        $draught_links[] = $term->name;
                        $qs = join(" ", $draught_links);
                    }
                ?>

        <div class="portfolio-item four columns shadow<?php if ( $count % 3 == 0 ) echo' first-child';?>">

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

        </div><!-- end portfolio-item -->

                <?php $count++; endwhile; endif; ?>

         </div><!-- end content-holder -->

    </div><!-- end main -->

<?php get_footer(); ?>