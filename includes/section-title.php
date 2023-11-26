<!-- includes/section-title.php -->

<?php
// Create a new query for a single post
$args = array(
    'posts_per_page' => 1, // Display only one post
);

$query = new WP_Query($args);

// Check if there are posts
if ($query->have_posts()) {
    // Loop through the posts
    while ($query->have_posts()) : $query->the_post();
        // Display the title
        the_title('<h2>', '</h2>');
    endwhile;

    // Reset post data
    wp_reset_postdata();
} else {
    // No posts found
    echo 'No posts found.';
}
?>