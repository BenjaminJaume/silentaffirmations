<?php

/*
Template Name: Affirmations
*/

get_header();

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
        <div class="row sticky-top container-sticky-top bg-white my-2 py-3">
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
                <a href="<?php echo get_site_url() . '/categories'; ?>" class="btn btn-outline-dark rounded-0 hvr-icon-back">
                    <i class="fa fa-chevron-left hvr-icon mr-1"></i>
                    Go back to categories
                </a>
            </div>
        </div>

        <?php

        /*
        *  Query posts for a relationship value.
        *  This method uses the meta_query LIKE to match the string "123" to the database value a:1:{i:0;s:3:"123";} (serialized array)
        */

        $affirmations = get_posts(array(
            'post_type' => 'affirmations',
            'posts_per_page' => -1,
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => 'category',
                    'value' => '"' . $id_category_chosen . '"',
                    'compare' => 'LIKE'
                )
            )
        ));

        ?>

        <?php if ($affirmations) { ?>
            <div class="container-fluid my-5">
                <?php foreach ($affirmations as $affirmation) :
                    // $prod is a WordPress Post Object
                    $affirmation_ID = $affirmation->ID;
                ?>
                    <hr class="w-75" />

                    <div class="row my-2 py-5">
                        <div class="col-12 col-sm-10 col-md-8 text-center mx-auto">
                            <p class="h2 font-jost font-weight-light">
                                &quot;
                                <?php echo strip_tags(get_the_content($affirmation_ID)); ?>
                                &quot;
                            </p>

                            <?php $reader = get_field('reader', $affirmation_ID);
                            if ($reader['url']) { ?>
                                <div class="my-4">
                                    <hr class="w-50" />
                                    <p class="text-warning text-uppercase">Listen to the affirmation</p>
                                    <?php echo do_shortcode('[audio src="' . $reader['url'] . '"]'); ?>
                                </div>
                            <?php } ?>

                            <form action="<?php echo get_site_url() . '/musics'; ?>" method="post">
                                <button type="submit" class="btn btn-dark rounded-0 hvr-icon-forward hvr-underline-from-center mt-3">
                                    Choose this affirmation
                                    <i class="fa fa-chevron-right hvr-icon ml-2"></i>
                                </button>

                                <input type="hidden" name="id_category_chosen" value="<?php echo $id_category_chosen; ?>" />
                                <input type="hidden" name="id_affirmation_chosen" value="<?php echo $affirmation_ID; ?>" />
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <hr class="w-75 my-5" />

            <div class="row my-3">
                <div class="col-12 text-center">
                    <a href=" <?php echo get_site_url() . '/categories'; ?>" class="btn btn-outline-dark rounded-0 hvr-icon-back">
                        <i class="fa fa-chevron-left hvr-icon mr-1"></i>
                        Go back to categories
                    </a>
                </div>
            </div>
        <?php } else { ?>
            <div class="container my-5">
                <div class="row">
                    <div class="col-12 text-center">
                        <p class="font-big">
                            Sorry but there is no affirmations available for this category yet
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } else { ?>
    <div class="container my-5">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="font-manrope text-danger mb-5">
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