<?php
// Include the header
get_header();

// Get the current page information
$current_page = get_queried_object();

// Get the child categories of the current page using category slug
$child_categories = get_categories(array(
    'child_of' => get_cat_ID($current_page->post_name),
));

?>

<div class="container-xl mt-3">
    <div class="row gy-4">

        <!-- ---'category-Latest Posts'--- -->
        <div class="section-header" style="margin-top: 2rem;">
            <h3 class="section-title"><?php single_post_title(); ?></h3>
        </div>

        <!-- Display child categories and posts within a single bigchunk -->
        <?php
        if ($child_categories) {
            echo '<div class="bigchunk" style="display:block; margin-top: 2px; padding-left:0; padding-right:0;">';

            // Display child categories and posts
            $count = 0; // Counter to track child categories
            foreach ($child_categories as $child_category) {
                // Start a new row every 2 child categories
                if ($count % 2 == 0) {
                    if ($count > 0) {
                        echo '</div>'; // Close the previous row
                    }
                    echo '<div class="row gy-4">'; // Start a new row
                }

                echo '<div class="col-md-6">'; // Use col-md-6 for two child categories in a row
                echo '<div class="row padding-10 rounded bordered" style="display: block;">';
                echo '<h4 style="font-size: 25px; margin-bottom: 14px; margin-top: 14px;">';
echo '<a href="' . get_category_link($child_category->term_id) . '">';
echo $child_category->name;
echo '<span class="category-arrow" style="float:right;">&gt;</span></a></h4>';


                // Get posts from the child category
                $args = array(
                    'category__in' => $child_category->term_id,
                    'posts_per_page' => 6,
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) {
                    // Loop through posts and display them
                    while ($query->have_posts()) {
                        $query->the_post();
                        ?>
                        <hr style="margin-bottom: 1px; margin-top: 1px;"> <!-- Move the horizontal line above each post -->
                        <div class="col-md-12 col-sm-6" style="width:100%; padding-left:0px; padding-right:0px;">
                            <div class="post post-list clearfix" style="margin-bottom: 0px; display: flex; justify-content: space-between; align-items: center;">
                                <div class="thumb rounded" style="flex:1;">
                                    <a href="#">
                                        <div class="inner">
                                            <?php the_post_thumbnail(); ?> <!--line to display post thumbnail -->
                                        </div>
                                    </a>
                                </div>
                                <div class="details" style="flex:3; width:100%; padding-left: 0.7rem;">
                                    <ul class="meta list-inline mb-0">
                                        <li class="list-inline-item">
                                            <?php
                                            // Get the categories for the current post
                                            $categories = get_the_category();

                                            if ($categories) {
                                                $category = $categories[0]; // Display only the first category
                                            
                                                echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                                                // You can add additional styling or separator here if needed
                                            } else {
                                                echo 'Uncategorized';
                                            }
                                            ?>
                                        </li>

                                        <li class="list-inline-item"><?php echo get_the_date(); ?></li>
                                    </ul>
                                    <h5 class="post-tile" style="margin-bottom: 1%;">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    wp_reset_postdata(); // Reset the post data
                } else {
                    echo '<p>No posts found in this category.</p>';
                }

                echo '</div>'; // Close the row
                echo '</div>'; // Close the col-md-6
                $count++;
            }

            echo '</div>'; // Close the bigchunk
        } else {
            echo '<p>No child categories found for this page.</p>';
        }
        ?>

        <div class="text-center">
            <button class="btn btn-simple">Load More</button>
        </div>

    </div>
</div>

<?php
// Include the footer
get_footer();
?>
