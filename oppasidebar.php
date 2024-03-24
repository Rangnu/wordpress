
<!-- right part starts from here  -->

<div class="col-lg-3" style="margin-right: 0.5%; margin-left: 0.5%;">

<div class="oppasidebar">

    <div class="widget rounded">
        <div class="widget-header text-center">
            <h3 class="widget-title">Suggested Posts</h3>
        </div>
        <div class="widget-content">
            <div class="post-carousel-widget">

                <?php
                $args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => 7,
                    'orderby'        => 'rand', // Order by random
                );

                $query = new WP_Query($args);

                while ($query->have_posts()) : $query->the_post();
                ?>

                <div class="post post-carousel">
                    <div class="thumb rounded">
                        <a href="#" class="category-badge position-absolute">Suggested</a>
                        <a href="<?php the_permalink(); ?>">
                        <div class="inner">
                            <?php
                            if (has_post_thumbnail()) {
                                // Output the post thumbnail with the additional class
                                echo '<img src="' . esc_url(get_the_post_thumbnail_url(get_the_ID())) . '" alt="" class="post-image220">';
                            } else {
                                // You can add a default image if there is no featured image
                                echo '<img src="' . get_template_directory_uri() . '/images/default-image.jpg" alt="" class="post-image220">';
                            }
                            ?>
                        </div>

                        </a>
                    </div>
                    <h5 class="post-title mb-0 mt-2">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h5>
                    <ul class="meta list-inline mt-0 mb-2">
                        <li class="list-inline-item">
                            <a href="#">Oppahub</a>
                        </li>
                        <li class="list-inline-item"><?php the_date(); ?></li>
                    </ul>
                </div>

                <?php endwhile;
                wp_reset_postdata();
                ?>

            </div>
            <div class="slick-arrows-bot">
                <button class="carousel-botNav-prev slick-custom-buttons" type="button" data-role="none"
                    aria-label="Previous">
                    <i class="fa-solid fa-angle-left"></i>
                </button>
                <button class="carousel-botNav-next slick-custom-buttons" type="button" data-role="none"
                    aria-label="Next">
                    <i class="fa-solid fa-angle-right"></i>
                </button>
            </div>

        </div>
    </div>


        <div class="widget rounded">
        <div class="widget-header text-center">
            <h3 class="widget-title">Maybe you'll like</h3>
        </div>
        <div class="widget-content">
            <?php
            $args_random_posts = array(
                'post_type'      => 'post',
                'posts_per_page' => 8,
                'orderby'        => 'rand', // Order by random
            );

            $query_random_posts = new WP_Query($args_random_posts);

            while ($query_random_posts->have_posts()) : $query_random_posts->the_post();
            ?>
                <div class="post">
                    <div class="thumb rounded">
                        <a href="<?php the_permalink(); ?>">
                            <div class="inner">
                                <?php
                                if (has_post_thumbnail()) {
                                    echo '<img src="' . esc_url(get_the_post_thumbnail_url(get_the_ID())) . '" alt="" class="post-image220">';
                                } else {
                                    echo '<img src="' . get_template_directory_uri() . '/images/default-image.jpg" alt="" class="post-image220">';
                                }
                                ?>
                            </div>
                        </a>
                    </div>
                    <h5 class="post-title mb-0 mt-1">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h5>
                    <ul class="meta list-inline mt-0 mb-2">
                        <li class="list-inline-item">
                            <a href="#">Oppahub</a>
                        </li>
                        <li class="list-inline-item"><?php the_date(); ?></li>
                    </ul>
                </div>
            <?php endwhile;
            wp_reset_postdata();
            ?>
        </div>




    <div class="widget rounded">
        <div class="widget-header text-center">
            <h3 class="widget-title">Newsletter</h3>
        </div>
        <div class="widget-content">
            <span class="newsletter-headline text-center mb-3">Join 50,000 subscribers</span>
            <form action="#">
                <div class="mb-2">
                    <input type="email" class="form-control w-100 text-center"
                        placeholder="Email address...">
                </div>
                <button class="btn btn-default btn-full">Sign Up</button>

            </form>
            <span class="newsletter-privacy text-center mt-3">
                By signing up, you agree to our <a href="https://oppahub.com/privacypolicy/">Privacy policy</a>
            </span>
        </div>
    </div>

    


    <div class="widget rounded">
        <div class="widget-header text-center">
            <h3 class="widget-title">Tag Clouds</h3>
        </div>
        <div class="widget-content">
            <a href="https://oppahub.com/news/" class="tag">#News</a>
            <a href="https://oppahub.com/humor/" class="tag">#Humor</a>
            <a href="https://oppahub.com/netflix/" class="tag">#Netflix</a>
            <a href="https://oppahub.com/music/" class="tag">#Music</a>
            <a href="https://oppahub.com/celeb/" class="tag">#Celeb</a>
            <a href="#" class="tag">#Trending</a>
        </div>
    </div>
</div>
</div>
</div>