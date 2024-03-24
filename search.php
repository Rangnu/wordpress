<?php get_header(); ?>

<div class="container-xl mt-3">
    <div class="row gy-4">

        <!-- header -->
        <header class="page-header" style=" margin-top : 2rem;">
            <h3 class="page-title">
                <?php
                printf('Search Results for: %s', get_search_query());
                ?>
            </h3>
        </header>

        <div class="bigchunk" style="margin-top: 2px; padding-left:0; padding-right:0;">
            <div class="row padding-10 rounded bordered" style="display: block;">
                <?php if (have_posts()) : ?>

                    <?php while (have_posts()) : the_post(); ?>

                        <div class="col-md-12 col-sm-6" style="width:100%; padding-left:0px;padding-right:0px;">
                            <!-- post  -->
                            <!-- ------------------------- -->
                            <div class="post post-list clearfix" style="margin-bottom : 0px; display :flex; justify-content:space-between; align-items: center;">
                                <div class="thumb rounded" style="flex:1;">
                                    <!-- <span class="post-format-sm">
                                        <i class="icon-picture"></i>
                                    </span> -->
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="inner">
                                            <?php the_post_thumbnail('post-thumbnail', array('class' => 'post-image130')); ?>
                                        </div>
                                    </a>
                                </div>

                                <div class="details" style=" flex:1.5; width:100%; padding-left: 0.5rem; ">
                                    <ul class="meta list-inline mb-0">
                                        <li class="list-inline-item">
                                            <?php
                                            $categories = get_the_category();
                                            if (!empty($categories)) {
                                                echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>';
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

                    <!-- Pagination links -->
                    <div class="col-md-12 col-sm-6" style="width:100%; padding-left:0px;padding-right:0px;">
                        <div class="pagination">
                            <?php
                            global $wp_query;
                                                                    
                            $big = 999999999; // need an unlikely integer
                                                                    
                            echo paginate_links(array(
                                'base'    => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                                'format'  => '?paged=%#%',
                                'current' => max(1, get_query_var('paged')),
                                'total'   => $wp_query->max_num_pages,
                                'prev_text' => __('&laquo; Previous'),
                                'next_text' => __('Next &raquo;'),
                            ));
                            ?>
                        </div>
                    </div>



                <?php else : ?>
            </div>
            <?php
            // Include the oppasidebar
            include 'oppasidebar.php';
            ?>
        </div>
            <p><?php esc_html_e('No results found. Try a different search?', 'your-theme-textdomain'); ?></p>
            <?php get_search_form(); ?>

        <?php endif; ?>

                </div><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>