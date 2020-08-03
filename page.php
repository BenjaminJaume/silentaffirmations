<?php get_header(); ?>

<div class="container my-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="display-4 font-manrope text-warning">
                <?php get_the_title() != "Checkout" ? the_title() : ''; ?>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">

            <?php if (have_posts()) : while (have_posts()) : the_post();
                    the_content();
                endwhile;
            endif; ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>