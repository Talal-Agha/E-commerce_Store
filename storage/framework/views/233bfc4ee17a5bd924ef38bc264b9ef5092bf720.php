<?php $__env->startSection('mainContent'); ?>
<?php use App\Http\Controllers\FiltersController;?>
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
                        <?php if(isset($filters) && count($filters) || isset($filtersByBrands)  && count($filtersByBrands)): ?>
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
 <?php if(isset($filters) && count($filters) || isset($filtersByBrands) && $filtersByBrands!= 0): ?>
                        <div class="col-md-3 col-xs-12">
                            <aside class="widget widget-categories box-shadow mb-30">
                                <h6 class="widget-title border-left mb-20">Filter</h6>
 <?php if(isset($filters) && count($filters)!= 0): ?>                                
                                <div id="cat-treeview" class="product-cat" id="filter-product-cat">
                                    <ul>                                      
                                        <li class="open"><a><?php echo e($name); ?></a>
                                            <ul id="filterList">
<div class="checkbox"><label>
    <input onClick="viewAll('<?php echo e($subCategoryId); ?>','<?php echo e($for); ?>')" type="checkbox" id="viewAll"><a>View All</a>
</label>

</li>
                                                <?php $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
<div class="checkbox"><label>
    <input name="filterChkBox[]" onClick="filterCheckBoxHandler('<?php echo e($subCategoryId); ?>','<?php echo e($for); ?>')" type="checkbox" 
    value="<?php echo e($filter->filter_id); ?>" id="filterChkBoxId"
    ><a><?php echo e($filter->filterName); ?></a>
</label>
</div>
</li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
<?php endif; ?>
<?php if(isset($filtersByBrands) && count($filtersByBrands) != 0 ): ?>
                                <div id="cat-treeview" class="product-cat" id="filter-product-cat">
                                    <ul>                                      
                                        <li class="open"><a>Filter By Brand</a>
                                            <ul id="filterList">
                                                <?php $__currentLoopData = $filtersByBrands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filtersByBrand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
<div class="checkbox"><label>
    <input name="filterBrandChkBox[]" onClick="brandFilterCheckBoxHandler('<?php echo e($subCategoryId); ?>')" type="checkbox" 
    value="<?php echo e($filtersByBrand->brand_id); ?>"
    ><a><?php echo e($filtersByBrand->filterName); ?></a>
</label>
</div>
</li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </ul>
                                        </li>
                                    </ul>
                                </div>
<?php endif; ?>
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
var brandFilterIds = [];

function viewAll(id,thisfor){
    filterIds.length = 0;
    brandFilterIds.length = 0;
    $('input#filterChkBoxId').prop('checked', false); 
    $('input#filterChkBox').prop('checked', false); 
    var cbarray = document.getElementsByName('filterBrandChkBox[]');
    for(var i = 0; i < cbarray.length; i++){

        cbarray[i].checked = false;
}
updateGridView(id);
updateListView(id);
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
updateGridView(id);
updateListView(id);
}

function updateGridView(SubCategoryId){
var request = $.ajax({
  url: "/products/getFilters/updateGridView",
  type: "POST",
  data: {
    "_token": "<?php echo e(csrf_token()); ?>",
    filterId: filterIds,
    subCategoryId:SubCategoryId
  },
   success: function(response) {
    if(response != 0){
     $("#filter_grid_view").html(response);
    }
   }
});
}
function updateListView(SubCategoryId){
    var request = $.ajax({
  url: "/products/getFilters/updateListView",
  type: "POST",
  data: {
    "_token": "<?php echo e(csrf_token()); ?>",
    filterId: filterIds,
    subCategoryId: SubCategoryId
  },
   success: function(response) {
    if(response != 0){
$("#filter_list_view").html(response);
  }
   }
});
}

function brandFilterCheckBoxHandler(SubCategoryId){
      $('#viewAll').prop('checked', false); 
          var cbarray = document.getElementsByName('filterChkBox[]');
    for(var i = 0; i < cbarray.length; i++){

        cbarray[i].checked = false;
} 

var checkboxes = document.getElementsByName('filterBrandChkBox[]');
if(brandFilterIds.length>0){
brandFilterIds.length = 0;
}
for (var i=0, n=checkboxes.length;i<n;i++) {
    if (checkboxes[i].checked) 
    {
         brandFilterIds.push(checkboxes[i].value);
    }
}
updateBrandGridView(SubCategoryId);
updateBrandListView(SubCategoryId);
}
function updateBrandGridView(SubCategoryId){
var request = $.ajax({
  url: "/products/getFilters/brand/updateGridView",
  type: "POST",
  data: {
    "_token": "<?php echo e(csrf_token()); ?>",
    filterId: brandFilterIds,
    subCategoryId:SubCategoryId
  },
   success: function(response) {
     $("#filter_grid_view").html(response);   }
});
}
function updateBrandListView(SubCategoryId){
    var request = $.ajax({
  url: "/products/getFilters/brand/updateListView",
  type: "POST",
  data: {
    "_token": "<?php echo e(csrf_token()); ?>",
    filterId: brandFilterIds,
    subCategoryId: SubCategoryId
  },
   success: function(response) {
$("#filter_list_view").html(response);
   }
});
}
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.subas.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>