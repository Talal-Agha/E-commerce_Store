<?php $__env->startSection('mainContent'); ?>
<?php
use App\OrderProducts;
?>

<!-- BREADCRUMBS SETCTION START -->
<div class="breadcrumbs-section plr-200 mb-80">
<div class="breadcrumbs overlay-bg">
<div class="container">
<div class="row">
<div class="col-xs-12">
    <div class="breadcrumbs-inner">
        <ul class="breadcrumb-list">
            <li><a href="/">Home</a></li>
            <li>My Profile</li>
        </ul>
    </div>
</div>
</div>
</div>
</div>
</div>
<!-- BREADCRUMBS SETCTION END -->

<!-- Start page content -->
<div id="page-content" class="page-wrapper">

<!-- LOGIN SECTION START -->
<div class="login-section mb-80">
<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
    <div class="my-account-content" id="accordion2">
        <!-- My Personal Information -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion2" href="#personal_info"><i class="zmdi zmdi-account custom-icon"></i> My Personal Information</a>
                </h4>
            </div>
            <div id="personal_info" class="panel-collapse collapse in" role="tabpanel">
                <div class="panel-body" style="margin: 15px;">
                       <h3>Name: <?php echo e(Auth::user()->name); ?></h3>
                       <h3>E-Mail: <?php echo e(Auth::user()->email); ?></h3>
                       <h3>State: <?php echo e(Auth::user()->state); ?></h3>
                  </div>
            </div>
        </div>
        <!-- My Order info -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion2" href="#My_order_info"><i class="zmdi zmdi-truck custom-icon"></i> My Orders</a>
                </h4>
            </div>
     <div class="panel-body">
        <div id="My_order_info" class="panel-collapse collapse" role="tabpanel" >
                    <?php if(!count($forOrders)): ?>
<center><h3 style="margin: 15px;">Your Dont Have Any Orders Yet.</h3></center>
<?php else: ?>                                    
                <div class="table-content table-responsive mb-50">
                    <table class="text-center">
                        <thead>
                            <tr>
                                <th class="product-thumbnail"><b>Order Number</b></th>
                                <th class="product-price"><b>Price</b></th>
                                <th class="product-subtotal"><b>Total Products</b></th>
                            </tr>
                        </thead>
                       <tbody>
                          <?php $__currentLoopData = $forOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr>
                             <td><h6><?php echo e($order->orderNumber); ?></h6></td>
                             <td><h6><?php echo e($order->totalAmount); ?></h6></td>
                             <td><h6><?php echo e(OrderProducts::
                                where('orderNumber',$order->orderNumber)
                                ->where('email',auth()->user()->email)
                                ->count()); ?></h6></td>
                            </tr>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            </tbody>
                        </table>
                    </div>
                  <?php endif; ?>
              </div>
            </div>
          </div>
       <!-- My WishList -->
    <div class="panel panel-default">
        <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion2" href="#My_wishlist"><i class="zmdi zmdi-favorite custom-icon"></i> My WishList</a>
                </h4>
            </div>
        <div id="My_wishlist" class="panel-collapse collapse" role="tabpanel" >
                <div class="panel-body">
                    <?php if(!count($forWishlist)): ?>
                     <center><h3 style="margin: 15px;">Your WishList is Empty.</h3></center>
                    <?php else: ?>                                    
                     <?php $__currentLoopData = $forWishlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php echo $__env->make('layouts.subas.elements.product-list-box-for-wishlist', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- LOGIN SECTION END -->
<!-- End page content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.subas.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>