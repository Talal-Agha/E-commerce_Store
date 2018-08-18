<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\brands;
use App\products;
use App\productFilter;
use App\Http\Controllers\FiltersController;

class BrandsController extends Controller
{
    public function adminIndex(){
        $brands = brands::get();
        return view('layouts.admin.brands', compact('brands'));
    }
    public function addbrand(){
    	if(request('brandName') == null){
             return "ERROR";
    	}
    	$id = rand('01','99');
    	brands::create([
            'brand_id'=>$id,
            'brandName'=>request('brandName'),
            'author'=>auth()->guard('nonAdldap')->user()->email
         ]);
    }
    public function loadEditbrand(){
        if(request('brandId') != null){
        $return = brands::where("brand_id","=",request('brandId'))->get()->first();
        return $return;
    }
}
        public function saveEditBrand(){
        if(request('brandId') != null && request('brandName') != null){
        $result = brands::where("brand_id","=",request("brandId"))->limit(1)->update([
            'brandName'=>request('brandName'),
            'author'=>auth()->guard('nonAdldap')->user()->email
         ]);
        if($result){
            return 1;
        }
    }}

        public function deleteEditBrand(){
        if(request('brandId') == null){
             return 0;
        }
        $result = brands::where("brand_id","=",request("brandId"))->limit(1)->delete();
        if($result){
            return 1;
        }
    }
    public function searchForBrand($id,$name){
        $for="brand";
     $productQuery = products::where('brand','=',$id)->orderBy('sale_price', 'desc')->where("available","!=",0)->where("sale_status","!=",0);
        $products = $productQuery->get();
        $filtersForBrandsPage = FiltersController::getFiltersForBrand($id);
        return view('layouts.subas.pages.brands',compact('products','name','filtersForBrandsPage','id',"for"));
    }

     public static function getName($id){
        $productQuery = brands::where('brand_id','=',$id);
        return $productQuery->pluck('brandName')->first();
    }
    public function getAll(){
       return brands::get();
    }




  public function updateGridView(){
      $products = products::where('brand',request("brandId"))->where("available","!=",0);    
    if(null != request("filterId")){
$productsFilter = productFilter::whereIn('filter_id',request("filterId"))->pluck('product_Id');
$products = $products->whereIn('product_id',$productsFilter);
    }
    if($products->count()){
        $products = $products->orderBy('sale_price', 'desc')->get();
     $this->updateGridViewLayout($products);
    }else{
      echo'<center><h1>0 Products Found</h1></center>';
    }
  }

   public function updateListView(){
      $products = products::where('brand',request("brandId"))->where("available","!=",0)->orderBy('sale_price', 'desc');
     
    if(null != request("filterId")){
        $productsFilter = productFilter::whereIn('filter_id',request("filterId"))->pluck('product_Id');
        $products = $products->whereIn('product_id',$productsFilter);
    }
    if($products->count()){
$this->updateListViewLayout($products->get());
    }else{
      echo'<center><h1>0 Products Found</h1></center>';
    }
  }


   public function updateGridViewLayout($products){
      foreach($products as $recentProduct){
       echo view('layouts.subas.elements.product-box',compact("recentProduct"));
      }
}  

public function updateListViewLayout($products){
foreach($products as $recentProduct){
 echo view('layouts.subas.elements.product-list-box',compact("recentProduct"));
}
  }
}
