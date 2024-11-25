<!-- 
Essential Scripts
=====================================-->
<!-- Main jQuery -->
<script src="plugins/jquery/jquery.min.js" defer></script>
<!-- Bootstrap 4.3.1 -->
<script src="plugins/bootstrap/bootstrap.min.js" defer></script>
<!--  Magnific Popup-->
<!-- <script src="plugins/magnific-popup/jquery.magnific-popup.min.js"></script> -->
<!-- Slick Slider -->
<script src="plugins/slick/slick.min.js" defer></script>
<!-- Counterup -->
<!-- <script src="plugins/counterup/jquery.waypoints.min.js"></script>
<script src="plugins/counterup/jquery.counterup.min.js"></script> -->

<!-- Google Map -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
<script src="plugins/google-map/map.js" defer></script> -->

<script src="js/script.js" defer></script>

<script>
    if (window.location.hash.indexOf('!') > -1) {
        window.location.href = window.location.href.replace('#!', '');
    }
</script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-8NCCPSK3EH" defer></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-8NCCPSK3EH');
</script>