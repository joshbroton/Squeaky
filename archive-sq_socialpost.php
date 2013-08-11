<?php get_header(); ?>

    <section class="main clearfix">
        <section class="content" role="main">
            <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                <?php
                $post_format = get_post_format();
                if ( $post_format == null ):
                    $post_format = 'standard';
                endif;
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('article clearfix'); ?> role="article">
                    <header class="article-header">
                        <h1>
                            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo '<span class="socialpost-type">' . $post_format . ':</span> '; the_title(); ?></a>
                        </h1>
                        <aside class="byline vcard">
                            <time class="updated" datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time(get_option('date_format')); ?></time> by <span class="author"><?php the_author_posts_link(); ?></span>
                        </aside>
                    </header>
                    <section class="article-content clearfix">
                        <?php
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail();
                        }
                        the_content();
                        ?>
                    </section>
                    <footer class="article-footer">
                        <section class="categories">
                            Categories: <?php the_terms( $post->ID, 'sq_socialpost_categories', '', ', ', ' ' ); ?>
                        </section>
                    </footer>
                    <hr />
                </article>
            <?php endwhile; ?>
                <nav class="wp-prev-next">
                    <div class="prev-link">
                        <?php echo get_next_posts_link('&laquo; Older Entries') ?>
                    </div>
                    <div class="next-link">
                        <?php echo previous_posts_link('Newer Entries &raquo;') ?>
                    </div>
                </nav>
            <?php else : ?>
                <article class="post-404">
                    <header class="article-header">
                        <h2>
                            Oops! Post not found.
                        </h2>
                    </header>
                    <section class="article-content clearfix">
                        Something has gone very, very, VERY wrong. Can you make sure you clicked on the right thing?
                    </section>
                    <footer class="article-footer">
                        <p>
                            You've gotten this error message from the index.php file in the template.
                        </p>
                    </footer>
                </article>
            <?php endif; ?>
        </section>
        <?php get_sidebar(); ?>
    </section>

<?php get_footer(); ?>