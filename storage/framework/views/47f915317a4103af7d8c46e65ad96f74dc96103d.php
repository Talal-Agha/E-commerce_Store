<?php $__env->startSection('Maincontent'); ?>
<?php echo $__env->make('layouts.admin.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
<h1>Edit Product</h1>
<hr>
<form method="POST" id="addprductForm" action="/myadmin/updateProduct" 
enctype="multipart/form-data">
<input id="productId" name="productId" id="productId" type="hidden" 
value="<?php echo e($productData->product_id); ?>">
<div class="row">
<?php echo e(csrf_field()); ?>

<div class="col-sm-12">
<div class="form-group">
<label for="productName">Product Name*:</label>
<input name="productName" type="text" id="productName" value="<?php echo e($productData->name); ?>" 
placeholder="Product Name" class="form-control" required>
</div>
</div>
<div class="col-sm-8">
<div class="form-group">
<label for="productDescription">Product Description*:</label>
<textarea name="productDescription" rows="6" type="text" id="productDescription" 
placeholder="Product Description" class="form-control" required></textarea>
</div>
<div class="form-group">
<label for="productFeatures">Product Features (optional):</label>
<textarea name="productFeatures" rows="6" type="text" id="productFeatures" 
placeholder="Product Fetures (optional)" class="form-control"></textarea>
</div>
<div class="row">
    <div class="col-sm-4">
<div class="form-group">
<label for="productPrice">Product Price*:</label>
<input name="productPrice"  value="<?php echo e($productData->price); ?>" type="text" id="productPrice" placeholder="Product Price" class="form-control" required>
</div>
<div class="form-group">
<label for = "sale_status">Sale Status:</label>
<div class="checkbox">
<?php if($productData->sale_status === 1): ?>
<label><input type="checkbox" name="sale_status" id="sale_status" checked>On Sale</label>
<?php else: ?>
<label><input type="checkbox" name="sale_status" id="sale_status">On Sale</label>
<?php endif; ?>
</div>
</div>
<div class="form-group">
<label for="productSalePrice">Product Sale Price:</label>
<input name="productSalePrice" value="<?php echo e($productData->sale_price); ?>"  type="text" 
id="productSalePrice" placeholder="Product Price" class="form-control">
</div>
    </div>
    <div class="col-sm-4">
<div class="form-group">
<label for="productUPCNo">Product UPC #:</label>
<input name="productUPCNo"  value="<?php echo e($productData->upc); ?>" type="number" id="productUPCNo" placeholder="Product UPC Num" class="form-control">
</div>
<div class="form-group">
<label for = "available">Available Status:</label>
<div class="checkbox">
<?php if($productData->available === 1): ?>
<label><input type="checkbox" name="available" id="available" checked>Available</label>
<?php else: ?>
<label><input type="checkbox" name="available" id="available">Available</label>
<?php endif; ?>
</div>
</div>
<div class="form-group">
<label for="productSKUNo">Product Sku #:</label>
<input name="productSKUNo" value="<?php echo e($productData->sku); ?>"  type="number" id="productSKUNo" placeholder="Product SKU Num" class="form-control">
</div>
    </div>
    <div class="col-sm-4">
<div class="form-group">
<label for="productQuantity">Product Quantity Available:</label>
<input name="productQuantity"  value="<?php echo e($productData->quantity); ?>" type="number" id="productQuantity" placeholder="Product Quantity" class="form-control">
</div>
<div class="form-group">
<label for = "checkForUpdates">Check For Updates:</label>
<div class="checkbox">
<?php if($productData->checkForUpdates === 1): ?>
<label><input type="checkbox" name="checkForUpdates" id="checkForUpdates" checked>Check For Updates</label>
<?php else: ?>
<label><input type="checkbox" name="checkForUpdates" id="checkForUpdates">Check For Updates</label>
<?php endif; ?>
</div>
</div>
    </div>
</div>
<label for="tags">Product Tags:</label>
  <div id="tags">
            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<span><input type='hidden' value='<?php echo e($tag->tagName); ?>' name='productTags[]' readonly><?php echo e($tag->tagName); ?></span>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <input type="text" id="addNewTag" placeholder="Add a tag" />
  </div>
<table class="table table-bordered" style="width:300px">
    <thead>
      <tr>
        <th>Image</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody id="productImagesTable">
        <?php $__currentLoopData = $productImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td>
            <img src="<?php echo e($productImage->productImages); ?>" style="width:100px">
            <input type="hidden" name="productImages[]" value="<?php echo e($productImage->productImages); ?>">
        </td>
        <td>
            <center>
                <button type="button" onClick="deleteProductImage(this.rowIndex)" class="btn btn-danger">Delete</button>
            </center>
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
</div>
<div class="col-sm-4">
<div class="panel panel-info">
<div class="panel-body">
<div class="form-group">
<label for="category">Category:</label>
<input type="hidden" value="<?php echo e($productData->category); ?>" name="category" id="category">
<input class="form-control" value="<?php echo e($productData->subCategoryName); ?>" id="categoryName" readonly>
</div>
<div class="form-group">
<label for="category">Select Category:</label>
<select class="form-control" id="newcategory" onchange="$('#categoryName').val($(this).find('option:selected').text());$('#category').val(this.value)">
<option value="notSet">Select Category</option>
</select>
</div>
</div>
</div>
<div class="panel panel-info">
<div class="panel-body">
<div class="form-group">
<label for="brand">Brand:</label>
<input type="hidden" value="<?php echo e($productData->brand); ?>" name="brand" id="brand">
<input class="form-control" value="<?php echo e($productData->brandName); ?>" id="brandName" readonly>
</div>
<div class="form-group">
<label for="category">Select Brand:</label>
<select class="form-control" id="newBrand" onchange="$('#brandName').val($(this).find('option:selected').text());$('#brand').val(this.value)">
    <option value="notSet">Select Brand</option>
</select>
</div>
</div>
</div>
<hr>
<label for="thumbnailPreview">Thumbnail</label>
<img style="width:100%" id="thumbnailPreview" name="newThumbail" src="<?php echo e($productData->thumbnail); ?>">
<hr>
<button class="btn btn-success pull-right" id="addProduct">Update Product</button>
</div>
</div>
</form>
<script>
$("#productDescription").val("<?php echo e($productData->description); ?>");
$("#productFeatures").val("<?php echo e($productData->features); ?>");
 getSubCategories();
function getSubCategories(){
$.ajax({
            url : "/myadmin/subcategorie/getSubCategoriesForProducts",
            type:'GET',
            dataType: 'json',
            success: function(response) {
              $("#newcategory").attr('disabled', false);
               $.each(response,function(subCategoryId, subCategoryName){
                 $("#newcategory").append('<option value=' + subCategoryName.subCategoryId + '>' + subCategoryName.subCategoryName + '</option>');
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
              $("#newBrand").attr('disabled', false);
               $.each(response,function(getId, get){
                 $("#newBrand").append('<option value=' + get.brand_id + '>' + get.brandName + '</option>');
                });
             }
        });
}
    function readThumbnail(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#thumbnailPreview').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#thumbail").change(function(){
        readThumbnail(this);
    });
    function deleteProductImage(index){
        document.getElementById("productImagesTable").deleteRow(index);
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>