<?php

/*
Template Name: Affirmations
*/

get_header();

// Get all the custom posts
$args = [
    'post_type'      => 'affirmations',
    'posts_per_page' => -1,
    'post_name_in'  => ['affirmations'],
    'fields'         => 'ids'
];
$q = get_posts($args);

?>


<div class="container my-5">
    <?php
    if (isset($_POST['id_category'])) {
        $id_category = $_POST['id_category'] ?>
        <div class="row">
            <div class="col-12 text-center">
                <h1>
                    Categories:
                    <?php echo get_the_title($id_category); ?>
                </h1>
                <a href="<?php echo get_site_url() . '/categories'; ?>" class="btn btn-outline-dark">
                    Go back to categories
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12 text-center">
                <?php foreach ($q as $id_affirmation) {
                ?>
                    <form action="<?php echo get_site_url() . '/musics'; ?>" method="post">
                        <h1 class="font-manrope">
                            <?php echo get_the_title($id_affirmation); ?>
                        </h1>

                        <p>
                            <?php echo get_the_excerpt($id_affirmation); ?>
                        </p>

                        <p>
                            <button type="submit" class="btn btn-success">
                                Choose
                            </button>
                        </p>

                        <input type="hidden" name="id_category" value="<?php echo $id_category; ?>" />
                        <input type="hidden" name="id_affirmation" value="<?php echo $id_affirmation; ?>" />
                    </form>
                <?php
                } ?>
            </div>
        </div>
    <?php } else { ?>
        <div class="row">
            <div class="col-12 text-center">
                <h1>
                    Please choose a category first
                </h1>
                <a href="<?php echo get_site_url() . '/categories'; ?>" class="btn btn-outline-dark">
                    Go back to categories
                </a>
            </div>
        </div>
    <?php } ?>
</div>

<?php get_footer(); ?>