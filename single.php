<?php get_header(); ?>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<section class="main-content">
    <div class="container-xl">
        <div class="row gy-4">

            <div id="primary" class="bigchunk" style="margin-top: 2.7rem; padding-left: 0; padding-right: 0;">
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
                                    <!-- ---get category--- -->
                                    
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

                        </article>
                    <?php endwhile; ?>
                    <hr style="margin-bottom: 1px; margin-top: 0px;">

                    <!-- Display Other Posts from the Same Category -->
                    <section class="padding-0" style="display: block;">
                        <div class="section-header">
                            <h3 class="section-title">
                                <a href="<?php echo esc_url(get_category_link($category[0]->term_id)); ?>"
                                    title="<?php echo esc_attr($category[0]->name); ?> Category"><?php echo esc_html($category[0]->name); ?></a>
                            </h3>
                        </div>
                        <hr style="margin-bottom: 1px; margin-top: 0px;">

                        <?php
                        // Pagination
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $args = array(
                            'post_type'      => 'post',
                            'posts_per_page' => 25,
                            'paged'          => $paged,
                            'category__in'   => array($category[0]->term_id),
                        );
                        $query = new WP_Query($args);

                        // The Loop
                        if ($query->have_posts()) :
                            while ($query->have_posts()) : $query->the_post();
                        ?>
                            <div class="col-md-6 col-sm-6" style="width:100%; padding-left:0px;padding-right:0px;">
                                <div class="post post-list clearfix" style="margin-bottom: 0px; display :flex; justify-content:space-between; align-items: center;">
                                    <div class="thumb rounded" style="flex:0.4;">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <a href="<?php the_permalink(); ?>">
                                                <div class="inner">
                                                    <?php
                                                    $thumbnail_id = get_post_thumbnail_id();
                                                    $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'full')[0];
                                                    ?>
                                                    <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>" class="post-image64">
                                                </div>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                    <div class="details" style="flex:1.5; width:100%; padding-left: 0.5rem;">
                                        <h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    </div>
                                </div>
                            </div>
                            <hr style="margin-bottom: 1px; margin-top: 0px;">
                        <?php endwhile; ?>
                        <!-- Pagination links -->
                        <div class="post" style="align-items: center;">
                            <div class="pagination">
                                <?php
                                $big = 999999999; // need an unlikely integer

                                $pagination_args = array(
                                    'base'      => str_replace($big, '%#%', esc_url(get_category_link($category[0]->term_id) . 'page/%#%/')),
                                    'format'    => '?paged=%#%',
                                    'current'   => max(1, get_query_var('paged')),
                                    'total'     => $query->max_num_pages,
                                    'prev_text' => __('&laquo; Previous'),
                                    'next_text' => __('Next &raquo;'),
                                );

                                echo paginate_links($pagination_args);
                                ?>
                            </div>

                            <?php wp_reset_postdata(); ?>
                        <?php else : ?>
                            <p><?php esc_html_e('No posts found.'); ?></p>
                        <?php endif; ?>
                        </div>
                    </section>

                </main><!-- .site-main -->
                <?php
                // Include the oppasidebar
                include 'oppasidebar.php';
                ?>

            </div><!-- .bigchunk -->

        </div>

    </div>
</section>

<?php get_footer(); ?>