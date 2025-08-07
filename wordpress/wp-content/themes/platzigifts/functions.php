<?php
function init_template()
{
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    register_nav_menus(array(
        'top_menu' => __('Menú Principal', 'platzigifts'),
    ));
}

add_action('after_setup_theme', 'init_template');

function assets()
{
    wp_register_style('tailwind', get_template_directory_uri() . '/assets/css/tailwind.css', array(), '1.0.0', 'all');
    wp_register_style('font-monserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap', array(), '1.0.0', 'all');

    wp_enqueue_style('style', get_stylesheet_uri(), array('tailwind', 'font-monserrat'), '1.0.0', 'all');
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'assets');

function sidebar()
{
    register_sidebar(
        array(
            'name' => __('Pie de página', 'platzigifts'),
            'id' => 'footer',
            'description' => __('Zona de widgets para pie de página', 'platzigifts'),
            'before_title' => '<p>',
            'after_title' => '</p>',
            'before_widget' => '<div id="%1$s" class="%2$s">',
            'after_widget' => '</div>',
        )
    );
}

add_action('widgets_init', 'sidebar');

function product_type()
{
    register_post_type(
        'product',
        array(
            'label' => __('Productos', 'platzigifts'),
            'description' => __('Productos de platzi', 'platzigifts'),
            'labels' => array(
                'name' => __('Productos', 'platzigifts'),
                'singular_name' => __('Producto', 'platzigifts'),
                'menu_name' => __('Productos', 'platzigifts'),
            ),
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
                'revisions',
            ),
            'public' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-cart',
            'can_export' => true,
            'publicly_queryable' => true,
            'rewrite' => array('slug' => 'producto'),
            'show_in_rest' => true,
        )
    );
}

add_action('init', 'product_type');

function products_categories_taxonomy()
{
    register_taxonomy(
        'product_category',
        array('product'),
        array(
            'label' => __('Categorías de Productos', 'platzigifts'),
            'labels' => array(
                'name' => __('Categorías de Productos', 'platzigifts'),
                'singular_name' => __('Categoría de Productos', 'platzigifts'),
            ),
            'rewrite' => array('slug' => 'categoria-productos'),
            'hierarchical' => true,
            'show_in_rest' => true,
            'show_in_nav_menu' => true,
            'show_admin_column' => true,
        )
    );
}

add_action('init', 'products_categories_taxonomy');