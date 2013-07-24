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
                <?php wp_footer(); ?>
            </footer>
        </div>
    </body>
</html>