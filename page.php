
<?php
// Include the header
include 'header.php';
?>

        <!-- main content  -->

        <section class="main-content">
            <div class="container-xl">
                <div class="row gy-4">

                        <!-- left part 1st section  -->
                    
                        <div class="each-section">
                        <!-- ------------------------- -->
                        <?php get_template_part('includes/section', 'content'); ?>
                        <!-- ------------------------- -->
                        

                        <div class="padding-10 rounded bordered">
                        <div class="section-header" onclick="window.location='<?php echo home_url(); ?>';">
                            <h3 class="section-title"><?php get_the_category(); ?><button title="button_to_link">></button></h3>
                        </div>

                        <?php
                         // Assuming you are in the WordPress loop
                         while (have_posts()) : the_post();
                             $post_id = get_the_ID();
                             $post_title = get_the_title();
                             $post_date = get_the_date();
                             $post_thumbnail = get_the_post_thumbnail_url($post_id);
                             $category = get_the_category();
                        ?>
                            <div class="garo2post">


                                    <div class="post m-1">
                                    <div class="thumb rounded">
                                    <a href="#" class="category-badge position-absolute"><?php echo esc_html($category); ?></a>
                                    <a href="#">
                                        <div class="inner">
                                            <img src="<?php echo esc_url($post_thumbnail); ?>" alt="" style="width: 100%; height: auto; object-fit: cover;">
                                        </div>
                                    </a>
                                    </div>
                                        
                                    <h4 class="post-title my-1" style="width: 100%; box-sizing: border-box;">
                                        <a href="<?php the_permalink(); ?>" style="display: block; vertical-align: middle; text-decoration: none;"><?php echo esc_html($post_title); ?></a>
                                    </h4>
                                    <ul class="meta list-inline mb-0">
                                        <li class="list-inline-item"><?php echo esc_html($post_date); ?></li>
                                    </ul>

                                    </div>
                                    <div class="post m-1">
                                        <div class="thumb rounded">
                                            <a href="#" class="category-badge position-absolute">Inspiration</a>
                                            
                                            <a href="#">
                                                <div class="inner">
                                                    <img src="/wp-content/themes/oppahub/images/posts/tren-lg-2.jpg" alt="" style="width: 100%; height: auto; object-fit: cover;">
                                                </div>
                                            </a>
                                        </div>
                                        
                                        <h4 class="post-title my-1" style="width: 100%; box-sizing: border-box;">
                                        <a href="#" style="display: block; vertical-align: middle; text-decoration: none;">Idol and crimes</a>
                                        </h4>
                                        <ul class="meta list-inline mb-0">
                                                <li class="list-inline-item">10 Nov 2023</li>
                                            </ul>
                                        
                                    </div>

                                    <?php endwhile; ?>
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
                        </div>
                    </div>
                    <!-- right part section  -->
                
                    <div class="each-section">
                        

                        <div class="padding-10 rounded bordered">
                            <div class="section-header" onclick="window.location='/wp-content/themes/oppahub/index.php';">
                            <h3 class="section-title">Entertain<button title="button_to_link">></button></h3>
                            </div>
                        
                            <div class="garo2post">
                                
                                    <div class="post m-1">
                                        <div class="thumb rounded">
                                            <a href="#" class="category-badge position-absolute">Celeb</a>
                                            <a href="#">
                                                <div class="inner">
                                                    <img src="/wp-content/themes/oppahub/images/posts/bts_home1.jpg" alt="" style="max-width: 297px; width: 100%; height: 200.36px; object-fit: cover;">
                                                </div>
                                            </a>
                                        </div>
                                        
                                        <h4 class="post-title my-1" style="width: 100%; box-sizing: border-box;">
                                        <a href="#" style="display: block; vertical-align: middle; text-decoration: none;">Jin's new home is fucking expensive!</a>
                                        </h4>
                                        <ul class="meta list-inline mb-0">
                                                <li class="list-inline-item">10 Nov 2023</li>
                                            </ul>
                                    </div>
                                    <div class="post m-1">
                                        <div class="thumb rounded">
                                            <a href="#" class="category-badge position-absolute">Inspiration</a>
                                            
                                            <a href="#">
                                                <div class="inner">
                                                    <img src="/wp-content/themes/oppahub/images/posts/btsblackpink.jpg" alt="" style="max-width: 297px; width: 100%; height: 200.36px; object-fit: cover;">
                                                </div>
                                            </a>
                                        </div>
                                        
                                        <h4 class="post-title my-1" style="width: 100%; box-sizing: border-box;">
                                        <a href="#" style="display: block; vertical-align: middle; text-decoration: none;">Are they in relationship????</a>
                                        </h4>
                                                <li class="list-inline-item">10 Nov 2023</li>
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
                        </div>
                    </div>
                </div>
                <!-- ---------spacer--------- -->
                <div class="spacer" data-height="13"></div>
                <!-- ---------------2ndline---------------- -->
                
                <div class="row gy-4">

                        <!-- left part 1st section  -->
                    
                        <div class="each-section">
                        

                        <div class="padding-10 rounded bordered">
                        <div class="section-header" onclick="window.location='index.php';">
                            <h3 class="section-title">Sports<button title="button_to_link">></button></h3>
                        </div>
                            <div class="garo2post">
                                
                                    <div class="post m-1">
                                        <div class="thumb rounded">
                                            <a href="#" class="category-badge position-absolute">Business</a>
                                            <a href="#">
                                                <div class="inner">
                                                    <img src="/wp-content/themes/oppahub/images/posts/tren-lg-1.jpg" alt="" style="width: 100%; height: auto; object-fit: cover;">
                                                </div>
                                            </a>
                                        </div>
                                        
                                        <h4 class="post-title my-1" style="width: 100%; box-sizing: border-box;">
                                        <a href="#" style="display: block; vertical-align: middle; text-decoration: none;">Bitcoin investing k-pop idols are now rich?</a>
                                        </h4>
                                        <ul class="meta list-inline mb-0">
                                                <li class="list-inline-item">10 Nov 2023</li>
                                            </ul>
                                    </div>
                                    <div class="post m-1">
                                        <div class="thumb rounded">
                                            <a href="#" class="category-badge position-absolute">Inspiration</a>
                                            
                                            <a href="#">
                                                <div class="inner">
                                                    <img src="/wp-content/themes/oppahub/images/posts/tren-lg-2.jpg" alt="" style="width: 100%; height: auto; object-fit: cover;">
                                                </div>
                                            </a>
                                        </div>
                                        
                                        <h4 class="post-title my-1" style="width: 100%; box-sizing: border-box;">
                                        <a href="#" style="display: block; vertical-align: middle; text-decoration: none;">Idol and crimes</a>
                                        </h4>
                                        <ul class="meta list-inline mb-0">
                                                <li class="list-inline-item">10 Nov 2023</li>
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
                        </div>
                    </div>
                    <!-- right part section  -->
                
                    <div class="each-section">
                        

                        <div class="padding-10 rounded bordered">
                            <div class="section-header" onclick="window.location='index.php';">
                            <h3 class="section-title">Fashion<button title="button_to_link">></button></h3>
                            </div>
                        
                            <div class="garo2post">
                                
                                    <div class="post m-1">
                                        <div class="thumb rounded">
                                            <a href="#" class="category-badge position-absolute">Celeb</a>
                                            <a href="#">
                                                <div class="inner">
                                                    <img src="/wp-content/themes/oppahub/images/posts/bts_home1.jpg" alt="" style="max-width: 297px; width: 100%; height: 200.36px; object-fit: cover;">
                                                </div>
                                            </a>
                                        </div>
                                        
                                        <h4 class="post-title my-1" style="width: 100%; box-sizing: border-box;">
                                        <a href="#" style="display: block; vertical-align: middle; text-decoration: none;">Jin's new home is fucking expensive!</a>
                                        </h4>
                                        <ul class="meta list-inline mb-0">
                                                <li class="list-inline-item">10 Nov 2023</li>
                                            </ul>
                                    </div>
                                    <div class="post m-1">
                                        <div class="thumb rounded">
                                            <a href="#" class="category-badge position-absolute">Inspiration</a>
                                            
                                            <a href="#">
                                                <div class="inner">
                                                    <img src="/wp-content/themes/oppahub/images/posts/btsblackpink.jpg" alt="" style="max-width: 297px; width: 100%; height: 200.36px; object-fit: cover;">
                                                </div>
                                            </a>
                                        </div>
                                        
                                        <h4 class="post-title my-1" style="width: 100%; box-sizing: border-box;">
                                        <a href="#" style="display: block; vertical-align: middle; text-decoration: none;">Are they in relationship????</a>
                                        </h4>
                                                <li class="list-inline-item">10 Nov 2023</li>
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
                        </div>
                    </div>
                </div>
                    
                    
            </div>
        </section>

<?php
// Include the footer
include 'footer.php';
?>