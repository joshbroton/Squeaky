<?php
/*
 * File containing the sidebar of the site
 *
 * @package squeakyclean
 */

$use_sidebar_drawer = get_theme_mod( 'sq_sidebar_drawer', true );
?>

<section id="sidebar-1" class="sidebar clearfix" role="complimentary">
    <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    <?php else : ?>
        <section class="warning">
            There would be some amazing widgets here if any were activated.
        </section>
    <?php endif; ?>
</section>