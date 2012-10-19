<?php
$the_sidebars = wp_get_sidebars_widgets();

if (is_active_sidebar('footer-main')) :
?>

    <footer>

        <div class="col-<?php echo count($the_sidebars['footer-main']); ?> row">

        <?php dynamic_sidebar('footer-main'); ?>

    </div>

</footer><!-- end footer-wrap -->

<?php endif; ?>

        <div id="copyrights-area"<?php if (!is_active_sidebar('footer-main'))
            echo ' class="no-wg"' ?>>

           <div class="row">

               <p class="columns">Copyright &copy; 2011 <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>. All rights reserved.</p>

               <div id="footer-menu" class="columns"><?php wp_nav_menu(array('theme_location' => 'footer_menu', 'fallback_cb' => '')); ?></div>

    <?php if (get_option_tree('logo_copy', '')) {
    ?>
                <a class="copy-logo twelve columns first-child" href="<?php bloginfo('url'); ?>">

                    <img src="<?php get_option_tree('logo_copy', '', 'true'); ?>" alt="back to home" />

                </a>
    <?php } ?>
           </div>

        </div>

        </div><!-- end wrapper -->

<?php wp_footer(); ?>

<?php if (is_single() || is_singular('portfolio')) {
 ?>
                <script type="text/javascript">

                    jQuery(document).ready(function() {
                        // Load Tweet Button Script
                        var e = document.createElement('script');
                        e.type="text/javascript"; e.async = true;
                        e.src = 'http://platform.twitter.com/widgets.js';
                        document.getElementsByTagName('head')[0].appendChild(e);
                    });

                    window.fbAsyncInit = function() {
                        FB.init({appId: '<APPID>', status: true, cookie: true, xfbml: true});
                    };
                    (function() {
                        var e = document.createElement('script');
                        e.type = 'text/javascript';
                        e.src = document.location.protocol +
                            '//connect.facebook.net/en_US/all.js';;
                        e.async = true;
                        document.getElementById('fb-root').appendChild(e);
                    }());

                    jQuery(document).ready(function() {
                        // Load Plus One Button
                        var e = document.createElement('script');
                        e.type="text/javascript"; e.async = true;
                        e.src = 'https://apis.google.com/js/plusone.js';
                        document.getElementsByTagName('head')[0].appendChild(e);
                    });

                </script><?php } ?>
            <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/inits.js"></script>
</body>
</html>
