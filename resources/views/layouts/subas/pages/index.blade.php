@extends('layouts.subas.master')
@section('mainContent')
<div id="myCarousel" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
</ol>

<!-- Wrapper for slides -->
<div class="carousel-inner">
<div class="item active">
<img src="img/banner/employeebanner.jpg" style="width:100%;">
</div>

</div>
</div>

<!-- START PAGE CONTENT -->
<section id="page-content" class="page-wrapper">
<div id="shop-categories">
<span class="shop-by"> <a href="#" id="prod-trig">Shop by product</a> | <a href="#" id="brand-trig">Shop by brand</a>  </span>
</div>

<!-- PRODUCT TAB SECTION START -->
<div class="main-categories products">
<div class="container">
<div class="row cat">
<div class="col-md-4 col-md-offset-1 col-sm-8 col-sm-offset-2 prod-cat">
<a href="https://epurchase.byjasco.com/categories/Cables">
<img src="img/homepage/products_cables.png" class="img-responsive" alt="">
</a>             
</div>
<div class="col-md-4 col-md-offset-1 col-sm-8 col-sm-offset-2 prod-cat">
<a href="https://epurchase.byjasco.com/categories/Computer">
<img src="img/homepage/products_computer.png" class="img-responsive" alt="">
</a>       
</div>
</div>
<div class="row cat">
<div class="col-md-4 col-md-offset-1 col-sm-8 col-sm-offset-2 prod-cat">
<a href="https://epurchase.byjasco.com/categories/Entertainment">
<img src="img/homepage/products_entertainment.png" class="img-responsive" alt="">
</a>      
</div>
<div class="col-md-4 col-md-offset-1 col-sm-8 col-sm-offset-2 prod-cat">
<a href="https://epurchase.byjasco.com/categories/LED Lighting">
<img src="img/homepage/products_ledlighting.png" class="img-responsive" alt="">
</a>    
</div>
</div>
<div class="row cat">
<div class="col-md-4 col-md-offset-1 col-sm-8 col-sm-offset-2 prod-cat">
<a href="https://epurchase.byjasco.com/categories/Power">
<img src="img/homepage/products_power.png" class="img-responsive" alt="">
</a>              
</div>
<div class="col-md-4 col-md-offset-1 col-sm-8 col-sm-offset-2 prod-cat">
<a href="https://epurchase.byjasco.com/categories/Security">
<img src="img/homepage/products_security.png" class="img-responsive" alt="">
</a>       
</div>
</div>

<div class="row cat">
<div class="col-md-4 col-md-offset-1 col-sm-8 col-sm-offset-2 prod-cat">
<a href="https://epurchase.byjasco.com/categories/Smart%20Home">
<img src="img/homepage/products_smarthome.png" class="img-responsive" alt="">
</a>          
</div>
<div class="col-md-4 col-md-offset-1 col-sm-8 col-sm-offset-2 prod-cat">
<a href="https://epurchase.byjasco.com/categories/Timers">
<img src="img/homepage/products_timers.png" class="img-responsive" alt="">
</a>         
</div>
</div>


</div>
</div>
<!-- PRODUCT TAB SECTION END -->

<!-- BRAND TAB SECTION START -->
<div class="main-categories brands">
<div class="container">
<div class="row cat">
<div class="col-md-4 col-md-offset-1 col-sm-8 col-sm-offset-2 prod-cat">
    </a>         <a href="https://epurchase.byjasco.com/categories/Cables">
<a href="/brand/31/Cordinate">

<img src="{{ asset('img/homepage/brands_cordinate.png') }}" class="img-responsive" alt="">
</a>
</div>

<div class="col-md-4 col-md-offset-1 col-sm-8 col-sm-offset-2 prod-cat">
    </a>         <a href="https://epurchase.byjasco.com/categories/Cables">
<a href="/brand/81/EcoSurvivor">    

<img src="{{ asset('img/homepage/brands_ecosurvivor.png') }}" class="img-responsive" alt="">
</a>
</div>
</div>
<div class="row cat">
<div class="col-md-4 col-md-offset-1 col-sm-8 col-sm-offset-2 prod-cat">
    </a>             <a href="https://epurchase.byjasco.com/categories/Cables">
<a href="/brand/76/Enbrighten">

<img src="{{ asset('img/homepage/brands_enbrighten.png') }}" class="img-responsive" alt="">
</a>
</div>
<div class="col-md-4 col-md-offset-1 col-sm-8 col-sm-offset-2 prod-cat">
    </a>             <a href="https://epurchase.byjasco.com/categories/Cables">
<a href="/brand/8/Energizer">

    <img src="{{ asset('img/homepage/brands_energizer.png') }}" class="img-responsive" alt="">
</a>  
</div>
</div>
<div class="row cat">
<div class="col-md-4 col-md-offset-1 col-sm-8 col-sm-offset-2 prod-cat">
    </a>                 <a href="https://epurchase.byjasco.com/categories/Cables">
   <a href="/brand/86/GE">

    <img src="{{ asset('img/homepage/brands_ge.png') }}" class="img-responsive" alt="">
    </a>
</div>
<div class="col-md-4 col-md-offset-1 col-sm-8 col-sm-offset-2 prod-cat">
    </a>                 <a href="https://epurchase.byjasco.com/categories/Cables">
    <a href="/brand/75/Honeywell">   

     <img src="{{ asset('img/homepage/brands_honeywell.png') }}" class="img-responsive" alt="">
    </a>
    </div>
</div>]

<div class="row cat">
<div class="col-md-4 col-md-offset-1 col-sm-8 col-sm-offset-2 prod-cat">
    </a>                 <a href="https://epurchase.byjasco.com/categories/Cables">
    <a href="/brand/21/Lights%20By%20Night">

    <img src="{{ asset('img/homepage/brands_lightsbynight.png') }}" class="img-responsive" alt="">
    </a>
</div>
<div class="col-md-4 col-md-offset-1 col-sm-8 col-sm-offset-2 prod-cat">
    </a>                 <a href="https://epurchase.byjasco.com/categories/Cables">
    <a href="/brand/79/My%20Touch%20Smart">  

        <img src="{{ asset('img/homepage/brands_mytouchsmart.png') }}" class="img-responsive" alt="">
    </a>
    </div>
</div> 

<div class="row cat">
<div class="col-md-4 col-md-offset-1 col-sm-8 col-sm-offset-2 prod-cat">
    </a>                 <a href="https://epurchase.byjasco.com/categories/Cables">
  <a href="/brand/68/Phillips">

    <img src="{{ asset('img/homepage/brands_philips.png') }}" class="img-responsive" alt="">
  </a>
</div>
<div class="col-md-4 col-md-offset-1 col-sm-8 col-sm-offset-2 prod-cat">
    </a>                 <a href="https://epurchase.byjasco.com/categories/Cables">
    <a href="/brand/33/Power%20Gear%E2%84%A2">

        <img src="{{ asset('img/homepage/brands_powergear.png') }}" class="img-responsive" alt="">
    </a>
    </div>


</div> 
<div class="row cat">
<div class="col-md-4 col-md-offset-1 col-sm-8 col-sm-offset-2 prod-cat">
    </a>                 <a href="https://epurchase.byjasco.com/categories/Cables">
  <a href="/brand/82/Projectables">

    <img src="{{ asset('img/homepage/brands_projectables.png') }}" class="img-responsive" alt="">
  </a>
</div>
<div class="col-md-4 col-md-offset-1 col-sm-8 col-sm-offset-2 prod-cat">
    </a>                 <a href="https://epurchase.byjasco.com/categories/Cables">
    <a href="/brand/83/Uber">

        <img src="{{ asset('img/homepage/brands_uber.png') }}" class="img-responsive" alt="">
    </a>
    </div>
</div>                                            


</div>
</div>
<!-- BRAND TAB SECTION END -->


</section>
<!-- END PAGE CONTENT -->
@endsection