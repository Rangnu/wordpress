
<?php
// Get the current page information
$current_page = get_queried_object();

// Get the parent category ID
$parent_category_id = $current_page->parent != 0 ? $current_page->parent : $current_page->term_id;

// Get the parent category information
$parent_category = get_category($parent_category_id);

// Get the child categories of the current page
$child_categories = get_categories(array(
    'child_of' => $parent_category_id,
));

// Check if the current page is a child category
$is_child_category = $current_page->parent != 0;

?>


        <!-- parent-category- Channel -->
        <div class="section-header" style="margin-top: 1.7rem;">
            <h1 class="section-title">
                <a href="<?php echo get_category_link($parent_category_id); ?>">
                    <?php echo $parent_category->name; ?> Channel
                </a>
            </h1>
        </div>
        
        <!-- Filter buttons -->
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <button style="max-width: 150px;" type="button" class="btn btn-primary <?php echo $is_child_category ? '' : 'active'; ?>" onclick="window.location.href='<?php echo get_category_link($parent_category_id); ?>';">All</button>
            <?php foreach ($child_categories as $category) : ?>
                <button style="max-width: 150px;" type="button" class="btn btn-primary <?php echo $current_page->term_id == $category->term_id ? 'active' : ''; ?>" onclick="window.location.href='<?php echo get_category_link($category->term_id); ?>';"><?php echo $category->name; ?></button>
            <?php endforeach; ?>
        </div>


        <!-- ---posts line--- -->
        <div class="row padding-10 rounded bordered" style="display: block;">
            <?php
            // Pagination
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => 15,
                'paged'          => $paged,
            );

            // If it's a child category, filter posts by its ID
            if ($is_child_category) {
                $args['cat'] = $current_page->term_id;
            } else {
                $args['cat'] = $parent_category_id;
            }

            $query = new WP_Query($args);

            // The Loop
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
            ?>
                <!-- Your post HTML structure goes here -->
                <div class="col-md-12 col-sm-6" style="padding: .3rem .0rem;">
                    <!-- post  -->
                    <!-- ------------------------- -->
                    <div class="post post-list-sm square">
                        <div class="thumb rounded" style="margin-right: 0.5rem;">
                            <a href="<?php the_permalink(); ?>">
                                <div class="inner" style="max-width: 120px;">
                                    <?php
                                    // Fixed typo: get_post_thumbnail_i() to get_post_thumbnail_id()
                                    $thumbnail_id = get_post_thumbnail_id();
                                    $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'full')[0];
                                    ?>
                                    <!-- Fixed typo: scr to src -->
                                    <img fetchpriority="low" loading="lazy" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>" class="post-image64" style="max-width: 120px; height :64px; object-fit: cover;">
                                </div>
                            </a>
                        </div>

                        <div class="details clearfix">
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
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?><?php
                                    // Get the number of comments for the current post
                                    $comment_count = get_comments_number();
                                    // Display comment count if it's greater than zero
                                    if ($comment_count > 0) {
                                        echo '<span style="color: #tomato;"> [' . $comment_count . ']</span>';
                                    }
                                    ?>
                                </a>
                            </h5>
                        </div>
                    </div>
                </div>
                <hr style="margin-bottom: 1px;">
            <?php endwhile; ?>

            <div class="clearfix mb-3">
                <button class="btn btn-primary" style="float: left;">search</button>
                <button class="btn btn-primary" style="float: right;">post</button>
            </div>
            <!-- Pagination links -->
            <div class="post" style="align-items: center;">
                <div class="pagination">
                    <?php
                    $big = 999999999; // need an unlikely integer

                    echo paginate_links(array(
                        'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format'    => '?paged=%#%',
                        'current'   => max(1, get_query_var('paged')),
                        'total'     => $query->max_num_pages,
                        'prev_text' => __('&laquo; Previous'),
                        'next_text' => __('Next &raquo;'),
                    ));
                    ?>
                </div>
                <?php wp_reset_postdata(); ?>
                <?php else : ?>
                    <p><?php esc_html_e('No posts found.'); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <!-- sidebar  -->    
