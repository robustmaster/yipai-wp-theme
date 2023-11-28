<?php
// 如果这个类不存在的话，引入 Comment_Walker 类
if ( ! class_exists( 'Comment_Walker' ) ) {
    require get_template_directory() . '/comment-walker.php';
}
?>


<?php
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments">

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
            wp_list_comments(
                array(
                    'style'       => 'ol',
                    'short_ping'  => true,
                    'avatar_size' => 50,
                    'format'      => 'html5', // 使用 HTML5 格式
                    'walker'      => new Comment_Walker(), // 使用自定义评论 walker
                )
            );
            ?>
        </ol>

        <?php the_comments_pagination(); ?>

    <?php endif; ?>

    <?php
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
    ?>
        <p class="no-comments">Comments are closed.</p>
    <?php endif; ?>

    <?php comment_form(); ?>

</div>
