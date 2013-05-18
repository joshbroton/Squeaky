<?php
//enqueue jQuery
function squeaky_scripts_method() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr.2.6.2.min.js', array('jquery'));
    wp_enqueue_script('hoverintent', get_template_directory_uri() . '/js/hoverIntent.js', array('jquery'));
    wp_enqueue_script('superfish', get_template_directory_uri() . '/js/superfish.js', array('jquery'));           
}
add_action('wp_enqueue_scripts', 'squeaky_scripts_method'); // For use on the Front end (ie. Theme)
//add IE stuff after jquery loads
function ie_stuff() {
    echo '<!--[if lt IE 9]>
            <script src="<?php echo get_template_directory_uri(); ?>/js/selectivizr-min.js"></script>
            <script src="<?php echo get_template_directory_uri(); ?>/js/imgsizer.js"></script>
            <![endif]-->';
}
add_action('wp_head', 'ie_stuff');
    // Remove unneeded crap from the head
    // http://digwp.com/2010/03/wordpress-functions-php-template-custom-functions/
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'start_post_rel_link', 10, 0);
    remove_action('wp_head', 'parent_post_rel_link', 10, 0);
    remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

    // Enable custom menus
    add_theme_support( 'menus' );
    if ( function_exists( 'register_nav_menus' ) ) {
        register_nav_menus(
            array(
                'header_menu' => 'Header Menu',
                'footer_menu' => 'Footer Menu'
            )
        );
    }

    // Post thumbnail support
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1200, 600 );

    //Link post thumbnail to post permalink
    //Comment out to disable.
    add_filter( 'post_thumbnail_html', 'my_post_image_html', 10, 3 );
    function my_post_image_html( $html, $post_id, $post_image_id ) {
        $html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_post_field( 'post_title', $post_id ) ) . '">' . $html . '</a>';
        return $html;
    }

    //Turn on sidebar widgets
    function quickchic_widgets_init() {
        register_sidebar(array(
            'name' => __( 'Main Sidebar', 'quickchic' ),
            'id' => 'sidebar-1',
            'before_widget' => '<article class="widget">',
            'after_widget' => '</article><hr />',
            'before_title' => '<h1>',
            'after_title' => '</h1>',
        ));
    }
    add_action( 'init', 'quickchic_widgets_init' );

    //Remove the admin bar
    show_admin_bar(false);