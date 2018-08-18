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
<td><center>{{$productData->product_id}}</center></td>
<td><center><img style="max-width:90px;" src="{{$productData->thumbnail}}"></center></td>
<td>{{$productData->name}}</td>
<td><center>{{$productData->price}}</center></td>
<td><center>{{$sale}}</center></td>
<td><center>{{$productData->brandName}}</center></td>
<td><center>
@if(count($filterNames))
@foreach($filterNames as $filterName)
<p>{{$filterName->filterName}} <div class="filterSubcategory">({{$filterName->subCategoryName}})</div></p>
@endforeach
@else
<p>N/A</p>
@endif
</center></td>
<td><center>{{$productData->subCategoryName}}</center></td>
<td><center>{{$availability}}</center></td>
<td><center>{{$productData->quantity}}</center></td>
<td><center>{{$productData->updated_at}}</center></td>
<td><button type="button" onClick="goToEditProduct('{{$productData->product_id}}')" class="btn btn-danger">Edit</button>
@if(isset($forSearch))
<div class="checkbox"><button class="btn btn-warning"><label><input type="checkbox" onChange="addToQuickEdit('{{$productData->product_id}}')">Add to Quick Edit</label></button></div>
@endif
</tr>