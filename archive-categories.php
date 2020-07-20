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

<div class="container mt-5">
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
        <div class="col-12 text-center">
            <h2 class="font-manrope text-uppercase font-weight-light">
                <span class="text-warning">Option 1</span>: select a category from below
            </h2>
        </div>
    </div>
    <div class="row">
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
                                <h3 class="text-dark bg-white-75 font-jost font-weight-light border border-dark p-2">
                                    <?php echo get_the_title($id_category); ?>
                                </h3>
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

<hr class="w-75 my-5" />

<div class="container my-5">
    <div class="row">
        <div class="col-12 text-center">
            <h2 class="font-manrope text-uppercase font-weight-light mb-5">
                <span class="text-warning">Option 2</span>: Find the affirmation that fits you best
            </h2>

            <h2 class="text-muted font-weight-light m-0">
                Select keywords
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto text-center mt-3">
            <?php $tags = get_tags('post_tag'); ?>

            <form role="search" method="post" action="<?php echo get_site_url(); ?>">
                <!-- <input type="hidden" name="s" value="" /> -->

                <div class="form-group">
                    <select class="custom-select custom-select-lg" type="search" name="tag" required="required" data-placeholder="Example: depression, self-love, mindfulness" data-allow-clear="1">
                        <option></option>
                        <?php foreach ($tags as $tag) : ?>
                            <option value="<?php echo esc_attr($tag->slug); ?>">
                                <?php echo esc_attr($tag->name); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-lg btn-dark rounded-0 hvr-underline-from-center">
                    Search
                    <i class="fas fa-search hvr-icon ml-1"></i>
                </button>
            </form>
        </div>
    </div>
</div>

<hr class="w-75 my-5" />

<div class="container my-5">
    <div class="row mb-3">
        <div class="col-12 text-center">
            <h2 class="font-manrope text-uppercase font-weight-light">
                <span class="text-warning">Option 3</span>: create your own affirmation
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 text-center mx-auto">
            <form action="<?php echo get_site_url() . '/musics'; ?>" method="post">
                <div class="form-group">
                    <textarea name="custom_affirmation" class="form-control rounded-0" id="custom-affirmation" rows="3" placeholder="Type your affirmation here... (max. 500 letters)" maxlength="500" required></textarea>
                </div>

                <button type="submit" class="btn btn-dark rounded-0 hvr-icon-forward hvr-grow">
                    Continue
                    <i class="fa fa-chevron-right hvr-icon ml-2"></i>
                </button>
            </form>

        </div>
    </div>
</div>

<?php get_footer(); ?>