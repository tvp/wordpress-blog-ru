<?php get_header(); ?>

<div id="main">

    <div id="content-holder" class="row">

        <div id="error404" class="twelve columns">

            <div class="four columns">

                <h1>Nothing found here</h1>

                <div class="linebreak bg-image nospace"></div>

                <h3>Perhaps You will find something interesting form these list...</h3>

            </div>

            <div class="four columns">

                <h3>Pages</h3>

                <ul><?php wp_list_pages("title_li="); ?></ul>

            </div>

            <div class="four columns">

                <h3>All Blog Posts:</h3>

                <ul><?php $archive_query = new WP_Query('showposts=1000&cat=-8');
while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
                    <li>
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?>

                        </a>
                    </li>

                    <?php endwhile; ?>
                </ul>

            </div>

        </div><!-- end content -->

    </div>

</div>

<?php get_footer(); ?>
