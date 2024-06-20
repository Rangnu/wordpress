

<!-- main content  -->

<section class="main-content">
            <div class="container-xl">
                <div class="row gy-4">

                        <!-- left part 1st section  -->
                        <div class="col-md-6">
                            

                            <div class="padding-10 rounded bordered">
                                <div class="section-header">
                                    <h3 class="section-title">
                                        <a href="https://oppahub.com/c/news/">Oppa's News</a>
                                        <a href="https://oppahub.com/c/news/" title="button_to_link">
                                            <button>&gt;</button>
                                        </a>
                                    </h3>
                                </div>

                                <div class="garo2post">

                                    <?php
                                    // Query the latest two posts from the 'news' category
                                    $query_args = array(
                                        'post_type' => 'post',
                                        'posts_per_page' => 2,
                                        'category_name' => 'news',
                                        'orderby' => 'date',
                                        'order' => 'DESC',
                                    );

                                    $posts_query = new WP_Query($query_args);

                                    // Check if there are posts
                                    if ($posts_query->have_posts()) :
                                        while ($posts_query->have_posts()) : $posts_query->the_post();
                                    ?>

                                    <div class="post m-1">
                                        <?php
                                        $categories = get_the_category();
                                        if (!empty($categories)) {
                                            $category = $categories[0]; // Assuming the post is assigned to only one category
                                            $category_link = get_category_link($category);
                                        ?>
                                        
                                        <?php } ?>
                                        
                                        <div class="thumb rounded">
                                            <a href="<?php echo esc_url($category_link); ?>" class="category-badge position-absolute"><?php echo esc_html($category->name); ?></a>
                                            <?php
                                            // Check if the post has a featured image
                                            if (has_post_thumbnail()) {
                                                $thumbnail_id = get_post_thumbnail_id();
                                                $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'full')[0];
                                            } else {
                                                // If no featured image, use default image URL
                                                $thumbnail_url = get_template_directory_uri() . '/images/default-image.jpg';
                                            }
                                            ?>
                                            <a href="<?php the_permalink(); ?>">
                                                <div class="inner">
                                                    <img fetchpriority="low" loading="lazy" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>" class="post-image170">
                                                </div>
                                            </a>
                                        </div>


                                        
                                        <h4 class="post-title my-1" style="width: 100%; box-sizing: border-box;">
                                            <a href="<?php the_permalink(); ?>" style="display: block; max-width: 279px; vertical-align: middle; text-decoration: none;"><?php echo wp_trim_words( get_the_title(), 10, '...' ); ?></a>
                                        </h4>
                                        
                                        <ul class="meta list-inline mb-0">
                                            <li class="list-inline-item"><?php echo get_the_date(); ?></li>
                                        </ul>
                                    </div>
                                    
                                    <?php
                                        endwhile;
                                        wp_reset_postdata(); // Reset post data to the main loop
                                    else :
                                        // No posts found
                                        echo 'No posts found';
                                    endif;
                                    ?>  
                                </div>

                                        <?php
                                        // Query the latest six posts from the 'news' category
                                        $query_args = array(
                                            'post_type' => 'post',
                                            'posts_per_page' => 6,
                                            'category_name' => 'news',
                                            'orderby' => 'date',
                                            'order' => 'DESC',
                                        );

                                        $posts_query = new WP_Query($query_args);

                                        // Check if there are posts
                                        if ($posts_query->have_posts()) :
                                            $post_count = 0; // Counter to track the post number
                                        
                                            while ($posts_query->have_posts()) : $posts_query->the_post();
                                                $post_count++;
                                        
                                                if ($post_count <= 2) {
                                                    // Skip the first two posts as they have already been displayed
                                                    continue;
                                                }
                                        ?>
                                                <div class="post post-list-sm square before-seperator">
                                                <div class="thumb rounded" style="margin-right: 0.5rem;">
                                                    <?php if (has_post_thumbnail()) : ?>
                                                        <a href="<?php the_permalink(); ?>">
                                                            <div class="inner">
                                                                <?php
                                                                $thumbnail_id = get_post_thumbnail_id();
                                                                $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'full')[0];
                                                                ?>
                                                                <img fetchpriority="low" loading="lazy" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>" class="post-image74">
                                                            </div>
                                                        </a>
                                                    <?php else : ?>
                                                        <!-- Display default image -->
                                                        <div class="inner">
                                                            <img fetchpriority="low" loading="lazy" src="/images/default-image.jpg" alt="Default Image" class="post-image74">
                                                        </div>
                                                    <?php endif; ?>
                                                </div>

                                                    <div class="details clearfix">
                                                        <h4 class="post-title my-0">
                                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                        </h4>
                                                        <ul class="meta list-inline mb-0">
                                                            <li class="list-inline-item"><?php echo get_the_date(); ?></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                        <?php
                                            endwhile;
                                            wp_reset_postdata(); // Reset post data to the main loop
                                        else :
                                            // No posts found
                                            echo 'No posts found';
                                        endif;
                                        ?>

                                        
                                </div>
                        </div>

                        

                        <!-- right part 1st section  -->
                        <div class="col-md-6">
                            

                            <div class="padding-10 rounded bordered">
                                <div class="section-header" onclick="window.location='/c/interesting/';">
                                    <h3 class="section-title">
                                        <a href="/c/interesting/">Interesting as fuck</a>
                                        <a href="/c/interesting/" title="button_to_link">
                                            <button>&gt;</button>
                                        </a>
                                    </h3>
                                </div>

                                <div class="garo2post">

                                    <?php
                                    // Query the latest two posts from the 'interesting' category
                                    $query_args = array(
                                        'post_type' => 'post',
                                        'posts_per_page' => 2,
                                        'category_name' => 'interesting',
                                        'orderby' => 'date',
                                        'order' => 'DESC',
                                    );

                                    $posts_query = new WP_Query($query_args);

                                    // Check if there are posts
                                    if ($posts_query->have_posts()) :
                                        while ($posts_query->have_posts()) : $posts_query->the_post();
                                    ?>

                                    <div class="post m-1">
                                        <?php
                                        $categories = get_the_category();
                                        if (!empty($categories)) {
                                            $category = $categories[0]; // Assuming the post is assigned to only one category
                                            $category_link = get_category_link($category);
                                        ?>
                                        
                                        <?php } ?>
                                        
                                        <div class="thumb rounded">
                                            <a href="<?php echo esc_url($category_link); ?>" class="category-badge position-absolute"><?php echo esc_html($category->name); ?></a>
                                            <?php
                                            // Check if the post has a featured image
                                            if (has_post_thumbnail()) {
                                                $thumbnail_id = get_post_thumbnail_id();
                                                $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'full')[0];
                                            } else {
                                                // If no featured image, use default image URL
                                                $thumbnail_url = get_template_directory_uri() . '/images/default-image.jpg';
                                            }
                                            ?>
                                            <a href="<?php the_permalink(); ?>">
                                                <div class="inner">
                                                    <img fetchpriority="low" loading="lazy" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>" class="post-image170">
                                                </div>
                                            </a>
                                        </div>

                                        
                                        <h4 class="post-title my-1" style="width: 100%; box-sizing: border-box;">
                                            <a href="<?php the_permalink(); ?>" style="display: block; max-width: 279px; vertical-align: middle; text-decoration: none;"><?php the_title(); ?></a>
                                        </h4>
                                        
                                        <ul class="meta list-inline mb-0">
                                        <li class="list-inline-item"><?php echo get_the_date(); ?></li>
                                        </ul>
                                    </div>
                                    
                                    <?php
                                        endwhile;
                                        wp_reset_postdata(); // Reset post data to the main loop
                                    else :
                                        // No posts found
                                        echo 'No posts found';
                                    endif;
                                    ?>  
                                </div>

                                        <?php
                                        // Query the latest six posts from the 'interesting' category
                                        $query_args = array(
                                            'post_type' => 'post',
                                            'posts_per_page' => 6,
                                            'category_name' => 'interesting',
                                            'orderby' => 'date',
                                            'order' => 'DESC',
                                        );

                                        $posts_query = new WP_Query($query_args);

                                        // Check if there are posts
                                        if ($posts_query->have_posts()) :
                                            $post_count = 0; // Counter to track the post number
                                        
                                            while ($posts_query->have_posts()) : $posts_query->the_post();
                                                $post_count++;
                                        
                                                if ($post_count <= 2) {
                                                    // Skip the first two posts as they have already been displayed
                                                    continue;
                                                }
                                        ?>
                                                <div class="post post-list-sm square before-seperator">
                                                    <div class="thumb rounded" style="margin-right: 0.5rem;">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <div class="inner">
                                                                <?php
                                                                $thumbnail_id = get_post_thumbnail_id();
                                                                $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'full')[0];
                                                                ?>
                                                                <img fetchpriority="low" loading="lazy" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>" class="post-image74">
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="details clearfix">
                                                        <h4 class="post-title my-0">
                                                            <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 10, '...' ); ?></a>
                                                        </h4>
                                                        <ul class="meta list-inline mb-0">
                                                            <li class="list-inline-item"><?php echo get_the_date(); ?></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                        <?php
                                            endwhile;
                                            wp_reset_postdata(); // Reset post data to the main loop
                                        else :
                                            // No posts found
                                            echo 'No posts found';
                                        endif;
                                        ?>

                                        
                                </div>
                        </div>
                        
                        
                        <div class="padding-10 rounded bordered">

                            <!-- display-horizon -->
                            <ins class="adsbygoogle"
                                 style="display:block"
                                 data-ad-client="deleted_for_privacy"
                                 data-ad-slot="deleted_for_privacy"
                                 data-ad-format="auto"
                                 data-full-width-responsive="true"></ins>
                            <script>
                                 (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div>

                        <!-- <div class="spacer" data-height="50"></div> -->

                        <!-- Latest posts -->
                        <div class="padding-10 rounded bordered" style="display: block;">
                        <div class="section-header">
                        <h3 class="section-title">
                            <a href="https://oppahub.com/all_posts/">Latest Posts</a>
                            <a href="https://oppahub.com/all_posts/" title="button_to_link">
                                <button>&gt;</button>
                            </a>
                        </h3>

                        </div>


                            <?php
                            // Pagination
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 12,
                                'paged' => $paged,
                            );
                            $query = new WP_Query($args);
                        
                            // The Loop
                            if ($query->have_posts()) :
                                while ($query->have_posts()) : $query->the_post();
                                    ?>
                                    <div class="col-md-12 col-sm-6" style="width:100%; padding-left:0px;padding-right:0px;">
                                        <!-- post  -->
                                        <div class="post post-list clearfix" style="margin-bottom : 0px; display :flex; justify-content:space-between; align-items: center;">
                                        <div class="thumb rounded" style="flex:1;">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <a href="<?php the_permalink(); ?>">
                                                    <div class="inner">
                                                        <?php
                                                        $thumbnail_id = get_post_thumbnail_id();
                                                        $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'full')[0];
                                                        ?>
                                                        <img fetchpriority="low" loading="lazy" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>" class="post-image194">
                                                    </div>
                                                </a>
                                            <?php else : ?>
                                                <!-- Display default image -->
                                                <div class="inner">
                                                    <img fetchpriority="low" loading="lazy" src="/images/default-image.jpg" alt="Default Image" class="post-image194">
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                            

                                            <div class="details" style=" flex:1.5; width:100%; padding-left: 0.5rem; ">
                                                <ul class="meta list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="#">
                                                            <img src="/wp-content/themes/oppahub/images/other/author-sm.png" class="author" alt="">
                                                            OppaHub
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <?php
                                                        $categories = get_the_category();
                                                        if (!empty($categories)) {
                                                            echo esc_html($categories[0]->name);
                                                        }
                                                        ?>
                                                    </li>
                                                    <li class="list-inline-item"><?php the_date(); ?></li>
                                                </ul>
                                                <h4 class="post-tile" style="margin-bottom: 1%;">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="margin-bottom: 1px; margin-top: 0px;">
                            <?php endwhile; ?>
                            <!-- Pagination links -->
                            <div class="op-pagination">
                                <section class="px-0 py-2 w-100">
                                    <nav class="navigation pagination" aria-label="Posts navigation">
                                        <h2 class="screen-reader-text">Posts navigation</h2>
                                        <div class="op-nav-links">
                                            <ul class="pagination m-0 p-0">    
                                                <?php
                                                $big = 999999999; // need an unlikely integer
                                                // Get the paginated links
                                                $paginate_links = paginate_links(array(
                                                    'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                                                    'format'    => '?paged=%#%',
                                                    'current'   => max(1, get_query_var('paged')),
                                                    'total'     => $query->max_num_pages,
                                                    'prev_text' => __('&laquo; Previous'),
                                                    'next_text' => __('Next &raquo;'),
                                                    'type'      => 'array', // Output links as an array to customize them
                                                    'prev_next' => true,
                                                    'end_size'  => 1,
                                                    'mid_size'  => 2,
                                                ));
                                            
                                                // Loop through the paginated links and output with custom classes
                                                if ($paginate_links) {
                                                    foreach ($paginate_links as $link) {
                                                        // Add custom class to the current page link
                                                        if (strpos($link, 'current') !== false) {
                                                            echo '<li class="page-item active">' . str_replace('page-numbers', 'page-link current', $link) . '</li>';
                                                        } else {
                                                            echo '<li class="page-item">' . str_replace('page-numbers', 'page-link', $link) . '</li>';
                                                        }
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </nav>
                                    <?php wp_reset_postdata(); ?>
                                    <?php else : ?>
                                        <p><?php esc_html_e('No posts found.'); ?></p>
                                    <?php endif; ?>
                                </section>
                            </div>


                                
                        <!-- left part over here  -->
                    
                    
            </div>
        </section>
