<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Silent Affirmations</title>

    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500&family=Manrope:wght@300;400;600&family=Roboto:wght@300;400&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
</head>

<body <?php body_class('main'); ?>>

    <header class="sticky-top" role="banner">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark" role="navigation">
            <div class="container">
                <a class="navbar-brand mx-auto" href=<?php bloginfo('url'); ?>>
                    <img src="<?php echo get_template_directory_uri() . '/images/logo.png' ?>" alt="" class="align-middle navbar-logo img-fluid" />
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
                    'menu_class'        => 'nav navbar-nav mx-auto text-center font-manrope font-weight-bold',
                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'            => new WP_Bootstrap_Navwalker(),
                ));
                ?>
            </div>
        </nav>
    </header>

    <main role="main">