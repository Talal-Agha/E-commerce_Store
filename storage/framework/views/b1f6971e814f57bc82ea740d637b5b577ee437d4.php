<?php
$filterName = null;
 if($productData->sale_status == 1){
        $sale = 'OnSale / '.$productData->sale_price;
      }else{
        $sale = 'NotOnSale / '.$productData->sale_price;
      }
      if($productData->available == 1){
         $availability = "Yes";
      }else{
         $availability = "No";
      }
$filterIds = App\productFilter::where('product_Id',"=",$productData->product_id)->pluck("filter_id");
$filterNames = App\filters::leftJoin('sub_categories','filters.subCategoryId','sub_categories.subCategoryId')->whereIn('filter_id',$filterIds)->get();
?>
<tr>
<td><center><?php echo e($productData->product_id); ?></center></td>
<td><center><img style="max-width:90px;" src="<?php echo e($productData->thumbnail); ?>"></center></td>
<td><?php echo e($productData->name); ?></td>
<td><center><?php echo e($productData->price); ?></center></td>
<td><center><?php echo e($sale); ?></center></td>
<td><center><?php echo e($productData->brandName); ?></center></td>
<td><center>
<?php if(count($filterNames)): ?>
<?php $__currentLoopData = $filterNames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filterName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<p><?php echo e($filterName->filterName); ?> <div class="filterSubcategory">(<?php echo e($filterName->subCategoryName); ?>)</div></p>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
<p>N/A</p>
<?php endif; ?>
</center></td>
<td><center><?php echo e($productData->subCategoryName); ?></center></td>
<td><center><?php echo e($availability); ?></center></td>
<td><center><?php echo e($productData->quantity); ?></center></td>
<td><center><?php echo e($productData->updated_at); ?></center></td>
<td><button type="button" onClick="goToEditProduct('<?php echo e($productData->product_id); ?>')" class="btn btn-danger">Edit</button>
<?php if(isset($forSearch)): ?>
<div class="checkbox"><button class="btn btn-warning"><label><input type="checkbox" onChange="addToQuickEdit('<?php echo e($productData->product_id); ?>')">Add to Quick Edit</label></button></div>
<?php endif; ?>
</tr>