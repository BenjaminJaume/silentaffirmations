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
    <div class="row">
        <div class="col-12 text-center">
            <?php foreach ($q as $id_category) {
            ?>
                <form action="<?php echo get_site_url() . '/affirmations'; ?>" method="post">
                    <h1 class="font-manrope">
                        <?php echo get_the_title($id_category); ?>
                    </h1>

                    <p>
                        <?php echo get_the_excerpt($id_category); ?>
                    </p>

                    <p>
                        <button type="submit" class="btn btn-success">
                            Choose
                        </button>
                    </p>

                    <input type="hidden" name="id_category_chosen" value="<?php echo $id_category; ?>" />
                </form>
            <?php
            } ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>