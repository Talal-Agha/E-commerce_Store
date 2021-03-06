<div class="payment-details box-shadow p-30 mb-50">
    <h6 class="widget-title border-left mb-20">payment details</h6>
    <table>
        <tr>
            <td class="td-title-1">Cart Subtotal</td>
            <td class="td-title-2">$<?php echo e($cartModelValue["CartSubtotal"]); ?></td>
        </tr>
        <tr>
        <td class="td-title-1">Shipping and Handing</td>
            <td class="td-title-2">$<?php echo e($cartModelValue["ShippingAndHandeling"]); ?></td>
        </tr>
        <tr>
            <td class="td-title-1">Tax</td>
            <td class="td-title-2">$<?php echo e($cartModelValue["Tax"]); ?></td>
        </tr>
        <?php if(array_key_exists("RedeemType",$cartModelValue) && $cartModelValue["RedeemType"] == 'giftCard'): ?>
         <tr>
            <td class="td-title-1">Gift Card</td>
            <td class="td-title-2">-<?php echo e($cartModelValue["RedeemDiscountType"]); ?></td>
        </tr>
        <?php elseif(array_key_exists("RedeemType",$cartModelValue) && $cartModelValue["RedeemType"] == 'coupon'): ?>
         <tr>
            <td class="td-title-1">Coupon</td>
            <td class="td-title-2">-<?php echo e($cartModelValue["RedeemDiscountType"]); ?></td>
        </tr>
        <?php endif; ?>
        <tr>
            <td class="order-total">Order Total</td>
            <td class="order-total-price">$<?php echo e($cartModelValue["TotalAmount"]); ?></td>
        </tr>
    </table>
</div>