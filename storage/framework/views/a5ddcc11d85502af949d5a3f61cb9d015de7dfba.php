
<?php $__env->startSection('Maincontent'); ?>
<?php echo $__env->make('layouts.admin.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
<h1>Add User</h1>
<form method="POST" action="/myadmin/adduser">
<?php echo e(csrf_field()); ?>

<div class="form-group">
 <label for="name">Name</label>
<input   name="name" type="text" id="name" placeholder="User Name" class="form-control" required>
</div>
<div class="form-group">
 <label for="email">E-Mail</label>
<input   name="email" id="email" type="email" placeholder="E-Mail" class="form-control" required>
</div>
<div class="form-group">
 <label for="password">Password</label>
<input   name="password" type="password" id="password" placeholder="Password" class="form-control" required>
    </div>
    <div class="form-group">
    <label for="password_confirmation">Password Confirmation</label>
    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
  </div>
<button class="btn btn-success" type="submit">Add User <span class="glyphicon glyphicon-log-in"></span></button>
</form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>