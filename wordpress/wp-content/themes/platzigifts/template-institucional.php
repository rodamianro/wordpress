<?php // Template Name: Página: Institucional  
?>
<?php
$fields = get_fields();
?>
<?php get_header(); ?>

<main class="container p-4">
    <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
            <h1 class="mt-5 mb-5 "><?php echo $fields['title']; ?></h1>
            <img src="<?php echo $fields['image']; ?>" alt="" class="img-fluid mb-5">
            <hr>
            <?php the_content(); ?>
        <?php endwhile; ?>
    <?php endif; ?>
</main>
<?php get_footer(); ?>