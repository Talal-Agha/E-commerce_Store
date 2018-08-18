<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Jasco</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <!-- All CSS Files -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="{{ asset('st/css/bootstrap.min.css') }}">
    <!-- Nivo-slider css -->
    <link rel="stylesheet" href="{{ asset('st/lib/css/nivo-slider.css') }}">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="{{ asset('st/css/core.css') }}">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="{{ asset('st/css/shortcode/shortcodes.css') }}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{ asset('st/style.css') }}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('st/css/responsive.css') }}">
    <!-- Template color css -->
    <link href="{{ asset('st/css/color/color-core.css') }}" data-style="styles" rel="stylesheet">
    <!-- User style -->
    <link rel="stylesheet" href="{{ asset('st/css/custom.css?ver=3.7') }}">
    <!-- Navigation Bar for Mobile -->
    <link rel="stylesheet" href="{{ asset('st/css/navbar.css?ver=1.8') }}">
    <link rel="stylesheet" href="{{ asset('st/css/swipe.css') }}">
        <!-- jquery latest version -->
    <script src="{{asset('st/js/vendor/jquery-3.1.1.min.js') }}"></script>
    <!-- Modernizr JS -->
    <script src="{{ asset('st/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <script src="https://use.fontawesome.com/3c9e52dbd5.js"></script>
    <style>
    .breadcrumbs{
    background:none !important;
    }
</style>
</head>
<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  
    <!-- Body main wrapper start -->
    <div class="wrapper">
 @include('layouts.subas.elements.top-nav')  
 @include('layouts.admin.errors') 
 @yield('mainContent')
         <!-- START FOOTER AREA -->
 @include('layouts.subas.elements.footer')  
        <!-- END FOOTER AREA -->   
        <!-- START QUICKVIEW PRODUCT -->
 @include('layouts.subas.elements.quick-view')  
        <!-- END QUICKVIEW PRODUCT -->  
    </div>
    <!-- Body main wrapper end -->
    <!-- Placed JS at the end of the document so the pages load faster -->
    <!-- Bootstrap framework js -->
    <script src="{{asset('st/js/bootstrap.min.js') }}"></script>
    <!-- jquery.nivo.slider js -->
    <script src="{{asset('st/lib/js/jquery.nivo.slider.js') }}"></script>
    <!-- All js plugins included in this file. -->
    <script src="{{asset('st/js/plugins.js?ver=1.5') }}"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="{{asset('st/js/main.js') }}"></script>
    <script src="{{asset('st/js/custom.js') }}"></script>
    
    <!--<div>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-96178155-1', 'auto');
ga('send', 'pageview');

</script>
</div>-->
<script type="text/javascript" src="{{ asset('st/js/main.js?ver=1.5') }}"></script>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58b5df640ddc063e"></script>

<!-- Hubspot Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/454248.js"></script>
<!-- End of HubSpot Embed Code -->

<script type="text/javascript">
  /*<![CDATA[*/
//(function() {
//var sz = document.createElement('script'); sz.type = 'text/javascript'; sz.async = true;
//sz.src = '//siteimproveanalytics.com/js/siteanalyze_6013300.js';
//var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(sz, s);
//})();
/*]]>*/

function loadQuickProduct(id){
var request = $.ajax({
  url: "/products/loadQuickView",
  type: "POST",
  data: {
    "_token": "{{ csrf_token() }}",
    productId: id,
  },
   success: function(response) {
    if(response){
        document.getElementById("quickViewContent").innerHTML = response;
     }
   },
});
}
function quickProductAddToCart(id){
    var qty = $("#quickViewQT").val();
    if(qty == null){
        qty = 1;
    }
location.href = "/cart/add/"+id+"/"+qty; 
}
function addToWishList(id){
var request = $.ajax({
  url: "/mywishlist/add",
  type: "POST",
  data: {
    "_token": "{{ csrf_token() }}",
    productId: id,
  },

   success: function(response) {
    if(response != 0){
         if(response == 2){
            alert("Product already in wishlist.");
         }
         if(response == 1){
           alert("Product Added to wishlist.");
           window.location.reload(true);
        }else{
          alert("Please Login.");    
        }
   }
  }
});
}
function removeFromWishlist(id){
var request = $.ajax({
  url: "/mywishlist/remove",
  type: "POST",
  data: {
    "_token": "{{ csrf_token() }}",
    productId: id,
  },

   success: function(response) {
    if(response != 0){
         if(response == 1){
alert("Product removed from wishlist.");
window.location.reload(true);
         }else{
alert("Please Login.");          
         }
  }
   },
});
}
    </script>
</body>

</html>