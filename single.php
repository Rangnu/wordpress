<?php get_header(); ?>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<section class="main-content">
    <div class="container-xl">
        <div class="row gy-4">
            <div id="primary" class="bigchunk" style="padding-left: 0; padding-right: 0;">
                <main id="main" class="padding-10 rounded bordered">

                    <?php
                    $category = get_the_category();
                    while (have_posts()) : the_post();
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                            <header class="entry-header">
                                <?php
                                    $category = get_the_category();
                                    if (!empty($category)) {
                                        echo '<a href="' . esc_url(get_category_link($category[0]->term_id)) . '" class="category-badge">' . esc_html($category[0]->slug) . '</a>';
                                    }
                                ?>
                                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                                <div class="entry-meta" style="justify-content:space-between; display:inline-flex">
                                    <ul class="meta list-inline mb-0 px-1"></ul>
                                    <?php
                                    echo 'Posted on ' . get_the_date() . ' by ' . get_the_author();
                                    ?>
                                </div>
                            </header>
                            <hr style="margin-bottom: 1%;margin-top: 1%;">

                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div>
                            <ins class="adsbygoogle"
                                 style="display:block; text-align:center;"
                                 data-ad-layout="in-article"
                                 data-ad-format="fluid"
                                 data-ad-client="ca-pub-2390907231823910"
                                 data-ad-slot="4591372731"></ins>
                            <script>
                                 (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                            <footer class="entry-footer">
                                <?php
                                if (comments_open() || get_comments_number()) :
                                    comments_template();
                                endif;
                                ?>
                            </footer>
                            
                            <div class="clearfix mb-3">
                                <?php if (is_user_logged_in()) : ?>
                                    <a class="btn btn-secondary" style="float: left;" href="<?php echo get_edit_post_link(); ?>">Edit</a>
                                    <a class="btn btn-secondary" style="float: right;" href="<?php echo admin_url('post-new.php'); ?>">New Post</a>
                                <?php else : ?>
                                    <a class="btn btn-secondary" style="float: left;" href="https://oppahub.com/login/">Edit</a>
                                    <a class="btn btn-secondary" style="float: right;" href="https://oppahub.com/login/">New Post</a>
                                <?php endif; ?>
                            </div>


                        </article>
                    <?php endwhile; ?>
                    
                    <hr style="margin-bottom: 1px; margin-top: 0px;">
                    <!-- Display Other Posts from the Same Category -->
                    <section class="padding-0" style="display: block;">
                        <div class="section-header" style="margin-top: 1.7rem;">
                            <h1 class="section-title">
                                <?php 
                                    $category = get_the_category(); 
                                    if (!empty($category)) {
                                        $parent_category_id = $category[0]->parent != 0 ? $category[0]->parent : $category[0]->term_id;
                                        $parent_category = get_category($parent_category_id);
                                        echo '<a href="' . esc_url(get_category_link($parent_category_id)) . '">' . $parent_category->name . ' Channel</a>';
                                    }
                                ?>
                            </h1>
                        </div>
                        <hr style="margin-bottom: 1px; margin-top: 0px;">

                        <!-- Filter buttons -->
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <button style="max-width: 130px;font-size: small;font-weight: 600;border-width: 1px 1px 0;" type="button" class="btn btn-secondary <?php echo !in_category($parent_category_id) ? 'active' : ''; ?>" onclick="window.location.href='<?php echo get_category_link($parent_category_id); ?>';">All</button>
                            <?php 
                                $child_categories = get_categories(array(
                                    'child_of' => $parent_category_id,
                                ));
                                foreach ($child_categories as $category) : 
                            ?>
                                <button style="max-width: 130px;font-size: small;font-weight: 600;border-width: 1px 1px 0;" type="button" class="btn btn-secondary <?php echo in_category($category->term_id) ? 'active' : ''; ?>" onclick="window.location.href='<?php echo get_category_link($category->term_id); ?>';"><?php echo $category->name; ?></button>
                            <?php endforeach; ?>
                        </div>

                        <!-- ---posts line--- -->

                        <div class="row padding-10 rounded bordered" style="display: block;">

                        <?php
                        // Get the current post's child category ID
                        $current_category = get_the_category();
                        $current_category_id = $current_category[0]->cat_ID;

                        // Pagination
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $args = array(
                            'post_type'      => 'post',
                            'posts_per_page' => 15,
                            'paged'          => $paged,
                            'cat'            => $current_category_id, // Fetch posts from the current child category
                        );
                    
                        $query = new WP_Query($args);
                    
                        // The Loop
                        if ($query->have_posts()) :
                            while ($query->have_posts()) : $query->the_post();
                        ?>

                        <!-- Your post HTML structure goes here -->
                        <div class="col-md-12 col-sm-6" style="padding: .3rem .0rem;">
                            <!-- post  -->
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
                                            <img fetchpriority="low" loading="lazy" src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>" class="post-image64" style="max-width: 120px; height :64px; object-fit: cover; width: 100%;">
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
                                            <?php the_title(); ?>
                                        </a>
                                    </h5>
                                </div>
                                        
                            </div>
                        </div>
                        <hr style="margin-bottom: 1px;">
                        <?php endwhile; ?>
                                        
                        <div class="clearfix mb-3">
                            <form role="search" method="get" class="search-form" style="display: inline-flex;" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <input type="search" class="form-control me-2" placeholder="Search..." style="width: 100%;" value="<?php echo get_search_query(); ?>" name="s" />
                                <button type="submit" class="btn btn-secondary search icon-button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                            <?php if (is_user_logged_in()) : ?>
                                <a class="btn btn-secondary" style="float: right;" href="<?php echo admin_url('post-new.php'); ?>">New Post</a>
                            <?php else : ?>
                                <a class="btn btn-secondary" style="float: right;" href="https://oppahub.com/login/">New Post</a>
                            <?php endif; ?>
                        </div>





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
                                            'base'      => esc_url(get_category_link($current_category_id)) . '%_%', // Include the category base URL
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
                </div>
            </section>
        </main>
        <?php
        // Include the oppasidebar
        include 'oppasidebar.php';
        ?>
    </div><!-- bigchunk -->
</div>
</div>
</section>

<?php get_footer(); ?>
