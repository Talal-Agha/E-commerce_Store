@extends('layouts.admin.layout')
@section('Maincontent')
@include('layouts.admin.errors') 
<h1>Redeem</h1>
<a class="btn btn-info" href="/myadmin/addRedeem">Add New</a>
<hr>
  <div class="panel panel-info">
    <div class="panel-heading">Redeem</div>
      <div class="panel-body">

@if(count($redeems))
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Discount Type</th>
        <th>Discount</th>
        <th>Minimum Amount</th>
        <th>Usage Allowed</th>
        <th>Created At</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
 @foreach($redeems as $redeem)
      <tr>
        <td>{{$redeem->redeemName}}</td>
         <td>{{$redeem->redeemType}}</td>
        <td>{{$redeem->redeemDiscountType}}</td>
        <td>{{$redeem->redeemDiscount}}</td>
        <td>{{$redeem->minimumAmountRequire}}</td>
        <td>{{$redeem->usageAllow}}</td>
        <td>{{$redeem->created_at}}</td>
        <td>
  <a href="/myadmin/editRedeem/{{$redeem->redeemName}}" class="btn btn-info" >Edit</a>
</td>
      </tr>
@endforeach
</tbody>
  </table>
  @else
<center><h1>0 Redeems Found</h1></center>
  @endif
      </div>
@endsection