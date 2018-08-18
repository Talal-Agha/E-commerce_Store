
<?php $__env->startSection('Maincontent'); ?>
<?php echo $__env->make('layouts.admin.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<h1>Update User</h1>
<form method="POST" action="/myadmin/deleteuser">
<?php echo e(csrf_field()); ?>

<input name="email" id="email" value="<?php echo e($user->email); ?>" type="hidden" required>
<input name="privilege" id="privilege" value="<?php echo e($user->privilege); ?>" type="hidden" required>
<button class="btn btn-danger" type="submit">Delete User</button>
</form>
<form method="POST" action="/myadmin/updateuser/generalInfo">
<?php echo e(csrf_field()); ?>

<input name="privilege" id="privilege" value="<?php echo e($user->privilege); ?>" type="hidden" required>
<div class="form-group">
<label for="email">E-Mail</label>
<input name="email" id="email" type="email" value="<?php echo e($user->email); ?>" class="form-control" readonly required>
</div>
<div class="form-group">
<label for="name">Name</label>
<input   name="name" type="text" id="name" value="<?php echo e($user->name); ?>" placeholder="Name" class="form-control" required>
</div>
<button class="btn btn-success" type="submit">Update User General Info</button>
</form>
<hr>
<form method="POST" action="/myadmin/updateuser/password">
<?php echo e(csrf_field()); ?>

<input name="email" id="email" value="<?php echo e($user->email); ?>" type="hidden" required>
<input name="privilege" id="privilege" value="<?php echo e($user->privilege); ?>" type="hidden" required>
<div class="form-group">
 <label for="password">Password</label>
<input   name="password" type="password" id="password" placeholder="Password" class="form-control" required>
</div>
<div class="form-group">
<label for="password_confirmation">Password Confirmation</label>
<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
</div>
<button class="btn btn-success" type="submit">Update Password</span></button>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>