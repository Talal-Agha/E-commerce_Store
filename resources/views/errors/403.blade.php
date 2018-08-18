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
    <link rel="stylesheet" href="{{ asset('st/css/custom.css?ver=3.0') }}">
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
 <!-- BREADCRUMBS SETCTION START -->
        <div class="breadcrumbs-section plr-200 mb-80">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title">403 Error</h1>
<center><p>Your Are Not Allowed.</p></center>
                                <center><p>{{ $exception->getMessage() }}</p></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMBS SETCTION END -->

        <!-- Start page content -->
        <div id="page-content" class="page-wrapper">
            <!-- ERROR SECTION START -->
            <div class="error-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                        </div>
                    </div>
                </div>
            </div>
            <!-- ERROR SECTION END -->             
        </div>
        <!-- End page content -->
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
    <script src="{{asset('st/js/plugins.js') }}"></script>
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
<script type="text/javascript" src="{{ asset('st/js/main.js?ver=1.1') }}"></script>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58b5df640ddc063e"></script>

<!-- Hubspot Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/454248.js"></script>
<!-- End of HubSpot Embed Code -->
</body>

</html>