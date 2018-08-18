<!DOCTYPE html>
<html lang="en">
<head>
 <?php echo $__env->make('layouts.admin.masterhead', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
</head>
<body> 
<div class="container-fluid main">
<div class="row">
<div class="col-sm-2 navArea">
 <?php echo $__env->make('layouts.admin.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
</div>
<div class="col-sm-10 contentArea">
 <?php echo $__env->yieldContent('Maincontent'); ?>
</div>
</div>
</div>
</body>
</html>