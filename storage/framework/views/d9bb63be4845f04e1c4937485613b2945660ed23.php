<?php $__env->startSection('mainContent'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- BREADCRUMBS SETCTION START -->
<div class="breadcrumbs-section plr-200 mb-80">
<div class="breadcrumbs overlay-bg">
<div class="container">
<div class="row">
<div class="col-xs-12">
<div class="breadcrumbs-inner">
<ul class="breadcrumb-list">
<li><a href="/">Home</a></li>
<li><?php echo e($name); ?></li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- BREADCRUMBS SETCTION END -->
<!-- Start page content -->
<section id="page-content" class="page-wrapper">
<!-- SHOP SECTION START -->
<div class="shop-section mb-80">
<div class="container">
<div class="row">
<div class="col-md-12 col-xs-12">
<div class="shop-content">

<div class="shop-option box-shadow mb-30 clearfix">
<!-- Nav tabs -->
<ul class="shop-tab f-left" role="tablist">
    <li class="active">
        <a href="#grid-view" data-toggle="tab"><i class="zmdi zmdi-view-module"></i></a>
    </li>
    <li>
        <a href="#list-view" data-toggle="tab"><i class="zmdi zmdi-view-list-alt"></i></a>
    </li>
</ul>                                
</div>
<!-- shop-option end -->
<!-- Tab Content start -->
<div class="tab-content">
<!-- grid-view -->
<div role="tabpanel" class="tab-pane active" id="grid-view">
    <div class="row" id="filter_grid_view">
        <!-- product-item start -->
        <?php if(count($products)): ?>
        <center>Total Products <?php echo e(count($products)); ?></center>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('layouts.subas.elements.product-box', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <center><h1>0 results found. Please refine your search and try again...</h1></center>
        <?php endif; ?>
        <!-- product-item end -->
    </div>
</div>
<!-- list-view -->
<div role="tabpanel" class="tab-pane" id="list-view">
    <div class="row" id="filter_list_view">
        <!-- product-item-Liststart -->
        <?php if(count($products)): ?>
        <center>Total Products <?php echo e(count($products)); ?></center>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('layouts.subas.elements.product-list-box', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <center><h1>0 results found. Please refine your search and try again...</h1></center>
        <?php endif; ?>
        <!-- product-item-List end -->
    </div>                                        
</div>
</div>
<!-- Tab Content end -->
</div>
</div>

</div>                      
</div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.subas.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>