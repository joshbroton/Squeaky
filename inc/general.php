<?php

// enqueue scripts
if (!function_exists('sq_scripts_method')) {
    function sq_scripts_method()
    {
        wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.2.6.2.js' );
        wp_enqueue_script( 'jquery', get_site_url() . '/wp-includes/js/jquery/jquery.js', '', '', true );
        wp_enqueue_script( 'hoverintent', get_template_directory_uri() . '/js/hoverIntent.js', array( 'jquery' ), '', true );
        wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ), '', true );

        if (is_singular()) {
            wp_enqueue_script( 'comment-reply', get_site_url() . '/wp-includes/js/comment-reply.js', '', '', true );
        }

        //enqueue portfolio script if portfolio page
        if (is_page_template('page-portfoliolist.php')) {
            wp_enqueue_script('portfolio', get_template_directory_uri() . '/js/portfolio.js', array( 'jquery' ));
        }
    }
}
//end sq_scripts_method


//add IE stuff after jquery loads
if (!function_exists('sq_add_ie_helpers')) {
    function sq_add_ie_helpers()
    {
        echo '
            <!--[if lt IE 9]>
                <script src="' . get_template_directory_uri() . '/js/selectivizr-min.js"></script>
                <script src="' . get_template_directory_uri() . '/js/imgsizer.js"></script>
            <![endif]-->
        ';
    }
}
//end sq_add_ie_helpers


//remove some simple (and default) wp actions
if (!function_exists('sq_remove_default_wp_actions')) {
    function sq_remove_default_wp_actions()
    {
        // http://digwp.com/2010/03/wordpress-functions-php-template-custom-functions/
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'feed_links', 2);
        remove_action('wp_head', 'index_rel_link');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'feed_links_extra', 3);
        remove_action('wp_head', 'start_post_rel_link', 10, 0);
        remove_action('wp_head', 'parent_post_rel_link', 10, 0);
        remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    }
}
//end sq_remove_default_wp_actions


// Enable custom menus
if (!function_exists('sq_register_menus')) {
    function sq_register_menus()
    {

        if (function_exists('register_nav_menus')) {
            register_nav_menus(
                array(
                    'header_menu' => 'Header Menu',
                    'footer_menu' => 'Footer Menu'
                )
            );
        }

    }
}
//end sq_register_menus


// Max image width
if (!function_exists('sq_set_max_image_width')) {
    function sq_set_max_image_width()
    {
        if (!isset($content_width)) {
            $content_width = 1200;
        }
    }
}
//end sq_set_max_image_width


// Post thumbnail support
if (!function_exists('sq_post_thumbnail_support')) {
    function sq_post_thumbnail_support()
    {
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1200, 600);
    }
}
//end sq_post_thumbnail_support


// Post Format Support
if (!function_exists('sq_post_format_support')) {
    function sq_post_format_support()
    {
        add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio'));
        add_post_type_support('sq_post_type_socialpost', 'post-formats');
    }
}
//end sq_post_format_support


// Link post thumbnail to post permalink
if (!function_exists('sq_post_image_html')) {
    function sq_post_image_html($html, $post_id, $post_image_id)
    {
        return '<a href="' . get_permalink($post_id) . '" title="' .
        esc_attr(get_post_field('post_title', $post_id)) . '">' . $html . '</a>';
    }
}
//end sq_post_image_html


//Turn on sidebar widgets
if (!function_exists('sq_widgets_init')) {
    function sq_widgets_init()
    {
        register_sidebar(
            array(
                'name' => __('Main Sidebar', 'quickchic'),
                'id' => 'sidebar-1',
                'before_widget' => '<article class="widget">',
                'after_widget' => '</article><hr />',
                'before_title' => '<h1>',
                'after_title' => '</h1>',
            )
        );
    }
}
//end sq_widgets_init

//Add HTML5 support in search form, comment form, and comment list
if (!function_exists('sq_html5_support')) {
    function sq_html5_support() {
        add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
    }
}



if (!function_exists('sq_remove_width_attribute')) {
    function sq_remove_width_attribute($html)
    {
        return preg_replace('/(width|height)="\d*"\s/', "", $html);
    }
}//end sq_remove_width_attribute


/**
 * Adds a class "sidebar-drawer" if user selects option in theme customizer
 *
 * @returns string
 */

if (!function_exists('sq_sidebar_drawer_body_class')) {
    function sq_sidebar_drawer_body_class($classes) {
        // add 'class-name' to the $classes array

        if ( get_theme_mod( 'sq_sidebar_drawer', 'true' ) != 'false' ) {
            $classes[] = 'sidebar-drawer';
        }
        // return the $classes array
        return $classes;
    }
}