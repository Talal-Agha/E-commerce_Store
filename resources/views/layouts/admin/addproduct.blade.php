@extends('layouts.admin.layout')
@section('Maincontent')
@include('layouts.admin.errors')
<style>
#tags{
  float:left;
  width:100%;
  border:1px solid #ccc;
  padding:5px;
  font-family:Arial;
}
#tags > span{
  cursor:pointer;
  display:block;
  float:left;
  color:#fff;
  background:#789;
  padding:5px;
  padding-right:25px;
  margin:4px;
}
#tags > span:hover{
  opacity:0.7;
}
#tags > span:after{
 position:absolute;
 content:"×";
 border:1px solid;
 padding:2px 5px;
 margin-left:3px;
 font-size:11px;
}
#tags > input{
  background:#eee;
  border:0;
  margin:4px;
  padding:7px;
  width:auto;
}
</style>
<h1>Add Product</h1>
<hr>
<form method="POST" id="addprductForm" action="/myadmin/addprduct" enctype="multipart/form-data">
<div class="row">
{{ csrf_field()}}
<div class="col-sm-8">
<div class="form-group">
 <label for="name">Product Name*:</label>
<input name="name" type="text" id="name" placeholder="Product Name" class="form-control" required>
</div>
<div class="form-group">
 <label for="description">Product Description*:</label>
<textarea name="description" rows="6" type="text" id="description" placeholder="Product Description" class="form-control" required></textarea>
</div>
<div class="form-group">
 <label for="features">Product Features (optional):</label>
<textarea name="features" rows="6" type="text" id="features" placeholder="Product Fetures (optional)" class="form-control"></textarea>
</div>
<div class="row">
    <div class="col-sm-4">
<div class="form-group">
<label for="price">Product Price*:</label>
<input name="price" type="text" id="price" placeholder="Product Price" class="form-control" required>
</div>
<div class="form-group">
<label for = "sale_status">Sale Status:</label>
<div class="checkbox">
<label><input type="checkbox" name="sale_status" id="sale_status" value="1">On Sale</label>
</div>
</div>
<div class="form-group">
<label for="sale_price">Product Sale Price:</label>
<input name="sale_price" type="text" id="sale_price" placeholder="Product Sale Price" class="form-control" required>
</div>
</div>
<div class="col-sm-4">
<div class="form-group">
<label for="upc">Product UPC #:</label>
<input name="upc" type="text" id="upc" placeholder="Product UPC Num" class="form-control" required>
</div>
<div class="form-group">
<label for = "available">Available Status:</label>
<div class="checkbox">
<label><input type="checkbox" name="available" id="available" value="1">Available</label>
</div>
</div>
<div class="form-group">
<label for="sku">Product Sku #:</label>
<input name="sku" type="text" id="sku" placeholder="Product SKU Num" class="form-control" required>
</div>
    </div>
    <div class="col-sm-4">
<div class="form-group">
<label>Product Quantity Available:</label>
<input name="quantity" type="number" placeholder="Product Quantity" class="form-control" required>
</div>
<div class="form-group">
<label for = "checkForUpdates">Check For Updates:</label>
<div class="checkbox">
<label><input type="checkbox" name="checkForUpdates" id="checkForUpdates" value="1">Check For Updates</label>
</div>
</div>
</div>
</div>
<label for="tags">Product Tags:</label>
  <div id="tags">
    <input type="text" id="addNewTag" placeholder="Add a tag" />
  </div>
<div class="form-group">
<label>Product Image URL#:</label>
<input type="url" id="productImageUrl" placeholder="Product Image Url Like https://www......" class="form-control">
<button class="btn btn-info pull-right" onclick="addProductImage()" type="button">Add To Images</button>
</div>
<label>Product Images #:</label>
<table class="table table-bordered" style="width:300px" id="productImagesTable">
</table>
</div>
<div class="col-sm-4">
<div class="panel panel-info">
  <div class="panel-body">
    <div class="form-group">
    <label for="category">Select Category*:</label>
    <select class="form-control" name="category" id="category" required>
      <option value="">None</option>
       @foreach($subCategories as $subCategory)
          <option value="{{$subCategory->subCategoryId}}">{{$subCategory->subCategoryName}}</option>
       @endforeach
    </select>
   </div>
  </div>
</div>
<div class="panel panel-info">
<div class="panel-body">
<div class="form-group">
<label for="brand">Select Brand:</label>
<select class="form-control" id="brand" name="brand" required>
    <option value="">None</option>
    @foreach($brands as $brand)
        <option value="{{$brand->brand_id}}">{{$brand->brandName}}</option>
    @endforeach
</select>
</div>
</div>
</div>
<div class="panel panel-info">
  <div class="panel-body">
   <div class="form-group">
  <label for="thumbnail">Select Product Thumbnail:*</label>
  <input type="url" id="thumbnail" name="thumbnail" placeholder="Image Url Like https://www......" class="form-control" required>
<button class="btn btn-info pull-right" onclick="loadThumbnail()" type="button">Load Thumbnail</button>
<img id="productLoadedThumbnail" style="width:100%;">
</div>
  </div>
</div>
<hr>
<button class="btn btn-success pull-right" id="addProduct" type="submit">Add Product</button>
</div>
</div>
</form>
<script>
  function loadThumbnail(){
    var url = $("#thumbnail").val();
    if(!url){
       return;
    }
    $("#productLoadedThumbnail").attr('src',url);
  }
  function deleteProductImage(index){
      document.getElementById("productImagesTable").deleteRow(index);
  }
  function addProductImage() {
    var table = document.getElementById('productImagesTable');
    var url = $("#productImageUrl").val()
    if(!url){
      return;
    }
    var row = table.insertRow(0);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    cell1.innerHTML = '<img src="'+url+'" style="width:100px"><input type="hidden" name="productImages[]" value="'+url+'">';
    cell2.innerHTML = '<center><button class="btn" onclick="deleteProductImage(this.rowIndex)" type="button">Remove</button></center>';
}
  $(function(){ $("#addNewTag").on({focusout : function() {
      var txt= this.value.replace(/,/g,''); // allowed characters
      if(txt)  $("#tags").prepend("<span><input type='hidden' value='"+txt+"' name='productTags[]' readonly>"+txt+"</span>");
      this.value="";
    },
    keyup : function(ev) {
      if(/(188)/.test(ev.which)) $(this).focusout(); 
    }
  });
  $('#tags').on('click', 'span', function() {
     $(this).remove(); 
  });

});
</script>
@endsection