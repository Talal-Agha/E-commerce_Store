@extends('layouts.subas.master')
@section('mainContent')
<!-- BREADCRUMBS SETCTION START -->
<div class="breadcrumbs-section plr-200 mb-80">
<div class="breadcrumbs overlay-bg">
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="breadcrumbs-inner">
                <ul class="breadcrumb-list">
                    <li><a href="/">Home</a></li>
                    <li>{{$productData->name}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- BREADCRUMBS SETCTION END -->
<!-- Start page content -->
<section id="page-content" class="page-wrapper">
<!-- SHOP SECTION START -->
<div class="shop-section mb-80">
<div class="container">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <!-- single-product-area start -->
            <div class="single-product-area mb-80">
                <div class="row">
                    <!-- imgs-zoom-area start -->
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="imgs-zoom-area">
                            <img id="zoom_03" src="{{$productData->thumbnail}}" data-zoom-image="{{$productData->thumbnail}}" alt="">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div id="gallery_01" class="carousel-btn slick-arrow-3 mt-30">
                                        <a><img onClick="changeMainPic('{{$productData->thumbnail}}');" class="img-responsive img-thumbnail mini-img" src="{{$productData->thumbnail}}"/></a>@foreach($productImages as $productImage)
                                         <a><img onClick="changeMainPic('{{$productImage->productImages}}');" class="img-responsive img-thumbnail mini-img" src="{{$productImage->productImages}}"/></a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- imgs-zoom-area end -->
                    <!-- single-product-info start -->
                    <div class="col-md-7 col-sm-7 col-xs-12"> 
                        <div class="single-product-info">
                            <h3 class="text-black-1">{{$productData->name}}</h3>
                            <h6 class="brand-name-2">{{\App\Http\Controllers\BrandsController::getName($productData->brand)}}</h6>
                            <h3 class="pro-price">
                               @if($productData->sale_status)
                                   <div class="s-price-box"><span class="new-price">$ {{$productData->sale_price}}</span>
                                   <span class="old-price">$ {{$productData->price}}</span></div>
                                @else
                                   <span class="new-price">$ {{$productData->price}}</span>
                                @endif
    
                             </h3>
                            <!-- single-product-tab -->
                            <div class="single-product-tab">
                                <ul class="reviews-tab mb-20">
                                    <li  class="active"><a href="#description" data-toggle="tab">description</a></li>
                                    <li ><a href="#features" data-toggle="tab">Features</a></li>
                                    <li ><a href="#information" data-toggle="tab">Information</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="description">
                                        <p>{{$productData->description}}</p>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="features">
                                        <p>{{$productData->features}}</p>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="information">
                                        <p>Height: <b>{{$productData->heightValue}} {{$productData->heightUnit}}</b></p>
                                        <p>Lenth: <b>{{$productData->lenthValue}} {{$productData->lenthUnit}}</b></p>
                                        <p>Width: <b>{{$productData->widthValue}} {{$productData->widthUnit}}</b></p>
                                        <p>Weight: <b>{{$productData->weightValue}} {{$productData->weightUnit}}</b></p>
                                        <p>SKU: <b>{{$productData->sku}}</b></p>          
                                    </div>
                                </div>
                            </div>
                            <!-- hr -->
                            <hr>
                            <!-- plus-minus-pro-action -->
                            <div class="plus-minus-pro-action">
                                <div class="sin-plus-minus f-left clearfix">
                                    <p class="color-title f-left">Qty</p>
                                    <div class="cart-plus-minus f-left">
                                        <input type="text" id="qty" value="1" name="qtybutton" class="cart-plus-minus-box">
                                    </div>   
                                </div>
                                <div class="sin-pro-action f-right">
                                    <ul class="action-button">
                                        <li>
                                            <a onClick="addToWishList('{{$productData->product_id}}')" title="Wishlist" tabindex="0"><i class="zmdi zmdi-favorite"></i></a>
                                        </li>
                                         @if($productData->quantity <= 0)
                                        <li>
                                        <span style="font-weight:800; font-size:16px; color:#FF6161">Out Of Stock</span>
                                        </li>
                                            @else
                                        <li onClick="qAddToCart('{{$productData->product_id}}')">
                                            <a title="Add to cart" tabindex="0"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                        </li>
                                            @endif
                                    </ul>
                                </div>
                            </div>
                        </div>    
                    </div>
                    <!-- single-product-info end -->
                </div>
            </div>
            <!-- single-product-area end -->
            <div class="related-product-area">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-left mb-40">
                            <h2 class="uppercase">related product</h2>
                            <h6>There are many variations of passages of brands available,</h6>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="active-related-product">
                         <!-- product-item start -->
                     @foreach($relatedProducts as $recentProduct)
                        @include('layouts.subas.elements.product-box')  
                     @endforeach
                        <!-- product-item end -->
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- SHOP SECTION END -->             

</section>
<!-- End page content -->
<script>
    function qAddToCart(id){
var qty = $("#qty").val();
console.log(qty);
if(qty == null){
qty = 1;
}
location.href = "/cart/add/"+id+"/"+qty; 
}
function changeMainPic(src){
document.getElementById("zoom_03").src = src;
$("#zoom_03").data('zoom-image', src).elevateZoom({
responsive: true,
zoomType: "lens", 
containLensZoom: true
}); 
}
</script>
@endsection


