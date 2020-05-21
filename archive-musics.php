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


<div class="container my-5">
    <?php
    if (isset($_POST['id_category']) && isset($_POST['id_affirmation'])) {
        $id_category = $_POST['id_category'];
        $id_affirmation = $_POST['id_affirmation'];

        $title_category = get_the_title($id_category);
        $title_affirmation = get_the_title($id_affirmation);

        console($title_category);
        // console($title_affirmation);

    ?>

        <?php

        $products = get_posts(array(
            'post_type' => 'product',
            'numberposts'    => -1,
            'meta_query'    => array(
                'relation'        => 'OR',
                array(
                    'key'        => 'category',
                    'value'        => '"' . $title_category . '"',
                    'compare'    => 'LIKE'
                )
            )
        ));

        ?>
        <?php if ($products) :
            echo ('FOUNNNNDD');
        ?>
            <ul>
                <?php foreach ($products as $product) : ?>
                    <li>
                        <a href="<?php echo get_permalink($product->ID); ?>">
                            <?php echo get_the_title($product->ID); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else : echo ('Not found :('); ?>
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