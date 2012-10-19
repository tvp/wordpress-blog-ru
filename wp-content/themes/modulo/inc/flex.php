<div class="row extended-margin">
    
    <div class="twelve columns less-space">

        <div class="flexslider">

        <ul class="slides">

            <?php
            if (function_exists('get_option_tree')) {
                $slides = get_option_tree('slides', '', false, true, -1);
                foreach ($slides as $slide) {
        echo '
                <li>
                        ';

                        if ($slide['video']) {

            echo '<div class="video-wrapper">

                    <div class="video-container">

                        <iframe width="940" height="390" src="' . $slide['video'] . '?rel=0&amp;wmode=transparent" frameborder="0" allowfullscreen></iframe>

                    </div>
                    
                  </div>
                  ';

                        }

                        elseif ($slide['image']) {
            if($slide['link'])
            echo '
                    <a href="' . $slide['link'] . '">

                        <img src="' . $slide['image'] . '" />

                    </a>
                    ';

            else echo '
                    <img src="' . $slide['image'] . '" />
                    ';

                                if($slide['description'] || $slide['title']) {

            echo'
                    <div class="flex-caption">';
                        if($slide['title'])
                echo    '<h3>'.$slide['title'].'</h3><br>';
                        if($slide['description'])
                 echo   '<p>'. $slide['description'] . '</p>

                    </div>
                    ';

                            }

                        }

        echo '
                </li>
                            '; } } ?>

        </ul>

        </div>
    
    </div>

</div>
<?php wp_reset_query(); ?>

