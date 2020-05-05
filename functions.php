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
    wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js', 'jquery', false, true);
}
add_action('wp_enqueue_scripts', 'load_javascript');
