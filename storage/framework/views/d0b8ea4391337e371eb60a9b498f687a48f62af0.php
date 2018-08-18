<div class="single-cart clearfix">
   <div class="cart-img f-left" style="width: 19%;">
    <a href="/products/detail/<?php echo e($cartProduct->id); ?>">
  <img width="100%" src="<?php echo e($cartProduct->thumbnail); ?>" alt="Cart Product" />
     </a>
    <div class="del-icon">
     <a href="/cart/remove/<?php echo e($cartProduct->id); ?>">
       <i class="zmdi zmdi-close"></i>
      </a>
    </div>
   </div>
     <div class="cart-info f-left" style="width: 80%;">
       <h6 class="text-capitalize">
         <a href="/products/detail/<?php echo e($cartProduct->id); ?>"><?php echo e($cartProduct->name); ?></a>
      </h6>
        <p style="margin-left:14px"><span><strong>Brand:<?php echo e(\App\Http\Controllers\BrandsController::getName($cartProduct->brand)); ?></strong></span></p>
   </div>
</div>