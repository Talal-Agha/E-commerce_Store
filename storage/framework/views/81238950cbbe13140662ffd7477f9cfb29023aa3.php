<div class="col-md-12">
    <div class="shop-list product-item">
        <div class="product-img">
            <a href="/products/detail/<?php echo e($recentProduct->product_id); ?>">
                <img src="<?php echo e($recentProduct->thumbnail); ?>" alt=""/>
            </a>
        </div>
        <div class="product-info">
            <div class="clearfix">
                <h6 class="product-title f-left">
                    <a href="/products/detail/<?php echo e($recentProduct->product_id); ?>"><?php echo e($recentProduct-> name); ?></a>
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
                    <a onclick="loadQuickProduct(<?php echo e($recentProduct->product_id); ?>)" data-toggle="modal"  data-target="#productModal" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                </li>
                 <?php if($recentProduct->quantity <= 0): ?>
                <li>
                Out Of Stock
                </li>
                <?php else: ?>
                <li>
                    <a href="/cart/add/<?php echo e($recentProduct->product_id); ?>/1" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                </li>
                <?php endif; ?>
                <button onClick="removeFromWishlist('<?php echo e($recentProduct->product_id); ?>')" class="submit-btn-1 btn-hover-1">Remove <i class="zmdi zmdi-favorite"></i></button>
                </li>
            </ul>
        </div>
    </div>
</div>