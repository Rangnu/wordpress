<?php
/*
Template Name: page-user_posting
*/

get_header();

// Check if the user is logged in
if (is_user_logged_in()) {
    // Display the form for logged-in users
    ?>
    <section class="main-content">
        <div class="container-xl">
            <main id="main" class="site-main">
                <div class="row gy-4">
                    <h2>Submit a Post</h2>

                    <form id="primary" class="content-area" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                        <main id="main" class="padding-10 rounded bordered">
                            <input type="hidden" name="action" value="custom_post_submission">

                            <!-- Row 1: Title Input -->
                            <div class="row">
                                <label for="post_title">Title:</label>
                                <input type="text" name="post_title" required>
                            </div>

                            <!-- Row 2: Choosing Parent Category -->
                            <div class="row">
                                <label for="post_parent_category">Parent Category:</label>
                                <?php
                                $categories = get_categories([
                                    'taxonomy'         => 'category',
                                    'name'             => 'post_parent_category',
                                    'hide_empty'       => false,
                                    'show_option_none' => 'Select Parent Category',
                                ]);
                                wp_dropdown_categories($categories);
                                ?>
                            </div>

                            <!-- Row 3: Choosing Child Category -->
                            <div class="row">
                                <label for="post_category">Child Category:</label>
                                <select id="post_category" name="post_category" style="display: none;" required></select>
                            </div>

                            <!-- Row 4: TinyMCE Editor -->
                            <div class="row">
                                <label for="post_content">Content:</label>
                                <?php
                                // Output TinyMCE editor for the content
                                $content = ''; // You can set initial content here if needed
                                $editor_id = 'post_content';
                                wp_editor($content, $editor_id);
                                ?>
                            </div>

                            <!-- Row 5: Uploading Media -->
                            <div class="row">
                                <label for="media_upload">Upload Media:</label>
                                <input type="button" id="media_upload" class="button" value="Upload Media">
                            </div>

                            <!-- Row 6: Choosing Featured Image Button -->
                            <div class="row">
                                <label for="featured_image">Choose Featured Image:</label>
                                <input type="button" id="featured_image" class="button" value="Choose Featured Image">
                            </div>

                            <input type="submit" value="Submit Post">
                        </main>
                    </form>

                    <script>
                        // jQuery script to dynamically load child categories based on the selected parent category
                        jQuery(document).ready(function ($) {
                            $('#post_parent_category').on('change', function () {
                                var parentCategory = $(this).val();

                                // Show loading or processing indication here if needed

                                // AJAX call to get child categories
                                $.ajax({
                                    url: ajaxurl, // WordPress AJAX endpoint
                                    type: 'POST',
                                    data: {
                                        action: 'get_child_categories',
                                        parent_category: parentCategory,
                                    },
                                    success: function (response) {
                                        // Hide loading or processing indication here if needed

                                        // Update child category dropdown
                                        $('#post_category').html(response).show();
                                    },
                                });
                            });

                            // Media Upload Button
                            $('#media_upload').on('click', function (e) {
                                e.preventDefault();

                                // Your media upload code here
                                alert('Implement your media upload functionality here.');
                            });

                            // Featured Image Button
                            $('#featured_image').on('click', function (e) {
                                e.preventDefault();

                                // Your featured image code here
                                alert('Implement your featured image functionality here.');
                            });
                        });
                    </script>
                </div>
            </main>
        </div>
    </section>
    <?php
} else {
    // Redirect non-logged-in users to the login page
    wp_redirect(wp_login_url());
}

get_footer();
?>