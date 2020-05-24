<?php

/*
Template Name: Music
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
    <?php
    if (isset($_POST['id_category_chosen']) && isset($_POST['id_affirmation_chosen'])) {
        $id_category_chosen = $_POST['id_category_chosen'];
        $id_affirmation_chosen = $_POST['id_affirmation_chosen'];

        $title_category = get_the_title($id_category_chosen);
        $title_affirmation = get_the_title($id_affirmation_chosen);
    ?>
        <div class="container my-5">
            <div class="row bg-dark">
                <div class="col-12 text-center py-3">
                    <p class="text-white text-uppercase">
                        Step <span class="text-warning">3</span> out of 3</span>
                    </p>
                    <h1 class="display-4 text-white text-uppercase font-manrope font-weight-light m-0">
                        Pick an music
                    </h1>
                </div>
            </div>
        </div>
        <div class="container my-5">
            <div class="row my-3">
                <div class="col-12 col-sm-6 text-center text-sm-right mb-3">
                    <form action="<?php echo get_site_url() . '/affirmations'; ?>" method="post">
                        <button type="submit" class="btn btn-dark rounded-0 hvr-icon-back">
                            <i class="fa fa-chevron-left hvr-icon mr-1"></i>
                            Go back to affirmations
                        </button>

                        <input type="hidden" name="id_category_chosen" value="<?php echo $id_category_chosen; ?>" />
                    </form>

                </div>
                <div class="col-12 col-sm-6 text-center text-sm-left">
                    <a href="<?php echo get_site_url() . '/categories'; ?>" class="btn btn-outline-dark rounded-0 hvr-icon-back">
                        <i class="fa fa-chevron-left hvr-icon mr-1"></i>
                        Go back to categories
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-5 col-lg-4 mx-auto">
                    <div class="text-center py-4">
                        <p class="text-muted mt-0">
                            Category
                        </p>
                        <h3 class="text-warning text-uppercase font-manrope font-weight-light m-0">
                            <?php echo $title_category; ?>
                        </h3>
                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-8 mx-auto">
                    <div class="text-center py-4">
                        <p class="font-manrope text-warning mt-0">
                            Affirmation
                        </p>
                        <p class="font-jost font-weight-light font-big mb-0">
                            &quot;
                            <?php
                            $content = get_post_field('post_content', $id_affirmation_chosen);
                            echo do_shortcode($content); //executing shortcodes
                            ?>
                            &quot;
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <?php

        /*
        *  Query posts for a relationship value.
        *  This method uses the meta_query LIKE to match the string "123" to the database value a:1:{i:0;s:3:"123";} (serialized array)
        */

        $products = get_posts(array(
            'post_type' => 'product',
            'relation' => 'AND',
            'orderby' => 'music',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => 'category',
                    'value' => '"' . $id_category_chosen . '"',
                    'compare' => 'LIKE'
                ),
                array(
                    'key' => 'affirmation',
                    'value' => '"' . $id_affirmation_chosen . '"',
                    'compare' => 'LIKE'
                )
            )
        ));

        ?>

        <?php if ($products) :
            $currency = get_woocommerce_currency();
            $currency_symbol = get_woocommerce_currency_symbol(); ?>

            <hr class="w-75">

            <div class="container-fluid my-5">
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
                    $add_to_cart_url = $product->add_to_cart_url();
                    $product_name = $product->get_name();
                    $product_description = $product->get_short_description();
                    $music = get_field('music', $product_ID);
                    $music_ID = get_field('preview', $music[0]->ID);
                    $music_name = $music[0]->post_title;
                    $preview_url = $music_ID['url'];

                    // print_r($product);
                ?>
                    <div class="row justify-content-center align-items-center my-3">
                        <div class="col-12 col-xl-auto text-center">
                            <?php
                            echo wp_get_attachment_image($picture_ID, 'thumbnail', false, 'class=img-fluid rounded-circle');
                            ?>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 text-center">
                            <h3 class="font-manrope font-weight-light text-dark">
                                <?php echo $music_name; ?>
                            </h3>

                            <p>
                                <?php echo $product_description; ?>
                            </p>
                        </div>
                        <div class="col-12 col-sm-8 col-md-6 col-lg-4 text-center">
                            <h3 class="font-manrope font-weight-light text-dark">
                                Preview
                            </h3>

                            <?php
                            echo do_shortcode('[audio src="' . $preview_url . '"]');
                            ?>
                        </div>
                        <div class="col-12 col-md-auto text-center">
                            <?php echo do_shortcode('[add_to_cart id="' . $product_ID . '" quantity="1" class="border-0 m-0 p-0"]'); ?>
                        </div>
                    </div>
                <?php endforeach; ?>

                <?php
                if (WC()->cart->get_cart_contents_count() > 0) { ?>
                    <hr class="w-75 my-5" />

                    <div class="row">
                        <div class="col-12 text-center">
                            <a href="<?php echo get_site_url() . '/cart'; ?>" class="btn btn-lg btn-dark rounded-0 animated infinite pulse slow">
                                Go to your cart
                                <i class="fa fa-shopping-cart align-middle ml-2"></i>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php else : ?>
            <hr class="w-75">

            <div class="container-fluid my-5">
                <div class="row">
                    <div class="col-12 text-center">
                        <p class="font-big font-jost font-weight-light">
                            Unfortunatly, there are no musics available for this category with this affirmation.<br />
                            Please come back check it later.
                        </p>
                    </div>
                </div>
                <form action="<?php echo get_site_url() . '/musics'; ?>" method="post" class="row justify-content-center text-center my-5">
                    <div class="col-12 col-sm-10 col-md-6 col-lg-3">
                        <div class="form-group mb-5">
                            <label for="select_category" class="text-warning text-uppercase">Category</label>
                            <select name="id_category_chosen" id="select_category" class="form-control rounded-0">
                                <?php foreach ($query_categories as $id) {
                                    echo '<option value="' . $id . '">';
                                    echo get_the_title($id);
                                    echo '</option>';
                                } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-12 col-sm-10 col-md-6 col-lg-3">
                        <div class="form-group">
                            <label for="select_affirmation" class="text-warning text-uppercase">Affirmation</label>
                            <select name="id_affirmation_chosen" id="select_affirmation" class="form-control rounded-0">
                                <?php foreach ($query_affirmations as $id) {
                                    echo '<option value="' . $id . '">';
                                    echo get_the_title($id);
                                    echo ' - ';
                                    echo wp_trim_words(get_the_excerpt($id), 5);
                                    echo '</option>';
                                } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-dark rounded-0 hvr-icon-forward hvr-underline-from-center m-0">
                            Retry
                            <i class="fa fa-search hvr-icon ml-2"></i>
                        </button>
                    </div>
                </form>
            </div>
</div>
</div>

<?php endif; ?>
<?php wp_reset_query();
?>

<?php } else { ?>
    <div class="container-fluid my-5" id="wrapper-musics">
        <div class="row">
            <div class="col-12 text-center">
                <h1>
                    Please choose a category first
                </h1>
                <a href="<?php echo get_site_url() . '/categories'; ?>" class="btn btn-outline-dark rounded-0 hvr-icon-back">
                    <i class="fa fa-chevron-left hvr-icon mr-1"></i>
                    Go back to categories
                </a>
            </div>
        </div>
    <?php } ?>
    </div>
    </div>

    <?php get_footer(); ?>