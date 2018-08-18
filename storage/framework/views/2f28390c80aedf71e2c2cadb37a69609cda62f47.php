
<?php $__env->startSection('Maincontent'); ?>
<?php echo $__env->make('layouts.admin.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
<h1>Add Product</h1>
<hr>
<form method="POST" id="addprductForm" action="/myadmin/addprduct" enctype="multipart/form-data">
<div class="row">
<?php echo e(csrf_field()); ?>

<div class="col-sm-8">
<div class="form-group">
 <label for="productName">Product Name*:</label>
<input name="productName" type="text" id="productName" placeholder="Product Name" class="form-control" required>
</div>
<div class="form-group">
 <label for="productDescription">Product Description*:</label>
<textarea name="productDescription" rows="6" type="text" id="productDescription" placeholder="Product Description" class="form-control" required></textarea>
</div>
<div class="form-group">
 <label for="productFeatures">Product Features (optional):</label>
<textarea name="productFeatures" rows="6" type="text" id="productFeatures" placeholder="Product Fetures (optional)" class="form-control"></textarea>
</div>
<div class="row">
<div class="col-sm-3">
<div class="form-group">
 <label for="productPrice">Product Price*:</label>
<input name="productPrice" type="number" id="productPrice" placeholder="Product Price" class="form-control" required>
</div>
</div>
<div class="col-sm-2">
<div class="form-group">
<label for = "saleStatus">Sale Status:</label>
<div class="checkbox">
  <label><input type="checkbox" name="saleStatus" id="saleStatus" value="1">On Sale</label>
</div>
</div></div>
<div class="col-sm-3">
<div class="form-group">
 <label for="productSalePrice">Product Sale Price:</label>
<input name="productSalePrice" type="number" id="productSalePrice" placeholder="Product Price" class="form-control">
</div>
</div>
<div class="col-sm-3">
 <label for="productUPCNo">Product UPC #:</label>
<input name="productUPCNo" type="number" id="productUPCNo" placeholder="Product UPC Num" class="form-control">
</div>
<div class="col-sm-3">
 <label for="productSKUNo">Product Sku #:</label>
<input name="productSKUNo" type="number" id="productSKUNo" placeholder="Product SKU Num" class="form-control">
</div>
</div>
</div>
<div class="col-sm-4">
<div class="panel panel-info">
  <div class="panel-body">
    <div class="form-group">
  <label for="category">Select Category*:</label>
  <select class="form-control" name="category" id="category" required>
    <option value="">None</option>
     <?php $__currentLoopData = $subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($subCategory->subCategoryId); ?>"><?php echo e($subCategory->subCategoryName); ?></option>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>
</div>
  </div>
</div>
<div class="panel panel-info">
  <div class="panel-body">
   <div class="form-group">
  <label for="productThumbnail">Select Product Thumbnail:*</label>
  <p>*Only one image</p>
<input type="file" id="productThumbnail" name="productThumbnail">
</div>
  </div>
</div>
<div class="panel panel-info">
  <div class="panel-body">
   <div class="form-group">
  <label for="productImages[]">Select Product Images:*</label>
  <p>*Atleast one image</p>
<input type="file" id="productImages[]" name="productImages[]" multiple>
</div>
  </div>
</div>
<hr>
<button class="btn btn-success pull-right" id="addProduct" type="submit">Add Product</button>
</div>
</div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>