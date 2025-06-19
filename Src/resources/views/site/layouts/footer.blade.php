<!-- Footer Section Begin -->
<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="footer-left">
                    <div class="footer-logo">
                        <a href="#"><img src="/assets/site/images/footer-logo.png" alt=""></a>
                    </div>
                    <ul>
                        <li>Address: 60-49 Road 11378 New York</li>
                        <li>Phone: +65 11.188.888</li>
                        <li>Email: hello.colorlib@gmail.com</li>
                    </ul>
                    <div class="footer-social">
                        @if (setting("contact","facebook"))
                        <a href="{{ setting("contact","facebook") }}" target="_blank"><i class="ti-facebook"></i></a>

                        @endif
                        @if (setting("contact","twitter"))
                        <a href="{{ setting("contact","twitter") }}" target="_blank"><i class="ti-twitter-alt"></i></a>

                        @endif
                        @if (setting("contact","youtube"))
                        <a href="{{ setting("contact","youtube") }}" target="_blank"><i class="ti-youtube"></i></a>

                        @endif
                        @if (setting("contact","instagram"))
                        <a href="{{ setting("contact","instagram") }}" target="_blank"><i class="ti-instagram"></i></a>

                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg">
                <div class="footer-widget">
                    <h5>Information</h5>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Checkout</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Serivius</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg">
                <div class="footer-widget">
                    <h5>My Account</h5>
                    <ul>
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Shopping Cart</a></li>
                        <li><a href="#">Shop</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->


<script src="/assets/site/js/jquery-3.3.1.min.js"></script>
<script src="/assets/site/js/bootstrap.min.js"></script>
<script src="/assets/site/js/jquery-ui.min.js"></script>
<script src="/assets/site/js/jquery.countdown.min.js"></script>
<script src="/assets/site/js/jquery.nice-select.min.js"></script>
<script src="/assets/site/js/jquery.zoom.min.js"></script>
<script src="/assets/site/js/jquery.dd.min.js"></script>
<script src="/assets/site/js/jquery.slicknav.js"></script>
<script src="/assets/site/js/owl.carousel.min.js"></script>
<script src="/assets/site/js/toast.js"></script>
<script src="/assets/site/js/main.js"></script>


@stack('footer_assets')

</body>

</html>