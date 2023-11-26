<?php if ( has_post_thumbnail() ) : ?>
    <div class="post-thumbnail">
        <?php echo get_the_post_thumbnail( get_the_ID(), 'full', array( 'class' => 'img-fluid' ) ); ?>
    </div>
<?php else : ?>
    <!-- If no thumbnail is available, you can add a default image or leave it blank -->

<?php endif; ?>