<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\filters;
use App\productFilter;
use Illuminate\Support\Facades\Log;

class FiltersController extends Controller{
 public function adminIndex(){
        $filters = filters::get();
        return view('layouts.admin.filter', compact('filters'));
    }
    public function addfilterIndex(){
    return view('layouts.admin.addFilter');  
    }
    public function addfilter(){
         $this->validate(request(),[
        'filterName' => 'required|min:2',
        'for' => 'required|min:2'
       ]);
        $id = uniqid();
        if(request('for') == 'subCategory'){
    $this->validate(request(),[
        'type' => 'required|min:2'
       ]);
           if(request('type') == 'filter'){
                $this->validate(request(),[
        'forSubCategory' => 'required|min:2'
       ]);
               $query=[
            'filter_id'=>$id,
            'filterName'=>request('filterName'),
            'subCategoryId'=>request('forSubCategory'),
            'type'=>'filter',
            'filterFor'=>'subCategory',
            'author'=>auth()->guard('nonAdldap')->user()->email];
        }elseif(request('type') == 'brand'){
        $this->validate(request(),[
        'newBrand' => 'required|min:2',
        'forSubCategory' => 'required|min:2'
       ]);
            $query=[
            'filter_id'=>$id,
            'filterName'=>request('filterName'),
            'brand_id'=>request('newBrand'),
            'type'=>'brand',
            'subCategoryId'=>request('forSubCategory'),
            'filterFor'=>'subCategory',
            'author'=>auth()->guard('nonAdldap')->user()->email];
        }
        }elseif(request('for') == 'brand'){
        $this->validate(request(),[
        'newBrand' => 'required|min:2'
       ]);
            $query=[
            'filter_id'=>$id,
            'filterName'=>request('filterName'),
            'type'=>'filter',
            'brand_id'=>request('newBrand'),
            'filterFor'=>'brand',
            'author'=>auth()->guard('nonAdldap')->user()->email];
        }
    	if(filters::create($query)){
        Session()->flash('message', "Filter Added");
        return back();
        }else{
        Session()->flash('error', "Filter Error");
        return back();         
        }
    }
    public function searchForfilter($id,$name){
        $productQuery = products::where('filter','=',$id);
        $products = $productQuery->get();
        return view('layouts.subas.pages.shop-right-sidebar',compact('products','name'));
    }
     public static function getName($id){
       return filters::where('filter_id','=',$id)->pluck('filterName');
    }
    public function getFiltersForProducts(){
        return json_encode(filters::leftJoin('sub_categories','filters.subCategoryId','sub_categories.subCategoryId')->get());
    }
    public static function getFilters($subCategoryId){
        if(null !== $subCategoryId){
        $main = filters::where('subCategoryId',$subCategoryId)
        ->where('type','filter');
        if($main->count()){
            return  $main->get();
        }
     }
    }
    public static function getFiltersByBrand($subCategoryId){
        if(null !== $subCategoryId){
        $main = filters::where('subCategoryId',$subCategoryId)
        ->where('type','brand');
        if($main->count()){
            return  $main->get();
        }
     }
    }
    public static function findFilterNameFromId($filterId){
        $return = filters::where('filter_id',"=",$filterId);
        if($return->count()){
            return $return->pluck("filterName");
        }
        return "N/A";
    } 
    public static function getFilterType($filterId){
          $return = filters::where('filter_id',"=",$filterId);
          if($return->count()){
            return $return->pluck("type")->first();
          }

    }
    public static function getFilterbrandId($filterId){
          $return = filters::where('filter_id',"=",$filterId);
          if($return->count()){
           return $return->pluck("brand_id")->first();
          }
    }
    public function searchFilter(){
        $return = filters::where('filterName',"like","%".request("searchFor")."%");
        if(request("searchType") != "all"){
            $return = $return->where('type',"=",request("searchType"));
        }
          if($return->count()){
            echo '<table class="table table-bordered"><thead><tr><th>Id</th><th>Name</th><th>Sub Category</th><th>Type</th><th>Edit</th></tr></thead><tbody>';
            foreach ($return->get() as $filter) {
               echo view("layouts.admin.elements.filter-search-table-row",compact("filter"))->render();
            }
            echo'</tbody></table>';
          }else{
            echo "<center><h1>Coming Soon...</h1></center>";
          }
    }
    public function loadEditFilter(){
        $return = filters::where('filter_Id',"=",request("filterId"));
        if(count($return)){
        return  json_encode($return->get()->first());
    }else{
        return 0;
    }
    }
    public static function getFilterNameFromProductId($productId){
$productFilterId=productFilter::where('product_id',$productId)->pluck('filter_id')->first();
    return filters::where('filter_Id',$productFilterId)->pluck('filterName')->first();
    }

    public static function getFiltersForBrand($brandId){
    if(null !== $brandId){
     return filters::where('brand_id',$brandId)
     ->where('type','filter')
     ->where('filterFor','brand')
     ->get();
     }
    }
}
