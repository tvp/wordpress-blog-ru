<div class="row show-on-desktops">

    <div id="carousel-wrapper" class="twelve columns less-space">

        <div id="carousel">

            <?php
            if (function_exists('get_option_tree')) {
            $slides = get_option_tree('slides', '', false, true, -1);
            foreach ($slides as $slide) {

            echo '
            <div class="carousel-feature">
                ';
                if ($slide['video']) {
                echo '
                <span>

                    <div class="video-wrapper">

                        <div class="video-container">

                            <iframe width="" height="" src="' . $slide['video'] . '?rel=0&amp;wmode=transparent" allowfullscreen></iframe>

                        </div>

                    </div>

                </span>
                ';
                }
                if ($slide['image']) {
           echo'<span>
                ';

                if ($slide['link']) {
                echo '
                    <a href="' . $slide['link'] . '">

                        <img src="' . $slide['image'] . '" />

                    </a>
                ';
                }

                else
                echo '
                    <img src="' . $slide['image'] . '" />
                    ';

                echo '
                </span>
                ';

                if ($slide['description'] || $slide['title']) {
                echo'
                <div class="carousel-caption">
                ';
                if ($slide['title'])
                echo '
                        <h3>' . $slide['title'] . '</h3>
                ';
                if ($slide['description'])
                echo '
                        <p>' . $slide['description'] . '</p>
                        ';

                echo '
                </div>
                ';
            }
                }
            echo '
            </div>
            ';
            }
            
            }
            ?>

        </div>
        <?php if (!get_option_tree('carousel_arrows', '')) { echo "
            <div id=\"carousel-left\">Previous</div>

            <div id=\"carousel-right\">Next</div>"; } ?>

    </div>

</div>
<?php wp_reset_query(); ?>

