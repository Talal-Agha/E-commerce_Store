<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WishList;
use App\products;

class WishListController extends Controller
{
   public function index(){
   	$productsId  = $this->getAllIds();
   	$products = products::whereIn("product_id",$productsId)->get();
   	return view("layouts.subas.pages.wishlist",compact("products"));
   }
   public function add(){
   	$chk = WishList::where("email","=",auth()->user()->email)->
      where("product_id","=",request("productId"))->get();
      if(count($chk)){
      	return 2;
      }
     $new =  WishList::create([
        "email"=>auth()->user()->email,
        "product_id"=>request("productId")
      ]);
     if($new){
     	return 1;
     }else{
     	return 0;
     }
   }

   public function remove(){
      $delete = WishList::where("email","=",auth()->user()->email)->
      where("product_id","=",request("productId"))->delete();
if($delete){
	return 1;
}else{
	return 0;
}
   }
   public static function getAllIds(){
       if(auth()->check()){
      return WishList::where("email","=",auth()->user()->email)->pluck('product_id');
    }
       return 0;
   }
   public static function getforProfilePage(){
   	$productsId  = $this->getAllIds();
   	if(count($productsId)){
   	$products = products::whereIn("product_id","=",$productsId)->get();
   	}else{
   		$products = 0;
   	}
      return $products;
   }
   public static function totalProductsInWishListOfUser(){
    if(auth()->check()){
    return WishList::where("email","=",auth()->user()->email)->count();
   }
   return 0;
   }
       public static function getAll(){
         if(auth()->check()){
     $productsId  = WishList::where("email","=",auth()->user()->email)->pluck('product_id');
    return products::whereIn("product_id",$productsId)->get();
    }
}

}
