<?php
// Start the session
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Silent Affirmations</title>

    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500&family=Manrope:wght@300;400;600&family=Roboto:wght@300;400&display=swap" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri() . '/medias/images/favicon/apple-touch-icon.png'; ?>">
    <link rel=" icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri() . '/medias/images/favicon/favicon-32x32.png'; ?>">
    <link rel=" icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri() . '/medias/images/favicon/favicon-16x16.png'; ?>">
    <link rel=" manifest" href="<?php echo get_template_directory_uri() . '/medias/images/favicon/site.webmanifest'; ?>">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <?php wp_head(); ?>
</head>

<?php
global $template;
console($template);

if (is_shop() ||  is_product_category()) {
    $header = "Location: " . get_site_url();
    header($header);

    exit();
}

?>

<body <?php body_class('main'); ?>>

    <header class=" sticky-top" role="banner">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark" role="navigation">
            <div class="container-fluid">
                <a class="navbar-brand mx-auto" href=<?php bloginfo('url'); ?>>
                    <!-- <img src="<?php echo get_template_directory_uri() . '/medias/images/logo.png' ?>" alt="" class="align-middle navbar-logo img-fluid" /> -->
                    <?php echo wp_get_attachment_image(119, '', false, 'class=align-middle navbar-logo img-fluid'); ?>

                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <?php
                wp_nav_menu(array(
                    'theme_location'    => 'menu',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse',
                    'container_id'      => 'navbar',
                    'menu_class'        => 'nav navbar-nav mx-auto text-center font-manrope font-weight-bold text-uppercase',
                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'            => new WP_Bootstrap_Navwalker(),
                ));
                ?>

                <div class="d-flex mx-auto">
                    <?php echo do_shortcode('[gtranslate]'); ?>
                </div>

                <div class="d-flex justify-content-center mx-auto my-2 my-lg-0">
                    <a href="<?php echo get_site_url() . '/my-account'; ?>" class="btn btn-outline-warning rounded-0 text-uppercase text-nowrap hvr-glow px-3 mx-3">
                        <?php
                        if (is_user_logged_in()) { ?>
                            My account
                        <?php } else { ?>
                            Log In
                        <?php } ?>
                    </a>

                    <?php
                    if (WC()->cart->get_cart_contents_count() > 0) { ?>
                        <a href="<?php echo get_site_url() . '/cart'; ?>" class="btn btn-warning rounded-0 text-nowrap">
                            <?php echo WC()->cart->get_cart_contents_count(); ?><i class="fa fa-shopping-cart ml-2"></i>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </nav>
    </header>

    <main role="main">