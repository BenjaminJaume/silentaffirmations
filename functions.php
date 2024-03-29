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

    wp_register_style('select2-main', get_template_directory_uri() . '/css/vendor/select2.min.css', '', '4.0.13', 'all');
    wp_enqueue_style('select2-main');

    wp_register_style('select2-bootstrap', get_template_directory_uri() . '/css/vendor/select2-bootstrap4.min.css', '', '4.0.13', 'all');
    wp_enqueue_style('select2-bootstrap');

    wp_register_style('normalize', get_template_directory_uri() . '/css/vendor/normalize.min.css', '', '8.0.1', 'all');
    wp_enqueue_style('normalize');

    wp_register_style('app', get_template_directory_uri() . '/css/app.css', '', '1.0.2', 'all');
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
    wp_enqueue_script('aos', get_template_directory_uri() . '/js/vendor/aos.js', 'jquery', false, true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', 'jquery', '4.4.1', true);
    wp_enqueue_script('select2-main', get_template_directory_uri() . '/js/vendor/select2.full.min.js', 'jquery', '4.0.13', true);
    wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js', 'jquery', false, true);
}
add_action('wp_enqueue_scripts', 'load_javascript');

// Add menu feature in WordPress
add_theme_support('menus');

// Add thumbnail feature in Wordpress
add_theme_support('post-thumbnails');

// Add templates feature in Wordpress
add_theme_support('templates');

// Adding widgets
// add_action('widgets_init', 'wpb_widgets_init');

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

// Custom post type function
function create_posttype()
{
    register_post_type(
        'categories',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('Categories'),
                'singular_name' => __('Category')
            ),
            'public' => true,
            'publicly_queryable' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'categories'),
            'show_in_rest' => true,
            'menu_icon'           => wp_get_attachment_url(77),
        )
    );

    register_post_type(
        'affirmations',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('Affirmations'),
                'singular_name' => __('Affirmation')
            ),
            'public' => true,
            'publicly_queryable' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'affirmations'),
            'show_in_rest' => true,
            'menu_icon'           => wp_get_attachment_url(74),
            'taxonomies' => array('post_tag')
        )
    );
}
// Hooking up our function to theme setup
add_action('init', 'create_posttype');

// Add the custom columns to the categories post type:
add_filter('manage_categories_posts_columns', 'set_custom_edit_categories_columns');
function set_custom_edit_categories_columns($columns)
{
    unset($columns['title']);
    unset($columns['date']);
    $columns['image'] = __('Image');
    $columns['title'] = __('Title');
    $columns['description'] = __('Description');

    return $columns;
}

// Add the data to the custom columns for the categories post type:
add_action('manage_categories_posts_custom_column', 'custom_categories_column', 10, 2);
function custom_categories_column($column, $post_id)
{
    switch ($column) {
        case 'title':
            the_title($post_id);
            break;

        case 'image':
            $image = get_field('image', $post_id);

            if ($image) {
                if ($image['ID']) {
                    $id_image = $image['ID'];
                } else {
                    $id_image = $image;
                }
                echo wp_get_attachment_image($id_image, 'thumbnail', false, 'class=img-fluid');
            } else {
                echo 'No pictures linked';
            }

            break;

        case 'description':
            the_excerpt($post_id);
            break;
    }
}

// Add the custom columns to the affirmations post type:
add_filter('manage_affirmations_posts_columns', 'set_custom_edit_affirmations_columns');
function set_custom_edit_affirmations_columns($columns)
{
    $columns['title'];
    unset($columns['date']);
    $columns['category'] = __('Category');
    $columns['description'] = __('Description');

    return $columns;
}

// Add the data to the custom columns for the affirmations post type:
add_action('manage_affirmations_posts_custom_column', 'custom_affirmations_column', 10, 2);
function custom_affirmations_column($column, $post_id)
{
    switch ($column) {
        case 'category':
            $category = get_field('category', $post_id);
            echo get_the_title($category[0]->ID);
            break;

        case 'description':
            the_excerpt($post_id);
            break;
    }
}

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

function formatBytes($bytes, $precision = 0)
{
    $units = array('B', 'KB', 'MB', 'GB', 'TB');

    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);

    // Uncomment one of the following alternatives
    $bytes /= pow(1024, $pow);
    // $bytes /= (1 << (10 * $pow));

    return round($bytes, $precision) . ' ' . $units[$pow];
}

// Flushing rules
flush_rewrite_rules(false);

// Disable useless fields when customers are checking out
function custom_override_checkout_fields($fields)
{
    // unset( $fields['billing']['billing_first_name'] );
    // unset( $fields['billing']['billing_last_name'] );
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    // unset( $fields['billing']['billing_country'] );
    unset($fields['billing']['billing_state']);
    // unset( $fields['billing']['billing_email'] );
    unset($fields['billing']['billing_phone']);

    return $fields;
}
add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');
