 <?php
    $taxonomies = get_the_terms(get_the_ID(), 'product_category');
    $query_args = array(
        'post_type' => 'product',
        'posts_per_page' => 6,
        'order' => 'ASC',
        'orderby' => 'title',
        'post__not_in' => array(get_the_ID()),
        'tax_query' => array(
            array(
                'taxonomy' => 'product_category',
                'field' => 'slug',
                'terms' => $taxonomies ? $taxonomies[0]->slug : '',
            ),
        ), 
    );
    $products = new WP_Query($query_args);
    ?>
 <?php if ($products->have_posts()): ?>
     <div class="flex-col">
         <h3 class="text-center"><?php echo __('Producto Relacionados', 'platzigifts') ?></h3>
         <div class="flex flex-row justify-center gap-4">
             <?php while ($products->have_posts()): $products->the_post(); ?>
                 <div class="flex-col content-center">
                     <?php the_post_thumbnail('thumbnail'); ?>
                     <h4 class="text-center">
                         <a href="<?php the_permalink(); ?>">
                             <?php the_title() ?>
                         </a>
                     </h4>
                 </div>

             <?php endwhile; ?>
         </div>
     </div>
 <?php endif; ?>