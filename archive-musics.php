<?php

/*
Template Name: Music
*/

get_header();

// Get all the custom posts
$args = [
    'post_type'      => 'musics',
    'posts_per_page' => -1,
    'post_name_in'  => ['musics'],
    'fields'         => 'ids'
];
$q = get_posts($args);

?>


<div class="container my-5" id="wrapper-musics">
    <?php
    if (isset($_POST['id_category_chosen']) && isset($_POST['id_affirmation_chosen'])) {
        $id_category_chosen = $_POST['id_category_chosen'];
        $id_affirmation_chosen = $_POST['id_affirmation_chosen'];

        $title_category = get_the_title($id_category_chosen);
        $title_affirmation = get_the_title($id_affirmation_chosen);

        // console($id_category_chosen . ' - ' . $id_affirmation_chosen);
    ?>

        <?php

        /*
        *  Query posts for a relationship value.
        *  This method uses the meta_query LIKE to match the string "123" to the database value a:1:{i:0;s:3:"123";} (serialized array)
        */

        $products = get_posts(array(
            'post_type' => 'product',
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
        <div>
            ID category: <?php echo $id_category_chosen; ?>
            Category: <?php echo $title_category; ?>
        </div>
        <div>
            ID affirmation: <?php echo $id_affirmation_chosen; ?>
            Affirmation: <?php echo $title_affirmation; ?>
        </div>

        <hr />
        <?php if ($products) :
            foreach ($products as $product) :
                $product_ID = $product->ID;
                $p = wc_get_product($product_ID);

                // print_r($p);

                echo wp_get_attachment_image($p->get_image_id(), [350, 350], false, 'class=img-fluid frame');
        ?>
                <li>
                    <a href="<?php echo get_permalink($product_ID); ?>">
                        <?php echo get_the_title($product_ID); ?>
                    </a>

                    <?php

                    // echo do_shortcode('[add_to_cart_url id="' . $product_ID . '"]');

                    echo do_shortcode('[add_to_cart id="' . $product_ID . '" quantity="1" class="border-0"]');

                    ?>

                    <!-- <a href="<?php echo 'cart' . $add_to_cart; ?>" class="more">Buy now</a> -->
                </li>
            <?php endforeach;
        else : echo 'Not Found' ?>
        <?php endif; ?>

        <?php wp_reset_query();     // Restore global post data stomped by the_post(). 
        ?>

    <?php } else { ?>
        <div class="row">
            <div class="col-12 text-center">
                <h1>
                    Please choose a category first
                </h1>
                <a href="../categories" class="btn btn-outline-dark">
                    Go back to categories
                </a>
            </div>
        </div>
    <?php } ?>
</div>

<?php get_footer(); ?>