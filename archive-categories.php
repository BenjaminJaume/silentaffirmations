<?php

/*
Template Name: Categories
*/

get_header();

$_SESSION["id_category_chosen"];
$_SESSION["id_affirmation_chosen"];

// Get all the custom posts
$args = [
    'post_type'      => 'categories',
    'posts_per_page' => -1,
    'post_name_in'  => ['categories'],
    'fields'         => 'ids'
];
$q = get_posts($args);

?>

<div class="container my-5">
    <div class="row bg-dark">
        <div class="col-12 text-center py-3">
            <p class="text-white text-uppercase">
                Step <span class="text-warning">1</span> out of 3
            </p>
            <h1 class="display-4 text-white text-uppercase font-manrope font-weight-light m-0">
                Pick a category
            </h1>
        </div>
    </div>
    <div class="row my-5">
        <?php foreach ($q as $id_category) {
            if (get_the_title($id_category) != "Custom") { ?>
                <div class="col-12 col-md-6 text-center mx-auto">
                    <?php

                    $image = get_field('image', $id_category);

                    if ($image) {
                        if ($image['ID']) {
                            $id_image = $image['ID'];
                        } else {
                            $id_image = $image;
                        } ?>

                        <div class="img-text-container category-container-shop bg-cover frame" style="background-image: url(<?php echo wp_get_attachment_url($id_image); ?>)">
                            <div class="centered">
                                <h1 class="centered text-dark bg-white-75 font-jost font-weight-light text-nowrap border border-dark p-2">
                                    <?php echo get_the_title($id_category); ?>
                                </h1>
                            </div>
                        </div>
                    <?php } else { ?>
                        <h1 class="text-dark bg-white-75 font-jost font-weight-light p-0 m-0">
                            <?php echo get_the_title($id_category); ?>
                        </h1>
                    <?php } ?>

                    <div class="mt-3 mb-5">
                        <p class="font-jost text-warning font-big font-weight-light">
                            <?php echo get_the_excerpt($id_category); ?>
                        </p>

                        <form action="<?php echo get_site_url() . '/affirmations'; ?>" method="post">
                            <button type="submit" class="btn btn-dark rounded-0 hvr-icon-forward hvr-grow">
                                Choose
                                &quot;<?php echo get_the_title($id_category); ?>&quot;

                                <i class="fa fa-chevron-right hvr-icon ml-2"></i>
                            </button>

                            <input type="hidden" name="id_category_chosen" value="<?php echo $id_category; ?>" />
                        </form>
                    </div>
                </div>
        <?php
            }
        } ?>
    </div>
</div>

<?php get_footer(); ?>