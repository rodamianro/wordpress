<?php get_header(); ?>

<main class="container p-4">
    <h1><?php the_archive_title(); ?></h1>
    <?php if (have_posts()) : ?>
         <div class="grid grid-cols-3 gap-4">
            <?php while (have_posts()) : the_post(); ?>
                <article class="p-4 rounded shadow">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium', ['class' => 'w-full h-48 object-cover rounded']); ?>
                        <h4 class="text-xl font-bold">
                            <?php the_title(); ?>
                        </h4>
                    </a>
                </article>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</main>
<?php get_footer(); ?>