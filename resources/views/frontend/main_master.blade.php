<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-UK" lang="en-UK"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"><!--<![endif]-->

@include('frontend.body.head')

<!-- /#site-header-wrap -->

@include('frontend.body.header')

<!-- End /#site-header-wrap -->

<!-- Page Content -->

@yield('content')

<!-- End Page Content -->

<!-- Newsletter -->

@include('frontend.body.newsletter')

<!-- End Newsletter -->

<!-- Footer -->

@include('frontend.body.footer')

<!-- End Footer -->

<!-- Go Top -->
<a class="go-top">
    <i class="fa fa-chevron-up"></i>
</a>

</div>
<!-- Javascript -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/tether.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.easing.js"></script>
<script src="assets/js/parallax.js"></script>
<script src="assets/js/jquery-waypoints.js"></script>
<script src="assets/js/jquery-countTo.js"></script>
<script src="assets/js/jquery.countdown.js"></script>
<script src="assets/js/jquery.flexslider-min.js"></script>
<script src="assets/js/images-loaded.js"></script>
<script src="assets/js/jquery.isotope.min.js"></script>
<script src="assets/js/magnific.popup.min.js"></script>
<script src="assets/js/jquery.hoverdir.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/equalize.min.js"></script>
<script src="assets/js/gmap3.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIEU6OT3xqCksCetQeNLIPps6-AYrhq-s&region=GB"></script>
<script src="assets/js/jquery-ui.js"></script>

<script src="assets/js/jquery.cookie.js"></script>
<script src="assets/js/main.js"></script>

<!-- Revolution Slider -->
<script src="assets/rev-slider/js/jquery.themepunch.tools.min.js"></script>
<script src="assets/rev-slider/js/jquery.themepunch.revolution.min.js"></script>
<script src="assets/js/rev-slider.js"></script>

<!-- Load Extensions only on Local File Systems ! The following part can be removed on Server for On Demand Loading -->
<script src="assets/rev-slider/js/extensions/revolution.extension.actions.min.js"></script>
<script src="assets/rev-slider/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="assets/rev-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="assets/rev-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="assets/rev-slider/js/extensions/revolution.extension.migration.min.js"></script>
<script src="assets/rev-slider/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="assets/rev-slider/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="assets/rev-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="assets/rev-slider/js/extensions/revolution.extension.video.min.js"></script>
</body>

</html>