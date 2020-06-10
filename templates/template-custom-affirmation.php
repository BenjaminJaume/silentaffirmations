<?php

/*
Template Name: Custom Affirmation
*/

get_header();

?>

<div class="container my-5">
    <div class="row bg-dark">
        <div class="col-12 text-center py-3">
            <p class="text-white text-uppercase">
                Step <span class="text-warning">1</span> out of 2</span>
            </p>
            <h1 class="display-4 text-white text-uppercase font-manrope font-weight-light m-0">
                Type your affirmation
            </h1>
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 text-center mx-auto">
            <form role="search" method="post" action="<?php echo get_site_url() . '/custom-musics'; ?>">
                <!-- <input type="hidden" name="s" value="" /> -->

                <div class="form-group">
                    <textarea class="form-control rounded-0" name="custom_affirmation" rows="3" placeholder="Type your affirmation here..."></textarea>
                </div>

                <button type="submit" class="btn btn-lg btn-dark rounded-0 hvr-underline-from-center">
                    Confirm
                    <i class="fas fa-chevron-right   hvr-icon ml-1"></i>
                </button>

                <input type="hidden" name="id_category_chosen" value="249" />
                <input type="hidden" name="id_affirmation_chosen" value="250" />
            </form>
        </div>
    </div>
</div>

<?php get_footer(); ?>