<?php

class Comment_Walker extends Walker_Comment {
    public $tree_type = 'comment';
    public $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );

    // Output a comment in the HTML5 format.
    public function html5_comment( $comment, $depth, $args ) {
        $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
?>
        <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>
            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
                <footer class="comment-meta">
                    <div class="comment-author vcard">
                        <?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
                        <div class="comment-author-info">
                            <b class="fn"><?php echo get_comment_author_link( $comment ); ?></b>
                            <span class="comment-date">
                                <?php echo get_comment_date( 'Y-m-d H:i', $comment ); ?>
                            </span>
                        </div>
                    </div>
                </footer>

                <div class="comment-content">
                    <?php comment_text(); ?>
                </div>

                <div class="reply">
                    <?php
                    comment_reply_link(
                        array_merge(
                            $args,
                            array(
                                'depth'     => $depth,
                                'max_depth' => $args['max_depth'],
                                'reply_text' => __('Reply', 'textdomain'), // 回复链接文本
                                'format'     => 'html5', // 使用 HTML5 格式
                            )
                        )
                    );
                    ?>
                </div>
            </article>
<?php
    }
}


function my_theme_enqueue_styles() {
    wp_enqueue_style( 'my-theme-style', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


function my_theme_setup() {
    load_theme_textdomain( 'textdomain', get_template_directory() . '/languages' );
}

add_action( 'after_setup_theme', 'my_theme_setup' );
