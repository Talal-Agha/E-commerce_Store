<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\carts;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Edi;
use App\Http\Controllers\OrderProductsController;
use App\Http\Controllers\SqlSrvController;
use Anam\Phpcart\Cart;
use App\products;
use DB;
use App\orders;
use App\User;
use App\Redeems;
use App\OrderProducts;

class checkout extends Controller{
  
public function index(){
  if(carts::total() == 0){
      Session()->flash('error', "Please Add Products In Cart"); 
      return back();
  }
    $billAttributes = carts::totalBillAtributes();
    $totalAmount = $billAttributes["TotalAmount"];
    $districts = DB::table('city')->select("District")->orderBy('District')->distinct()->get();
    return view('layouts.subas.pages.checkout',compact('totalAmount','districts'));
}    
public function getCity(){
  $district = request("district");
  if($district != null){
    return DB::table('city')->select("Name","ID")->orderBy('Name')->distinct()->where('District',$district)->get();
  }
}


public function charge(){
  if(auth()->user()->privilege == "user"){
$count = orders::whereMonth("created_at","=",date("m"))
        ->whereYear('created_at',"=",date("Y"))
        ->where([
          ["email","=",auth()->user()->email],
          ["accountType","=",auth()->user()->privilege]
        ])->count();
if($count == 30){
Session()->flash('error', "You Reached Your This Month Limit of 30 Products. Please Try Again Next Month"); 
return back();
}
  }

$address_2 = null;
  if(null !== request("ShippingChkBox")){
    $this->validate(request(),[
    'addressBox' => 'required|min:5',
    'stateDropdown' => 'required|min:2',
    'cityDropdown' => 'required|min:2',
    'zipBox' => 'required|min:2|numeric',
    'phoneBox' => 'required|min:2|numeric'
  ]);
  $query = DB::table('city')->where('ID',request('cityDropdown'))->get()->first();
      $address=request("addressBox");
      $zip=request("zipBox");
      $state=$query->DistrictCode;
      $city=$query->Name;
      $phoneNumber=request("phoneBox");
  }elseif(null !== request("ShippingChkBoxBuilding1")){
      $address="10 E Memorial Road";
      $zip=73114;
      $state="OK";
      $city="Oklahoma City";
      $phoneNumber="405-302-2251";
      $address_2 = "WAREHOUSE";
  }else if(null !== request("ShippingChkBoxBuilding2")){
      $address="10 E Memorial Road";
      $zip=73114;
      $state="OK";
      $city="Oklahoma City";
      $phoneNumber="405-302-2251";
      $address_2 = "OFFICE";
  }else{
    Session()->flash('error', "Please Select Any One Shipping Option"); 
    return back();
  }

$cart = new Cart();
foreach ($cart->getItems() as $cartProducts) {
  $productsLocalQuery =  products::where('product_id', $cartProducts->id)->get()->first();
  $productsQuery = DB::connection('sqlsrv')
  ->table('V_EmployeeItemList')->where('PRODUCT_ID', $cartProducts->id)->get()->first();
  if (count($productsQuery)) {
   if($cartProducts->quantity > $productsQuery->Qty_Available){
    Session()->flash('error', "Selected Quantity Not Available for Product: <b>".$productsLocalQuery->name."</b><br> Available Quantity: <b>".$productsQuery->Qty_Available."</b><br> You Selected:<b> ".$cartProducts->quantity.'</b>'); 
      SqlSrvController::UpdateLocalTableQuantity($productsQuery);
      return back();
}}
}
$billAttributes = carts::totalBillAtributes();
$redeemName = null;
$redeemType = null;
$redeemDiscount = null;
$redeemStatus = 0;
if(array_key_exists("redeem",$_COOKIE)){
$redeemName = $_COOKIE['redeem'];
$redeemType = $billAttributes["RedeemType"];
$redeemDiscount = $billAttributes["RedeemDiscountType"];
$redeemStatus = 1;
$redeemQuery=Redeems::where('redeemName',$redeemName);
 if($redeemQuery->get()->first()->usageAllow <= 0){
   session()->flash("error","Redeem Usage Exceed its Limit.");
   return back(); 
  }
}
$totalAmount = $billAttributes["TotalAmount"];
$orderNumber = rand(222,999).rand(111,999);
$totalProducts = carts::totalProducts();
$stripeMeta = array(
  "email"=>auth()->user()->email,
  "order_source"=>'JASEMP',
  "order_id" => $orderNumber,
  "order_number" => $orderNumber,
  "tax_amount"=>$billAttributes["Tax"]
);
\Stripe\Stripe::setApiKey(env("STRIPE_PRIVATE_KEY",""));
$charge = \Stripe\Charge::create(array(
  "amount" => $totalAmount*100,
  "currency" => "USD",
  "description" => "Emp Charge",
  "source" => request('stripeToken'),
  "metadata" => $stripeMeta
));

if($charge->status != "succeeded"){
Session()->flash('error', "Error Accoured With Your Payment Please Try Again."); 
return back();
}
orders::create([
'orderNumber'=>$orderNumber,
'email'=> auth()->user()->email,
'name'=>auth()->user()->name,
'tax'=>$billAttributes["Tax"],
'accountType'=>auth()->user()->privilege,
'totalAmount'=> $totalAmount,
'totalProducts'=>count($totalProducts),
'emailStatus'=>0,
'ediStatus'=>0,
'transactionStatus'=>1, 
'city'=>$city,
'state'=>$state,
'zip'=>$zip,
'address'=>$address,
'address_2'=>$address_2,
'phoneNumber'=>$phoneNumber, 
'orderStatus'=>1,
'redeemStatus'=>$redeemStatus,
'redeemName'=>$redeemName,
'redeemType'=>$redeemType,
'redeemDiscount'=>$redeemDiscount
]);
$orderProducts = [];
foreach($totalProducts as $key=>$product){
$orderProducts = [
           'orderNumber'=>$orderNumber,
           'email'=> auth()->user()->email,
           'product_Id'=>$product->id,
           'name'=>$product->name,
           'quantity'=>$product->quantity,
           'price'=>$product->price
         ];
         if ($redeemStatus && array_key_exists("RedeemProduct",$billAttributes)) {
          foreach ($billAttributes["RedeemProduct"] as $key => $value) {
            if($key == $product->id){
               $orderProducts["redeemStatus"] = 1;
            }
          }
         }elseif($redeemStatus && !array_key_exists("RedeemProduct",$billAttributes)){
            $orderProducts["redeemStatus"] = 1;
         }
OrderProducts::create($orderProducts);
}
foreach ($cart->getItems() as $cartProducts) {
products::where('product_id', $cartProducts->id)->decrement('quantity',$cartProducts->quantity);
}
if(array_key_exists("redeem",$_COOKIE)){
$redeemQuery->decrement('usageAllow',1);
setcookie('redeem', 'removed', time() - 3600,'/');
}
//Edi::generateEdiFile($orderNumber);
MailController::confirm_email($orderNumber);
$cart->clear();
if (auth()->user()->privilege == "guest") {
User::where('email', auth()->user()->email)->where("privilege","guest")->delete();
auth()->logout();
}
return redirect('/checkout/charge/'.$orderNumber);
}

public function chargeIndex(){
  $order = orders::where('orderNumber',request('orderNumber'))->get()->first();
  if(!count( $order)){
    Session()->flash('error', "No Orders Found Please Try Agian");
    return back();
  }
return view('layouts.subas.pages.order',compact('order'));
}
}
