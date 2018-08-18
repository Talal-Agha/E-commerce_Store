<div class="payment-details box-shadow p-30 mb-50">
    <h6 class="widget-title border-left mb-20">payment details</h6>
    <table>
        @if(array_key_exists("RedeemType",$cartModelValue))
        @if(array_key_exists("RedeemProduct",$cartModelValue))
        @foreach($cartModelValue["RedeemProduct"] as $key => $product)
        <tr>
            <td class="td-title-1">{{$product->name}} (<b>{{$cartModelValue["RedeemType"]}} discount</b>)</td>
            <td class="td-title-2">{{$product->price}}</td>
        </tr>
        @endforeach
        @endif
        @endif
         <tr>
            <td class="td-title-1">Cart Subtotal</td>
            <td class="td-title-2">${{$cartModelValue["CartSubtotal"]}}</td>
        </tr>
        <tr>
        <td class="td-title-1">Shipping and Handing</td>
            <td class="td-title-2">${{$cartModelValue["ShippingAndHandeling"]}}</td>
        </tr>
         <tr>
            <td class="td-title-1">Tax</td>
            <td class="td-title-2">${{$cartModelValue["Tax"]}}</td>
        </tr>
        @if(array_key_exists("RedeemType",$cartModelValue))
        @if($cartModelValue["RedeemType"] == 'giftCard')
         <tr>
            <td class="td-title-1">Gift Card</td>
            <td class="td-title-2">-{{$cartModelValue["RedeemDiscountType"]}}</td>
        </tr>
        @elseif($cartModelValue["RedeemType"] == 'coupon')
         <tr>
            <td class="td-title-1">Coupon</td>
            <td class="td-title-2">-{{$cartModelValue["RedeemDiscountType"]}}</td>
        </tr> 
        @endif
        @endif
        <tr>
            <td class="order-total">Order Total</td>
            <td class="order-total-price">${{$cartModelValue["TotalAmount"]}}</td>
        </tr>
    </table>
</div>