<?php

/*
Template Name: Custom Musics
*/

// Get all the custom posts
$args = [
    'post_type'      => 'categories',
    'posts_per_page' => -1,
    'post_name_in'  => ['categories'],
    'fields'         => 'ids'
];
$query_categories = get_posts($args);

// Get all the custom posts
$args = [
    'post_type'      => 'affirmations',
    'posts_per_page' => -1,
    'post_name_in'  => ['affirmations'],
    'fields'         => 'ids'
];
$query_affirmations = get_posts($args);

get_header();

?>

<div id="wrapper-musics">

    <div class="container my-5">
        <div class="row bg-dark mt-5 mb-3">
            <div class="col-12 text-center py-3">
                <h1 class="display-4 text-white text-uppercase font-jost font-weight-light m-0">
                    Custom Affirmation
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <p class="text-dark text-uppercase">
                    Step <span class="text-warning">1</span> out of 2</span>
                </p>
                <h1 class="text-warning text-uppercase font-manrope font-weight-light m-0">
                    Pick a music
                </h1>
            </div>
        </div>

    </div>

    <?php

    /*
        *  Query posts for a relationship value.
        *  This method uses the meta_query LIKE to match the string "123" to the database value a:1:{i:0;s:3:"123";} (serialized array)
        */

    // Custom category ID: 249
    // Custom affirmation ID: 250
    $products = get_posts(array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'relation' => 'AND',
        'orderby' => 'music',
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key' => 'category',
                'value' => '249',
                'compare' => 'LIKE'
            ),
            array(
                'key' => 'affirmation',
                'value' => '250',
                'compare' => 'LIKE'
            )
        )
    ));

    ?>

    <!-- <hr class="w-75"> -->

    <div class="container my-5">
        <?php foreach ($products as $prod) :
            // $prod is a WordPress Post Object
            $product_ID = $prod->ID;

            // $product is now a Woocommerce Product Simple Object
            // So we can use functions associated with it
            // And apply a total customed design for each element
            $product = wc_get_product($product_ID);

            // Grab all the properties from the product
            // that will be displayed on the page
            $picture_ID = $product->get_image_id();
            $price = $product->get_price();
            $product_url = get_permalink($product_ID);
            $product_name = $product->get_description();
            $product_description = $product->get_short_description();

            $product_affirmation = get_field('affirmation', $product_ID);
            $preview = get_field('preview', $product_ID);
        ?>
            <div class="row justify-content-center align-items-center border rounded mx-0 mx-sm-1 mx-md-5 my-3 py-3">
                <!-- <div class="col-12 col-xl-auto text-center">
                            <?php
                            // echo wp_get_attachment_image($picture_ID, 'thumbnail', false, 'class=img-fluid rounded-circle');
                            ?>

                        </div> -->
                <div class="col-12 col-lg-4 text-center">
                    <h2 class="font-manrope font-weight-light text-warning">
                        <?php echo $product_name; ?>
                    </h2>

                    <?php if ($product_description != "") { ?>
                        <p class="font-jost m-0 p-0">
                            <?php echo $product_description; ?>
                        </p>
                    <?php } ?>
                </div>
                <div class="col-12 col-sm-8 col-md-6 col-lg-4 text-center order-lg-2 mt-3 mt-lg-0">
                    <?php echo do_shortcode('[audio src="' . $preview['url'] . '"]'); ?>
                </div>
                <div class="col-12 col-lg-3 text-center order-lg-3 my-4 my-lg-0">
                    <a href="<?php echo $product_url; ?>" alt="" class="btn btn-dark rounded-0 hvr-icon-forward">
                        Select this music
                        <i class="fa fa-chevron-right hvr-icon"></i>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>

        <?php
        if (WC()->cart->get_cart_contents_count() > 0) { ?>
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <a href="<?php echo get_site_url() . '/cart'; ?>" class="btn btn-lg btn-dark rounded-0 animated infinite pulse slow">
                        [<?php echo count(WC()->cart->get_cart()); ?>] Go to your cart
                        <i class="fa fa-shopping-cart align-middle ml-2"></i>
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php wp_reset_query();

get_footer(); ?>