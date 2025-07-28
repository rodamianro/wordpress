<?php
function init_template()
{
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
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
