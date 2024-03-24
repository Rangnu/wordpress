<?php
// Include the header
include 'header.php';

// Get the current page information
$current_page = get_queried_object();

// Get the child categories of the current page using category slug
$child_categories = get_categories(array(
    'child_of' => get_cat_ID($current_page->post_name),
));

// Get the current tab
$current_tab = isset($_GET['tab']) ? $_GET['tab'] : 'all';

?>

<div class="container-xl mt-4">
    <!-- Current Hub Row -->   
    <div class="section-header" style="margin-top: 1.7rem;">
        <h1 class="section-title">
            <a href="<?php echo home_url('/' . $current_page->post_name . '/'); ?>">
                <?php single_post_title(); ?> Channel
            </a>
        </h1>
    </div>


    <!-- Post Lists of Current Hub Row -->
    <div class="row mt-3 pt-3 rounded bordered">

        <!-- Tab Navigation -->
        <ul class="nav nav-tabs nav-tabpills nav-tabfill" id="HubTab" role="tablist"
            style="padding-right: calc(var(--bs-gutter-x) * .5); padding-left: calc(var(--bs-gutter-x) * .5);">
            <!-- Default tab for all posts of parent category -->
            <li class="nav-item">
                <a class="nav-link<?php if ($current_tab == 'all') echo ' active'; ?>" id="all-tab"
                    data-bs-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All</a>
            </li>
            <!-- Tabs for child categories -->
            <?php
            foreach ($child_categories as $child_category) {
                echo '<li class="nav-item">';
                echo '<a class="nav-link' . ($current_tab == $child_category->slug ? ' active' : '') . '" id="' . $child_category->slug . '-tab" data-bs-toggle="tab" href="#' . $child_category->slug . '" role="tab" aria-controls="' . $child_category->slug . '" aria-selected="false">' . $child_category->name . '</a>';
                echo '</li>';
            }
            ?>
        </ul>
        <!-- Tab Content -->
        <div class="tab-content" id="HubTabContent">
            <!-- loader -->
            <div class="lds-dual-ring"></div>
            <!-- Default tab content for all posts of parent category -->
            <div class="tab-pane fade<?php if ($current_tab == 'all') echo ' show active'; ?>" id="all"
                role="tabpanel" aria-labelledby="all-tab">
                <?php
                // Pagination
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                // Query all posts in the current category
                $all_posts_args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => 15,
                    'paged'          => $paged,
                    'cat'            => $current_page->term_id, // Updated to use $current_page
                );
                $all_posts_query = new WP_Query($all_posts_args);

                // Display all posts
                if ($all_posts_query->have_posts()) :
                    while ($all_posts_query->have_posts()) : $all_posts_query->the_post();
                        // Insert HTML structure for displaying individual posts here
                        ?>
                        <hr style="margin-bottom: 1px; margin-top: 1px;">
                        <!-- Move the horizontal line above each post -->
                        <div class="col-md-12 col-sm-6" style="width:100%; padding-left:0px; padding-right:0px;">
                            <div class="post post-list-sm square"
                                style="margin-bottom: 0px; display: flex; justify-content: space-between; align-items: center;">
                                <div class="thumb rounded">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('post-thumbnail', array('class' => 'inner post-image64')); ?>
                                    </a>
                                </div>
                                <div class="details" style="flex:1.5; width:100%; padding-left: 0.7rem;">
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
                    endwhile;
                    wp_reset_postdata(); // Reset the post data

                    // Pagination for all posts
                    echo '<div class="pagination mt-3" id="pagination">';
                    echo paginate_links(array(
                        'base'      => add_query_arg(array('tab' => $current_tab, 'paged' => '%#%')),
                        'format'    => '?paged=%#%', // Remove the format parameter as we're using add_query_arg for base
                        'current'   => max(1, get_query_var('paged')),
                        'total'     => $all_posts_query->max_num_pages,
                        'prev_text' => __('&laquo; Previous'),
                        'next_text' => __('Next &raquo;'),
                    ));
                    echo '</div>'; // Close pagination

                else :
                    echo '<p>No posts found in this category.</p>';
                endif;
                ?>
            </div>
            <!-- Tabs for child category posts -->
            <?php
            foreach ($child_categories as $child_category) {
                echo '<div class="tab-pane fade' . ($current_tab == $child_category->slug ? ' show active' : '') . '" id="' . $child_category->slug . '" role="tabpanel" aria-labelledby="' . $child_category->slug . '-tab">';

                // Query posts for the current child category
                $args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => 15,
                    'cat'            => $child_category->term_id,
                );
                $query = new WP_Query($args);

                // Display posts
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        // Insert HTML structure for displaying individual posts here
                        ?>
                        <hr style="margin                        margin-bottom: 1px; margin-top: 1px;"> <!-- Move the horizontal line above each post -->
                        <div class="col-md-12 col-sm-6" style="width:100%; padding-left:0px; padding-right:0px;">
                            <div class="post post-list-sm square" style="margin-bottom: 0px; display: flex; justify-content: space-between; align-items: center;">
                                <div class="thumb rounded">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('post-thumbnail', array('class' => 'inner post-image64')); ?>
                                    </a>
                                </div>
                                <div class="details" style="flex:1.5; width:100%; padding-left: 0.7rem;">
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
                    endwhile;
                    wp_reset_postdata(); // Reset the post data

                    // Pagination for child category posts
                    echo '<div class="pagination mt-3" id="pagination">';
                    echo paginate_links(array(
                        'base'      => add_query_arg(array('tab' => $current_tab, 'paged' => '%#%')),
                        'format'    => '?paged=%#%', // Remove the format parameter as we're using add_query_arg for base
                        'current'   => max(1, get_query_var('paged')),
                        'total'     => $query->max_num_pages,
                        'prev_text' => __('&laquo; Previous'),
                        'next_text' => __('Next &raquo;'),
                    ));
                    echo '</div>'; // Close pagination

                else :
                    echo '<p>No posts found in this category.</p>';
                endif;

                echo '</div>'; // Close tab-pane
            }
            ?>
        </div>
    </div>
</div>

<script>
// Update URL and pagination when a tab is clicked
document.addEventListener('DOMContentLoaded', function() {
    var tabs = document.querySelectorAll('.nav-tabs .nav-link');
    tabs.forEach(function(tab) {
        tab.addEventListener('click', function() {
            var tabSlug = this.id.split('-')[0];
            var currentURL = window.location.href;
            
            // Remove existing tab and paged parameters from the URL
            var url = new URL(currentURL);
            url.searchParams.delete('tab');
            url.searchParams.delete('paged');
            
            // Append the new tab parameter
            url.searchParams.set('tab', tabSlug);
            
            // Update URL
            window.history.pushState({ path: url.href }, '', url.href);
            
            // Update pagination links with the new tab
            var paginationLinks = document.querySelectorAll('.pagination a');
            paginationLinks.forEach(function(link) {
                var href = new URL(link.href);
                href.searchParams.set('tab', tabSlug);
                link.href = href.toString();
            });
        });
    });
});

</script>



<?php
// Include the footer
include 'footer.php';
?>