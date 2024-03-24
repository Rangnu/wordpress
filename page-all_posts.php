<?php
// Include the header
include 'header.php';

// Get the current category
$current_category = get_queried_object();
?>

<div class="container-xl mt-3">
    <div class="row gy-4">

        <!-- ---'category-Lastest Posts'--- -->
        <div class="section-header" style=" margin-top : 2rem;">
            <h3 class="section-title"><?php single_cat_title(); ?> Latest Posts</h3>
        </div>

        <!-- ---posts line--- -->
        <div class="bigchunk" style="margin-top: 3.5%; padding-left:0; padding-right:0;">
            <div class="row padding-10 rounded bordered" style="display: block;">

                <!-- Display posts from the current category -->
                <?php
                $paged = get_query_var('paged') ? get_query_var('paged') : 1;

                $args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => 25,
                    'paged'          => $paged,
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        ?>

                        <!-- Your post HTML structure goes here -->
                        <div class="col-md-12 col-sm-6" style="width:100%; padding-left:0px;padding-right:0px;">
                            <!-- post  -->
                            <!-- ------------------------- -->
                            <div class="post post-list clearfix" style="margin-bottom : 0px; display :flex; justify-content:space-between; align-items: center;">
                                <div class="thumb rounded" style="flex:1;">
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="inner">
                                            <?php the_post_thumbnail('post-thumbnail', array('class' => 'post-image130')); ?>
                                        </div>
                                    </a>
                                </div>

                                <div class="details" style=" flex:1.5; width:100%; padding-left: 0.5rem; ">
                                    <ul class="meta list-inline mb-0">
                                        <li class="list-inline-item">
                                            <a href="#"> <?php get_template_part('includes/section', 'category'); ?>
                                            </a>
                                        </li>
                                        <li class="list-inline-item"><?php echo get_the_date(); ?></li>
                                    </ul>
                                    <h5 class="post-tile" style="margin-bottom: 1%;">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h5>
                                </div>

                            </div>
                        </div>
                        <hr style="margin-bottom: 1px;">
                    <?php
                    endwhile;
                    wp_reset_query(); // Reset the query
                else :
                    echo 'No posts found.';
                endif;
                ?>

                <div class="col-md-12 col-sm-6" style="width:100%; padding-left:0px;padding-right:0px;">
                    <!-- Pagination links -->
                    <div class="pagination">
                        <?php
                        global $wp_query;
                        $big = 999999999; // need an unlikely integer
                        echo paginate_links(array(
                            'base'    => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                            'format'  => '?paged=%#%',
                            'current' => max(1, get_query_var('paged')),
                            'total'   => $query->max_num_pages,  // Use $query instead of $wp_query
                            'prev_text' => __('&laquo; Previous'),
                            'next_text' => __('Next &raquo;'),
                        ));
                        
                        ?>
                    </div>
                </div>
            </div>
            <?php
            // Include the oppasidebar
            include 'oppasidebar.php';
            ?>
        </div>

    </div>
    <!-- left part over here  -->

</div>

<?php
// Include the footer
include 'footer.php';
?>