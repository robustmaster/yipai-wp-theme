<?php get_header(); ?>
<main>

    <?php
    if (have_posts()):
        while (have_posts()):
            the_post();
            ?>

            <article <?php post_class(); ?>>

                <h1 class="post-title">
                    <?php the_title(); ?>
                </h1>
                <p class="post-date">
                    <?php echo get_the_date('Y-m-d'); ?>
                </p>

                <div class="post-content">
                    <?php the_content(); ?>
                </div>

                <?php comments_template(); ?> <!-- 添加评论模板 -->

            </article>

            <?php
        endwhile;
    else:
        echo '<p>No content found</p>';
    endif;
    ?>

</main>
<?php get_footer(); ?>