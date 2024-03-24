<?php
// Get the current category
$current_category = get_queried_object();

// Check if $current_category is not null before accessing its properties
if ($current_category instanceof WP_Term) {
    // Display the name of the current category
    echo $current_category->name;
} else {
    echo "No category found.";
}
?>

<!-- Now, you can use this category name to query and display posts from this category -->
