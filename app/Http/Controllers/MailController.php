<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Http\Controllers\carts;
use App\orders;
use App\OrderProducts;

class MailController extends Controller{

  public static function confirm_email($orderNumber){
    $order = orders::where('orderNumber',$orderNumber)->get()->first();
    if(count($order)){
     $to = $order->email;
    $orderProducts = OrderProducts::where('orderNumber',$orderNumber)->get();
     Mail::send('layouts.mail.orderConfirm', compact('order','orderProducts'),function($message) use($to){$message->to($to)->subject('Thank you for your Order');});
  orders::where('orderNumber',$orderNumber)->update(['emailStatus' => 1]); 
}
}
 public  function myadmin_confirm_email(){
    $orderNumber = request('orderNumber');
    $order = orders::where('orderNumber',$orderNumber); 
    $order->update(['emailStatus' => 2]);
    $order = $order->get()->first();
    $to = $order->email;
    $orderProducts = OrderProducts::where('orderNumber',$orderNumber)->get();
    Mail::send('layouts.mail.orderConfirm', compact('order','orderProducts'),function($message) use($to){
      $message->to($to)->subject('Your Order Is Confirm');
    });
    return redirect('/myadmin/orders/getDetailOf/'.$orderNumber);
  }

   public  function myadmin_ready_for_pickup_email(){
    $orderNumber = request('orderNumber');
    $order = orders::where('orderNumber',$orderNumber); 
    $order->update(['emailStatus' => 3]);
    $order = $order->get()->first();
    $to = $order->email;
    $orderProducts = OrderProducts::where('orderNumber',$orderNumber)->get();
    Mail::send('layouts.mail.orderConfirm', compact('order','orderProducts'),function($message) use($to){
      $message->to($to)->subject('Your Order Is Ready For Pickup');
    });
    return redirect('/myadmin/orders/getDetailOf/'.$orderNumber);
}

}
