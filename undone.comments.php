<?php

    // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
        <section class="warning">This post is password protected. If you would like to contribute to the conversation, please sign in.</section>
        <?php return;
    }
?>

