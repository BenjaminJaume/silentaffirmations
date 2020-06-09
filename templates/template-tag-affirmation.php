<?php

/*
Template Name: Tag
*/

get_header();

if (isset($_POST['tag'])) {
    $tag = $_POST['tag'];
    wp_redirect(get_site_url() . '/tag/' . $tag);
    exit;
} else {
    $header = "Location: " . get_site_url();
    header($header);

    exit();
}
