<?php $__env->startSection('Maincontent'); ?>
<?php echo $__env->make('layouts.admin.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
<h1>Edit Redeem</h1>
<hr>
<br>
<form method="POST" action="/myadmin/saveEditRedeem">
<?php echo e(csrf_field()); ?>

<input type="hidden" name="id" value="<?php echo e($redeem->id); ?>" required>
 <div class="form-group">
   <label>Redeem Name:*</label>
   <input type="text" name="redeemName" placeholder="Name" class="form-control" value="<?php echo e($redeem->redeemName); ?>" required>
  </div>

<div class="form-group">
  <label for="redeemType">Select Type:*</label>
    <select class="form-control" id="redeemType" name="redeemType" required>
      <?php if($redeem->redeemType == 'giftCard'): ?>
        <option value="giftCard">Gift Card</option>
        <option value="coupon">Coupon</option>
      <?php elseif($redeem->redeemType == 'coupon'): ?>
         <option value="coupon">Coupon</option>
          <option value="giftCard">Gift Card</option>
      <?php endif; ?>
   </select>
</div>

<div class="form-group" required>
  <label for="redeemDiscountType">Select Discount Type:*</label>
   <select class="form-control" id="redeemDiscountType"  name="redeemDiscountType">
      <?php if($redeem->redeemDiscountType == 'fixed'): ?>
      <option value="fixed">Fixed</option>
      <option value="percentage">Percentage</option>
      <?php elseif($redeem->redeemDiscountType == 'percentage'): ?>
      <option value="percentage">Percentage</option>
      <option value="fixed">Fixed</option>
      <?php endif; ?>
   </select>
</div>

<div class="form-group">
   <label>Discount:*</label>
   <input type="text" name="redeemDiscount" placeholder="Discount For User" class="form-control" value="<?php echo e($redeem->redeemDiscount); ?>" required>
</div>

<div class="form-group">
 <label>Minimum Amount Require:*</label>
 <input type="text" name="minimumAmountRequire" placeholder="Minimum Amount Require" class="form-control" value="<?php echo e($redeem->minimumAmountRequire); ?>" required>
</div>

<div class="form-group">
 <label>Number Of Time Usage Allowed: *</label>
 <input type="text" name="usageAllow" placeholder="Usage Allowed" class="form-control" value="<?php echo e($redeem->usageAllow); ?>" required>
</div>

<button class="btn btn-success" type="submit">Edit</button>
<a class="btn btn-danger pull-right" href="/myadmin/deleteRedeem/<?php echo e($redeem->id); ?>">Delete</a>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>