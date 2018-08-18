@extends('layouts.admin.layout')
@section('Maincontent')
@include('layouts.admin.errors') 
<h1>Orders</h1>
<hr>
 <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#Orders">Orders</a></li>
    <li><a data-toggle="tab" href="#Search">Search</a></li>
  </ul>

  <div class="tab-content">
    <div id="Orders" class="tab-pane fade in active">
<br>
        <div class="panel panel-info">
      <div class="panel-heading">Orders</div>
      <div class="panel-body">

@if(count($orders))
 <table class="table table-bordered">
    <thead>
      <tr>
        <th>Order Number</th>
        <th>Email</th>
        <th>Total Amount</th>
        <th>Time</th>
      </tr>
    </thead>
    <tbody id="ordersTable">
      @foreach($orders as $order)
<tr onClick="getDetailOf('{{$order->orderNumber}}')">
  <td>{{$order->orderNumber}}</td>
  <td>{{$order->email}}</td>
  <td>{{$order->totalAmount}}</td>
  <td>{{$order->created_at}}</td>
</tr>
@endforeach
</tbody>
  </table>
  @else
<center><h1>0 Orders Found</h1></center>
  @endif
      </div>
    </div>
    </div>
    <div id="Search" class="tab-pane fade">
    <br>
        <div class="panel panel-info">
      <div class="panel-heading">Search</div>
      <div class="panel-body"> 
      <div class="well">
      <div class="row">
      <div class="col-sm-4">
      <label for="searchType">Search From:</label>
        <select id="searchType" class="form-control">
          <option value="orderNumber">Order Number</option>
          <option value="email">Email</option>
        </select>
        </div>
        <div class="col-sm-4">
        <label for="search">Search For:</label>
        <div class="input-group">
      <input type="text" id="search" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-default" onClick="searchOrder()" type="button">Search</button>
      </span>
       </div>
        </div>  
    </div>
    </div>
    <div id="searchResults">
      </div>
    </div>

  </div>
<script type="text/javascript">
  function searchOrder(){
  var searchFor = $("#search").val();
  if(!searchFor){
    alert("PLEASE ENTER SOMETHING TO SEARCH");
  }
  $.ajax({
            url : "/myadmin/searchorder",
            type:'POST',
            data: {
    "_token": "{{ csrf_token() }}",
    searchFor:searchFor,
    searchType:$("#searchType").val()
  },
            success: function(response) {
                $('#searchResults').html(response);    
             }
        });
}
function getDetailOf(orderNumber){
location.href = "/myadmin/orders/getDetailOf/"+orderNumber;
}
</script>
@endsection