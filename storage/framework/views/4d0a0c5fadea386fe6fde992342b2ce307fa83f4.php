<?php $__env->startSection('Maincontent'); ?>
<?php echo $__env->make('layouts.admin.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
<h1>Add Redeem</h1>
<hr>
<br>
<form method="POST" action="/myadmin/addRedeem">
<?php echo e(csrf_field()); ?>

 <div class="form-group">
   <label>Redeem Name:*</label>
   <input type="text" name="redeemName" placeholder="Name" class="form-control" required>
  </div>

<div class="form-group">
  <label for="redeemType">Select Type:*</label>
    <select class="form-control" id="redeemType" name="redeemType"  required>
      <option value="giftCard">Gift Card</option>
      <option value="coupon">Coupon</option>
   </select>
</div>

<div class="form-group" required>
  <label for="redeemDiscountType">Select Discount Type:*</label>
   <select class="form-control" id="redeemDiscountType"  name="redeemDiscountType">
      <option value="fixed">Fixed</option>
      <option value="percentage">Percentage</option>
   </select>
</div>

<div class="form-group">
   <label>Discount:*</label>
   <input type="text" name="redeemDiscount" placeholder="Discount For User" class="form-control" required>
</div>

<div class="form-group">
 <label>Minimum Amount Require:*</label>
 <input type="text" name="minimumAmountRequire" placeholder="Minimum Amount Require" class="form-control" required>
</div>

<div class="form-group">
 <label>Number Of Time Usage Allowed: (0 For Ultimate Usage)*</label>
 <input type="text" name="usageAllow" placeholder="Usage Allowed" class="form-control" required>
</div>

<button class="btn btn-success" type="submit">Add</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>