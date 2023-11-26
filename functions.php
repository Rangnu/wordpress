<?php

function oppahub_register_styles(){
    wp_enqueue_style('style-handle', get_stylesheet_uri());

}

function load_css()
{
    wp_register_style('bootstrap', get_template_directory_uri(). '/assets/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootstrap');


    wp_register_style('style', get_template_directory_uri(). '/style.css', array(), false, 'all');
    wp_enqueue_style('style');

}


$categories = get_the_category();

if (!empty($categories)) {
    echo $categories[0]->name;  // Display the name of the first category
}

// -----------excerpt length--------
$excerpt = get_the_excerpt(); 

$excerpt = substr( $excerpt, 0, 260 ); // Only display first 260 characters of excerpt
$result = substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );
echo $result;
// -----------------------

add_theme_support( 'post-thumbnails' );
add_action('wep_enqueue_scripts', 'load_css');
add_action('wep_enqueue_scripts', 'oppahub_register_styles');
?>