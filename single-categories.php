<?php

get_header();

$id = get_the_ID();

?>


<div class="container my-5">
    <div class="row">
        <div class="col-12 text-center">
            <p class="text-muted m-0 p-0">
                Category:
            </p>
            <h1 class="font-manrope text-warning font-weight-light text-uppercase">
                <?php echo get_the_title($id); ?>
            </h1>
        </div>
    </div>

    <hr class="w-75 my-5" />

    <div class="row">
        <div class="col-12 text-center">
            <?php

            $image = get_field('image', $id);

            if ($image) {
                if ($image['ID']) {
                    $id_image = $image['ID'];
                } else {
                    $id_image = $image;
                }

                echo wp_get_attachment_image($id_image, [500, 500], false, 'class=img-fluid frame');
            } ?>

            <p class="font-jost font-weight-light font-big mt-5">
                <?php echo get_the_excerpt($id); ?>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-12 text-center">
            <form action="<?php echo get_site_url() . '/affirmations'; ?>" method="post">
                <button type="submit" class="btn btn-dark rounded-0 hvr-icon-forward hvr-underline-from-center">
                    Browse affirmations with &quot;<?php echo get_the_title($id_category); ?>&quot;

                    <i class="fa fa-chevron-right hvr-icon ml-2"></i>
                </button>

                <input type="hidden" name="id_category_chosen" value="<?php echo $id; ?>" />
            </form>

        </div>
    </div>
</div>

<?php get_footer(); ?>