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

        <!-- ---'category-Lastest Posts'--- -->
        <div class="section-header" style="margin-top: 2rem;">
        <h3 class="section-title"><?php single_post_title(); ?> - Latest Posts</h3>
        </div>

        <!-- Display child categories and posts within a single bigchunk -->
        <?php
        if ($child_categories) {
            echo '<div class="bigchunk" style="margin-top: 2px; padding-left:0; padding-right:0;">';

            // Display child categories and posts
            foreach ($child_categories as $child_category) {
                echo '<div class="row padding-10 rounded bordered" style="display: block;">';
                echo '<h4>' . $child_category->name . '</h4>';

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
                        <div class="col-md-12 col-sm-6" style="width:100%; padding-left:0px; padding-right:0px;">
                            <div class="post post-list clearfix" style="margin-bottom: 0px; display: flex; justify-content: space-between; align-items: center;">
                                <div class="thumb rounded" style="flex:1;">
                                    <a href="#">
                                        <div class="inner">
                                            <?php the_post_thumbnail(); ?> <!--line to display post thumbnail -->
                                        </div>
                                    </a>
                                </div>
                                <div class="details" style="flex:3; width:100%; padding-left: 0.5rem;">
                                    <ul class="meta list-inline mb-0">
                                        <li class="list-inline-item">
                                            <a href="#"> <?php get_template_part('includes/section', 'category'); ?></a>
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
