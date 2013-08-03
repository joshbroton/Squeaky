<?php
//enqueue jQuery
function squeaky_scripts_method() {
    wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr.2.6.2.js');
    wp_enqueue_script('jquery', get_site_url() . '/wp-includes/js/jquery/jquery.js24', '', '', true);
    wp_enqueue_script('hoverintent', get_template_directory_uri() . '/js/hoverIntent.js', array('jquery'), '', true);
    wp_enqueue_script('superfish', get_template_directory_uri() . '/js/superfish.js', array('jquery'), null, true);

    //enqueue portfolio script if portfolio page
    if ( is_page_template('page-portfoliolist.php') ) {
        wp_enqueue_script('portfolio', get_template_directory_uri() . '/js/portfolio.js', array('jquery'));
    }
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


    // Post Format Support
    add_theme_support( 'post-formats', array( 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio' ) );
    add_post_type_support( 'sq_post_type_socialpost', 'post-formats' );


    // Link post thumbnail to post permalink
    // Comment out to disable.
    add_filter( 'post_thumbnail_html', 'sq_post_image_html', 10, 3 );
    function sq_post_image_html( $html, $post_id, $post_image_id ) {
        $html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_post_field( 'post_title', $post_id ) ) . '">' . $html . '</a>';
        return $html;
    }


    //T urn on sidebar widgets
    function sq_widgets_init() {
        register_sidebar(array(
            'name' => __( 'Main Sidebar', 'quickchic' ),
            'id' => 'sidebar-1',
            'before_widget' => '<article class="widget">',
            'after_widget' => '</article><hr />',
            'before_title' => '<h1>',
            'after_title' => '</h1>',
        ));
    }
    add_action( 'init', 'sq_widgets_init' );


    // Remove the admin bar
    show_admin_bar(false);


    // automatic feeds
    add_theme_support( 'automatic-feed-links' );


    // Add custom post types
    add_action( 'init', 'sq_post_type_portfolio' );
    add_action( 'init', 'sq_post_type_socialpost');
    function sq_post_type_portfolio() {
        register_post_type( 'sq_portfolio',
            array(
                'labels' => array(
                    'name' => 'Portfolio',
                    'singular_name' =>  'Portfolio Item' ,
                    'add_new_item' => 'Add New Portfolio Item',
                    'edit_item' => 'Edit Portfolio Item',
                    'new_item' => 'New Portfolio Item',
                    'view_item' => 'View Portfolio Item',
                    'not_found' => 'No portfolio items found'
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'portfolio'),
                'supports' => array(
                    'title',
                    'custom-fields',
                    'thumbnail',
                    'editor')
            )
        );
    }
    function sq_post_type_socialpost() {
        register_post_type( 'sq_socialpost',
            array(
                'labels' => array(
                    'name' => 'Social Posts',
                    'singular_name' =>  'Social Post' ,
                    'add_new_item' => 'Add New Social Post',
                    'edit_item' => 'Edit a Social Post',
                    'new_item' => 'New Social Post',
                    'view_item' => 'View Social Post',
                    'not_found' => 'No Social Posts found'
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'socialposts'),
                'supports' => array(
                    'title',
                    'custom-fields',
                    'thumbnail',
                    'editor',
                    'comments',
                    'post-formats'),
                'taxonomies' => array(

                )
            )
        );
        register_taxonomy(
            'sq_socialpost_categories',
            'sq_socialpost',
            array(
                'labels' => array(
                    'name' => 'Social Post Categories',
                    'singular_name' =>  'Social Post Category' ,
                    'add_new_item' => 'Add New Social Post Category',
                    'edit_item' => 'Edit a Social Post Category',
                    'new_item' => 'New Social Post Category',
                    'view_item' => 'View Social Post Category',
                    'not_found' => 'No Social Post Categories found'
                ),
                'hierarchical' => true,
                'show_tagcloud' => false,
                'rewrite' => array( 'slug' => 'socialpost-category' )
            )
        );
    }

