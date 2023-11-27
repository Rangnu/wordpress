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
            <h3 class="section-title"><?php single_cat_title(); ?> - Latest Posts</h3>
        </div>

        <!-- ---posts line--- -->
        <div class="bigchunk" style="margin-top: 2px; padding-left:0; padding-right:0;">
            <div class="row padding-10 rounded bordered" style="display: block;">

                <!-- Display posts from the current category -->
                <?php
                $category_slug = get_queried_object()->slug;
                $args = array(
                    'category_name' => $category_slug,
                    'posts_per_page' => -1,
                );
                
                    $query = new WP_Query($args);
                    
                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post();
                    ?>

                    <!-- Your post HTML structure goes here -->
                    <div class="col-md-12 col-sm-6" style="width:100%; padding-left:0px;padding-right:0px;">
                        <!-- post  -->
                        <!-- ------------------------- -->
                        <!-- ------------------------- -->
                        <div class="post post-list clearfix" style="margin-bottom : 0px; display :flex; justify-content:space-between; align-items: center;">
                            <div class="thumb rounded" style="flex:1;">
                                <!-- <span class="post-format-sm">
                                    <i class="icon-picture"></i>
                                </span> -->
                                <a href="#">
                                    <div class="inner" >
                                        <?php the_post_thumbnail(); ?> <!--line to display post thumbnail -->
                                    </div>
                                </a>
                            </div>
                            <div class="details" style=" flex:3; width:100%; padding-left: 0.5rem; ">
                                <ul class="meta list-inline mb-0">
                                    <!-- <li class="list-inline-item">
                                        <a href="#">
                                            <img src="/wp-content/themes/oppahub/images/other/author-sm.png" class="author" alt="">
                                            OppaHub
                                        </a>
                                    </li> -->
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


                                <!-- <div class="post-bottom clearfix d-flex align-items-center" style=" margin-top: 2px;">
                                    <div class="social-share me-auto">
                                        <button class="toggle-button icon-share"></button>
                                        <ul class="icons list-unstyled list-inline mb-0">
                                            <li class="list-inline-item">
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#"><i class="fab fa-pinterest"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#"><i class="fab fa-telegram-plane"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#"><i class="far fa-envelope"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="more-button float-end">
                                        <a href="#"><span class="icon-options"></span></a>
                                    </div>
                                </div> -->
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

                <div class="text-center">
                    <button class="btn btn-simple">Load More</button>
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