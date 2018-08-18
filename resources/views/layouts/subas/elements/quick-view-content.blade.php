<div class="product-images">
<div class="main-image images">
<img alt="" id="quickViewProductThumbnail" src="{{$product->thumbnail}}">
</div>
</div>
<div class="product-info">
<h1>{{$product->name}}</h1>
 <div class="price-box-3">
<div class="s-price-box">
@if($product->sale_status)
<span class="new-price">${{$product->sale_price}}</span>
<span class="old-price">${{$product->price}}</span>
@else
<span class="new-price">${{$product->price}}</span>
@endif
</div>
</div>
<a href="/products/detail/{{$product->product_id}}" class="see-all">See all features</a>
<div class="quick-add-to-cart">
<div class="numbers-row">
 <input type="number" id="french-hens quickViewQT" min="1" value="1">
</div>
<button class="single_add_to_cart_button" 
onclick="quickProductAddToCart('{{$product->product_id}}')">Add to cart</button>
</div>
 <div class="quick-desc">
{{$product->description}}
</div>
</div>