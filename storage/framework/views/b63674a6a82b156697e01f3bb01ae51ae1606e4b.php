<?php $__env->startSection('mainContent'); ?> 
<!-- BREADCRUMBS SETCTION START -->
        <div class="breadcrumbs-section plr-200 mb-80">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <ul class="breadcrumb-list">
                                    <li><a href="index.html">Home</a></li>
                                    <li>Shopping Cart</li>
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
                                    <div class="shop-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <ul class="cart-tab">
                                <li>
                                    <a class="active" href="/cart">
                                        <span>01</span>
                                        Shopping cart
                                    </a>
                                </li>
                                <li>
                                    <a href="/mywishlist">
                                        <span>02</span>
                                        Wishlist
                                    </a>
                                </li>
                                <li>
                                    <a href="/checkout" >
                                        <span>03</span>
                                        Checkout
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span>04</span>
                                        Order complete
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-10 col-sm-10">
                            <!-- Tab panes -->
                                <!-- shopping-cart start -->
                                <div class="tab-pane active" id="shopping-cart">
                                    <div class="shopping-cart-content">
                                            <div class="table-content table-responsive mb-50">
                                                <table class="text-center">
                                                    <thead>
                                                        <tr>
                                                            <th class="product-thumbnail">product</th>
                                                            <th class="product-price">price</th>
                                                            <th class="product-quantity">Quantity</th>
                                                            <th class="product-subtotal">total</th>
                                                            <th class="product-remove">remove</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- tr -->
                                                        <?php $__currentLoopData = $totalProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totalProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                          <?php echo $__env->make('layouts.subas.elements.cart-product', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                                                    </tbody>
                                                </table>
                                               <a href="/checkout"><button class="submit-btn-1 mt-30 btn-hover-1">check out</button></a>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">

                                                </div>
                                                <div class="col-md-6">
<?php echo $__env->make("layouts.subas.elements.cartTotalCard", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
                                                </div>
                                            </div>
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
              function changeQuantity(id){
                  var qb = document.getElementById('qb'+id).value;
                  var redirectPage = '/cart/update/quantity/'+id+'/'+qb;
                  location.href = redirectPage;
              }
               function deleteItem(id){
                  var redirectPage = '/cart/remove/'+id;
                  location.href = redirectPage;
              }
            </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.subas.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>