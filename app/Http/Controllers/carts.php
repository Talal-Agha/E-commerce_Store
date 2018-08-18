<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Anam\Phpcart\Cart;
use App\products;
use App\Redeems;
use App\redeemProducts;

class carts extends Controller
{
	public function index(){
        $totalProducts = $this->totalProducts();
        $totalAmount = $this->totalAmount();
        $total = $this->total();
         return view('layouts.subas.pages.cart',compact('totalProducts','totalAmount','total'));
    }
    public function add($id,$quantity){
       

        if($quantity == null || $quantity == 0){
        Session()->flash('error', "Please Select Quantity");
        return back();    
            }

        $productData = products::where('product_id', $id)->get()->first();

        if(!$productData->count()){
        Session()->flash('error', "Product Not Sucessfully Added to Cart");
        return back();
        }

        if($quantity <= $productData->quantity){

        if($productData->sale_status == 1 && $productData->sale_price != null){
            $price = $productData->sale_price;
        }else{
            $price = $productData->price;
        }

    	$carts = new Cart();
        $carts->add([
        'id'       => $id,
        'name'     => $productData->name,
        'thumbnail' =>$productData->thumbnail,
        'brand'  =>$productData->brand,
        'quantity' => $quantity,
        'price'    => $price
        ]);
        Session()->flash('message', "Product Sucessfully Added to Cart");
        return back();
    
    }else{
        Session()->flash('error', "We don't have this Product for sale at this time, please select any other products");
        return back();        
    }
    }
    public function remove($id){
   $carts = new Cart();
   $carts->remove($id);
   Session()->flash('message', "Product Sucessfully Remove from Cart");
   return back();
    	
    }
    
    public static function total(){
        $carts = new Cart();
    	return $carts->count();
    }

        public static function totalProducts(){
        $carts = new Cart();
    	return $carts->getItems();
    }
    public static function  totalAmountStripe(){
        $carts = new Cart();
        return $carts->getTotal();
    }
        public static function  totalAmount(){
    	$carts = new Cart();
    	return number_format($carts->getTotal(), 2, '.', ',');
    }
    public function updateQuantity($id,$value){
        if($value == 0 || $value == null){
        Session()->flash('error', "Product Quantity Cant Be Zero");
        return back();          
        }
         $productData = products::where('product_id', $id)->get()->first();
         if(!$productData->count()){
        Session()->flash('error', "Product Not Sucessfully Updated");
        return back();
        }
       if($value <= $productData->quantity){
           $carts = new Cart();
           $carts->updateQty($id, $value);
           Session()->flash('message', "Product Quantity updated");
           return back();
       }else{
           Session()->flash('error', "Please select less Quantity");
           return back(); 
       }
    }


    public static function taxPercentage(){
        return 8.625;
    }
    public static function totalBillAtributes(){
      $totalCartProducts = [];
      $totalCartProductsIds = [];
      foreach (static::totalProducts() as $key => $value) {
        $totalCartProducts[$key] = $value;
        array_push($totalCartProductsIds, $key);
      }
        $cartSubTotal = static::totalAmount();
        $shippingAndHandeling = 0.00;
        $tax = 0.00;
        $returnArray = [
          "CartSubtotal"=>number_format((float)$cartSubTotal, 2, '.', ','),
          "ShippingAndHandeling"=>number_format((float)$shippingAndHandeling, 2, '.', ','),
          "Tax"=>number_format((float)$tax, 2, '.', ''),
        ];
        $cartTotalAmount = $tax+$cartSubTotal+$shippingAndHandeling; 
      if (array_key_exists("redeem",$_COOKIE)) {
        $redeemProductsQuey = redeemProducts::where('redeemName',$_COOKIE['redeem'])->get();
        if(count($redeemProductsQuey)){
            $redeemProductsCheck = redeemProducts::where('redeemName',$_COOKIE['redeem'])->whereIn("product_id",$totalCartProductsIds)->get();
             if(!count($redeemProductsCheck)){
               setcookie('redeem', 'removed', time() - 3600,'/');
             }
           }
        }
    if (array_key_exists("redeem",$_COOKIE)) {
        $redeem = Redeems::where('redeemName',$_COOKIE['redeem'])->get()->first();
        $redeemProducts = $redeemProductsQuey;
        if (count($redeem)) {
          if ($redeem->redeemDiscountType == 'percentage') {
            $returnArray["RedeemType"] =$redeem->redeemType;
            $returnArray["RedeemDiscountType"] =$redeem->redeemDiscount.'%' ;
            $discount = $redeem->redeemDiscount/100*100;
          }elseif($redeem->redeemDiscountType == 'fixed'){
            $returnArray["RedeemType"] =$redeem->redeemType;
            $returnArray["RedeemDiscountType"] =number_format($redeem->redeemDiscount, 2, '.', ',');
            $discount = $redeem->redeemDiscount;
          }
            if(count($redeemProducts)){
              foreach ($redeemProducts as $redeemProduct) {
                foreach($totalCartProducts as $key => $value){
                  if($key ==  $redeemProduct["product_id"]){
                    $cartTotalAmount = $cartTotalAmount-$discount;
                    $returnArray["RedeemProduct"][$key] =$value;
                    $returnArray["RedeemDiscount"] =$discount;
                    break 2;
                  }
                }
              }       
          }else{
            $cartTotalAmount = $cartTotalAmount-$discount;
            $returnArray["RedeemDiscount"] =$discount;
          }
        }
     }
    if (auth()->check()) {
     $returnArray["Tax"] = (auth()->user()->state == "OK" || auth()->user()->privilege != "user") ? number_format(static::taxPercentage()/100*$cartTotalAmount, 2, '.', ',') : number_format(0, 2, '.', ',');
     $cartTotalAmount = $cartTotalAmount+ $returnArray["Tax"];
    }    
     $returnArray["TotalAmount"] = number_format($cartTotalAmount, 2, '.', ',');
     return $returnArray;
    }

}
