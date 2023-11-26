<?php
// Get the current category
$current_category = get_queried_object();

// Display the name of the current category
echo $current_category->name;
?>

<!-- Now, you can use this category name to query and display posts from this category -->