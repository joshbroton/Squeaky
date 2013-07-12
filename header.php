<!DOCTYPE html>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js" lang="en"><!--<![endif]-->
<head>
    <!-- GOOGLE WEBFONTS -->
        <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>


    <!-- METADATA -->
        <title><?php wp_title(''); ?></title>
        <meta charset="utf-8">
        <!-- I removed id=edge,chrome=1 meta tag. IE bugs stop it from working if there is a conditional above it, 
             which there is around the <html> tag. Add it to the server response by following the guide at
             http://joshbroton.com/quick-fix-forcing-internet-explorer-8-out-of-compatibility-mode/ -->
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="description" content="<?php wp_title(); echo ' | '; bloginfo( 'description' ); ?>" />


    <!-- ICONS -->
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
        <!-- 57x57 (precomposed) for iPhone 3GS, pre-2011 iPod Touch and older Android devices -->
        <!-- <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-precomposed.png"> -->
        <!-- 72x72 (precomposed) for 1st generation iPad, iPad 2 and iPad mini -->
        <!-- <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-72x72-precomposed.png"> -->
        <!-- 114x114 (precomposed) for iPhone 4, 4S, 5 and post-2011 iPod Touch -->
        <!-- <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-114x114-precomposed.png"> -->
        <!-- 144x144 (precomposed) for iPad 3rd and 4th generation -->
        <!-- <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-144x144-precomposed.png"> -->


    <!-- STARTUP IMAGES -->
        <!-- iPhone 3GS, pre-2011 iPod Touch -->
        <!-- <link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/images/startup/startup-320x460.png" media="screen and (max-device-width:320px)"> -->
        <!-- iPhone 4, 4S and 2011 iPod Touch-->
        <!-- <link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/images/startup/startup-640x920.png" media="(max-device-width:480px) and (-webkit-min-device-pixel-ratio:2)"> -->
        <!-- iPhone 5 and 2012 iPod Touch -->
        <!-- <link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/images/startup/startup-640x1096.png" media="(max-device-width:548px) and (-webkit-min-device-pixel-ratio:2)"> -->
        <!-- iPad landscape -->
        <!-- <link rel="apple-touch-startup-image" sizes="1024x748" href="<?php echo get_template_directory_uri(); ?>/images/startup/startup-1024x748.png" media="screen and (min-device-width:481px) and (max-device-width:1024px) and (orientation:landscape)"> -->
        <!-- iPad Portrait -->
        <!-- <link rel="apple-touch-startup-image" sizes="768x1004" href="<?php echo get_template_directory_uri(); ?>/images/startup/startup-768x1004.png" media="screen and (min-device-width:481px) and (max-device-width:1024px) and (orientation:portrait)"> -->


    <!-- MICROSOFT/WIN8/WIN8.1 SPECIFIC -->
        <!-- 8.1: Caption of pinned tile -->
        <!-- <meta name="application-name" content="Squeaky Clean WordPress Boilerplate"> -->
        <!-- 8/8.1: Background color of the tile. If excluded, will take the prominent color from the icon -->
        <!-- <meta name="msapplication-TileColor" content="#FFFFFF"/> -->
        <!-- 8.1: 70x70 1x logo for "tiny" tile -->
        <!-- <meta name="msapplication-square70x70logo" content="images/ms/tiny.png"> -->
        <!-- 8.1: 150x150 1x logo for "small" or "square" tile -->
        <!-- <meta name="msapplication-square150x150logo" content="images/ms/square.png"> -->
        <!-- 8.1: 310x150 1x logo for "wide" tile -->
        <!-- <meta name="msapplication-wide310x150logo" content="images/ms/wide.png"> -->
        <!-- 8.1: 310x310 1x logo for "large" tile -->
        <!-- <meta name="msapplication-square310x310logo" content="images/ms/large.png"> -->
        <!-- 8.1: Frequency in minutes. URL of RSS feed to fetch content from. The second meta is for pulling from multiple RSS feeds. Only use ONE. -->
        <!-- <meta name="msapplication-notification" content="frequency=60;polling-uri=http://url.to.rss"> -->
        <!-- <meta name="msapplication-notification" content="frequency=60;polling-uri=http://url.to.rss; polling-uri2=http://url.to.second.rss; polling-uri3=http://url.to.third.rss"> -->
        <!-- 8: 144x144 icon if pinned to the start screen -->
        <!-- <meta name="msapplication-TileImage" content="images/ms/legacy-metro-tile.png"/> -->


    <!-- STYLESHEETS -->
    <link href='http://fonts.googleapis.com/css?family=Fauna+One|ABeeZee|Architects+Daughter' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />


    <!-- SCRIPTS -->
        <!-- TODO: These will be properly replaced with enqueue_script as development is completed -->
        <!-- I recommend going to modernizr.com and building a custom build. This one is huge. -->
        <script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.2.6.2.min.js"></script>

        <!-- I also recommend requesting jquery from Google's Ajax servers -->
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.1.8.3.min.js"></script>

        <script src="<?php echo get_template_directory_uri(); ?>/js/hoverIntent.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/superfish.js"></script>

        <!--[if lt IE 9]>
            <script src="<?php echo get_template_directory_uri(); ?>/js/selectivizr-min.js"></script>
            <script src="<?php echo get_template_directory_uri(); ?>/js/imgsizer.js"></script>
        <![endif]-->

        <script>
            $(document).ready(function() {
                $('.sf-menu ul').superfish({
                    delay: 1000,
                    animation: {opacity:'show',height:'show'},
                    speed: 'fast',
                    dropShadows: false
                });

                $('#openMobileMenu').on('click', function () {
                    var menuid = $('nav.primary');
                    if (!menuid.is(':visible')) {
                        menuid.slideDown(300);
                    } else {
                        menuid.slideUp(300);
                    }

                });
            });
        </script>


    <!-- OTHER -->
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

        <?php wp_head(); ?>
</head>
<body <?php body_class($class); ?>>
    <div class="wrapper">
        <header class="main">
            <h1>
                <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>">AR<span class="full-name">Aspects/References</span><span class="blog-description">&nbsp;=&nbsp;webNerd.thoughtsAndMusings</span></a>
            </h1>
            <a id="openMobileMenu" class="icon-menu"></a>
            <nav class="social">
                <a href="http://www.twitter.com/joshbroton" class="icon-twitter" title="Follow me on Twitter"></a><a href="http://www.joshbroton.com" class="icon-wordpress" title="My blog and personal info"></a><a href="https://www.github.com/joshbroton/Squeaky" class="icon-github" title="Fork squeakyclean on GitHub"></a>
            </nav>
            <nav class="primary">
                <?php wp_nav_menu( array(
                    'container' => 'ul',
                    'menu_class' => 'sf-menu',
                    'menu_id' => 'main_nav',
                    'depth' => 0,
                    'theme_location' => 'header_menu'
                ));
                ?>
            </nav>
        </header>
