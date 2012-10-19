<div class="row show-on-desktops">

    <div class="twelve columns less-space">

        <div id="nivo-wrapper">

            <div id="slider">

            <?php
            if (function_exists('get_option_tree')) {
                $slides = get_option_tree('slides', '', false, true, -1);
                foreach ($slides as $slide) {

                    if ($slide['image']) {
                        if ($slide['link']) {
                            echo '
                    <a href="' . $slide['link'] . '">';

                            echo '
                    <img src="' . $slide['image'] . '" title="';
                            if ($slide['title']) {
                                echo '<h3>' . $slide['title'] . '</h3>';
                            }
                            if ($slide['description'])
                                echo '<br><span>' . $slide['description'] . '</span>';
                            echo '" /></a>';
                        }
                        else {
                            echo '
                    <img src="' . $slide['image'] . '" title="';
                            if ($slide['title'])
                                echo '<h3>' . $slide['title'] . '</h3>';if ($slide['description'])
                                echo '<br><span>' . $slide['description'] . '</span>'; echo '" />';
                        }
                    }
                }
            }
            ?>
                
            </div>

        </div>

    </div>

</div>
<?php wp_reset_query(); ?>

