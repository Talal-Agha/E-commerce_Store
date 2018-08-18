<?php $__env->startSection('mainContent'); ?>
<!-- BREADCRUMBS SETCTION START -->
<div class="breadcrumbs-section plr-200 mb-80">
<div class="breadcrumbs overlay-bg">
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="breadcrumbs-inner">
                <ul class="breadcrumb-list">
                    <li><a href="/">Home</a></li>
                    <li><?php echo e($productData->name); ?></li>
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
                            <img id="zoom_03" src="<?php echo e($productData->thumbnail); ?>" data-zoom-image="<?php echo e($productData->thumbnail); ?>" alt="">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div id="gallery_01" class="carousel-btn slick-arrow-3 mt-30">
                                        <a><img onClick="changeMainPic('<?php echo e($productData->thumbnail); ?>');" class="img-responsive img-thumbnail mini-img" src="<?php echo e($productData->thumbnail); ?>"/></a><?php $__currentLoopData = $productImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <a><img onClick="changeMainPic('<?php echo e($productImage->productImages); ?>');" class="img-responsive img-thumbnail mini-img" src="<?php echo e($productImage->productImages); ?>"/></a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- imgs-zoom-area end -->
                    <!-- single-product-info start -->
                    <div class="col-md-7 col-sm-7 col-xs-12"> 
                        <div class="single-product-info">
                            <h3 class="text-black-1"><?php echo e($productData->name); ?></h3>
                            <h6 class="brand-name-2"><?php echo e(\App\Http\Controllers\BrandsController::getName($productData->brand)); ?></h6>
                            <h3 class="pro-price">
                               <?php if($productData->sale_status): ?>
                                   <div class="s-price-box"><span class="new-price">$ <?php echo e($productData->sale_price); ?></span>
                                   <span class="old-price">$ <?php echo e($productData->price); ?></span></div>
                                <?php else: ?>
                                   <span class="new-price">$ <?php echo e($productData->price); ?></span>
                                <?php endif; ?>
    
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
                                        <p><?php echo e($productData->description); ?></p>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="features">
                                        <p><?php echo e($productData->features); ?></p>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="information">
                                        <p>Height: <b><?php echo e($productData->heightValue); ?> <?php echo e($productData->heightUnit); ?></b></p>
                                        <p>Lenth: <b><?php echo e($productData->lenthValue); ?> <?php echo e($productData->lenthUnit); ?></b></p>
                                        <p>Width: <b><?php echo e($productData->widthValue); ?> <?php echo e($productData->widthUnit); ?></b></p>
                                        <p>Weight: <b><?php echo e($productData->weightValue); ?> <?php echo e($productData->weightUnit); ?></b></p>
                                        <p>SKU: <b><?php echo e($productData->sku); ?></b></p>          
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
                                            <a onClick="addToWishList('<?php echo e($productData->product_id); ?>')" title="Wishlist" tabindex="0"><i class="zmdi zmdi-favorite"></i></a>
                                        </li>
                                         <?php if($productData->quantity <= 0): ?>
                                        <li>
                                        <span style="font-weight:800; font-size:16px; color:#FF6161">Out Of Stock</span>
                                        </li>
                                            <?php else: ?>
                                        <li onClick="qAddToCart('<?php echo e($productData->product_id); ?>')">
                                            <a title="Add to cart" tabindex="0"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                        </li>
                                            <?php endif; ?>
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
                     <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('layouts.subas.elements.product-box', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.subas.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>