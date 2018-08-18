<div class="product-images">
<div class="main-image images">
<img alt="" id="quickViewProductThumbnail" src="<?php echo e($product->thumbnail); ?>">
</div>
</div>
<div class="product-info">
<h1><?php echo e($product->name); ?></h1>
 <div class="price-box-3">
<div class="s-price-box">
<?php if($product->sale_status): ?>
<span class="new-price">$<?php echo e($product->sale_price); ?></span>
<span class="old-price">$<?php echo e($product->price); ?></span>
<?php else: ?>
<span class="new-price">$<?php echo e($product->price); ?></span>
<?php endif; ?>
</div>
</div>
<a href="/products/detail/<?php echo e($product->product_id); ?>" class="see-all">See all features</a>
<div class="quick-add-to-cart">
<div class="numbers-row">
 <input type="number" id="french-hens quickViewQT" min="1" value="1">
</div>
<button class="single_add_to_cart_button" 
onclick="quickProductAddToCart('<?php echo e($product->product_id); ?>')">Add to cart</button>
</div>
 <div class="quick-desc">
<?php echo e($product->description); ?>

</div>
</div>