<?php
/**
 * Plugin Name: Dark Mode
 * Description: A simple plugin to enable dark mode on the site.
 * Version: 1.0
 * Author: Robinson Rosales
 * Author URI: https://github.com/rodamianro
 */

function mode_dark_assets(){
    wp_enqueue_style('dark-mode-style', plugin_dir_url(__FILE__) . 'assets/css/style.css', array(), '1.0', 'all');
}

add_action('wp_enqueue_scripts', 'mode_dark_assets');