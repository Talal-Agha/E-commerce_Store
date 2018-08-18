<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\subCategories;
use App\products;
use App\categories;
use App\Http\Controllers\FiltersController;

class SubCategoriesController extends Controller
{

    public function createNewSubCategory(){
      if(request("ParentCategory")){
           subCategories::create([
            'categoryId'=> request("ParentCategory"),
            'subCategoryId'=>uniqid(),
            'subCategoryName'=>request("SubCategoryName")
         ]);}}

    public function getSubDetail($prev,$name){
      $subCategories = subCategories::where('subCategoryName',$name);
      $id = $subCategories->pluck('subCategoryId');
      $data = $subCategories->get();
      $products = products::where('category',$id )->get();
      return view('layouts.pages.SubCategories',compact('data','products','prev'));}

    public static function getSubForNav($id){
        return subCategories::where('categoryId',$id)->get();
    }

    public static function getCount($id){
        $count = subCategories::where('categoryId',$id)->count();
        return $count;}

    public function getSubCategoriesForProducts(){
        $main = subCategories::get();
        return json_encode($main);}

    public static function getSubCategoriesForEdit($id){
        $name = subCategories::where('categoryId',$id)->get();
        if($name->count()){
        return $name;     
        }}

    public function getSubCategoriesProducts($name){
      $id = subCategories::where('subCategoryName',$name);
      $subCategoryId = $id->pluck('subCategoryId')->first();
      $products = products::where('category',$subCategoryId )->where("available","!=",0)->where("sale_status","!=",0)->orderBy('sale_price', 'desc')->get();
      $filters = FiltersController::getFilters($subCategoryId);
      $filtersByBrands = FiltersController::getFiltersByBrand($subCategoryId);
      $for="products";
      return view('layouts.subas.pages.shop-right-sidebar',compact('products','name','subCategoryId','filters','filtersByBrands','for'));
    }

    public static function getSubCategoriesNameForProducts($id){
      $result = subCategories::where('subCategoryId',$id)->pluck('subCategoryName');
      return $result->first();
    }

    public static function getSubCategoriesNameForProductsCart($id){
      $cat = products::where('product_id',$id );
      if($cat->count()){
         $cat = products::where('product_id',$id )->pluck('category');
      $result = subCategories::where('subCategoryId',$cat);
      if($result->count()){
        $result = subCategories::where('subCategoryId',$cat)->pluck('subCategoryName');
      return $result[0];}}}

    public function loadEditCategory(){
        $id = request("subCategoryId");
        $query = subCategories::where('SubCategoryId','=',$id);
        if($query->count()){
          $subName = $query->pluck("subCategoryName");
          $categoryId = $query->pluck("categoryId");
          $categoryName = Categories::where('categoryId','=',$categoryId);
          if($categoryName->count()){
           $categoryName = $categoryName->pluck("categoryName");
          }
        $result =  compact('id','subName','categoryId','categoryName');}return $result;}

    public function loadEditSubCategorieParent($id = null){
      $categoryId = request("categoryId");
      $query =  Categories::where('categoryId','=',$categoryId);
      $name = $query->pluck("categoryName");
      $id = $query->pluck("categoryId");
      $result = compact('id','name');
      return $result;}

    public function saveChangesInEditSubCategorie(){
      subCategories::where('subCategoryId', request("subCategoryId"))->limit(1)->update([
            'categoryId'=> request("subCategoryParentId"),'subCategoryName'=>request("subCategoryName")
        ]);}

      public static function findProductCategoryName($id){
       $subCategories = subCategories::where('subCategoryId',$id)->pluck('subCategoryName');
       if(count($subCategories)){
      return $subCategories[0];
    }
      return "N/A";
      }
}
