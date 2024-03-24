<?php

/*
Template name : contact us
*/
?>


<?php get_header(); ?>
<section class="main-content">
            <div class="container-xl">
                <div class="row gy-4">

                    <div id="primary" class="bigchunk"style="margin-top: 2.7rem; padding-left: 0; padding-right: 0;">
                        <main id="main" class="padding-10 rounded bordered" style="width: 100%;">

                            <?php while ( have_posts() ) : the_post(); ?>

                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                    <header class="entry-header">
                                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                                        <div class="entry-meta" style="justify-content:space-between; display:inline-flex">
                                        <!-- ---get category--- -->
                                            <?php
                                            $category = get_the_category();
                                            if (!empty($category)) {
                                                echo '<a href="' . esc_url(get_category_link($category[0]->term_id)) . '" class="category-badge">' . esc_html($category[0]->slug) . '</a>';
                                            }
                                            ?>
                                            <ul class="meta list-inline mb-0 px-1"></ul>
                                            
                                        </div>
                                    </header>
                                    <hr style="margin-bottom: 1%;margin-top: 1%;">

                                    <div class="entry-content">
                                        <?php the_content(); ?>
                                    </div>

                                    <footer class="entry-footer">
                                    </footer>
                                    
                                </article>
                                    
                            <?php endwhile; ?>
                                    
                        </main><!-- .site-main -->
                    </div><!-- .content-area -->
                    
                </div>
                     
            </div>                               
</section>

<?php get_footer(); ?>