@extends('layouts.admin.layout')
@section('Maincontent')
@include('layouts.admin.errors') 
<h1>Brands</h1>

<!-- Trigger brands the modal with a button -->
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myCatModal">Add Brand</button>
 <!--brands Modal -->
  <div class="modal fade" id="myCatModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Brands</h4>
        </div>
        <div class="modal-body">
         <div class="form-group">
           <label for="name">Brand Name</label>
           <input type="text" id="brandNameModel" placeholder="Brand Name" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" onclick="addBrand()" data-dismiss="modal">Add Brand</button>
        </div>
      </div> 
    </div>
  </div>

         <!--Edit brands Modal -->
  <div class="modal fade" id="myEditCatModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Brands</h4>
        </div>
        <div class="modal-body">
         <div class="form-group">
          <input type="hidden" id="brandEditIdModel">
           <label for="name">Brand Name</label>
           <input type="text" id="brandEditNameModel" placeholder="Brand Name" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" onclick="deleteEditBrand()" data-dismiss="modal">Delete Brand</button>
          <button type="button" class="btn btn-success" onclick="saveEditBrand()" data-dismiss="modal">Save Brand</button>
        </div>
      </div>
    </div>
  </div>
<hr>
 <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
 @foreach($brands as $brand)
      <tr>
        <td>{{$brand->brand_id }}</td>
        <td>{{$brand->brandName}}</td>
        <td>
  <button type="button" onClick="loadEditBrand({{$brand->brand_id}});" data-toggle="modal" data-target="#myEditCatModal" class="btn btn-warning">Edit</button>
</td>
      </tr>
@endforeach
</tbody>
  </table>

<script type="text/javascript">
function brandId(){
var from = $('#from').val();
var search = $("#search").val();
var request = $.ajax({
  url: "/myadmin/searchbrand",
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
function addBrand(){
var name = $("#brandNameModel").val();

var request = $.ajax({
  url: "/myadmin/addbrand",
  type: "POST",
  data: {
    "_token": "{{ csrf_token() }}",
    brandName: name
  }
});
 $("#brandNameModel").val("");
}
function loadEditBrand(id){
var request = $.ajax({
  url: "/myadmin/loadEditbrand",
  type: "POST",
  data: {
    "_token": "{{ csrf_token() }}",
    brandId: id
  },
   success: function(response) {
    if(response != null){
     $("#brandEditIdModel").val(response.brand_id);
     $("#brandEditNameModel").val(response.brandName);
  }
   }
});
}
function saveEditBrand(){
var id = $("#brandEditIdModel").val();
var name = $("#brandEditNameModel").val();
var request = $.ajax({
  url: "/myadmin/saveEditBrand",
  type: "POST",
  data: {
    "_token": "{{ csrf_token() }}",
    brandId: id,
    brandName: name
  },
  success: function(response) {
    console.log(response);
    if(response == 1){
     $("#brandEditNameModel").val("");
     $("#brandEditIdModel").val("");
     alert("Changes Saved");
    }else{
     alert("Error!! Please Try Again");
    }
  }
});
}
function deleteEditBrand(){
var id = $("#brandEditIdModel").val();

var request = $.ajax({
  url: "/myadmin/deleteEditBrand",
  type: "POST",
  data: {
    "_token": "{{ csrf_token() }}",
    brandId: id,
  },
  success: function(response) {
    if(response != 0){
       alert("Brand Sucessfully Deleted.");
       location.reload();
     }else{
       alert("Brand Not Sucessfully Deleted.");
     }
   }
});

}
</script>
@endsection