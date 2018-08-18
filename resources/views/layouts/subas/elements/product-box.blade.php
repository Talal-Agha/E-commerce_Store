<div class="col-md-4 col-sm-4 col-xs-12">
    <div class="product-item">
        <div class="product-img">
            <a href="/products/detail/{{$recentProduct->product_id}}">
                <img style="background-color: white;" src="{{$recentProduct->thumbnail}}" alt=""/>
            </a>
        </div>
        <div class="product-info">
            <h6 class="product-title">
                <a href="/products/detail/{{$recentProduct->product_id}}">{{$recentProduct->name}}</a>
            </h6>
            <h3 class="pro-price">
            @if($recentProduct->sale_status)
             <div class="s-price-box"><span class="new-price">$ {{$recentProduct->sale_price}}</span>
                <span class="old-price">$ {{$recentProduct->price}}</span></div>
            @else
             <span class="new-price">$ {{$recentProduct->price}}</span>
            @endif
               </h3>
            <ul class="action-button">
                <li>
            <a onClick="addToWishList('{{$recentProduct->product_id}}')" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                </li>
                <li>
                    <a onClick="loadQuickProduct('{{$recentProduct->product_id}}')" data-toggle="modal"  data-target="#productModal" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                </li>
                @if($recentProduct->quantity <= 0)
        <li>
            <span style="font-weight:800; font-size:16px; color:#FF6161">Out Of Stock</span>
        </li>
                @else
                <li>
                  <a href="/cart/add/{{$recentProduct->product_id}}/1" title="Add to cart">
                    <i class="zmdi zmdi-shopping-cart-plus"></i></a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>