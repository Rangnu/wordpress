<?php
if ( post_password_required() ) {
    return;
}
?>
<hr style="margin-bottom: 1px;">
<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            if ( '1' === $comments_number ) {
                echo '1 Comment';
            } else {
                echo $comments_number . ' Comments';
            }
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments( array(
                'style'      => 'ol',
                'short_ping' => true,
            ) );
            ?>
        </ol>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <nav class="comment-navigation" role="navigation">
                <div class="comment-nav-prev"><?php previous_comments_link( 'Older Comments' ); ?></div>
                <div class="comment-nav-next"><?php next_comments_link( 'Newer Comments' ); ?></div>
            </nav>
        <?php endif; ?>

    <?php endif; ?>

    <?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="no-comments">Comments are closed.</p>
    <?php endif; ?>

    <?php
    // Output the comment form with custom modifications
    comment_form( array(
        'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
        'class_submit'  => 'submit-post-comment', // Add a custom class to the submit button
        'title_reply'   => '', // Remove the default "Leave a Reply" title
        'label_submit'  => 'Comment', // Change the submit button text
        'submit_field'  => '<p class="comment-form-submit">%1$s %2$s</p>', // Modify the submit field structure
    ) );
    ?>

</div><!-- #comments -->