<?php

function oppahub_register_styles(){
    wp_enqueue_style('style-handle', get_stylesheet_uri());

}
add_action('wep_enqueue_scripts', 'oppahub_register_styles');

//search
function theme_setup() {
    add_theme_support('html5', array('search-form'));
}
add_action('after_setup_theme', 'theme_setup');


function load_css()
{
    wp_register_style('bootstrap', get_template_directory_uri(). '/assets/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootstrap');


    wp_register_style('style', get_template_directory_uri(). '/style.css', array(), false, 'all');
    wp_enqueue_style('style');

}
add_action('wep_enqueue_scripts', 'load_css');

function handle_custom_post_submission() {
    // Your post handling logic here
}

add_action('admin_post_custom_post_submission', 'handle_custom_post_submission');

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
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );
add_theme_support( 'post-thumbnails' );

?>