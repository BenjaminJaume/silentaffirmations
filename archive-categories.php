<?php

/*
Template Name: Categories
*/

get_header();

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
    <?php foreach ($q as $id_category) {
    ?>
        <div class="row border my-2 py-5">
            <div class="col-12 text-center">
                <form action="<?php echo get_site_url() . '/affirmations'; ?>" method="post">
                    <h1 class="text-warning font-jost font-weight-light mt-0 pt-0">
                        <?php echo get_the_title($id_category); ?>
                    </h1>

                    <p class="font-jost">
                        <?php echo get_the_excerpt($id_category); ?>
                    </p>

                    <button type="submit" class="btn btn-dark rounded-0 hvr-icon-forward hvr-underline-from-center">
                        Choose
                        <i class="fa fa-chevron-right hvr-icon ml-2"></i>
                    </button>

                    <input type="hidden" name="id_category_chosen" value="<?php echo $id_category; ?>" />
                </form>
            </div>
        </div>
    <?php
    } ?>
</div>

<?php get_footer(); ?>