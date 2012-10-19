<!DOCTYPE html>
<!--[if IE 8]><html class="hwdie8"><![endif]-->
<!--[if !IE]><html><![endif]-->

    <head>

        <meta charset="<?php bloginfo('charset'); ?>" />

        <meta name="viewport" content="width=device-width" />

        <title><?php wp_title(' &raquo; ', true, 'right'); ?><?php bloginfo('name'); ?></title>
         
        <!-- FAVICON -->
        <?php if (get_option_tree('favicon', '')) { ?>

        <link href="<?php get_option_tree('favicon', '', 'true'); ?>" rel="icon" type="image/png" />
        <?php } ?>

        <!--[if lt IE 9]>
        <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- MAIN STYLE -->
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/mobile.css" type="text/css" media="screen" />

        <?php if (get_option_tree('styles', '')) { ?>
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/<?php get_option_tree('styles', '', true); ?>.css" type="text/css" media="screen" />
        <?php } ?>
        
        <!-- GOOGLE FONTS -->
        
        <?php  $options = get_option('option_tree'); ?>
        <?php if ($options['gfonts'] == 'Marvel') { ?>
        
        <link href='http://fonts.googleapis.com/css?family=Marvel:700,700italic' rel='stylesheet' type='text/css' />
        <link href="<?php bloginfo('template_url'); ?>/fonts/marvel.css" rel="stylesheet" type="text/css" />
        <?php } ?>
        <?php if ($options['gfonts'] == 'Lato') { ?>

        <link href='http://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic' rel='stylesheet' type='text/css' />
        <link href="<?php bloginfo('template_url'); ?>/fonts/lato.css" rel="stylesheet" type="text/css" />
        <?php } ?>
        <?php if ($options['gfonts'] == 'Quicksand') { ?>

        <link href='http://fonts.googleapis.com/css?family=Quicksand:400,700' rel='stylesheet' type='text/css' />
        <link href="<?php bloginfo('template_url'); ?>/fonts/quicksand.css" rel="stylesheet" type="text/css" />
        <?php } ?>
        <?php if ($options['gfonts'] == 'Ubuntu') { ?>

        <link href="http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,700,700italic&subset=latin,latin-ext" rel="stylesheet" type="text/css" />
        <link href="<?php bloginfo('template_url'); ?>/fonts/ubuntu.css" rel="stylesheet" type="text/css" />
        <?php } ?>
        <?php if ($options['gfonts'] == 'Ubuntu Condensed') { ?>

        <link href="http://fonts.googleapis.com/css?family=Ubuntu+Condensed&subset=latin,latin-ext" rel="stylesheet" type="text/css" />
        <link href="<?php bloginfo('template_url'); ?>/fonts/ubuntu-con.css" rel="stylesheet" type="text/css" />
        <?php } ?>
        <?php if ($options['gfonts'] == 'Yanone Kaffeesatz') { ?>
        
        <link href="http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700" rel="stylesheet" type="text/css" />
        <link href="<?php bloginfo('template_url'); ?>/fonts/yanone.css" rel="stylesheet" type="text/css" />
        <?php } ?>
        <?php if ($options['gfonts'] == 'Terminal') { ?>

        <link href='http://fonts.googleapis.com/css?family=Terminal+Dosis:400,700' rel='stylesheet' type='text/css' />
        <link href="<?php bloginfo('template_url'); ?>/fonts/terminal.css" rel="stylesheet" type="text/css" />
        <?php } ?>
        <?php if ($options['gfonts'] == 'Cabin') { ?>

        <link href='http://fonts.googleapis.com/css?family=Cabin:400,400italic' rel='stylesheet' type='text/css' />
        <link href="<?php bloginfo('template_url'); ?>/fonts/cabin.css" rel="stylesheet" type="text/css" />
        <?php } ?>
        <?php if ($options['gfonts'] == 'Amaranth') { ?>

        <link href="http://fonts.googleapis.com/css?family=Amaranth:400,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <link href="<?php bloginfo('template_url'); ?>/fonts/amaranth.css" rel="stylesheet" type="text/css" />
        <?php } ?>
        <?php if ($options['gfonts'] == 'PT Sans Narrow') { ?>

        <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css' />
        <link href="<?php bloginfo('template_url'); ?>/fonts/pt-sans.css" rel="stylesheet" type="text/css" />
        <?php } ?>
        <?php if ($options['gfonts'] == 'Open Sans Condensed') { ?>
        
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic&subset=latin,latin-ext' rel='stylesheet' type='text/css' />
        <link href="<?php bloginfo('template_url'); ?>/fonts/open-sans.css" rel="stylesheet" type="text/css" />
        <?php } ?>

        <?php if (get_option_tree('custom_font', '')) {
        echo get_option_tree('custom_font', '');
        } ?>

        <!--- END GOOGLE FONTS -->
        
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <link rel="alternate" type="application/rss+xml" title="RSS 2 Feed" href="<?php bloginfo('rss2_url'); ?>" />
        <link rel="alternate" type="application/atom+xml" title="Atom 3 Feed" href="<?php bloginfo('atom_url'); ?>" />
        <link rel="alternate" type="application/rss+xml" title="Comments Feed" href="<?php bloginfo('comments_rss2_url'); ?>" />
        <script type="text/javascript">
            (function(){
              var d = document, e = d.documentElement, s = d.createElement('style');
              if (e.style.MozTransform === ''){ // gecko 1.9.1 inference
                s.textContent = 'body{visibility:hidden}';
                var r = document.getElementsByTagName('script')[0];
                r.parentNode.insertBefore(s, r);
                function f(){ s.parentNode && s.parentNode.removeChild(s); }
                addEventListener('load',f,false);
                setTimeout(f,3000);
              }
            })();
        </script>
<script type="text/javascript" src="http://userapi.com/js/api/openapi.js?50"></script>

        
        <?php wp_head(); ?>
        <?php include 'var.php'; ?>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-8615631-25']);
  _gaq.push(['_setDomainName', 'xn----8sbfkca5a1adjliu.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

    </head>

    <body <?php body_class(); ?>>
<?php get_header(); ?>
<?php
            $options = get_option('option_tree');
            if (is_front_page() && $options['choose_slider'] == 'Flex slider (responsive/fluid)') {
                include('inc/flex.php');
            }
            elseif (is_front_page() && $options['choose_slider'] == 'Nivo slider') {
                include('inc/nivo.php');
            }
            elseif (is_front_page() && $options['choose_slider'] == 'Carousel slider') {
                include('inc/roundabout.php');
            }
            else {}
        ?>
    <div id="wrapper">

        <header>

            <div class="row">
				<div id="registration">
					<a href="http://xn----8sbfkca5a1adjliu.com/join/">Регистрация</a>
				</div>	
                <div id="logo" class="six columns">
                    <?php if(get_option_tree('logo', '')) { ?>
                    <a href="<?php bloginfo('url'); ?>">
 
                        <img src="<?php get_option_tree('logo', '', 'true'); ?>" alt="back to home" />

                    </a>
                        <?php } else { ?>

                    <h1>
                        
                        <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name');?></a>
                    
                    </h1>

                    <p>

                        <?php echo get_bloginfo('description'); ?>

                    </p><?php } ?>
				
                </div> 
							
                <?php if (get_option_tree('header_phone', '') || get_option_tree('header_mail', '') || get_option_tree('header_mobile', '')) { ?>
				
                <hgroup class="six columns">
                    
                    <?php if (get_option_tree('header_mobile', '')) {
                        print '<h4 class="mobile-phone">'.get_option_tree('header_mobile').'</h4>
                            ';
                    }  ?>

                    <?php if (get_option_tree('header_phone', '')) {
                        print '<h4 class="phone">'.get_option_tree('header_phone').'</h4>
                            ';
                    }  ?>

                    <?php if (get_option_tree('header_mail', '')) {
                        print '<h4 class="mail">'.get_option_tree('header_mail').'</h4>';
                    } ?>

                </hgroup>
                <?php } ?>
				
            <nav class="twelve columns">

                <?php wp_nav_menu(array('theme_location' => 'navigation_menu', 'menu_class' => 'sf-menu', 'container' => '')); ?>

            </nav>

            </div>
            <?php
            $options = get_option('option_tree');
            if (is_front_page() && $options['choose_slider'] == 'Flex slider (responsive/fluid)') {
                include('inc/flex.php');
            }
            elseif (is_front_page() && $options['choose_slider'] == 'Nivo slider') {
                include('inc/nivo.php');
            }
            elseif (is_front_page() && $options['choose_slider'] == 'Carousel slider') {
                include('inc/roundabout.php');
            }
            else {}
        ?>
            
        </header><!-- end header -->
        
