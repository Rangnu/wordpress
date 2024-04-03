<?php
// Include the header
include 'header.php';
?>

<!-- Main content for the front page -->
<main>
    <!-- section starts  -->
        <section id="hero">
            <div class="container-xl">
                <div class="row gy-4">
                    <div class="col-lg-8sebu">

                        <?php
                        // Query to get a random post
                        $random_args = array(
                            'post_type'      => 'post',
                            'posts_per_page' => 1,
                            'orderby'        => 'rand', // Get a random post
                        );

                        $random_post = new WP_Query($random_args);

                        // Check if there is a random post
                        if ($random_post->have_posts()) {
                            $random_post->the_post();
                        
                        $categories = get_the_category();
                        if (!empty($categories)) {
                            $category = $categories[0]; // Assuming the post is assigned to only one category
                            $category_link = get_category_link($category);
                        }
                        ?>
                        <div class="post featured-post-lg">
                            <a href="<?php the_permalink(); ?>">
                                <div class="thumb rounded inner">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        // Output the post thumbnail without any additional wrapping
                                        echo '<img fetchpriority="high" loading="eager" src="' . esc_url(get_the_post_thumbnail_url(get_the_ID())) . '" alt="" style="width: 100%;">';
                                    } else {
                                        // You can add a default image if there is no featured image
                                        echo '<img fetchpriority="high" loading="eager" src="' . get_template_directory_uri() . '/images/default-image.jpg" alt="" style="width: 100%; height: 100%;">';
                                    }
                                    ?>
                                </div>
                            </a>  

                                

                                
                            <div class="details clearfix">
                                <a href="<?php echo esc_url($category_link); ?>" class="category-badge"><?php echo esc_html($category->name); ?></a>
                                <h1 class="post-title" style="color: #203656; font-family: 'Poppins', sans-serif; font-weight: 700; line-height: 1.4; margin: 2% 0;">
                                    <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 7, '...' ); ?></a>
                                </h1>
                                <ul class="meta list-inline mb-0">
                                    <li class="list-inline-item">
                                        <a href="#"><?php the_author(); ?></a>
                                    </li>
                                    <li class="list-inline-item"><?php echo get_the_date(); ?></li>
                                </ul>
                            </div>
                    </div>
                
                        <?php
                        // Reset Post Data
                        wp_reset_postdata();
                        }
                        ?>

                    <div class="col-lg-4sebu">
                        <div class="post-tabs rounded bordered" style="padding-bottom: 5px;">
                            <ul class="nav nav-tabs nav-pills nav-fill" id="postTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button aria-controls="recent" aria-selected="false" class="nav-link active"
                                        data-bs-target="#recent" data-bs-toggle="tab" id="recent-tab" role="tab"
                                        type="button">
                                        Recent
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button aria-controls="popular" aria-selected="true" class="nav-link"
                                        data-bs-target="#popular" data-bs-toggle="tab" id="popular-tab" role="tab"
                                        type="button">
                                        Popular
                                    </button>
                                </li>
                            </ul>

                            <!-- content  -->
                            <div class="tab-content" id="postsTabContent">
                                <!-- loader -->
                                <div class="lds-dual-ring"></div>
                                <!-- pop post  -->

                                <!-- popular -->
                                <div class="tab-pane fade" id="popular" aria-labelledby="popular-tab" role="tabpanel">
                                    <?php
                                    // Query to get 4 random posts for the "Popular" section
                                    $random_popular_args = array(
                                        'post_type'      => 'post',
                                        'posts_per_page' => 4,
                                        'orderby'        => 'rand', // Get random posts
                                    );
                                
                                    $random_popular_posts = new WP_Query($random_popular_args);
                                
                                    // Loop through the random popular posts
                                    while ($random_popular_posts->have_posts()) : $random_popular_posts->the_post();
                                
                                    $categories = get_the_category();
                                    if (!empty($categories)) {
                                        $category = $categories[0]; // Assuming the post is assigned to only one category
                                        $category_link = get_category_link($category);
                                    }
                                    ?>
                                        <!-- post -->
                                        <div class="post post-list-sm circle">
                                            <div class="thumb rounded">
                                                <a href="<?php the_permalink(); ?>">
                                                    <div class="inner">
                                                        <?php
                                                        if (has_post_thumbnail()) {
                                                            // Output the post thumbnail without any additional wrapping
                                                            echo '<img fetchpriority="high" loading="eager" src="' . esc_url(get_the_post_thumbnail_url(get_the_ID())) . '" alt="" width="168px" height="100%">' ;
                                                        } else {
                                                            // You can add a default image if there is no featured image
                                                            echo '<img fetchpriority="high" loading="eager" src="' . get_template_directory_uri() . '/images/default-image.jpg" alt="" style="width:100%; height: 100%;">';
                                                        }
                                                        ?>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="details clearfix">
                                                <div class="onthetitle">
                                                    <a href="<?php echo esc_url($category_link); ?>" class="category-badge"><?php echo esc_html($category->name); ?></a>
                                                    <ul class="meta list-inline px-2 mb-0">
                                                        <!-- <li class="list-inline-item"><?php //echo get_the_date(); ?></li> -->
                                                    </ul>
                                                </div>
                                                <h4 class="post-title my-0 pt-1">
                                                    <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 10, '...'); ?></a>
                                                </h4>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                                    
                                    <!-- Reset Post Data for random popular posts -->
                                    <?php wp_reset_postdata(); ?>
                                </div>
                                                    

                                <!-- recent  -->
                                <div class="tab-pane fade show active" id="recent" aria-labelledby="recent-tab" role="tabpanel">
                                    <?php
                                    // Query to get the 4 most recent posts
                                    $args = array(
                                        'post_type'      => 'post',
                                        'posts_per_page' => 4,
                                        'orderby'        => 'date',
                                        'order'          => 'DESC',
                                    );
                                    $recent_posts = new WP_Query($args);
                                
                                    // Loop through the recent posts
                                    while ($recent_posts->have_posts()) : $recent_posts->the_post();
                                
                                    $categories = get_the_category();
                                    if (!empty($categories)) {
                                        $category = $categories[0]; // Assuming the post is assigned to only one category
                                        $category_link = get_category_link($category);
                                    }
                                    ?>
                                        <!-- post  -->
                                        <div class="post post-list-sm circle">
                                            <div class="thumb rounded">
                                                <a href="<?php the_permalink(); ?>">
                                                    <div class="inner">
                                                        <?php
                                                        if (has_post_thumbnail()) {
                                                            // Output the post thumbnail without any additional wrapping
                                                            echo '<img fetchpriority="low" loading="lazy" src="' . esc_url(get_the_post_thumbnail_url(get_the_ID())) . '" alt="" style="width:100%; height: 100%;">';
                                                        } else {
                                                            // You can add a default image if there is no featured image
                                                            echo '<img fetchpriority="low" loading="lazy" src="' . get_template_directory_uri() . '/images/default-image.jpg" alt="" style="width:100%; height: 100%;">';
                                                        }
                                                        ?>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="details clearfix">
                                                <div class="onthetitle">
                                                    <a href="<?php echo esc_url($category_link); ?>" class="category-badge"><?php echo esc_html($category->name); ?></a>
                                                    <!-- <ul class="meta list-inline px-2 mb-0">
                                                        <li class="list-inline-item"><?php// echo get_the_date(); ?></li>
                                                    </ul> -->
                                                </div>
                                                <h4 class="post-title my-0 pt-1">
                                                    <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 10, '...' ); ?></a>
                                                </h4>

                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                                    
                                    <!-- Reset Post Data -->
                                    <?php wp_reset_postdata(); ?>
                                </div>

                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </section>
    <!-- Add more sections or content as needed -->
</main>


<?php
// Include the main
include 'main.php';
?>

<?php
// Include the footer
include 'footer.php';
?>