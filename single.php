<?php get_header(); ?>
<section class="main-content">
            <div class="container-xl">
                <div class="row gy-4">

                    <div id="primary" class="content-area">
                        <main id="main" class="padding-10 rounded bordered">

                            <?php while ( have_posts() ) : the_post(); ?>

                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                    <header class="entry-header">
                                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                                        <div class="entry-meta">
                                            <?php
                                            echo 'Posted on ' . get_the_date() . ' by ' . get_the_author();
                                            ?>
                                        </div>
                                    </header>

                                    <div class="entry-content">
                                        <?php the_content(); ?>
                                    </div>

                                    <footer class="entry-footer">
                                        <?php
                                        if ( comments_open() || get_comments_number() ) :
                                            comments_template();
                                        endif;
                                        ?>
                                    </footer>
                                    
                                </article>
                                    
                            <?php endwhile; ?>
                                    
                        </main><!-- .site-main -->
                    </div><!-- .content-area -->
                    <div class="sidebar padding-10 rounded bordered"><?php get_sidebar(); ?></div>
                </div>     
            </div>                               
</section>

<?php get_footer(); ?>