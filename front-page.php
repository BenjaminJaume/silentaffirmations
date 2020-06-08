<?php

$section_1 = get_field('section_1');
$section_2 = get_field('section_2');
$section_3 = get_field('section_3');
$section_4 = get_field('section_4');
$section_5 = get_field('section_5');
$section_6 = get_field('section_6');
$section_7 = get_field('section_7');

?>

<?php get_header(); ?>

<div class="container-fluid my-5">
    <div class="row h-100">
        <div class="col my-auto text-center">
            <h3 class="font-jost font-weight-light">
                The power of
            </h3>

            <h1 class="display-4 font-manrope text-uppercase mt-0">
                Silent Affirmations
            </h1>

            <?php echo wp_get_attachment_image(46, [350, 350], false, 'class=img-fluid'); ?>

            <div class="my-5">
                <a href="/get-started" alt="" class="btn btn-dark font-weight-light hvr-underline-from-center btn-lg rounded-0">
                    Get Started
                </a>

                <a href="#section-1" alt="" class="btn btn-outline-dark font-weight-light hvr-underline-from-center btn-lg rounded-0">
                    More
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid m-0 p-0">
    <div class="img-text-container video-container video-banner-front-page">
        <video autoplay loop muted preload="auto" poster="<?php echo wp_get_attachment_url(40); ?>)">
            <source src="<?php echo get_template_directory_uri() . '/medias/videos/neurons.mp4' ?>" type="video/mp4">
        </video>
        <span class="centered bg-dark-75">
            <h3 class="font-manrope text-uppercase text-warning p-2 p-sm-4 m-0">
                Reprogram your subconscious mind
            </h3>
        </span>
        </span>
    </div>
</div>

<!-- 
<style>
    #section-1 {
        background-image: url(<?php echo wp_get_attachment_url(40); ?>);
    }
</style>
<div class="container-fluid img-text-container bg-section-1 bg-cover m-0 p-0" id="section-1">
    <div class="centered">
        <h1 class="text-center font-manrope text-uppercase text-warning font-weight-bold">
            Reprogram your subconscious mind
        </h1>
    </div>
</div> -->

<div class="container my-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-6 text-center text-md-left">
            <div class="font-manrope">
                <h1 class="mb-0 pb-0">
                    Change your life
                </h1>
                <h1 class="text-secondary mt-0 pt-0">
                    from within
                </h1>
            </div>
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Quo inventore hic repellendus eligendi saepe ducimus repellat,
                nisi eius mollitia quasi voluptates esse excepturi tenetur
                corrupti a unde deserunt vitae. Veniam.
            </p>
        </div>
        <div class="col-12 col-md-6 text-center">
            <!-- <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="hdttps://www.youtube.com/embed/8942TQpgLZI" frameborder="0" allowfullscreen></iframe>
            </div> -->
            <div class="img-text-container">
                <?php echo wp_get_attachment_image(48, [350, 350], false, 'class=img-fluid frame'); ?>
                <h1 class="centered text-white m-0 p-0">
                    <i class="fa fa-play fa-2x"></i>
                </h1>
            </div>
        </div>
    </div>

    <hr class="w-75 my-5" />

    <div class="row align-items-center">
        <div class="col-12 col-md-6 order-2 order-md-1 text-center">
            <!-- <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="dhttps://www.youtube.com/embed/8942TQpgLZI" frameborder="0" allowfullscreen></iframe>
            </div> -->
            <div class="img-text-container">
                <?php echo wp_get_attachment_image(47, [350, 350], false, 'class=img-fluid frame'); ?>
                <h1 class="centered text-white m-0 p-0">
                    <i class="fa fa-play fa-2x"></i>
                </h1>
            </div>
        </div>
        <div class="col-12 col-md-6 text-center text-md-right order-1 order-md-2">
            <div class="font-manrope">
                <h1 class="mb-0 pb-0">
                    Make a change
                </h1>
                <h1 class="text-secondary mt-0 pt-0">
                    in your life
                </h1>
            </div>
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Quo inventore hic repellendus eligendi saepe ducimus repellat,
                nisi eius mollitia quasi voluptates esse excepturi tenetur
                corrupti a unde deserunt vitae. Veniam.
            </p>
        </div>
    </div>

    <hr class="w-75 my-5" />

    <div class="row align-items-center">
        <div class="col-12 col-md-6 text-center text-md-left">
            <div class="font-manrope">
                <h1 class="mb-0 pb-0">
                    This information
                </h1>
                <h1 class="text-secondary mt-0 pt-0">
                    will change everything
                </h1>
            </div>
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Quo inventore hic repellendus eligendi saepe ducimus repellat,
                nisi eius mollitia quasi voluptates esse excepturi tenetur
                corrupti a unde deserunt vitae. Veniam.
            </p>
        </div>
        <div class="col-12 col-md-6 text-center">
            <!-- <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="dhttps://www.youtube.com/embed/8942TQpgLZI" frameborder="0" allowfullscreen></iframe>
            </div> -->
            <div class="img-text-container">
                <?php echo wp_get_attachment_image(49, [350, 350], false, 'class=img-fluid frame'); ?>
                <h1 class="centered text-white m-0 p-0">
                    <i class="fa fa-play fa-2x"></i>
                </h1>
            </div>
        </div>
    </div>
</div>

<div class="text-center my-5">
    <a href="content/meditation.mp3" alt="" class="btn btn-dark btn-lg rounded-0 hvr-underline-from-center animated infinite pulse slow" download>
        Download meditation</a>
    <p class="text-muted mt-2">
        3.4 MB&nbsp;&nbsp;|&nbsp;&nbsp;.mp3 format
    </p>
</div>

<hr class="w-75 my-5" />

<div class="container-fluid my-5">
    <div class="row py-5 my-5">
        <div class="col-12 col-md-4 text-center font-manrope">
            <h1 class="font-weight-light text-uppercase">
                Step <span class="text-warning">1</span>
            </h1>
            <h2 class="font-weight-light font-jost">
                Choose a category
            </h2>
        </div>
        <div class="col-12 col-md-4 text-center font-manrope">
            <h1 class="font-weight-light text-uppercase">
                Step <span class="text-warning">2</span>
            </h1>
            <h2 class="font-weight-light font-jost">
                Choose an affirmation
            </h2>
        </div>
        <div class="col-12 col-md-4 text-center font-manrope">
            <h1 class="font-weight-light text-uppercase">
                Step <span class="text-warning">3</span>
            </h1>
            <h2 class="font-weight-light font-jost">
                Choose a music
            </h2>
        </div>
    </div>
</div>

<hr class="w-75 my-5" />

<div class="container mb-5">
    <div class="row">
        <div class="col-12 text-center">
            <h4 class="font-manrope text-uppercase font-weight-light">
                Pick a category: <span class="text-warning">option 1</span>
            </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="font-jost text-dark font-weight-light text-uppercase animated infinite slower pulse">
                <i class="far fa-arrow-alt-circle-down"></i>
                These are our categories
                <i class="far fa-arrow-alt-circle-down"></i>
            </h1>
        </div>
    </div>
</div>

<div class="bg-dark">
    <div class="container pt-5">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 justify-content-center align-items-center">
            <div class="col-12 col-sm-6 col-lg-4 mb-5 text-center">
                <a href="#" alt="" class="btn btn-outline-light rounded-0 mx-auto hvr-icon-forward mb-3">
                    Choose "Sexuality"
                    <i class="fa fa-chevron-right hvr-icon"></i>
                </a>
                <a href="#" alt="">
                    <div class="img-text-container category-container bg-cover frame-hover" style="background-image: url(<?php echo wp_get_attachment_url(41); ?>)">
                        <h1 class="centered text-white font-manrope text-decoration-none m-0 p-0">
                            Sexuality
                        </h1>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 mb-5 text-center">
                <a href="#" alt="" class="btn btn-outline-light rounded-0 mx-auto hvr-icon-forward mb-3">
                    Choose "Free Will"
                    <i class="fa fa-chevron-right hvr-icon"></i>
                </a>
                <a href="#" alt="">
                    <div class="img-text-container category-container bg-cover frame-hover" style="background-image: url(<?php echo wp_get_attachment_url(34); ?>)">
                        <h1 class="centered text-white font-manrope text-decoration-none m-0 p-0">
                            Free Will
                        </h1>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 mb-5 text-center">
                <a href="#" alt="" class="btn btn-outline-light rounded-0 mx-auto hvr-icon-forward mb-3">
                    Choose "Sport"
                    <i class="fa fa-chevron-right hvr-icon"></i>
                </a>
                <a href="#" alt="">
                    <div class="img-text-container category-container bg-cover frame-hover" style="background-image: url(<?php echo wp_get_attachment_url(44); ?>)">
                        <h1 class="centered text-white font-manrope text-decoration-none m-0 p-0">
                            Sport
                        </h1>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 mb-5 text-center">
                <a href="#" alt="" class="btn btn-outline-light rounded-0 mx-auto hvr-icon-forward mb-3">
                    Choose "Category"
                    <i class="fa fa-chevron-right hvr-icon"></i>
                </a>
                <a href="#" alt="">
                    <div class="img-text-container category-container bg-cover frame-hover" style="background-image: url(<?php echo wp_get_attachment_url(50); ?>)">
                        <h1 class="centered text-white font-manrope text-decoration-none m-0 p-0">
                            Category
                        </h1>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 mb-5 text-center ">
                <a href="#" alt="" class="btn btn-outline-light rounded-0 mx-auto hvr-icon-forward mb-3">
                    Choose "Category"
                    <i class="fa fa-chevron-right hvr-icon"></i>
                </a>
                <a href="#" alt="">
                    <div class="img-text-container category-container bg-cover frame-hover" style="background-image: url(<?php echo wp_get_attachment_url(51); ?>)">
                        <h1 class="centered text-white font-manrope text-decoration-none m-0 p-0">
                            Category
                        </h1>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 mb-5 text-center">
                <a href="#" alt="" class="btn btn-outline-light rounded-0 mx-auto hvr-icon-forward mb-3">
                    Choose "Category"
                    <i class="fa fa-chevron-right hvr-icon"></i>
                </a>
                <a href="#" alt="">
                    <div class="img-text-container category-container bg-cover frame-hover" style="background-image: url(<?php echo wp_get_attachment_url(52); ?>)">
                        <h1 class="centered text-white font-manrope text-decoration-none m-0 p-0">
                            Category
                        </h1>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 mb-5 text-center">
                <a href="#" alt="" class="btn btn-outline-light rounded-0 mx-auto hvr-icon-forward mb-3">
                    Choose "Category"
                    <i class="fa fa-chevron-right hvr-icon"></i>
                </a>
                <a href="#" alt="">
                    <div class="img-text-container category-container bg-cover frame-hover" style="background-image: url(<?php echo wp_get_attachment_url(42); ?>)">
                        <h1 class="centered text-white font-manrope text-decoration-none m-0 p-0">
                            Category
                        </h1>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 mb-5 text-center ">
                <a href="#" alt="" class="btn btn-outline-light rounded-0 mx-auto hvr-icon-forward mb-3">
                    Choose "Category"
                    <i class="fa fa-chevron-right hvr-icon"></i>
                </a>
                <a href="#" alt="">
                    <div class="img-text-container category-container bg-cover frame-hover" style="background-image: url(<?php echo wp_get_attachment_url(33); ?>)">
                        <h1 class="centered text-white font-manrope text-decoration-none m-0 p-0">
                            Category
                        </h1>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 mb-5 text-center">
                <a href="#" alt="" class="btn btn-outline-light rounded-0 mx-auto hvr-icon-forward mb-3">
                    Choose "Category"
                    <i class="fa fa-chevron-right hvr-icon"></i>
                </a>
                <a href="#" alt="">
                    <div class="img-text-container category-container bg-cover frame-hover" style="background-image: url(<?php echo wp_get_attachment_url(28); ?>)">
                        <h1 class="centered text-white font-manrope text-decoration-none m-0 p-0">
                            Category
                        </h1>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row mb-3">
        <div class="col-12 text-center">
            <h1 class="font-weight-light">
                - OR -
            </h1>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12 text-center">
            <h4 class="font-manrope text-uppercase font-weight-light">
                Pick a category: <span class="text-warning">option 2</span>
            </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <div class="img-text-container category-container bg-cover frame" style="background-image: url(<?php echo wp_get_attachment_url(31); ?>)">
                <a href="#" alt="" class="centered btn btn-lg btn-dark rounded-0 font-jost font-bigger text-uppercase hvr-underline-from-center">
                    Choose your own affirmation
                </a>
            </div>
        </div>
    </div>
</div>

<hr class="w-75 my-5" />

<div class="container my-5">
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="font-manrope text-dark">
                Listen to what people are<br />saying about Silent Affirmations
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm">
            <div id="carousel-captions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-captions" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-captions" data-slide-to="1"></li>
                    <li data-target="#carousel-captions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-interval="20000">
                        <div class="d-block w-100 text-center">
                            <iframe class="" height="500" width="100%" src="https://www.youtube.com/embed/8942TQpgLZI" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="carousel-caption d-none d-md-block bg-white-75 text-dark rounded">
                            <h5>Testimonial from Monicca</h5>
                            <p>
                                "Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                Unde rerum animi dolores aspernatur doloribus, libero
                                suscipit assumenda minima laboriosam. Ab non libero voluptatibus
                                necessitatibus rerum qui natus sequi eum et!"
                            </p>
                        </div>
                    </div>
                    <div class="carousel-item" data-interval="20000">
                        <div class="d-block w-100 text-center">
                            <iframe class="" height="500" width="100%" src="https://www.youtube.com/embed/EnflLRtslUQ" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="carousel-caption d-none d-md-block bg-white-75 text-dark rounded">
                            <h5>Testimonial from David</h5>
                            <p>
                                "Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                Unde rerum animi dolores aspernatur doloribus, libero
                                suscipit assumenda minima laboriosam. Ab non libero voluptatibus
                                necessitatibus rerum qui natus sequi eum et!"
                            </p>
                        </div>
                    </div>
                    <div class="carousel-item" data-interval="20000">
                        <div class="d-block w-100 text-center">
                            <iframe class="" height="500" width="100%" src="https://www.youtube.com/embed/f4FmAPuaRCY" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="carousel-caption d-none d-md-block bg-white-75 text-dark rounded">
                            <h5>Testimonial from Nathan & Patricia</h5>
                            <p>
                                "Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                Unde rerum animi dolores aspernatur doloribus, libero
                                suscipit assumenda minima laboriosam. Ab non libero voluptatibus
                                necessitatibus rerum qui natus sequi eum et!"
                            </p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carousel-captions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-captions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>