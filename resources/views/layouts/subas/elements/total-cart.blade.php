<div class="total-cart f-left">
    <div class="total-cart-in">
        <div class="cart-toggler">
            <a>
                <span class="cart-quantity"><b>{{$cartCount}}</b></span><br>
                <span class="cart-icon">
                    <i class="zmdi zmdi-shopping-cart-plus"></i>
                </span>
            </a>                            
        </div>
        <ul>
            <li>
                <div class="top-cart-inner your-cart">
                    <h5 class="text-capitalize">Your Cart (<b>{{$cartCount}}</b>)</h5>
                </div>
            </li>
            <li>
                <div class="total-cart-pro">
                    <!-- single-cart -->
            <?php $i = 0; ?>
            @foreach($cartProducts as $cartProduct)
            @if($i >= 2)
            @break
            @endif
            @include('layouts.subas.elements.single-cart')
             <?php$i++;?>
            @endforeach
                </div>
            </li>
            <li>
                <div class="top-cart-inner subtotal">
                    <h4 class="text-uppercase g-font-2">
                        Subtotal=
                        <span>$ {{$cartAmount}}</span>
                    </h4>
                </div>
            </li>
            <li>
                <div class="top-cart-inner view-cart">
                    <h4 class="text-uppercase">
                        <a href="/cart">View cart</a>
                    </h4>
                </div>
            </li>
            <li>
                <div class="top-cart-inner check-out">
                    <h4 class="text-uppercase">
                        <a href="/checkout">Check out</a>
                    </h4>
                </div>
            </li>
        </ul>
    </div>
</div>
