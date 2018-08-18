<tr onClick="getDetailOf('{{$order->orderNumber}}')">
	<td>{{$order->orderNumber}}</td>
	<td>{{$order->email}}</td>
	<td>{{$order->totalAmount}}</td>
	<td>{{$order->created_at}}</td>
</tr>