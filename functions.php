<?php

//get needed files
include_once( 'inc/cpt.php' );
include_once( 'inc/general.php' );
//include_once( 'inc/theme-options.php' );

/**
 * sq_theme_init()
 *
 * This is the primer for all the customizations in this theme. Don't like something in here? No worries, just make a
 * child theme. In child's functions.php, copy/paste this function and only call the functions you want!
 *
 * Editing this file directly is not advised!
 */
if (!function_exists('sq_theme_init')) {
    function sq_theme_init()
    {

        //enqueue all the things! (modernizr, jQuery, hoverIntent, SuperFish, comment-reply)
        add_action('wp_enqueue_scripts', 'sq_scripts_method');

        //add some helpers to poor old IE
        add_action('wp_head', 'sq_add_ie_helpers');

        //clean up the head
        sq_remove_default_wp_actions();

        //register custom menus
        sq_register_menus();

        //set image max width
        sq_set_max_image_width();

        //add thumbnail support and set widths
        sq_post_thumbnail_support();

        //add post format support
        sq_post_format_support();

        //add html5 support
        sq_html5_support();

        // Link post thumbnail to post permalink
        add_filter('post_thumbnail_html', 'sq_post_image_html', 10, 3);

        //initialize the sq widget
        add_action('init', 'sq_widgets_init');

        // Remove width/height attribute on inserted images
        add_filter('post_thumbnail_html', 'sq_remove_width_attribute', 10);

        // Images are sized via CSS or inline style="" attribute by user.
        add_filter('image_send_to_editor', 'sq_remove_width_attribute', 10);

        //Enable custom menus
        add_theme_support('menus');

        // Remove the admin bar
        show_admin_bar(false);

        // automatic feeds
        add_theme_support('automatic-feed-links');

        // Add custom post types
        add_action('init', 'sq_post_type_portfolio');
        add_action('init', 'sq_post_type_socialpost');

        /*add_action( 'admin_menu', 'sq_menu_add_theme_options_page' );
        add_action( 'admin_init', 'sq_theme_options_init' );
        add_action( 'wp_head', 'sq_theme_options_styles' );*/
        add_action( 'customize_register', 'sq_customize_register' );
    }

    //thumbs up, lets go!
    sq_theme_init();

}//end sq_theme_init()

function sq_customize_register( $wp_customize ) {

}