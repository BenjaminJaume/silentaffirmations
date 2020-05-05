<?php

function load_stylesheet()
{
    wp_register_style('app', get_template_directory_uri() . '/css/app.css', '', false, 'all');
    wp_enqueue_style('app');

    wp_register_style('modules', get_template_directory_uri() . '/css/modules.css', '', false, 'all');
    wp_enqueue_style('modules');
}
add_action('wp_enqueue_scripts', 'load_stylesheet');

function load_jquery()
{
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/vendor/jquery-3.4.1.min.js', '', '3.4.1', true);
}
add_action('wp_enqueue_scripts', 'load_jquery');


function load_javascript()
{
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', 'jquery', '4.3.1', true);
    wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js', 'jquery', false, true);
}
add_action('wp_enqueue_scripts', 'load_javascript');

// Add menu feature in WordPress
add_theme_support('menus');

// Add thumbnail feature in Wordpress
add_theme_support('post-thumbnails');

// Add templates feature in Wordpress
add_theme_support('templates');

// Add Boostrap Menu file with Wordpress
function register_navwalker()
{
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');

register_nav_menus(
    array(
        'menu' => __("Menu", 'theme')
    )
);

function console($data)
{
    echo "<script>console.log('" . json_encode($data) . "');</script>";
}

// turn off wysiwig for custom post types
add_action('init', 'init_remove_support', 100);
function init_remove_support()
{
    remove_post_type_support('page', 'editor');
}
