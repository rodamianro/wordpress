 <?php
    $query_args = array(
        'post_type' => 'product',
        'posts_per_page' => 6,
        'order' => 'ASC',
        'orderby' => 'title'
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