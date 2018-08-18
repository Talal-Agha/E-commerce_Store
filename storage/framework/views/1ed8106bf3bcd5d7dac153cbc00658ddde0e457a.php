<div class="total-cart f-left">
    <div class="total-cart-in">
        <div class="cart-toggler">
            <a>
                <span class="cart-quantity"><b><?php echo e($cartCount); ?></b></span><br>
                <span class="cart-icon">
                    <i class="zmdi zmdi-shopping-cart-plus"></i>
                </span>
            </a>                            
        </div>
        <ul>
            <li>
                <div class="top-cart-inner your-cart">
                    <h5 class="text-capitalize">Your Cart (<b><?php echo e($cartCount); ?></b>)</h5>
                </div>
            </li>
            <li>
                <div class="total-cart-pro">
                    <!-- single-cart -->
            <?php $i = 0; ?>
            <?php $__currentLoopData = $cartProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($i >= 2): ?>
            <?php break; ?>
            <?php endif; ?>
            <?php echo $__env->make('layouts.subas.elements.single-cart', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
             <?php$i++;?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </li>
            <li>
                <div class="top-cart-inner subtotal">
                    <h4 class="text-uppercase g-font-2">
                        Subtotal=
                        <span>$ <?php echo e($cartAmount); ?></span>
                    </h4>
                </div>
            </li>
            <li>
                <div class="top-cart-inner view-cart">
                    <h4 class="text-uppercase">
                        <a href="/cart">View cart</a>
                    </h4>
                </div>
            </li>
            <li>
                <div class="top-cart-inner check-out">
                    <h4 class="text-uppercase">
                        <a href="/checkout">Check out</a>
                    </h4>
                </div>
            </li>
        </ul>
    </div>
</div>
