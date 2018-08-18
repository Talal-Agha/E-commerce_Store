@extends('layouts.admin.layout')
@section('Maincontent')
@include('layouts.admin.errors') 
<h1>Categories</h1>

<!-- Trigger categories the modal with a button -->
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myCatModal">Add Category</button>
  <!-- Trigger sub-categories the modal with a button -->
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#mySubCatModal">Add Sub-Category</button>

       <!--Categories Modal -->
  <div class="modal fade" id="myCatModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Categories</h4>
        </div>
        <div class="modal-body">
         <div class="form-group">
           <label for="name">Category Name</label>
           <input type="text" id="categoryNameModel" placeholder="Category Name" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" onclick="addCategory()" data-dismiss="modal">Add Category</button>
        </div>
      </div>
    </div>
  </div>

         <!--Edit Categories Modal -->
  <div class="modal fade" id="myEditCatModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Categories</h4>
        </div>
        <div class="modal-body">
         <div class="form-group">
          <input type="hidden" id="categoryEditIdModel" class="form-control" required>
           <label for="name">Category Name</label>
           <input type="text" id="categoryEditNameModel" placeholder="Category Name" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" onclick="deleteEditCategory()" data-dismiss="modal">Delete Category</button>
          <button type="button" class="btn btn-success" onclick="saveEditCategory()" data-dismiss="modal">Save Category</button>
        </div>
      </div>
    </div>
  </div>

         <!--Sub Categories Modal -->
  <div class="modal fade" id="mySubCatModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sub Categories</h4>
        </div>
        <div class="modal-body">
         <div class="form-group">
           <label for="name">Sub Category Name</label>
           <input type="text" id="newSubCategoryName" placeholder="Sub-Category Name" class="form-control" required>
         </div>
        <div class="form-group">
          <label for="parentCategory">Select Parent Category:</label>
           <select class="form-control" name="parentCategory" class="subCategoriesParent" id="subParentCategory">
            <option value="">None</option>
           </select>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" onClick="createNewSubCategory()" data-dismiss="modal">Add Sub-Category</button>
        </div>
      </div>
    </div>
  </div>

           <!--Edit Sub Categories Modal -->
  <div class="modal fade" id="myEditSubCatModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sub Categories</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" id="editSubCategoryId">
         <div class="form-group">
           <label for="name">Sub Category Name</label>
          <input type="text" id="editSubCategoryName" class="form-control subCategoriesParent" placeholder="Sub-Category Name" required>
          </div>
          <input type="hidden" id="editSubCategoryParentId">
          <div class="form-group">
           <label for="editSubCategoryParent">Parent Category:</label>
          <input type="text" id="editSubCategoryParent" class="form-control" disabled>
        </div>
        <div class="form-group">
          <label for="forParentCategory">Change Parent Category:</label>
           <select name="forParentCategory" class="form-control" id="forParentCategory" onchange="changeEditSubCategoryParent(this.value)">
             <option value="">None</option>
           </select>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Delete Sub-Category</button>
          <button type="button" class="btn btn-success" onClick="saveChangesInEditSubCategorie()" data-dismiss="modal">Edit Sub-Category</button>
        </div>
      </div>
    </div>
  </div>

<hr>
 <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#Categories">Categories</a></li>
    <li><a data-toggle="tab" href="#SubCategories">Sub Categories</a></li>
  </ul>

  <div class="tab-content">
    <div id="Categories" class="tab-pane fade in active">
<br>
        <div class="panel panel-info">
      <div class="panel-heading">Categories</div>
      <div class="panel-body">


 <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Number of SubCategories</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
 @foreach($categories as $categorie)
      <tr>
        <td>{{$categorie->categoryId }}</td>
        <td>{{$categorie->categoryName}}</td>
        <td>{{\App\Http\Controllers\SubCategoriesController::getCount($categorie->categoryId)}}</td>
        <td>
  <button type="button" onClick="loadEditCategory('{{$categorie->categoryId }}');" data-toggle="modal" data-target="#myEditCatModal" class="btn btn-warning">Edit</button>
</td>
      </tr>
@endforeach
</tbody>
  </table>
      </div>
    </div>
    </div>
    <div id="SubCategories" class="tab-pane fade">
      <h3>Sub Categories</h3>
   
 @foreach($categories as $categorie)
    <div class="panel panel-info">
      <div class="panel-heading"><b>ID: </b>{{$categorie->categoryId }}
        <b> Name: </b>{{$categorie->categoryName}}
        </div>
      <div class="panel-body">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Sub Id</th>
        <th>Sub Name</th>
        <th>Sub Total Products</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
@foreach(\App\Http\Controllers\CategoriesController::forSubCategories($categorie->categoryId) as $forSubCategorie)
      <tr>
        <td>{{$forSubCategorie->subCategoryId}}</td>
        <td>{{$forSubCategorie->subCategoryName}}</td>
        <td>{{\App\Http\Controllers\CategoriesController::subCategoriesProducts($forSubCategorie->subCategoryId)}}</td>
        <td>
        <button type="button" data-toggle="modal" onClick="loadEditSubCategory('{{$forSubCategorie->subCategoryId}}');" data-target="#myEditSubCatModal" class="btn btn-warning">Edit</button>
        </td>
      </tr>
@endforeach   
    </tbody>
  </table>

    </div>
    </div>
   @endforeach    


    </div>
<script type="text/javascript">
function categorySearch(){
var from = $('#from').val();
var search = $("#search").val();
var request = $.ajax({
  url: "/myadmin/searchcategorie",
  type: "POST",
  data: {
    "_token": "{{ csrf_token() }}",
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
function addCategory(){
var name = $("#categoryNameModel").val();

var request = $.ajax({
  url: "/myadmin/addcategorie",
  type: "POST",
  data: {
    "_token": "{{ csrf_token() }}",
    categoryName: name
  },
  dataType: "html"


});
 $("#categoryNameModel").val("");
}
function loadEditCategory(id){
var request = $.ajax({
  url: "/myadmin/loadEditcategorie",
  type: "POST",
  data: {
    "_token": "{{ csrf_token() }}",
    categoryId: id,
  },
   dataType: "html",
   success: function(response) {
    if(response != 0){
    var parsedData = JSON.parse(response);
     $("#categoryEditNameModel").val(parsedData[0].categoryName);
 $("#categoryEditIdModel").val(parsedData[0].categoryId);
  }
   },
});

}
function saveEditCategory(){
var id = $("#categoryEditIdModel").val();
var name = $("#categoryEditNameModel").val();

var request = $.ajax({
  url: "/myadmin/editcategorie",
  type: "POST",
  data: {
    "_token": "{{ csrf_token() }}",
    categoryId: id,
    categoryName: name
  },
  dataType: "html"


});
 $("#categoryEditNameModel").val("");
 $("#categoryEditIdModel").val("");
}
function deleteEditCategory(){
var id = $("#categoryEditIdModel").val();

var request = $.ajax({
  url: "/myadmin/editcategorie/delete",
  type: "POST",
  data: {
    "_token": "{{ csrf_token() }}",
    categoryId: id,
  },
  success: function(response) {
    if(response != 0){
       alert("Category Sucessfully Deleted.");
       location.reload();
     }else{
       alert("Category Not Sucessfully Deleted.");
     }
   },
  dataType: "html"
});

}
function createNewSubCategory(){
 var name =  $("#newSubCategoryName").val();
var parentCategory = $("#subParentCategory").val();
var request = $.ajax({
  url: "/myadmin/createNewSubCategory",
  type: "POST",
  data: {
    "_token": "{{ csrf_token() }}",
    SubCategoryName: name,
    ParentCategory: parentCategory
  },
   success: function(response) {
alert("Sub Category Added");
   }
});

}
function loadEditSubCategory(id){
var request = $.ajax({
  url: "/myadmin/loadEditSubCategorie",
  type: "POST",
  data: {
    "_token": "{{ csrf_token() }}",
    subCategoryId: id,
  },
   success: function(response) {
    console.log(response);
    if(response){
$("#editSubCategoryId").val(response.id);
$("#editSubCategoryName").val(response.subName);
$("#editSubCategoryParentId").val(response.categoryId);
$("#editSubCategoryParent").val(response.categoryName);
  }
   }
});

}
function changeEditSubCategoryParent(id){
  getSubCategoriesEdit();
var request = $.ajax({
  url: "/myadmin/loadEditSubCategorieParent/get/",
  type: "POST",
  data: {
    "_token": "{{ csrf_token() }}",
    categoryId: id,
  },
   success: function(response) {
    if(response){
$("#editSubCategoryParentId").val(response.id);
$("#editSubCategoryParent").val(response.name);
  }else{
    alert("ERROR IN CHANGE EDIT SUBCATEGORY PARENT.");
  }
   }
});
}
getSubCategoriesParents();
function getSubCategoriesParents(){
$.ajax({
            url : "/myadmin/subcategorie/getSubCategoriesForModel",
            type:'GET',
            success: function(response) {
              $(".subCategoriesParent").attr('disabled', false);

               $.each(JSON.parse(response),function(categoryId, categories)
                {      
                    $(".subCategoriesParent").append('<option value=' + categories.categoryId + '>' + categories.categoryName + '</option>');
                });


             }
        });
}
getSubCategoriesParents2();
function getSubCategoriesParents2(){
$.ajax({
            url : "/myadmin/subcategorie/getSubCategoriesForModel",
            type:'GET',
            success: function(response) {
              $("#subParentCategory").attr('disabled', false);

               $.each(JSON.parse(response),function(categoryId, categories)
                {      
                    $("#subParentCategory").append('<option value=' + categories.categoryId + '>' + categories.categoryName + '</option>');
                });


             }
        });
}
getSubCategoriesEdit();
function getSubCategoriesEdit(){
$.ajax({
            url : "/myadmin/subcategorie/getSubCategoriesForModel",
            type:'GET',
            success: function(response) {
              $("#forParentCategory").attr('disabled', false);
               $.each(JSON.parse(response),function(categoryId, categories)
                {      
                    $("#forParentCategory").append('<option value=' + categories.categoryId + '>' + categories.categoryName + '</option>');
                });


             }
        });
}
function saveChangesInEditSubCategorie(){
$("#editSubCategoryParent").val();
var request = $.ajax({
  url: "/myadmin/saveChangesInEditSubCategorie",
  type: "POST",
  data: {
    "_token": "{{ csrf_token() }}",
    subCategoryId:  $("#editSubCategoryId").val(),
    subCategoryName: $("#editSubCategoryName").val(),
    subCategoryParentId: $("#editSubCategoryParentId").val()
  },
   success: function(response) {
     alert("Changes Saved");
   }
});

}
</script>
@endsection