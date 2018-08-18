<?php $__env->startSection('Maincontent'); ?>
<?php echo $__env->make('layouts.admin.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<style type="text/css">
  .errorsBar{
    height:5%;
  }
  .filterSubcategory{
    color: #DCDCDC;
  }
</style>
<h1>Products</h1>
<a href="/myadmin/addproduct"><button class="btn btn-success">Add Product</button></a>
<button class="btn btn-info" onclick="authenticate().then(loadClient)">Update Database with Google Merchant</button>
<p id="googleDatabaseResponse"></p>
<div class="row errorsBar">
  <div class="col-sm-3">
    <center>Total Products</center>
    <center><b><p id="totalProductsCounter"></p></b></center>
  </div>
  <div class="col-sm-3">
        <center>Total Products without Categories</center>
    <center><b><p id="totalProductsCategoriesCounter"></p></b></center>
  </div>
  <div class="col-sm-3">
        <center>Total Products without Brands</center>
    <center><b><p id="totalProductsBrandsCounter"></p></b></center>
  </div>
  <div class="col-sm-3">
        <center>Total Products without Filters</center>
    <center><b><p id="totalProductsFilterCounter"></p></b></center>
  </div>
  </div>
<hr>
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Products</a></li>
    <li><a data-toggle="tab" href="#menu1">Search</a></li>
    <li><a data-toggle="tab" href="#liveMenu">Live Updates</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
  <table class="table table-hover table-bordered">
    <thead>
<?php  echo view("layouts.admin.elements.product-search-table-header")->render();
?>
    </thead>
    <tbody>
 <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php  echo view("layouts.admin.elements.product-search-table-row",compact("productData"))->render();
?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
  </table>
    </div>
    <div id="menu1" class="tab-pane fade">
        <div class="panel panel-info">
      <div class="panel-heading">Search</div>
      <div class="panel-body"> 
      <div class="well">
      <div class="row">
        <div class="col-sm-1">
    <b><p>Name = </p></b>
</div>
<div class="col-sm-3">
<input type="text" id="search" class="form-control" placeholder="Search for...">
</div>
<div class="col-sm-2">
<b><p>Category = </p></b>
</div>
<div class="col-sm-4">
<select class="searchCategory form-control" id="newcategory" >
   <option value="all">All</option>
  <option value="notSet">Not Set</option>
</select>
</div>
        </div> 
<div class="row">
        <div class="col-sm-1">
    <b><p>Filter = </p></b>
</div>
<div class="col-sm-3">
<select class="form-control searchFilter" id="newfilter">
  <option value="all">All</option>
  <option value="notSet">Not Set</option>
</select>
</div>
<div class="col-sm-2">
<b><p>Brand = </p></b>
</div>
<div class="col-sm-4">
<select class="form-control searchBrand" id="newBrand">
  <option value="all">All</option>
  <option value="notSet">Not Set</option>
</select>
</div>
        </div> 
          <button class="btn btn-default" onClick="searchForProduct()" type="button">Search</button>
    </div>
    </div>
      </div>
      <div id="results">

      </div>
      
<div id="quickEditPanel">
<center><h2>Quick Edit</h2></center>
<hr>
<div class="row">
<form action="/myadmin/quickEditProducts" method="post">
 <?php echo e(csrf_field()); ?>

<div class="col-sm-7">
<h4>Products to Edit</h4>
<hr>
<div class="row" id="quickEdit">

</div>
</div>
<div class="col-sm-5">
<h4>Edits</h4>
<hr>
<div class="form-group">
<label for="category">Select Category to Update:</label>
<select class="form-control" id="newcategory" name="newcategory">
  <option value="notSet">Select Category</option>
</select>
</div>
<div class="form-group">
<label for="newfilter">Select Filter to Update:</label>
<select class="form-control" id="newfilter" name="newfilter">
  <option value="notSet">Select Filter</option>
</select>
</div>
<div class="form-group">
<label for="newBrand">Select Brand to Update:</label>
<select class="form-control" id="newBrand" name="newBrand">
  <option value="notSet">Select Brand</option>
</select>
</div>
<button class="btn btn-info pull-right" type="submit">Update</button>
</div>
  </form>  
  </div> 
  </div>
    </div>
    <div id="liveMenu" class="tab-pane fade in active">
          <div class="well"> 
            <div class="row">
              <div class="col-sm-6">
                  <div class="form-group">
                  <label for="showProducts">Show Products:</label>
                  <select class="form-control" id="showProducts">
                    <option>20</option>
                    <option>40</option>
                    <option>60</option>
                    <option>80</option>
                    <option>100</option>
                  </select>
                  </div>
                </div>    
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="lessCount">Quantity Less Then:</label>
                  <input type="number" class="form-control" min="0" id="lessCount">
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" id="startSevice">Start Service</label>
                </div>  
              </div>  
          </div>
        </div>  
      </div>
    <div id="serviceResult">
    
    </div>
    </div>
    </div>
  </div>
  <script>
    getTotalErrorsCount();
    window.setInterval(function(){
 getTotalErrorsCount();
 liveService();
}, 5000);
function getTotalErrorsCount(){
$.ajax({
            url : "/myadmin/products/totalErrorsCounter",
            type:'GET',
            success: function(response) {
               var decode = JSON.parse(response);
               $("#totalProductsCounter").text(decode.totalProducts);
               $("#totalProductsCategoriesCounter").text(decode.categoryCount);
               $("#totalProductsBrandsCounter").text(decode.brandCount);
               $("#totalProductsFilterCounter").text(decode.filterCount);
             }
        });
}
var productIdsForQuickEdit =[];
      function findProductCategoryName(id){
$.ajax({
            url : "/myadmin/subCategories/findProductCategoryName/"+id,
            type:'GET',
            success: function(response) {
return response+"ad";
             }
        });
}
function searchForProduct(){
$('#results').html('<center><h1>Searching....</h1></center>');
var category = $('.searchCategory').val();
var brand = $('.searchBrand').val();
var filter = $('.searchFilter').val();
 var search = $("#search").val();
 var request = $.ajax({
  url: "/myadmin/products/search",
  type: "POST",
   data:{ 
    "_token": "<?php echo e(csrf_token()); ?>",
    search:search,
    category:category, 
    filter:filter, 
    brand:brand
  }
});
request.done(function(replyResult) {
$('#results').html(replyResult);        
});
request.fail(function(jqXHR, textStatus) {
  alert( "Request failed: " + textStatus);
});
}


function goToEditProduct(id){
location.href ='/myadmin/products/editProduct/'+id;
}


function goToDeleteProduct(id){
location.href ='/myadmin/deleteProduct/'+id;
}

function addToQuickEdit(productId){
  var found = jQuery.inArray(productId, productIdsForQuickEdit);
if (found >= 0) {
    productIdsForQuickEdit.splice(found, 1);
} else {
    productIdsForQuickEdit.push(productId);
}

quickEditChange();
}
function quickEditChange(){
  if ($("#productsIds").length){
      $("input[name='productsIds[]']").remove();  
}
$(productIdsForQuickEdit).each(function(index, productId){
 $('#quickEdit').append("<div class='col-sm-3'><input class='form-control' id ='productsIds' class='productsIds' name='productsIds[]' value='"+productId+"' readonly /></div>");
});
}
getSubCategories();
function getSubCategories(){
$.ajax({
            url : "/myadmin/subcategorie/getSubCategoriesForProducts",
            type:'GET',
            dataType: 'json',
            success: function(response) {
              $("[id=newcategory]").attr('disabled', false);
               $.each(response,function(subCategoryId, subCategoryName){
                 $("[id=newcategory]").append('<option value=' + subCategoryName.subCategoryId + '>' + subCategoryName.subCategoryName + '</option>');
                });
             }
        });
}

getFilters();
function getFilters(){
$.ajax({
            url : "/myadmin/filters/getFiltersForProducts",
            type:'GET',
            dataType: 'json',
            success: function(response) {
              $("[id=newfilter]").attr('disabled', false);
               $.each(response,function(getId, get){
                 $("[id=newfilter]").append('<option value=' + get.filter_id + '>' + get.filterName + ' (' + get.subCategoryName+')</option>');
                });
             }
        });
}

getBrands();
function getBrands(){
$.ajax({
            url : "/myadmin/filters/getAll",
            type:'GET',
            dataType: 'json',
            success: function(response) {
              $("[id=newBrand]").attr('disabled', false);
               $.each(response,function(getId, get){
                 $("[id=newBrand]").append('<option value=' + get.brand_id + '>' + get.brandName + '</option>');
                });
             }
        });
}
function liveService(){
  if(!$('#startSevice').is(':checked')){
return "No Need";
  }
  console.log("Pinging");
 var request = $.ajax({
  url: "/myadmin/products/liveService",
  type: "POST",
   data:{ 
    "_token": "<?php echo e(csrf_token()); ?>",
    showProducts: $('#showProducts').val(),
    lessCount: $('#lessCount').val()
  }
});
request.done(function(replyResult) {
$('#serviceResult').html(replyResult);        
});
request.fail(function(jqXHR, textStatus) {
  alert( "Request Live Service failed: " + textStatus);
});
}

var googleDatabaseResponseStatus = document.getElementById("googleDatabaseResponse");
  function authenticate() {
    return gapi.auth2.getAuthInstance()
        .signIn({scope: "https://www.googleapis.com/auth/content"})
        .then(function() {
          console.log("Sign-in successful");
        }, function(error) {
          console.error("Error signing in", error);
        });
  }
  function loadClient() {
    return gapi.client.load("https://content.googleapis.com/discovery/v1/apis/content/v2/rest")
        .then(function() {
          console.log("GAPI client loaded for API");
          execute(1);
        }, function(error) {
          googleDatabaseResponseStatus.innerHTML = 'Error Signin';
          console.error("Error loading GAPI client for API");
        });
  }
  function execute(page) {
    return gapi.client.content.products.list({
      "merchantId": "7614199",
      "pageToken": page,
      "alt": "json"
    })
        .then(function(response) {
          sendData(response.body);
      
        }, function(error) {
          console.error("Execute error", error);
        });
  }
  gapi.load("client:auth2", function() {
    gapi.auth2.init({client_id: "727397622581-0k78j6oqr3dmvfur178bpf8rai9aqto1.apps.googleusercontent.com"});
  });
  function sendData(mydata) {
    console.log(mydata);
  var request = $.ajax({
  url: "/myadmin/updateProducts/tabel",
  type: "POST",
  data:{ 
    "_token": "<?php echo e(csrf_token()); ?>",
    mydata: mydata}
});
request.done(function(response) {
var obj = JSON.parse(response);
 if(obj.nextPage){
googleDatabaseResponseStatus.innerHTML = '<B>GOOGLE MERCHANT API WORKING<B>...';
execute(obj.nextPage);
 }else{
  googleDatabaseResponseStatus.innerHTML = '<B>GOOGLE MERCHANT API OPERATIONS COMPLETED.<B>';
 }
});

request.fail(function(jqXHR, textStatus) {
  googleDatabaseResponseStatus.innerHTML = 'Error Chk Console';
  console.log(jqXHR);
  alert( "Request failed: " + textStatus );
});
}
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>