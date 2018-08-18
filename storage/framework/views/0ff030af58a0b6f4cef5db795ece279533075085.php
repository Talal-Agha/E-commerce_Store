
<?php $__env->startSection('Maincontent'); ?>
<?php echo $__env->make('layouts.admin.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<h1>Users</h1>
<a href="/myadmin/adduser"><button class="btn btn-success">Add Admin User</button></a>
<hr>
 <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Privillage</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
 <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eachUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($eachUser->name); ?></td>
        <td><?php echo e($eachUser->email); ?></td>
        <td><?php echo e($eachUser->privilege); ?></td>
        <td>
  <button type="button" onClick="location.href ='/myadmin/editUser/<?php echo e($eachUser->email); ?>/<?php echo e($eachUser->privilege); ?>';" class="btn btn-danger">Edit</button></td>
      </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
  </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>