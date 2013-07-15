<?php
/* Template Name: Portfolio */

get_header(); ?>
    <section class="main clearfix">
        <section class="content portfolio" role="main">
            <h1>
                <?php the_title(); ?>
            </h1>
            <?php
                $oldQuery = $wp_query;
                $wp_query = null;
                $wp_query = new WP_Query();
                $wp_query->query('post_type=sq_portfolio&posts_per_page=-1');
            ?>

            <ul id="portfolioGrid" class="portfolio-grid">
            <?php
                if(have_posts()) : while(have_posts()) : the_post();
                $post_meta = get_post_custom($post->ID);
            ?>

                <li>
                    <a href="<?php echo $post_meta["portfolio_external_link"][0]; ?>" data-largesrc="<?php bloginfo('url'); ?>/wp-content/uploads/<?php echo $post_meta["portfolio_image_large"][0]; ?>" data-title="<?php echo $post_meta["portfolio_external_link_text"][0]; ?>" data-description="<?php the_content(); ?>">
                        <img src="<?php bloginfo('url'); ?>/wp-content/uploads/<?php echo $post_meta["portfolio_image_thumbnail"][0]; ?>" alt="<?php echo $post_meta["portfolio_external_link_text"][0] ?>" />
                    </a>
                    <!--<section class="portfolio-expander">
                        <div class="portfolio-expander-inner">
                            <span class="portfolio-close"></span>
                            <figure class="portfolio-image-large">
                                <div class="portfolio-loading"></div>
                                <img src="<?php /*bloginfo('url'); */?>/wp-content/uploads/<?php /*echo $post_meta["portfolio_image_large"][0]; */?>" alt="<?php /*echo $post_meta["portfolio_external_link_text"][0] */?>" />
                            </figure>
                            <div class="portfolio-details">
                                <h3><?php /*echo $post_meta["portfolio_external_link_text"][0]; */?></h3>
                                <?php /*the_content(); */?>
                                <a href="<?php /*echo $post_meta["portfolio_external_link"][0]; */?>" target="_blank" title="<?php /*echo $post_meta["portfolio_external_link_text"][0]; */?>">Visit Website</a>
                            </div>
                        </div>
                    </section>-->
                </li>
            <?php endwhile; ?>
            </ul>
            <?php else: ?>

                <section class="warning">
                    I am sorry, but it appears as though I haven't done anything portfolio worth! (I have, so if you're getting this message, there was an error) Go <a href="<?php bloginfo('url'); ?>">home</a> and let me know what error you got. Thanks!
                </section>
            <?php endif; ?>
        </section>
        <?php get_sidebar(); ?>
    </section>
    <script>
        $(function() { Grid.init(); });
    </script>
<?php get_footer(); ?>