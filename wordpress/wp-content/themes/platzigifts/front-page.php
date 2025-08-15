<?php get_header(); ?>

<main class="container px-8 py-5">
    <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
            <h1 class=" mb-5 text-4xl"> <?php the_title(); ?></h1>
            <?php the_content(); ?>
        <?php endwhile; ?>
    <?php endif; ?>

    <div>
        <h2 class="text-center text-2xl mb-8 mt-8">Productos</h2>
        <?php
        $args = array('post_type' => 'product', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => "ASC");
        $products = new WP_Query($args);
        ?>
        <div class="grid grid-cols-2 gap-4">
            <div class="px-8 mt-8">
                <select name="products-categories" id="products-categories">
                    <option value="">Selecciona una categoría</option>
                    <?php $terms = get_terms(array(
                        'taxonomy' => 'product_category',
                        'hide_empty' => true,
                    )) ?>
                    <?php echo $terms ?>
                    <?php foreach ($terms as $term): ?>
                        <option value="<?php echo ($term->slug);  ?>">
                            <?php echo ($term->name); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <?php if ($products->have_posts()): ?>
                <div class="grid grid-cols-3 gap-4" id="products-list">
                    <?php while ($products->have_posts()): $products->the_post(); ?>
                        <a href="<?php the_permalink(); ?>">
                            <div class="border p-4 rounded">
                                <h3 class="text-xl"><?php the_title(); ?></h3>
                                <?php if (has_post_thumbnail()): ?>
                                    <div class="mb-4">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </a>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>