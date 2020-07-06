<?php

/*
Template Name: How It Works
*/

get_header();

?>

<div class="container my-5">
    <div class="row align-items-center">
        <div class="col-12 col-md-6 text-center mx-auto">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis omnis dolorum quae possimus sit impedit id labore repellendus quibusdam dolorem. Voluptas, repudiandae? Distinctio porro perspiciatis quam repellat hic vitae odit!</div>
        <div class="col-12 col-md-6 text-center mx-auto">

            <?php
            echo wp_video_shortcode([
                'src'      => 'https://silentaffirmations.com/wp-content/uploads/2020/06/Was-sind-Silent-Subliminals-Wir-erklären-es-dir.mp4',
                'poster'   => '',
                'loop'     => 'true',
                'autoplay' => 'false',
                'preload'  => 'metadata',
                'height'   => 360,
                'width'    => empty($content_width) ? 640 : $content_width,
                'class'    => 'img-fluid', // 'class' attr for `<video>` element. Default 'wp-video-shortcode'
                'id'       => '', // 'id' attr for `<video>` element. Default 'video-{$post_id}-{$instances}'.
            ]);
            ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>