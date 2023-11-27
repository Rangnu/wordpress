
<?php
// Include the header
include 'header.php';

// Get the current category
$current_category = get_queried_object();
?>
?>



        <!-- main content  -->

        <section class="main-content">
            <div class="container-xl">
                <div class="row gy-4" style="display:flex;">

                        <!-- left part 1st section  -->
                    
                        <div class="each-section">

                            <div class="padding-10 rounded bordered">

                                <div class="section-header" onclick="window.location='<?php echo home_url(); ?>';">
                                    <h3 class="section-title"><?php single_cat_title(); ?><button title="button_to_link">></button></h3>
                                </div>

                                

                                <div class="garo2post">
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

                                        <div class="post m-1">
                                            <div class="thumb rounded">
                                                        <!-- ---get category--- -->
                                                    <?php
                                                    $category = get_the_category();
                                                    if (!empty($category)) {
                                                        echo '<a href="' . esc_url(get_category_link($category[0]->term_id)) . '" class="category-badge" style="position:absolute;">' . esc_html($category[0]->name) . '</a>';
                                                    }
                                                    ?>
                                                    
                                                <a href="#">
                                                    <div class="inner">
                                                        <?php the_post_thumbnail(); ?>
                                                    </div>
                                                </a>
                                            </div>

                                            <h4 class="post-title my-1" style="width: 100%; box-sizing: border-box;">
                                                <a href="<?php the_permalink(); ?>" style="display: block; vertical-align: middle; text-decoration: none;"><?php echo esc_html($post_title); ?></a>
                                            </h4>

                                            <ul class="meta list-inline mb-0">
                                                <li class="list-inline-item"><?php echo get_the_date(); ?></li>
                                            </ul>
                                        </div>


                                </div>
                                <div class="post post-list-sm square before-seperator">
                                    <div class="thumb rounded">
                                        <a href="#">
                                            <div class="inner">
                                                <img src="/wp-content/themes/oppahub/images/posts/tren-sm-1.jpg" alt="">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0">
                                            <a href="#">IPL 2023 to resume in sept 3rd week in UAE</a>
                                        </h6>
                                        <ul class="meta list-inline mb-0">
                                            <li class="list-inline-item">10 Nov 2023</li>
                                        </ul>
                                    </div>
                                </div>
                                    <div class="post post-list-sm square before-seperator">
                                        <div class="thumb rounded">
                                            <a href="#">
                                                <div class="inner">
                                                    <img src="/wp-content/themes/oppahub/images/posts/tren-sm-2.jpg" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0">
                                                <a href="#">HDFC Bank concerned over retail asset quality in
                                                    near-term</a>
                                            </h6>
                                            <ul class="meta list-inline mb-0">
                                                <li class="list-inline-item">10 Nov 2023</li>
                                            </ul>
                                        </div>
                                    </div>




                                

                                
                                    

                                    <div class="post post-list-sm square before-seperator">
                                        <div class="thumb rounded">
                                            <a href="#">
                                                <div class="inner">
                                                    <img src="/wp-content/themes/oppahub/images/posts/tren-sm-3.jpg" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0">
                                                <a href="#">Arogya ap to display vaccination status</a>
                                            </h6>
                                            <ul class="meta list-inline mb-0">
                                                <li class="list-inline-item">10 Nov 2023</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="post post-list-sm square before-seperator">
                                        <div class="thumb rounded">
                                            <a href="#">
                                                <div class="inner">
                                                    <img src="/wp-content/themes/oppahub/images/posts/tren-sm-4.jpg" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0">
                                                <a href="#">Petrol, diesel prices hiked again today.</a>
                                            </h6>
                                            <ul class="meta list-inline mb-0">
                                                <li class="list-inline-item">10 Nov 2023</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <?php
                                        endwhile;
                                        wp_reset_query(); // Reset the query
                                    else :
                                        echo 'No posts found.';
                                    endif;
                                    ?>
                            </div>
                        </div>
                    
                        
                </div>
                    
                    
            </div>
        </section>

<?php
// Include the footer
include 'footer.php';
?>