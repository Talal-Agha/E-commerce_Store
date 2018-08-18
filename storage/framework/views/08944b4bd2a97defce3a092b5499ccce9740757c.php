<?php $__env->startSection('Maincontent'); ?>
<?php echo $__env->make('layouts.admin.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
<h1>Order Details of <b><?php echo e($order->orderNumber); ?></b></h1>
<hr>
<div class="row">
  <div class="col-sm-4">
    <div class="panel panel-info">
      <div class="panel-heading"><center>Order Info</center></div>
      <div class="panel-body">
<p><b>Total Amount:</b> <span class="label label-success"><?php echo e($order->totalAmount); ?></span></p>
<p><b>Tax:</b> <span class="label label-success"><?php echo e($order->tax); ?></span></p>
<p><b>Total Products:</b> <span class="label label-info"><?php echo e(count($orderProducts)); ?></span></p>
<p><b>Email Status:</b> 
  <?php switch($order->emailStatus):
    case (0): ?>
       <span class="label label-danger">Order Recived Mail Not Send</span>
        <?php break; ?>
    <?php case (1): ?>
        <span class="label label-warning">Order Recived Mail Send</span>
        <?php break; ?>
    <?php case (2): ?>
        <span class="label label-success">Confirm Mail Send</span>
        <?php break; ?>
    <?php case (3): ?>
        <span class="label label-success">Order Recived Mail Send</span>
        <?php break; ?>
    <?php default: ?>
        <span class="label label-danger">ERROR</span>
<?php endswitch; ?></p>
<p><b>Edi Status:</b> 
  <?php switch($order->ediStatus):
    case (0): ?>
       <span class="label label-danger">EDI Not Send</span>
        <?php break; ?>
    <?php case (1): ?>
        <span class="label label-success">EDI Send</span>
        <?php break; ?>
    <?php default: ?>
        <span class="label label-danger">ERROR</span>
<?php endswitch; ?></p>
<p><b>Created At: </b><span class="label label-info"><?php echo e($order->created_at); ?></span></p>
<p><b>Last Updated At: </b><span class="label label-info"><?php echo e($order->updated_at); ?></span></p></div>
    </div>
  </div>
   <div class="col-sm-4">
        <div class="panel panel-info">
      <div class="panel-heading"><center>Account Info</center></div>
      <div class="panel-body">
        <p><b>Email:</b> <?php echo e($order->email); ?></p>
        <p><b>Name:</b> <?php echo e($order->name); ?></p>
        <p><b>Account Type:</b> <?php echo e($order->accountType); ?></p>
        <p><b>Address:</b> <?php echo e($order->address); ?></p>
        <p><b>City:</b> <?php echo e($order->city); ?></p>
        <p><b>State:</b> <?php echo e($order->state); ?></p>
        <p><b>Zip:</b> <?php echo e($order->zip); ?></p>
      </div>
    </div>
     </div>
   <div class="col-sm-4">
        <div class="panel panel-info">
      <div class="panel-heading"><center>Actions</center></div>
      <div class="panel-body">
        <?php if($order->emailStatus == 0 || $order->emailStatus == 1): ?>
<form method="POST" action="/myadmin/orders/sendConfirmMail">
<?php echo e(csrf_field()); ?>

  <input type="hidden" name="orderNumber" value="<?php echo e($order->orderNumber); ?>">
 <center> <button type="submit" class="btn btn-warning">Send Confirm Mail</button></center>
</form>
<?php elseif($order->emailStatus == 2): ?>
<form method="POST" action="/myadmin/orders/sendOrderReadyForPickupMail">
<?php echo e(csrf_field()); ?>

  <input type="hidden" name="orderNumber" value="<?php echo e($order->orderNumber); ?>">
 <center> <button type="submit" class="btn btn-warning">Send Order Recived Mail</button></center>
</form>
<?php else: ?>
<center><h3>No Actions Required</h3></center>
<?php endif; ?>
      </div>
    </div>
    <?php if($order->redeemStatus): ?>
    <div class="panel panel-info">
      <div class="panel-heading"><center>Redeem Info</center></div>
      <div class="panel-body">
        <p><b>Name:</b> <?php echo e($order->redeemName); ?></p>
        <p><b>Type:</b> <?php echo e($order->redeemType); ?></p>
        <p><b>Discount:</b> $-<?php echo e($order->redeemDiscount); ?></p>
      </div>
    </div>
    <?php endif; ?>
     </div>
    <div class="col-sm-12">
<div class="panel panel-info">
      <div class="panel-heading"><center>Order Products</center></div>
      <div class="panel-body">
 <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
<?php $__currentLoopData = $orderProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td><?php echo e($product->product_Id); ?></td>
<td><?php echo e($product->name); ?></td>
<td><?php echo e($product->quantity); ?></td>
<td><?php echo e($product->price); ?></td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
  </table>
</div>
     </div>
   </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>