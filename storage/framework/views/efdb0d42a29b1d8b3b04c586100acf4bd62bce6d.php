<tr>
 <td class="product-thumbnail">
<div class="pro-thumbnail-img">
<img src="<?php echo e($totalProduct->thumbnail); ?>" alt="">
</div>
<div class="pro-thumbnail-info text-left">
<h6 class="product-title-2">
<a href="/products/detail/<?php echo e($totalProduct->id); ?>"><?php echo e($totalProduct->name); ?></a>
</h6>
<p>Brand:<?php echo e(\App\Http\Controllers\BrandsController::getName($totalProduct->brand)); ?></p>
</div>
</td>
<td class="product-price">$ <?php echo e($totalProduct->price); ?></td>
 <td class="product-quantity">
 <input type="text" value="<?php echo e($totalProduct->quantity); ?>" id="qb<?php echo e($totalProduct->id); ?>" onChange="changeQuantity(<?php echo e($totalProduct->id); ?>)" class="cart-plus-minus-box">
</td>
<td class="product-subtotal">$ <?php echo e($totalProduct->price*$totalProduct->quantity); ?></td>
<td class="product-remove">
<center><a onclick="deleteItem(<?php echo e($totalProduct->id); ?>)"><i class="zmdi zmdi-close"></i></a></center>
</td>
</tr>