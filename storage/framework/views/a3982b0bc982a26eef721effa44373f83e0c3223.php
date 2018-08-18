
<?php $__env->startSection('Maincontent'); ?>
<?php echo $__env->make('layouts.admin.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
<?php use App\Http\Controllers\SubCategoriesController;?>
<h1>Filters</h1>

<!-- Trigger filters the modal with a button -->
  <a href="/myadmin/addfilter"><button type="button" class="btn btn-info">Add filter</button></a>
 <!--filters Modal -->
  <div class="modal fade" id="myCatModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">filters</h4>
        </div>
        <div class="modal-body">
         <div class="form-group">
           <label for="name">Filter Name</label>
           <input type="text" id="filterNameModel" placeholder="filter Name" class="form-control" required>
          </div>
           <div class="form-group">
          <label for="type">Select Type:</label>
           <select class="form-control" id="type">
            <option value="filter">Filter</option>
            <option value="brand">Brand</option>
           </select>
        </div>
          <div class="form-group">
          <label for="forSubCategory">Select Sub Category:</label>
           <select class="form-control" id="forSubCategory">
            <option value="">None</option>
           </select>
        </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-success" onclick="addfilter()" data-dismiss="modal">Add filter</button>
        </div>
      </div>
    </div>
  </div>

         <!--Edit filters Modal -->
  <div class="modal fade" id="myEditCatModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">filters</h4>
        </div>
        <div class="modal-body">
         <div class="form-group">
          <input type="hidden" id="filterEditIdModel" class="form-control" required>
           <label for="name">Filter Name</label>
           <input type="text" id="filterEditNameModel" placeholder="filter Name" class="form-control" required>
          </div>
        <div class="form-group">
         <div class="brandHolder">
           <label for="filterEditBrandModel">Filter For Brand</label>
             <select class="form-control" id="filterEditBrandModel">
              <option value="">None</option>
           </select>
        </div>
       </div>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" onclick="deleteEditfilter()" data-dismiss="modal">Delete filter</button>
          <button type="button" class="btn btn-success" onclick="saveEditfilter()" data-dismiss="modal">Save filter</button>
        </div>
      </div>
    </div>
  </div>




<hr>
 <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#filters">filters</a></li>
    <li><a data-toggle="tab" href="#Search">Search</a></li>
  </ul>

  <div class="tab-content">
    <div id="filters" class="tab-pane fade in active">
<br>
        <div class="panel panel-info">
      <div class="panel-heading">filters</div>
      <div class="panel-body">


 <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Sub Category</th>
        <th>Type</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
 <?php $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($filter->filter_id); ?></td>
        <td><?php echo e($filter->filterName); ?></td>
        <td><?php echo SubCategoriesController::getSubCategoriesNameForProducts($filter->subCategoryId); ?></td>
        <td><?php echo e($filter->type); ?></td>
        <td>
  <button type="button" onClick="loadEditfilter('<?php echo e($filter->filter_id); ?>')" data-toggle="modal" data-target="#myEditCatModal"class="btn btn-warning">Edit</button>
</td>
      </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
  </table>
      </div>
    </div>
    </div>
    <div id="Search" class="tab-pane fade">
    <br>
        <div class="panel panel-info">
      <div class="panel-heading">Search</div>
      <div class="panel-body"> 
      <div class="well">
      <div class="row">
      <div class="col-sm-4">
      <label for="searchType">Filter Type:</label>
        <select id="searchType" class="form-control">
          <option value="all">All</option>
          <option value="filter">Filter</option>
          <option value="brand">Brand</option>
        </select>
        </div>
        <div class="col-sm-4">
        <label for="search">Search For:</label>
        <div class="input-group">
      <input type="text" id="search" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-default" onClick="searchFilter()" type="button">Search</button>
      </span>
       </div>
        </div> 
    </div>
  </div>
            <div id="searchResults">

       </div> 
      </div>
    </div>

  </div>
<script type="text/javascript">
function filterId(){
var from = $('#from').val();
var search = $("#search").val();
var request = $.ajax({
  url: "/myadmin/searchfilter",
  type: "POST",
  data: {
    "_token": "<?php echo e(csrf_token()); ?>",
    search : search,
    from: from
  },
  dataType: "html",
});

request.done(function(msg) {
  console.log( msg );
});

request.fail(function(jqXHR, textStatus) {
  alert( "Request failed: " + textStatus );
});
}
function addfilter(){
var name = $("#filterNameModel").val();
var forSubCategory = $("#forSubCategory").val();
var type = $("#type").val();
var brandId = $("#filterBrandModel").val();

var request = $.ajax({
  url: "/myadmin/addfilter",
  type: "POST",
  data: {
    "_token": "<?php echo e(csrf_token()); ?>",
    filterName: name,
    forSubCategory: forSubCategory,
    type: type,
    brandId: brandId
  },
 success: function(response) {
    if(response != "ERROR"){
 $("#filterNameModel").val("");
 $("#forSubCategory").val("");
 alert("Filter Successfully Added");
 location.reload();
  }else{
 alert("Filter Not Successfully Added");  
  }
   }
});

}
function loadEditfilter(id){
console.log("Id "+id);
var request = $.ajax({
  url: "/myadmin/loadEditfilter",
  type: "POST",
  data: {
    "_token": "<?php echo e(csrf_token()); ?>",
    filterId: id
  },
   success: function(response) {
    if(response != 0){
      var parsedData = JSON.parse(response);
     $("#filterEditNameModel").val(parsedData.filterName);
 $("#filterEditIdModel").val(parsedData.filter_id);
  }
   }
});

}
function saveEditfilter(){
var id = $("#filterEditIdModel").val();
var name = $("#filterEditNameModel").val();
var brandId = $("#filterBrandModel").val();

var request = $.ajax({
  url: "/myadmin/saveEditfilter",
  type: "POST",
  data: {
    "_token": "<?php echo e(csrf_token()); ?>",
    filterId: id,
    filterName: name,
    brandId: brandId
  }
});
 $("#filterEditNameModel").val("");
 $("#filterEditIdModel").val("");
}
function deleteEditfilter(){
var id = $("#filterEditIdModel").val();

var request = $.ajax({
  url: "/myadmin/editfilter/delete",
  type: "POST",
  data: {
    "_token": "<?php echo e(csrf_token()); ?>",
    filterId: id,
  },
  success: function(response) {
    if(response != 0){
       alert("filter Sucessfully Deleted.");
       location.reload();
     }else{
       alert("filter Not Sucessfully Deleted.");
     }
   }
});

}
function searchFilter(){
  var searchFor = $("#search").val();
  if(!searchFor){
    alert("PLEASE ENTER SOMETHING TO SEARCH");
  }
  $.ajax({
            url : "/myadmin/searchfilter",
            type:'POST',
            data: {
    "_token": "<?php echo e(csrf_token()); ?>",
    searchFor:searchFor,
    searchType:$("#searchType").val()
  },
            success: function(response) {
                $('#searchResults').html(response);    
             }
        });
}
getSubCategories();
function getSubCategories(){
$.ajax({
            url : "/myadmin/subcategorie/getSubCategoriesForProducts",
            type:'GET',
            dataType: 'json',
            success: function(response) {
              $("#forSubCategory").attr('disabled', false);
               $.each(response,function(getId, get){
                 $("#forSubCategory").append('<option value=' + get.subCategoryId + '>' + get.subCategoryName + '</option>');
                });
             }
        });
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>