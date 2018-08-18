<!-- START HEADER AREA -->

<?php use \App\subCategories;?>
<header class="header-area header-wrapper">
<script type="text/javascript">

// uncheck a radio
$('input[type="radio"]').on("click", function(event){
$('input[type="radio"]').prop('checked', false);
if ($(this).attr('checked1')=='11') {
$(this).prop('checked', false);
$(this).attr('checked1','22')
}
else {
$(this).prop('checked', true);
$(this).attr('checked1','11')
}
});
</script>
<!-- START MOBILE MENU AREA -->
<nav class="hidden-lg hidden-md mob-nav">

<input type="checkbox" id="mobile-nav" />
<label for="mobile-nav" class="nav-button">
<span></span>
<span></span>
<span></span>
</label>
<div class="mobile-nav">
@foreach($categories as $categorie)
        <ul class="single-mega-item">
            <li class="menu-title">{{ $categorie->categoryName }}</li>
            @foreach(subCategories::where('categoryId',$categorie->categoryId)->get() as $subCategory)
              <li>
                <a href="/product/categories/subcategories/{{$subCategory->subCategoryName}}">{{$subCategory->subCategoryName}}</a>
                </li>
            @endforeach
        </ul>
        @endforeach
</div> <!-- .mobile-nav -->
<input type="checkbox" id="search" />
<label for="search" class="search-button">
<i class="zmdi zmdi-search mobile-icon"></i>
</label>
<div class="search">
<label for="search" class="search-close">
<form >
    <input type="text" placeholder="What can I help you with today?">
</form>
</label> 
</div> <!-- .search -->
<a href="/index.php">
<div class="logo"> <img src="{{asset('img/logo.png')}}" alt="main logo" class="img-responsive">
</div>
</a>
<a href="https://epurchase.byjasco.com/cart">	<i id="mobile-cart" class="zmdi zmdi-shopping-cart-plus mobile-icon"></i></a>
</label>
</nav>
<nav class="hidden-lg hidden-md swipe">
<div class="dropdown"><button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><a href="#">Brands&nbsp;<span class="next fa fa-chevron-down"></a></button></span>
<ul class="dropdown-menu">
@if(count($brands))
@foreach($brands as $brand)
<li>
  <a href="/brand/{{$brand->brand_id}}/{{$brand->brandName}}">{{$brand->brandName}}</a>
</li>
@endforeach
@endif
</ul>
</div>
<ul class="sliding">
@foreach($categories as $categorie)
    <li class="menu-title">{{ $categorie->categoryName }}</li>
@endforeach
</nav>
<!-- END MOBILE MENU AREA -->   
<!-- header-middle-area -->
<div class="header-middle-area plr-185 hidden-sm hidden-xs">
<div class="container-fluid">
<div class="full-width-mega-dropdown">
<div class="row">
<!-- logo -->
<div class="col-md-2 col-sm-6 col-xs-6">
    <div class="logo">
        <a href="/">
            <img src="{{asset('img/logo.png')}}" alt="main logo">
        </a>
    </div>
</div>
<!-- Search Bar Goes Here -->
<div class="col-md-8 hidden-sm hidden-xs">

    <form action="/products/search/" method="get">
        <div class="top-search">
            <input type="text" placeholder="Search all products here..." name="searchFor">
            <button type="submit">
                <i class="zmdi zmdi-search"></i>
            </button>
        </div>
    </form>
</div>
<!-- header-search & total-cart -->
<div class="col-md-2 col-sm-6 col-xs-6 top-menu">
<div class="main-icons">
@if(Auth::check())
@if(Auth::user()->privilege == 'user')
<a title="Account" href="/myaccount/profile">
    <i class="zmdi zmdi-account custom-icon"></i>
</a>
&vert;
<a title="Wish List" href="/mywishlist">
    <i class="zmdi zmdi-favorite custom-icon"></i>
</a>
&vert;
<a title="Logout" href="/myaccount/logout">
    <i class="zmdi zmdi-power custom-icon"></i>
</a>
 &vert;
@else
<span class="login-name">{{Auth::user()->name}}</span>
&vert;

<a title="Logout" href="/myaccount/logout">
    <i class="zmdi zmdi-power custom-icon"></i>
</a>
 &vert;
@endif
@else
<li>
    <a href="/myaccount/login">
        <i class="zmdi zmdi-power custom-icon"></i>
        Login
    </a>
</li>
@endif
 @include('layouts.subas.elements.total-cart')   

</div>                        

</div>
</div>
</div>
</div>
</div>
<!-- primary-menu -->
<div class="col-md-12 hidden-sm hidden-xs nav-menu">
        <nav id="primary-menu">
            <ul class="main-menu text-center">
  @foreach($categories as $categorie)
            <li class="menu-title"><a href="/categories/{{ $categorie->categoryName }}">{{ $categorie->categoryName }}</a>
                    <ul class="dropdwn">
                     @foreach(subCategories::where('categoryId',$categorie->categoryId)->get() as $subCategory)
<li>
<a href="/product/categories/subcategories/{{$subCategory->subCategoryName}}">{{$subCategory->subCategoryName}}</a>
</li>
@endforeach
</ul>
</li>
 @endforeach
</ul>
</nav>
</div>
<div class="brand hidden-sm hidden-xs">
<div class="container">
<div class="row" style="margin-right:0px;">

<div class="col-md-2">
</div>

<div class="col-md-8">
<div id="brand-bar">
<ul>
@foreach($brands as $brand)
<li>
  <a href="/brand/{{$brand->brand_id}}/{{$brand->brandName}}">
    <img  class="brand-icons" src="{{asset('img/logos/'.$brand->brandImage)}}">
  </a>
</li>
<li>&vert;</li>
@endforeach
</ul>

</div>
<div class="col-md-2">
</div>
</div>
</div>
</div>

<div id="left-arrow"><i class="zmdi zmdi-caret-left-circle"> </i></div>
<div id="right-arrow"><i class="zmdi zmdi-caret-right-circle"> </i></div>

</nav>
</div>