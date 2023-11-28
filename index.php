<?php get_header(); ?>
<main>
    <?php
    if (have_posts()):
        while (have_posts()):
            the_post();
            ?>

            <article <?php post_class(); ?>>

                <div class="post-info">
                    <h2 class="post-title"><a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a></h2>
                    <p class="post-date">
                        <?php echo get_the_date('Y-m-d'); ?>
                    </p>
                </div>

            </article>

            <?php
        endwhile;

        the_posts_pagination(
            array(
                'prev_text' => __('<', 'textdomain'),
                'next_text' => __('>', 'textdomain'),
            ));

    else:
        echo '<p>No content found</p>';
    endif;
    ?>

</main>

<?php get_footer(); ?>