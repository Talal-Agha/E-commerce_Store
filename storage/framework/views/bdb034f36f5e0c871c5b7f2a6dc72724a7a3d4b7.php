<?php if(count($errors)): ?>
  <div class="form-group">
<div class="alert alert-danger">
<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li><?php echo e($error); ?></li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>
 <?php endif; ?>
 <?php if(Session::has('message')): ?>
   <div class="alert alert-success alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?php echo e(Session::get('message')); ?>

  </div>
<?php endif; ?>
 <?php if(Session::has('error')): ?>
   <div class="alert alert-danger alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?php echo e(Session::get('error')); ?>

  </div>
<?php endif; ?>
