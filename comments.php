<?php

    // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
        <section class="warning">This post is password protected. If you would like to contribute to the conversation, please sign in.</section>
        <?php return;
    }
?>

<!-- COMMENTS TEMPLATE -->
<?php if ( have_comments() ) : ?>
    <h2>
        <?php comments_number( 'There are no comments', 'There is <span>1</span> comment', 'There are <span>%</span> comments' ); ?>.
    </h2>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <nav class="comment-nav" role="navigation">
            <div class="nav-previous">
                <?php previous_comments_link() ?>
            </div>
            <div class="nav-next">
                <?php next_comments_link() ?>
            </div>
        </nav>
    <?php endif; ?>

    <ol class="comment-list">
        <?php wp_list_comments(); ?>
    </ol>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
        <nav class="comment-nav" role="navigation">
            <div class="nav-previous">
                <?php previous_comments_link() ?>
            </div>
            <div class="nav-next">
                <?php next_comments_link() ?>
            </div>
        </nav>
    <?php endif; ?>

    <?php comment_form(); ?>

<?php endif; ?>