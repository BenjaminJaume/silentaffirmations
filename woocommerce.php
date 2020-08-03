<?php

get_header();


if (is_product()) {
    global $post;
?>

    <div class="container my-5">
        <div class="row bg-dark mt-5 mb-3">
            <div class="col-12 text-center py-3">
                <h1 class="display-4 text-white text-uppercase font-jost font-weight-light m-0">
                    Song selected
                </h1>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 text-center">
                <a href="<?php echo get_site_url() . '/categories'; ?>" class="btn btn-outline-dark rounded-0 hvr-icon-back">
                    <i class="fa fa-chevron-left hvr-icon mr-1"></i>
                    Go back to the categories
                </a>
            </div>
        </div>
    </div>

    <hr class="w-50 my-5" />
<?php } ?>

<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <?php woocommerce_content(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>