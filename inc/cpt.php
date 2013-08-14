<?php
// Add custom post types
if (!function_exists('sq_post_type_portfolio')) {
    function sq_post_type_portfolio()
    {
        register_post_type(
            'sq_portfolio',
            array(
                'labels' => array(
                    'name' => 'Portfolio',
                    'singular_name' => 'Portfolio Item',
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
                    'editor'
                )
            )
        );
    }
}
//end sq_post_type_portfolio


if (!function_exists('sq_post_type_socialpost')) {
    function sq_post_type_socialpost()
    {
        register_post_type(
            'sq_socialpost',
            array(
                'labels' => array(
                    'name' => 'Social Posts',
                    'singular_name' => 'Social Post',
                    'add_new_item' => 'Add New Social Post',
                    'edit_item' => 'Edit a Social Post',
                    'new_item' => 'New Social Post',
                    'view_item' => 'View Social Post',
                    'not_found' => 'No Social Posts found'
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'updates'),
                'supports' => array(
                    'title',
                    'custom-fields',
                    'thumbnail',
                    'editor',
                    'comments',
                    'post-formats'
                ),
                'taxonomies' => array(
                    'socialpost_categories'
                )
            )
        );
        register_taxonomy(
            'sq_socialpost_categories',
            'sq_socialpost',
            array(
                'labels' => array(
                    'name' => 'Social Post Categories',
                    'singular_name' => 'Social Post Category',
                    'add_new_item' => 'Add New Social Post Category',
                    'edit_item' => 'Edit a Social Post Category',
                    'new_item' => 'New Social Post Category',
                    'view_item' => 'View Social Post Category',
                    'not_found' => 'No Social Post Categories found'
                ),
                'hierarchical' => true,
                'show_tagcloud' => false,
                'rewrite' => array('slug' => 'socialpost-category')
            )
        );
    }
}//end sq_post_type_socialpost