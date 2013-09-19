<?php
/*
 * The footer of the site.
 */

?>

            <footer class="main" role="contentinfo">
                <article class="copyright">
                    This is the <a href="http://github.com/joshbroton/Squeaky">squeakyclean WordPress Boilerplate</a>, and it's &copy;<?php echo date("Y"); ?> <a href="http://www.twitter.com/joshbroton">Josh Broton</a> and <a href="http://joshbroton.com">Aspects/Reference</a>.<br />
                    Don't let that worry you. It's still 100% free to use and licensed under GPLv2 or later. <br />
                    Use this. Please. Seriously. And help me by <a href="https://github.com/joshbroton/Squeaky">forking it on GitHub</a> and cleaning up my code.
                </article>
                <nav class="footer_menu">
                    <?php wp_nav_menu( array(
                        'container'       => 'ul',
                        'menu_class'      => 'footer-nav',
                        'depth'           => 0,
                        'theme_location' => 'footer_menu'
                    ));
                    ?>
                </nav>
            </footer>
        </div>

        <?php
        $use_sidebar_drawer = get_theme_mod( 'sq_sidebar_drawer', true );
        if ( $use_sidebar_drawer ) : ?>
            <div class="sidebar-drawer-wrapper">
                <a class="open-close-sidebar" onclick="squeakyclean.toggleDrawer();"></a>
                <a class="pin-sidebar">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/pin.png" alt="Pin the sidebar" title="Pin the sidebar to the page" onclick="sqeakyclean.pinSidebar();" />
                </a>
                <div class="sidebar-scroll">
                <!-- javascript copies contents of #primary here
                     This is done to fix iOS position:fixed z-index bug -->
                </div>
            </div>
            <script type="text/javascript">
                jQuery(document).ready(function() {
                    squeakyclean.sidebarDrawerInit();
                });
            </script>
        <?php endif; ?>

        <?php wp_footer(); ?>
        <script>
            squeakyclean.menuInit();
        </script>
    </body>
</html>