            <footer class="main" role="contentinfo">
                <article class="copyright">
                    This is the <a href="http://www.squeakycleantheme.com">Squeaky Clean Wordpress Boilerplate</a>, and it's <strong>&copy;<?php echo date("Y"); ?> <a href="http://www.twitter.com/joshbroton">Josh Broton</a> and <a href="http://www.joshbroton.com">Aspects &amp; Reference</a></strong>.<br />
                    Don't let that worry you. It's still 100% free to use and licensed under the MIT License. <br />
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
                <script>
        (function(){
            var $ = jQuery;
                $('.sf-menu ul').superfish({
                    delay: 1000,
                    animation: {opacity:'show',height:'show'},
                    speed: 'fast',
                    dropShadows: false
                });

                $('#openMobileMenu').on('click', (function () {
                    var menuid = $('nav.primary');
                    if (!menuid.is(':visible')) {
                        menuid.slideDown(300);
                    } else {
                        menuid.slideUp(300);
                    };
                })
                );
            })();
        </script>
                <?php wp_footer(); ?>
            </footer>
        </div>
    </body>
</html>