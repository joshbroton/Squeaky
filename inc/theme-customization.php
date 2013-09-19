<?php
/*
* Theme Customization Settings
*
* These appear in the wp-admin under Appearance >> Customize
*/
if (!function_exists('sq_customize_register')) {
    function sq_customize_register( $wp_customize ) {
        /*$wp_customize->add_setting( 'sq_featured_text' , array(
            'default'           => __('You can change this text in the Theme Customizer.','sq'),
            'sanitize_callback' => 'sq_sanitize_featured_text',
            'transport'         => 'postMessage'
        ) );

        $wp_customize->add_setting( 'sq_featured_posts_count' , array(
            'default'           => '3',
            'sanitize_callback' => 'sq_sanitize_featured_posts_count'
        ) );*/

        $wp_customize->add_setting( 'sq_sidebar_drawer' , array(
            'default'           => 'true',
            'sanitize_callback' => 'sq_sanitize_sidebar_drawer'
        ) );

        $wp_customize->add_section( 'sq_theme_options' , array(
            'title'       => __( 'Theme Options', 'sq' ),
            'priority'    => 300,
            'capability'  => 'edit_theme_options',
            'description' => 'You can edit your sq display settings here.'
        ) );

        /*$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sq_edit_featured_text', array(
            'settings'   => 'sq_featured_text',
            'section'    => 'sq_theme_options',
            'label'      => __( 'Featured Text - Some HTML OK!', 'sq' ),
            'priority'   => 10
        ) ) );

        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sq_edit_posts_count', array(
            'settings'   => 'sq_featured_posts_count',
            'section'    => 'sq_theme_options',
            'label'      => __( 'Number of featured posts on the homepage', 'sq' ),
            'priority'   => 11
        ) ) );*/

        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sq_edit_sidebar_drawer', array(
            'settings'   => 'sq_sidebar_drawer',
            'section'    => 'sq_theme_options',
            'label'      => __( 'Would you like to use the drawer-style sidebar on smaller screens?', 'sq' ),
            'priority'   => 12,
            'type'       => 'radio',
            'choices'    => array(
                'true'   => 'Sidebar Drawer',
                'false'   => 'Static Sidebar'
            )
        ) ) );
    }
}

/*
* Input Sanitization Functions
*
* Called from sanitize_callback in each add_setting() call
*/
if (!function_exists('sq_sanitize_featured_text')) {
    function sq_sanitize_featured_text( $input ) {
        return wp_kses_post( force_balance_tags( $input ));
    }
}

if (!function_exists('sq_sanitize_featured_posts_count')) {
    function sq_sanitize_featured_posts_count( $input ) {
        if ( is_numeric( $input ) ) {
            return intval( $input );
        } else {
            return '';
        }
    }
}

if (!function_exists('sq_sanitize_sidebar_drawer')) {
    function sq_sanitize_sidebar_drawer( $input ) {
        $allowed = array(
            'true'   => 'Sidebar Drawer',
            'false'   => 'Static Sidebar'
        );

        if ( array_key_exists( $input, $allowed )) {
            return $input;
        } else {
            return '';
        }
    }
}