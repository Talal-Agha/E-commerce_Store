
<?php $__env->startSection('Maincontent'); ?>
<?php echo $__env->make('layouts.admin.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
<h1>Redeem</h1>
<a class="btn btn-info" href="/myadmin/addRedeem">Add New</a>
<hr>
  <div class="panel panel-info">
    <div class="panel-heading">Redeem</div>
      <div class="panel-body">

<?php if(count($redeems)): ?>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Discount Type</th>
        <th>Discount</th>
        <th>Minimum Amount</th>
        <th>Usage Allowed</th>
        <th>Created At</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
 <?php $__currentLoopData = $redeems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $redeem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($redeem->redeemName); ?></td>
         <td><?php echo e($redeem->redeemType); ?></td>
        <td><?php echo e($redeem->redeemDiscountType); ?></td>
        <td><?php echo e($redeem->redeemDiscount); ?></td>
        <td><?php echo e($redeem->minimumAmountRequire); ?></td>
        <td><?php echo e($redeem->usageAllow); ?></td>
        <td><?php echo e($redeem->created_at); ?></td>
        <td>
  <a href="/myadmin/editRedeem/<?php echo e($redeem->redeemName); ?>" class="btn btn-info" >Edit</a>
</td>
      </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
  </table>
  <?php else: ?>
<center><h1>0 Redeems Found</h1></center>
  <?php endif; ?>
      </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>