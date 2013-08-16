<?php

function sq_menu_add_theme_options_page() {
    add_theme_page( __( 'Theme Options', 'squeakyclean' ), __( 'Theme Options', 'squeakyclean' ), 'manage_options', 'squeayclean-theme-options', 'sq_load_theme_options_page' );
}

function sq_load_theme_options_page() {
    if ( !current_user_can( 'manage_options' ) ) {
        wp_die( __( 'I\'m sorry, but you don\'t have the proper permissions to edit these theme options', 'squeakyclean' ) );
    }

    global $select_options;
    if ( !isset( $_REQUEST['settings-updated'] ) ) {
        $_REQUEST['settings-updated'] = false;
    }
?>
    <section class="wrap squeaky-styles">
        <h2><?php echo __( 'Squeaky Clean Theme Options', 'squeakyclean' ); ?></h2>
        <?php if( $_REQUEST['settings-updated'] !== false ) : ?>
            <section class="options-result">
                <?php _e( 'Options Saved', 'squeakyclean' ); ?>
            </section>
        <?php endif; ?>
        <form action="options.php" method="post">
            <?php settings_fields( 'sq_options' ); ?>
            <?php $saved_theme_options = get_option( 'sq_theme_options' ); ?>

            <label for="sq_theme_options[sqBackgroundColor]"><?php _e( 'Background Color:', 'squeakyclean' ); ?></label>
            <input type="color" id="sq_theme_options[sqBackgroundColor]" placeholder="Background Color" name="sq_theme_options[sqBackgroundColor]" value="<?php esc_attr_e( $saved_theme_options['sqBackgroundColor'] ); ?>" />
            <input type="submit" class="button-primary" value="<?php _e( 'Save Changes' ); ?>" />
        </form>
    </section>
    <link href="<?php echo get_template_directory_uri(); ?>/css/theme-options.css" type="text/css" rel="stylesheet" />
<?php
}

function sq_theme_options_init() {
    register_setting( 'sq_options', 'sq_theme_options' );
}

function sq_theme_options_styles() {
    $saved_theme_options = get_option( 'sq_theme_options' );

    $styles = '<style type="text/css">';
    if ( isset( $saved_theme_options['sqBackgroundColor'] ) ) {
        $styles .= 'body { background-color: ' . $saved_theme_options['sqBackgroundColor'] . '; }';
    }
    $styles .= '/*test output*/</style>';
    echo $styles;
}

//https://codex.wordpress.org/Theme_Customization_API