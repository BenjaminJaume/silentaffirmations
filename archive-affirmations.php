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


<?php
if (isset($_POST['id_category_chosen'])) {
    $id_category_chosen = $_POST['id_category_chosen'] ?>
    <div class="container my-5">
        <div class="row bg-dark">
            <div class="col-12 text-center py-3">
                <p class="text-white text-uppercase">
                    Step <span class="text-warning">2</span> out of 3</span>
                </p>
                <h1 class="display-4 text-white text-uppercase font-manrope font-weight-light m-0">
                    Pick an affirmation
                </h1>
            </div>
        </div>
        <div class="row my-2 py-3">
            <div class="col-12 text-center">
                <p class="mb-0">
                    Category:
                </p>
                <h1 class="text-warning font-manrope font-weight-light my-0">
                    <?php echo get_the_title($id_category_chosen); ?>
                </h1>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-12 text-center">
                <a href=" <?php echo get_site_url() . '/categories'; ?>" class="btn btn-outline-dark rounded-0 hvr-icon-back">
                    <i class="fa fa-chevron-left hvr-icon mr-1"></i>
                    Go back to categories
                </a>
            </div>
        </div>

        <?php foreach ($q as $id_affirmation) {
        ?>
            <div class="row my-2 py-5">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 text-center mx-auto">
                    <p class="font-jost font-big font-weight-light">
                        &quot;
                        <?php echo get_the_excerpt($id_affirmation); ?>
                        &quot;
                    </p>

                    <form action="<?php echo get_site_url() . '/musics-2'; ?>" method="post">
                        <button type="submit" class="btn btn-dark rounded-0 hvr-icon-forward hvr-underline-from-center mt-3">
                            Choose this affirmation
                            <i class="fa fa-chevron-right hvr-icon ml-2"></i>
                        </button>

                        <input type="hidden" name="id_category_chosen" value="<?php echo $id_category_chosen; ?>" />
                        <input type="hidden" name="id_affirmation_chosen" value="<?php echo $id_affirmation; ?>" />
                    </form>
                </div>
            </div>

            <hr class="w-75" />

        <?php
        } ?>
    </div>
<?php } else { ?>
    <div class="container my-5">
        <div class="row">
            <div class="col-12 text-center">
                <h1>
                    Please choose a category first
                </h1>
                <a href="<?php echo get_site_url() . '/categories'; ?>" class="btn btn-dark rounded-0 hvr-icon-back">
                    <i class="fa fa-chevron-left hvr-icon mr-1"></i>
                    Go back to categories
                </a>
            </div>
        </div>
    </div>
<?php } ?>

<?php get_footer(); ?>