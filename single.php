            <?php get_header(); ?>
                <section class="main clearfix">
                    <section class="content" role="main">
                        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class('article clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">>
                                <header class="article-header">
                                    <h1 title="<?php the_title_attribute(); ?>" itemprop="headline">
                                        <?php the_title(); ?>
                                    </h1>
                                    <aside class="byline vcard">
                                        <time class="updated" datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time(get_option('date_format')); ?></time> by <span class="author"><?php the_author_posts_link(); ?></span>
                                    </aside>
                                </header>
                                <section class="article-content clearfix"  itemprop="articleBody">
                                    <?php
                                    if ( has_post_thumbnail() ) {
                                        the_post_thumbnail();
                                    }
                                    the_content();
                                    ?>
                                </section>
                                <footer class="article-footer">
                                    <section class="categories">
                                        Categories: <?php the_category(', '); ?>
                                    </section>
                                    <section class="tags">
                                        <?php the_tags('<span class="tags-title">Tags:</span> ', ', ', ''); ?>
                                    </section>
                                </footer>
                                <section class="comments">
                                    <?php comments_template(); ?>
                                </section>
                                <hr />
                            </article>
                        <?php endwhile; ?>
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
                                        You've gotten this error message from the sidebar.php file in the template.
                                    </p>
                                </footer>
                            </article>
                        <?php endif; ?>
                    </section>
                    <?php get_sidebar(); ?>
                </section>

            <?php get_footer(); ?>