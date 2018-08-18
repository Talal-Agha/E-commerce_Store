<div class="col-md-12">
    <div class="shop-list product-item">
        <div class="product-img">
            <a href="/products/detail/<?php echo e($recentProduct-> product_id); ?>">
                <img src="<?php echo e($recentProduct->thumbnail); ?>" alt=""/>
            </a>
        </div>
        <div class="product-info">
            <div class="clearfix">
                <h6 class="product-title f-left">
                    <a href="/products/detail/<?php echo e($recentProduct-> product_id); ?>"><?php echo e($recentProduct-> name); ?></a>
                </h6>
            </div>
            <h6 class="brand-name mb-30">
                <?php echo e(\App\Http\Controllers\BrandsController::getName($recentProduct->brand)); ?>

            </h6>
            <h3 class="pro-price">            
            <?php if($recentProduct->sale_status): ?>
             <div class="s-price-box"><span class="new-price">$ <?php echo e($recentProduct->sale_price); ?></span>
             <span class="old-price">$ <?php echo e($recentProduct->price); ?></span></div>
            <?php else: ?>
             <span class="new-price">$ <?php echo e($recentProduct->price); ?></span>
            <?php endif; ?>
           </h3>
            <p style="overflow:hidden;max-height: 15ch;display: inline-block;"><?php echo e($recentProduct->description); ?>...</p>
            <ul class="action-button">
                <li>
            <a onClick="addToWishList('<?php echo e($recentProduct->product_id); ?>')" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                </li>
                <li>
                    <a onclick="loadQuickProduct(<?php echo e($recentProduct->product_id); ?>)" data-toggle="modal"  data-target="#productModal" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                </li>
                <?php if($recentProduct->quantity <= 0): ?>
                <li>
                   <span style="font-weight:800; font-size:16px; color:#FF6161"> Out Of Stock</span>
                </li>
                                                                            <?php else: ?>
                <li>
                    <a href="/cart/add/<?php echo e($recentProduct->product_id); ?>/1" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                </li>
                <?php endif; ?>
                
            </ul>
        </div>
    </div>
</div>