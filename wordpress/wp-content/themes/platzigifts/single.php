<?php get_header(); ?>

<main class="container p-4">
    <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
            <h1 class="mt-5 mb-5"> <?php the_title(); ?></h1>
            <div class="flex flex-row gap-4 justify-center">
                <div>
                    <?php the_post_thumbnail('large'); ?>
                </div>
                <div>
                    <?php the_content(); ?>
                </div>
            </div>
            <?php get_template_part('template-parts/post', 'navigation'); ?>
        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>