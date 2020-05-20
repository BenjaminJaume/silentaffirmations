<?php

function load_stylesheet()
{
    wp_register_style('animate', get_template_directory_uri() . '/css/vendor/animate.min.css', '', '3.7.2', 'all');
    wp_enqueue_style('animate');

    wp_register_style('aos', get_template_directory_uri() . '/css/vendor/aos.min.css', '', false, 'all');
    wp_enqueue_style('aos');

    wp_register_style('hover', get_template_directory_uri() . '/css/vendor/hover.min.css', '', '2.3.2', 'all');
    wp_enqueue_style('hover');

    wp_register_style('fontawesome', get_template_directory_uri() . '/css/vendor/fontawesome/css/all.min.css', '', '5.12.1', 'all');
    wp_enqueue_style('fontawesome');

    wp_register_style('bootstrap', get_template_directory_uri() . '/css/vendor/bootstrap.min.css', '', '4.4.1', 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('bootstrap-rfs', get_template_directory_uri() . '/css/vendor/bootstrap-rfs.css', '', false, 'all');
    wp_enqueue_style('bootstrap-rfs');

    wp_register_style('normalize', get_template_directory_uri() . '/css/vendor/normalize.min.css', '', '8.0.1', 'all');
    wp_enqueue_style('normalize');

    wp_register_style('app', get_template_directory_uri() . '/css/app.css', '', '1.0.0', 'all');
    wp_enqueue_style('app');
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
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', 'jquery', '4.4.1', true);
    wp_enqueue_script('aos', get_template_directory_uri() . '/js/vendor/aos.js', 'jquery', false, true);
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
    // remove_post_type_support('page', 'editor');
}

@ini_set('upload_max_size', '100M');
@ini_set('post_max_size', '100M');
@ini_set('max_execution_time', '300');

// Adding WooCommerce to the custom theme
function theme_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'theme_add_woocommerce_support');
