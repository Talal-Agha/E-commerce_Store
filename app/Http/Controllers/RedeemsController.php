<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Redeems;
use App\redeemProducts;
use App\Http\Controllers\carts;
use App\redeemEmails;

class RedeemsController extends Controller{

    public static function redeemTypesArray(){
      return [
      "giftCard"=>"Gift Card",
      "coupon"=>"Coupon"
    ];
    }
    public static function redeemDiscountTypesArray(){
      return [
      "fixed"=>"Fixed",
      "percentage"=>"Percentage"
    ];
    }
    public function adminIndex(){
    	$redeems = Redeems::get();
    	return view("layouts.admin.redeems",compact('redeems'));
    }

    public function add(){
      $types = static::redeemTypesArray();
      $discountTypes = static::redeemDiscountTypesArray();
        return view("layouts.admin.addRedeem",compact('types','discountTypes'));
    }

    public function addPost(){
       $redeem = $this->validate(request(),[
            'redeemNames' => 'required|unique:Redeems,redeemNames',
            'redeemType' => 'required|min:6',
            'redeemDiscountType' => 'required|min:5',
            'redeemDiscount' => 'required|numeric',
            'minimumAmountRequire' => 'required|numeric',
            'usageAllow' => 'required',
            'productSku'=>''
            ]);
        foreach($redeem['redeemNames'] as $redeemName){
          $redeem["redeemName"] = $redeemName;
            if (Redeems::create($redeem)) {
              if (array_key_exists("productSku", $redeem)) {
               foreach($redeem['productSku'] as $productSku){
                $redeemProduct = [];
                $redeemProduct['redeemName'] = $redeem['redeemName'];
                $redeemProduct['product_id'] = $productSku;
                redeemProducts::create($redeemProduct);
             }
              }

            }    
          }
          session()->flash("message",$redeem["redeemType"]." Sucessfully Added");
          return redirect("/myadmin/redeems");
    }

    public function loadEdit($name){
    	$redeem = Redeems::where('redeemName',$name)->get()->first();
    	return view("layouts.admin.editRedeem",compact('redeem'));
    }

   public function saveEdit(){
	$redeem = $this->validate(request(),[
		'id' => 'required|min:1|integer',
		'redeemName' => 'required|min:4',
		'redeemType' => 'required|min:6',
		'redeemDiscountType' => 'required|min:5',
		'redeemDiscount' => 'required|numeric',
		'minimumAmountRequire' => 'required|numeric',
		'usageAllow' => 'required'
	]);

	if (Redeems::where('id',$redeem["id"])->update($redeem)) {
		session()->flash("message",$redeem["redeemType"]." Sucessfully Updated");
		return redirect("/myadmin/redeems");
	}else{
		session()->flash("error","Error Accoured Try Again");
		return redirect("/myadmin/redeems");		
	}
   }

  public function delete($id){
    $redeem = Redeems::where('id',$id);
    $redeemName = $redeem->get()->first()->redeemName;
  	if ($redeem->delete()) {
      redeemProducts::where('redeemName',$redeemName)->delete();
      redeemEmails::where('redeemName',$redeemName)->delete();
		session()->flash("message"," Sucessfully Deleted");
		return redirect("/myadmin/redeems");
	}else{
		session()->flash("error","Error Accoured Try Again");
		return redirect("/myadmin/redeems");		}
   }

   public function applyRedeemForUser(){
     if (request('redeemName') == null) {
         session()->flash("error","Please Enter Redeem Code And Please Try Again");
         return back();
     }
      $totalCartProductsIds = [];
      foreach (carts::totalProducts() as $key => $value) {
        array_push($totalCartProductsIds, $key);
      }
       $redeem = Redeems::where('redeemName',request('redeemName'))->get()->first();
       if (!$redeem->count()) {
        session()->flash("error","Redeem Code Not Found Please Try Again");
        return back();
       }
        if($redeem->usageAllow == 0){
         session()->flash("error","Redeem Usage Exceed its Limit.");
         return back(); 
        }
        $cartChk =redeemProducts::where('redeemName',request('redeemName'));
        if (count($cartChk->get())) {
        if(!count($cartChk->whereIn("product_id",$totalCartProductsIds)->get())){
         session()->flash("message","You Have 0 Products in your Cart which can be used by this Redeem Code");
         return back();   
        }
        } 
        if ($redeem->minimumAmountRequire <= carts::totalBillAtributes()["TotalAmount"]) {
         setcookie('redeem', $redeem->redeemName, time() + 3600,'/');
         session()->flash("message","Redeem Code Sucessfully Applied");
         return back();   
        }else{
         session()->flash("error","Your Total Bill Must Be $".number_format($redeem->minimumAmountRequire, 2, '.', ','));
         return back();
        }
      
     }

   public function removeRedeemForUser(){
     if (array_key_exists("redeem",$_COOKIE)) {
       setcookie('redeem', 'removed', time() - 3600,'/');
       session()->flash("message","Redeem Code Sucessfully Removed");
       return back();
     }else{
       session()->flash("error","Redeem Code Already Removed");
       return back();
     }
   }
}
