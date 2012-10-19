<?php if (get_option_tree('choose_slider') == 'Flex slider (responsive/fluid)' && is_front_page()) : ?>

    <script type="text/javascript">
        jQuery(window).load(function() {
            jQuery('.flexslider').flexslider({<?php if (get_option_tree('diapo_slideshow', '')) { echo "
                   slideshow: true,"; } else { echo "
                   slideshow: false,"; } ?>
                <?php if (get_option_tree('diapo_time', '')) { echo "
                   slideshowSpeed: ".get_option_tree('diapo_time').",";} ?>
                <?php if (get_option_tree('diapo_pagination', '')) { echo "
                   controlNav: false,"; } ?>
                <?php if (get_option_tree('diapo_arrows', '')) { echo "
                   directionNav: false,"; } ?>
                <?php if (get_option_tree('diapo_commands', '')) { echo "
                   pausePlay: false,"; }  else { echo "
                   pausePlay: true,"; } ?>
                   keyboardNav: true,
            });
        });
    </script>

<?php endif; ?>

<?php if (is_singular('portfolio') && get_post_meta(get_the_ID(), 'rw_addpict', false) || is_singular('portfolio') && get_post_meta(get_the_ID(), 'rw_addvideo', true)) : ?>

    <script type="text/javascript">
        jQuery(window).load(function() {
            jQuery('.flexslider').flexslider({
                slideshow: false
            });
        });
    </script>

<?php endif; ?>

<?php if (get_option_tree('choose_slider') == 'Nivo slider' && is_front_page()) : ?>

    <script type="text/javascript">
        jQuery(window).load(function() {
            jQuery('#slider').nivoSlider({<?php if (get_option_tree('nivo_slideshow', '')) { echo "
                manualAdvance: false,"; } else { echo "
                manualAdvance: true,"; } ?>
                <?php if (get_option_tree('nivo_fx', '')) { echo '
                effect: \''.get_option_tree('nivo_fx').'\','; } ?>
                <?php if (get_option_tree('nivo_arrows', '')) { echo "
                directionNav: false,"; } ?>
                <?php if (get_option_tree('nivo_blips', '')) { echo "
                controlNav: false,"; } ?>
                <?php if (get_option_tree('nivo_time', '')) { echo "
                pauseTime: ".get_option_tree('nivo_time').",";} ?>
                captionOpacity: 1
            });
        });
    </script>

<?php endif; ?>

<?php if (get_option_tree('choose_slider') == 'Carousel slider' && is_front_page()) : ?>

<script type="text/javascript">
  jQuery(document).ready(function () {
    jQuery("#carousel").featureCarousel({<?php if (get_option_tree('carousel_slideshow', '')) { echo "
            autoPlay: ".get_option_tree('carousel_slideshow').",";}  else { echo "
            autoPlay: 0,"; } ?>
            <?php if (get_option_tree('carouselspeed', '')) { echo "
            carouselSpeed: ".get_option_tree('carouselspeed').",";} ?>
            <?php if (get_option_tree('carousel_blips', '')) { echo "
            trackerIndividual: false,"; } ?>
            <?php if (get_option_tree('carousel_easing', '')) { echo '
            animationEasing: \''.get_option_tree('carousel_easing').'\','; } ?>
            largeFeatureWidth: 620,
            largeFeatureHeight: 350,
            smallFeatureWidth: 470,
            smallFeatureHeight: 230,
            topPadding: 0,
            smallFeatureOffset: 85,
            sidePadding: 0,
            trackerSummation: false
    });
  });
  
</script>

<?php endif; ?>
    
    <style type="text/css">
        <?php if (get_option_tree('main_f', '')) { echo "\n"; ?>
        body { font-size: <?php get_option_tree('main_f', '', true); ?>; } <?php } ?>
        <?php if(get_option_tree('headerborderc', '')) { echo "\n"; ?>
        header { border-top-color:<?php echo get_option_tree('headerborderc', ''); ?>; }<?php } ?>
        <?php if(get_option_tree('header_bg_color', '')) { echo "\n"; ?>
        header { background-color:<?php echo get_option_tree('header_bg_color', ''); ?>; }<?php } ?>
        <?php if(get_option_tree('header_bg_img') == 'default' || get_option_tree('header_bg_img') == NULL) { } elseif(get_option_tree('header_bg_img', '')) { echo "\n"; ?>
        header { background-image: url('<?php bloginfo('template_url'); ?>/images/patterns/<?php echo get_option_tree('header_bg_img', ''); ?>.png');background-repeat: repeat; } <?php } ?>
        <?php if(get_option_tree('header_bg_img') == 'none') { echo "\n"; ?>
        header { background-image: none; } <?php } ?>
        <?php if(get_option_tree('nav_bg_color', '')) { echo "\n"; ?>
        #navigation-container { background-color:<?php echo get_option_tree('nav_bg_color', ''); ?>; }<?php } ?>
        <?php if(get_option_tree('nav_bg_image') == 'default' || get_option_tree('nav_bg_image') == NULL) { } elseif(get_option_tree('nav_bg_image', '')) { echo "\n"; ?>
        #navigation-container { background-image: url('<?php bloginfo('template_url'); ?>/images/patterns/<?php echo get_option_tree('nav_bg_image', ''); ?>.png'); } <?php } ?>
        <?php if(get_option_tree('nav_bg_image') == 'none') { echo "\n"; ?>
        #navigation-container { background-image: none; } <?php } ?>
        <?php if(get_option_tree('footer_bg_color', '')) { echo "\n"; ?>
        footer { background-color:<?php echo get_option_tree('footer_bg_color', ''); ?>; }<?php } ?>
        <?php if(get_option_tree('footer_bg_img') == 'default' || get_option_tree('footer_bg_img') == NULL) { } elseif(get_option_tree('footer_bg_img', '')) { echo "\n"; ?>
        footer { background-image: url('<?php bloginfo('template_url'); ?>/images/patterns/<?php echo get_option_tree('footer_bg_img', ''); ?>.png'); } <?php } ?>
        <?php if(get_option_tree('footer_bg_img') == 'none') { echo "\n"; ?>
        footer { background-image: none; } <?php } ?>
        <?php if (get_option_tree('nav_f_size', '')) { echo "\n"; ?>
        .sf-menu li { font-size: <?php get_option_tree('nav_f_size', '', true); ?>; } <?php } ?>
        <?php if (get_option_tree('nav_f_color', '')) { echo "\n"; ?>
        .sf-menu a { color: <?php get_option_tree('nav_f_color', '', true); ?>; } <?php } ?>
        <?php if (get_option_tree('nav_f_shadow', '')) { echo "\n"; ?>
        .sf-menu a { text-shadow: 1px 1px 1px <?php get_option_tree('nav_f_shadow', '', true); ?>; } <?php } ?>
        <?php if (get_option_tree('nav_f_hover', '')) { echo "\n"; ?>
        .sf-menu a:hover { color: <?php get_option_tree('nav_f_hover', '', true); ?>; } <?php } ?>
        <?php if (get_option_tree('h1', '')) { echo "\n"; ?>
        h1 { font-size: <?php get_option_tree('h1', '', true); ?>; } <?php } ?>
        <?php if (get_option_tree('h2', '')) { echo "\n"; ?>
        h2 { font-size: <?php get_option_tree('h2', '', true); ?>; } <?php } ?>
        <?php if (get_option_tree('h3', '')) { echo "\n"; ?>
        h3 { font-size: <?php get_option_tree('h3', '', true); ?>; } <?php } ?>
        <?php if (get_option_tree('h4', '')) { echo "\n"; ?>
        h4 { font-size: <?php get_option_tree('h4', '', true); ?>; } <?php } ?>
        <?php if (get_option_tree('h5', '')) { echo "\n"; ?>
        h5 { font-size: <?php get_option_tree('h5', '', true); ?>; } <?php } ?>
        <?php if (get_option_tree('h6', '')) { echo "\n"; ?>
         h6 { font-size: <?php get_option_tree('h6', '', true); ?>; } <?php } ?>
        <?php if (get_option_tree('h7', '')) { echo "\n"; ?>
         h7 { font-size: <?php get_option_tree('h7', '', true); ?>; } <?php } ?>
         <?php if (get_option_tree('custom_font_fam', '')) { echo "\n"; ?>
         h1, h2, h3, h4, h5, h6, h7, .sf-menu a, a.morecustom { <?php echo get_option_tree('custom_font_fam', ''); ?> } <?php } ?>

         <?php if(get_option_tree('content_link', '')) {  echo "\n"; ?>
         #content-holder a { color: <?php get_option_tree('content_link', '', true); ?>; }  <?php } ?>
         <?php if(get_option_tree('content_link_hover', '')) {  echo "\n"; ?>
         #content-holder a:hover { color: <?php get_option_tree('content_link_hover', '', true); ?>; }  <?php } ?>

         <?php if(get_option_tree('f_l_c', '')) {  echo "\n"; ?>
         footer a { color: <?php get_option_tree('f_l_c', '', true); ?>; }  <?php } ?>
         <?php if(get_option_tree('f_h_l_c', '')) {  echo "\n"; ?>
         footer a:hover { color: <?php get_option_tree('f_h_l_c', '', true); ?>; }  <?php } ?>
         <?php if(get_option_tree('copybg_color', '')) {  echo "\n"; ?>
         #copyrights-area { background-color: <?php get_option_tree('copybg_color', '', true); ?>; }  <?php } ?>
         <?php if(get_option_tree('copy_color', '')) {  echo "\n"; ?>
         #copyrights-area a { color: <?php get_option_tree('copy_color', '', true); ?>; }  <?php } ?>
         <?php if(get_option_tree('copy_color_hover', '')) {  echo "\n"; ?>
         #copyrights-area a:hover { color: <?php get_option_tree('copy_color_hover', '', true); ?>; }  <?php } ?>
         <?php if(get_option_tree('accents_color', '')) {  echo "\n"; ?>
         .featured-image h2, .flex-caption h3, .excerpt h4 a, #controls #left, #controls #right,
         #home-testimonials, .remained-folio-items .r-f img, .carousel-caption, .nivo-caption h3 { background-color: <?php get_option_tree('accents_color', '', true); ?>; } <?php } ?>
    </style>
