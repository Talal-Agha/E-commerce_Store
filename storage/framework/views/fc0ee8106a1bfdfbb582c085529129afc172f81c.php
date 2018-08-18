
<?php $__env->startSection('mainContent'); ?>
<style>
a.filterHeading{
    width:auto;
    font-weight:bold;
    margin: 5px;
}
a.filterName{
width:auto !important;
font-size: 20px !important;
margin:5px;
}
</style>
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
                        <?php if(isset($filtersForBrandsPage)  && count($filtersForBrandsPage)): ?>
                        <div class="col-md-9 col-xs-12">
                            <?php else: ?>
                         <div class="col-md-12 col-xs-12">
                             <?php endif; ?>
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
                                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo $__env->make('layouts.subas.elements.product-box', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
                                                <?php if($loop->iteration % 3 == 0): ?>
                                                        </div>
                                                        <div class="row">
                                                    <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                            <center><h1>Coming Soon...</h1></center>
                                            <?php endif; ?>
                                            <!-- product-item end -->
                                        </div>
                                        </div>
                                    <!-- list-view -->
                                    <div role="tabpanel" class="tab-pane" id="list-view">
                                        <div class="row" id="filter_list_view">
                                            <!-- product-item-Liststart -->
                                            <?php if(count($products)): ?>
                                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php echo $__env->make('layouts.subas.elements.product-list-box', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
<center><h1>Coming Soon...</h1></center>
<?php endif; ?>
                                            <!-- product-item-List end -->
                                        </div>                                        
                                    </div>
                                </div>
                                <!-- Tab Content end -->
                            </div>
                        </div>
 <?php if(isset($filtersForBrandsPage) && count($filtersForBrandsPage)): ?>
                        <div class="col-md-3 col-xs-12">
                            <aside class="widget widget-categories box-shadow mb-30">
                                <h6 class="widget-title border-left mb-20">Filter</h6>                 
<div id="cat-treeview" class="product-cat" id="filter-product-cat">
<ul>                                      
<li class="open"><a><?php echo e($name); ?></a>
<ul id="filterList">
<div class="checkbox">
  <label>
    <input onClick="viewAll('<?php echo e($id); ?>','<?php echo e($for); ?>')" type="checkbox" id="viewAll"><a>View All</a>
</label>
</div>
</li>
<?php $__currentLoopData = $filtersForBrandsPage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li>
<div class="checkbox">
<label>
<input name="filterChkBox[]" onClick="filterCheckBoxHandler('<?php echo e($id); ?>','<?php echo e($for); ?>')" type="checkbox" value="<?php echo e($filter->filter_id); ?>" id="filterChkBoxId"><a><?php echo e($filter->filterName); ?></a>
</label>
</div>
</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
</ul>
</div>   
</aside> 
</div>                                                 
<?php endif; ?>
</div>
</div>
</div>
</div>
</section>
    <script>
var filterIds = [];
function viewAll(id,thisfor){
    filterIds.length = 0;
    $('input#filterChkBoxId').prop('checked', false); 
    $('input#filterChkBox').prop('checked', false); 
    var cbarray = document.getElementsByName('filterBrandChkBox[]');
    for(var i = 0; i < cbarray.length; i++){
        cbarray[i].checked = false;
}
updateGridViewForBrand(id);
updateListViewForBrand(id); 
}

function filterCheckBoxHandler(id,thisfor){
     $('#viewAll').prop('checked', false); 
var checkboxes = document.getElementsByName('filterChkBox[]');
if(filterIds.length>0){
filterIds.length = 0;
}
for (var i=0, n=checkboxes.length;i<n;i++) {
    if (checkboxes[i].checked) 
    {
         filterIds.push(checkboxes[i].value);
    }
}
var cbarray = document.getElementsByName('filterBrandChkBox[]');
    for(var i = 0; i < cbarray.length; i++){

        cbarray[i].checked = false;
} 
updateGridViewForBrand(id);
updateListViewForBrand(id); 
}

function updateGridViewForBrand(brandId){
var request = $.ajax({
  url: "/brands/getFilters/updateGridView",
  type: "POST",
  data: {
    "_token": "<?php echo e(csrf_token()); ?>",
    filterId: filterIds,
    brandId:brandId
  },
   success: function(response) {
    if(response != 0){
     $("#filter_grid_view").html(response);
    }
   }
});
}
function updateListViewForBrand(brandId){
    var request = $.ajax({
  url: "/brands/getFilters/updateListView",
  type: "POST",
  data: {
    "_token": "<?php echo e(csrf_token()); ?>",
    filterId: filterIds,
    brandId: brandId
  },
   success: function(response) {
    if(response != 0){
$("#filter_list_view").html(response);
  }
   }
});
}

    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.subas.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>