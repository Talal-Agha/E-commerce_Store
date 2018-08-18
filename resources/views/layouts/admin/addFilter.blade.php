@extends('layouts.admin.layout')
@section('Maincontent')
@include('layouts.admin.errors') 
<h1>Add Filter</h1>
<hr>
<br>
<form method="POST" action="/myadmin/addfilter">
{{ csrf_field()}}
         <div class="form-group">
           <label for="name">Filter Name</label>
           <input type="text" name="filterName" placeholder="filter Name" class="form-control" required>
          </div>
          <div class="form-group">
          <label for="for">Select For:</label>
           <select class="form-control" id="for" name="for" onchange="applyForChoice()" required>
           	<option value="">Select Search</option>
            <option value="subCategory">Sub Category</option>
            <option value="brand">Brand</option>
           </select>
        </div>
           <div class="form-group" id="typeForm" style="display:none;">
          <label for="type">Select Type:</label>
           <select class="form-control" id="type"  name="type" onchange="applyTypeChoice()">
           	<option value="">Select Type</option>
            <option value="filter">Filter</option>
            <option value="brand">Brand</option>
           </select>
        </div>
          <div class="form-group" id="subCategoryForm" style="display:none;">
          <label for="forSubCategory">Select Sub Category:</label>
           <select class="form-control" name="forSubCategory" id="forSubCategory">
            <option value="">Select Sub Category</option>
           </select>
        </div>
        <div class="form-group"  id="brandForm" style="display:none;">
          <label for="newBrand">Select Brand:</label>
           <select class="form-control" name="newBrand" id="newBrand">
            <option value="">Select Brand</option>
           </select>
        </div>
<button class="btn btn-success" type="submit">Add Filter</button>
</form>
<script>
	function applyForChoice(){
      var forValue = $("#for").val();
      if(forValue == 'subCategory'){
         $("#typeForm").slideDown();
         $("#brandForm").slideUp();
      }else if(forValue == 'brand'){
      	$("#typeForm").slideUp();
         $("#brandForm").slideDown();
         $("#subCategoryForm").slideUp();
      }else{
      	$("#brandForm").slideUp();
      	$("#typeForm").slideUp();
      	$("#subCategoryForm").slideUp();
      }
	}
	function applyTypeChoice(){
      var typeValue = $("#type").val();
      if(typeValue == 'filter'){
         $("#subCategoryForm").slideDown();
         $("#brandForm").slideUp();
      }else if(typeValue == 'brand'){
      	$("#subCategoryForm").slideDown();
         $("#brandForm").slideDown();
      }else{
      	$("#brandForm").slideUp();
      	$("#subCategoryForm").slideUp();
      }
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
	</script>
@endsection