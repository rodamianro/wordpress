<?php get_header(); ?>

<main class="container p-4">
    <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
            <h1 class="mt-5 text-4xl"> <?php the_title(); ?></h1>
            <div class="flex flex-row gap-4 justify-center">
                <div>
                    <?php the_post_thumbnail('large'); ?>
                </div>
                <div>
                    <?php echo do_shortcode('[contact-form-7 id="0db84a4" title="Formulario de contacto 1"]');?>
                </div>
            </div>
            <?php the_content(); ?>
            <?php get_template_part('template-parts/product-related'); ?>
        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>