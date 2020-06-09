<?php

get_header();

$tag_object = get_queried_object();
$tag = $tag_object->slug;

$args = array(
    'post_type' => 'affirmations',
    'tag' => $tag,
    'posts_per_page' => -1,
);

$query = new WP_Query($args);
?>

<div class="container my-5">
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="font-manrope">
                Affirmations with the tag
                "<span class="text-warning"><?php echo $tag; ?></span>"
            </h1>
            <h4 class="text-muted font-weight-light m-0">
                Total found: <span class="text-warning font-weight-bold"><?php echo $query->found_posts; ?></span>
            </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <ul class="list-group">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <?php
                    $affirmation_ID = get_the_ID();
                    $category = get_field('category', $affirmation_ID);
                    $id_category_chosen = $category[0]->ID;
                    $category_name = get_the_title($id_category_chosen);
                    ?>

                    <hr class="w-75" />

                    <div class="row my-2 py-5">
                        <div class="col-12 col-sm-10 col-md-8 text-center mx-auto">
                            <p class="h2 font-jost font-weight-light">
                                &quot;
                                <?php echo get_the_excerpt($affirmation_ID); ?>
                                &quot;
                            </p>

                            <form action="<?php echo get_site_url() . '/affirmations'; ?>" method="post" class="inline-form">
                                <label>Category:</label>
                                <button type="submit" class="btn btn-warning btn-sm rounded-0">
                                    <?php echo $category_name; ?>
                                </button>

                                <input type="hidden" name="id_category_chosen" value="<?php echo $id_category_chosen; ?>" />
                            </form>

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
                <?php endwhile;
                wp_reset_postdata();
                ?>
            </ul>
        </div>
    </div>
</div>

<?php get_footer(); ?>