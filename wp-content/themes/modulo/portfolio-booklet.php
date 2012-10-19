<?php /*
  Template Name: portfolio - booklet
 */ ?>

<?php get_header(); ?>
            <script type="text/javascript">
                jQuery(function() {
                    jQuery('#portfolio').booklet({
                        speed: 750,
                        width: "100%",
                        pagePadding: 5,
                        overlays: false,
                        closed: true,
                        covers: true,
                        pageSelector: true,
                        manual: false,
                        menu: '#custom-menu',
                        next: '#right',
                        prev: '#left'
                    });
                });

            </script>
<div id="main">

    <div id="content-holder" class="row">

        <div id="content" class="twelve columns">

            <div id="portfolio">

                <ul id="custom-menu"></ul>

                <div class="b-load">

                    <div><h2 class="booklet-cover-title"><?php the_title(); ?></h2></div>
                    
                    <?php
                    $loop = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => -1));
                    $counter = 0;
                    while ($loop->have_posts()) : $loop->the_post();
                        global $more;
                        $more = 0;
                    ?>

                        <div title="<?php the_title(); ?>">

                        <?php if ($count % 2 == 1) {
                        ?>
                            <div class="right-page">

                            <?php } else {
                            ?>

                            <div class="left-page">

                                <?php } ?>

                                <a href="<?php the_permalink() ?>">

                                    <?php the_post_thumbnail('booklet'); ?>

                                </a>

                                <div class="booklet-description">

                                    <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>

                                    <?php echo content(11); ?>

                                </div>

                            </div><!-- end portfolio-item -->

                        </div>

                        <?php $count++; ?>

                        <?php endwhile; ?>

                            <div></div>

                                </div>

                            </div><!-- end portfolio -->

                            <div id="controls">

                                <a id="left" href="#">Previous Page</a>

                                <a id="right" href="#">Next Page</a>                        

                            </div>

                        </div><!-- end content -->

        </div>

                    </div><!-- end main -->

    <?php get_footer(); ?>
