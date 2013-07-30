<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
    <section class="main clearfix">
        <section class="content" role="main">
            <article class="post error-404">
                <h1 itemprop="headline">We're lost...</h1>
                <img src="<?php echo get_template_directory_uri(); ?>/images/cat-flop.gif" alt="We missed as bad as this cat." />Hmm. It appears as though we can't find what you're looking for. Please accept our apologies and enjoy this awesome gif while you're searching for something new.

            </article>
        </section>
        <?php get_sidebar(); ?>
    </section>
<?php get_footer(); ?>