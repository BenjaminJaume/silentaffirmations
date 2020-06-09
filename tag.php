<?php

get_header();

$tag = get_queried_object();
echo $tag->slug;

get_footer();
