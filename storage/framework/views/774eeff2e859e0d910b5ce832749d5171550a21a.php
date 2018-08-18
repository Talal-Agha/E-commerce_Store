<?php $__env->startSection('mainContent'); ?>
<!-- BREADCRUMBS SETCTION START -->
        <div class="breadcrumbs-section plr-200 mb-80">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="breadcrumbs-inner">
                                <h1 class="breadcrumbs-title">Order</h1>
                                <ul class="breadcrumb-list">
                                    <li><a href="index.html">Home</a></li>
                                    <li>Order</li>
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
                        <div class="col-md-2">
                            <ul class="cart-tab">
                                <li>
                                    <a class="active" href="/cart">
                                        <span>01</span>
                                        Shopping cart
                                    </a>
                                </li>
                                <li>
                                    <a class="active"  href="/mywishlist">
                                        <span>02</span>
                                        Wishlist
                                    </a>
                                </li>
                                <li>
                                    <a class="active" href="/checkout">
                                        <span>03</span>
                                        Checkout
                                    </a>
                                </li>
                                <li>
                                    <a class="active">
                                        <span>04</span>
                                        Order complete
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-10">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- order-complete start -->
                                <div class="tab-pane active" id="order-complete">
                                    <div class="order-complete-content box-shadow">
                                        <div class="thank-you p-30 text-center">
                                            <h6 class="text-black-5 mb-0">Thank you. Your order has been received.</h6>
                                        </div>
                                        <div class="row">
                                            <!-- our order -->
                                            <div class="col-md-12">
                                    <div class="order-complete-content box-shadow">
                                        <div class="order-info p-30 mb-10">
                                            <ul class="order-info-list">
                                                <li>
                                                    <h6>order no</h6>
                                                    <p><?php echo e($order->orderNumber); ?></p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- order-complete end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SHOP SECTION END -->             

        </section>
        <!-- End page content -->
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.subas.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>