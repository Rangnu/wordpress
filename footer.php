<footer>
<?php wp_footer(); ?>

            <div class="container-xl">
                <!-- 디스플레이-수평형 -->
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
            <div class="container-xl" style="border-image-outset: 0; border-image-repeat: stretch; border-image-slice: 100%; border-image-source: none;border-image-width: 1; border-top: 5px solid #000; animation: flowingBorderAnimation 3s linear infinite;">
                <div class="footer-inner">

                    <div class="d-flex justify-content-center align-items-center">
                        <div class="col-md-1 text-center" style="padding-right: 10px;">
                            <a href="https://oppahub.com/about_us/">About Us</a>
                        </div>
                        <div class="col-md-1 text-center" style="padding-right: 10px;">
                            <a href="https://oppahub.com/11_inquiry_report/">1:1/Report</a>
                        </div>
                        <div class="col-md-1 text-center" style="padding-right: 10px;">
                            <a href="https://oppahub.com/contact_us/">Contact Us</a>
                        </div>
                    </div>

                    <div class="row d-flex align-items-center gy-4">
                        <div class="col-md-4">
                            <span class="copyright">&copy; 2023-2024 OppaHub</span>
                        </div>
                        <div class="col-md-4 text-center">
                            <ul class="social-icons list-unstyled list-inline mb-0">
                                <li class="list-inline-item">
                                    <a href="https://www.facebook.com/OppaHubs">
                                        <i class="fab fa-facebook-f" style="color : blue;"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://twitter.com/OppaHub">
                                        <i class="fab fa-twitter" style="color : blue;"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://www.instagram.com/oppahub_official/">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://www.youtube.com/channel/UCwyllhgwtFK54BsQhU9779A">
                                        <i class="fab fa-youtube" style="color : red;"></i>
                                    </a>
                                </li>
                                <!-- <li class="list-inline-item">
                                    <a href="#">
                                        <i class="fab fa-pinterest"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="fab fa-itunes"></i>
                                    </a>
                                </li> -->
                                
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <a href="#" id="return-to-top" class="float-md-end">
                                <i class="fa-solid fa-arrow-up"></i>
                                Back to Top
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <!-- bootstrap slick  -->
    <link rel="stylesheet" href="/wp-content/themes/oppahub/assets/css/slick.css">
    <!-- javascripts  -->
    <script defer src="/wp-content/themes/oppahub/assets/js/popper.min.js"></script>
    <script defer src="/wp-content/themes/oppahub/assets/js/jquery.sticky-sidebar.min.js"></script>
    <script defer src="/wp-content/themes/oppahub/assets/js/slick.min.js"></script>
    <script src="/wp-content/themes/oppahub/main.js"></script>
    <!-- bootstrap javascripts  -->
    <script src="/wp-content/themes/oppahub/assets/js/bootstrap.bundle.min.js"></script>
    <!-- OppaUserMenu  -->
    <script>
        let UsersProfiles = document.querySelector('.UsersProfiles');
    let OppaUserMenu = document.querySelector('.OppaUserMenu');

    UsersProfiles.onclick = function () {
        OppaUserMenu.classList.toggle('active');
    }
    </script>
</body>

</html>
