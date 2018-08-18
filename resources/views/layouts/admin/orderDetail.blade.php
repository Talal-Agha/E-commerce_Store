@extends('layouts.admin.layout')
@section('Maincontent')
@include('layouts.admin.errors') 
<h1>Order Details of <b>{{$order->orderNumber}}</b></h1>
<hr>
<div class="row">
  <div class="col-sm-4">
    <div class="panel panel-info">
      <div class="panel-heading"><center>Order Info</center></div>
      <div class="panel-body">
<p><b>Total Amount:</b> <span class="label label-success">{{$order->totalAmount}}</span></p>
<p><b>Tax:</b> <span class="label label-success">{{$order->tax}}</span></p>
<p><b>Total Products:</b> <span class="label label-info">{{count($orderProducts)}}</span></p>
<p><b>Email Status:</b> 
  @switch($order->emailStatus)
    @case(0)
       <span class="label label-danger">Order Recived Mail Not Send</span>
        @break
    @case(1)
        <span class="label label-warning">Order Recived Mail Send</span>
        @break
    @case(2)
        <span class="label label-success">Confirm Mail Send</span>
        @break
    @case(3)
        <span class="label label-success">Order Recived Mail Send</span>
        @break
    @default
        <span class="label label-danger">ERROR</span>
@endswitch</p>
<p><b>Edi Status:</b> 
  @switch($order->ediStatus)
    @case(0)
       <span class="label label-danger">EDI Not Send</span>
        @break
    @case(1)
        <span class="label label-success">EDI Send</span>
        @break
    @default
        <span class="label label-danger">ERROR</span>
@endswitch</p>
<p><b>Created At: </b><span class="label label-info">{{$order->created_at}}</span></p>
<p><b>Last Updated At: </b><span class="label label-info">{{$order->updated_at}}</span></p></div>
    </div>
  </div>
   <div class="col-sm-4">
        <div class="panel panel-info">
      <div class="panel-heading"><center>Account Info</center></div>
      <div class="panel-body">
        <p><b>Email:</b> {{$order->email}}</p>
        <p><b>Name:</b> {{$order->name}}</p>
        <p><b>Account Type:</b> {{$order->accountType}}</p>
        <p><b>Address:</b> {{$order->address}}</p>
        <p><b>City:</b> {{$order->city}}</p>
        <p><b>State:</b> {{$order->state}}</p>
        <p><b>Zip:</b> {{$order->zip}}</p>
      </div>
    </div>
     </div>
   <div class="col-sm-4">
        <div class="panel panel-info">
      <div class="panel-heading"><center>Actions</center></div>
      <div class="panel-body">
        @if($order->emailStatus == 0 || $order->emailStatus == 1)
<form method="POST" action="/myadmin/orders/sendConfirmMail">
{{ csrf_field()}}
  <input type="hidden" name="orderNumber" value="{{$order->orderNumber}}">
 <center> <button type="submit" class="btn btn-warning">Send Confirm Mail</button></center>
</form>
@elseif($order->emailStatus == 2)
<form method="POST" action="/myadmin/orders/sendOrderReadyForPickupMail">
{{ csrf_field()}}
  <input type="hidden" name="orderNumber" value="{{$order->orderNumber}}">
 <center> <button type="submit" class="btn btn-warning">Send Order Recived Mail</button></center>
</form>
@else
<center><h3>No Actions Required</h3></center>
@endif
      </div>
    </div>
    @if($order->redeemStatus)
    <div class="panel panel-info">
      <div class="panel-heading"><center>Redeem Info</center></div>
      <div class="panel-body">
        <p><b>Name:</b> {{$order->redeemName}}</p>
        <p><b>Type:</b> {{$order->redeemType}}</p>
        <p><b>Discount:</b> $-{{$order->redeemDiscount}}</p>
      </div>
    </div>
    @endif
     </div>
    <div class="col-sm-12">
<div class="panel panel-info">
      <div class="panel-heading"><center>Order Products</center></div>
      <div class="panel-body">
 <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
@foreach($orderProducts as $product)
<tr>
<td>{{$product->product_Id}}</td>
<td>{{$product->name}}</td>
<td>{{$product->quantity}}</td>
<td>{{$product->price}}</td>
</tr>
@endforeach
</tbody>
  </table>
</div>
     </div>
   </div>
@endsection