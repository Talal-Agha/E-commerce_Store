<tr>
 <td class="product-thumbnail">
<div class="pro-thumbnail-img">
<img src="{{$totalProduct->thumbnail}}" alt="">
</div>
<div class="pro-thumbnail-info text-left">
<h6 class="product-title-2">
<a href="/products/detail/{{$totalProduct->id}}">{{$totalProduct->name}}</a>
</h6>
<p>Brand:{{\App\Http\Controllers\BrandsController::getName($totalProduct->brand)}}</p>
</div>
</td>
<td class="product-price">$ {{$totalProduct->price}}</td>
 <td class="product-quantity">
 <input type="text" value="{{$totalProduct->quantity}}" id="qb{{$totalProduct->id}}" onChange="changeQuantity({{$totalProduct->id}})" class="cart-plus-minus-box">
</td>
<td class="product-subtotal">$ {{$totalProduct->price*$totalProduct->quantity}}</td>
<td class="product-remove">
<center><a onclick="deleteItem({{$totalProduct->id}})"><i class="zmdi zmdi-close"></i></a></center>
</td>
</tr>