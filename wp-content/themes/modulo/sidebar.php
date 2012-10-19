
    <aside class="four columns">
    <?php if(is_front_page() && get_option_tree('testimonials', '')) { ?>
        <div id="home-testimonials">

            <ul>
            <?php
                $loop = new WP_Query(array('post_type' => 'testimonials', 'posts_per_page' => -1));
                while ($loop->have_posts()) : $loop->the_post(); global $more; $more = 0;
                echo '
                    <li>
                    ';
                echo '
                        <blockquote>

                            ' . content(14) . '
                                
                        </blockquote>
                        ';
                if(get_post_meta(get_the_ID(), 'rw_author', true))
                echo '
                        <strong class="author">' . get_post_meta(get_the_ID(), 'rw_author', true) . '</strong>
                            ';
                if(get_post_meta(get_the_ID(), 'rw_position', true))
                echo '
                        <strong class="occupation">' . get_post_meta(get_the_ID(), 'rw_position', true) . '</strong>
                            ';
                echo '
                    </li>
                    ';

                endwhile; ?>

            </ul>

        </div>
        <?php } ?>
        <?php
            if(is_archive() && is_active_sidebar('sidebar-archives')) : dynamic_sidebar('sidebar-archives');
            elseif(is_single() && is_active_sidebar('sidebar-post')) : dynamic_sidebar('sidebar-post');
            elseif(is_page() && is_active_sidebar('sidebar-pages')) : dynamic_sidebar('sidebar-pages');
            elseif(is_front_page() && is_active_sidebar('sidebar-page-home')) : dynamic_sidebar('sidebar-page-home');
        else : ?>

            <?php dynamic_sidebar('sidebar'); ?>
            <?php endif; ?>

    </aside><!-- end aside -->