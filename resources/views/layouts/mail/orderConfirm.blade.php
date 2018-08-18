<span class="preheader" style="color:#f3f3f3;display:none!important;font-size:1px;line-height:1px;max-height:0;max-width:0;mso-hide:all!important;opacity:0;overflow:hidden;visibility:hidden"></span>
<table class="body" style="Margin:0;background:#f3f3f3!important;border-collapse:collapse;border-spacing:0;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;height:100%;line-height:1.3;margin:0;padding:0;text-align:left;vertical-align:top;width:100%">
  <tr style="padding:0;text-align:left;vertical-align:top">
    <td align="center" class="center" style="-moz-hyphens:auto;-webkit-hyphens:auto;Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;hyphens:auto;line-height:1.3;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word" valign="top">
      <center data-parsed="" style="min-width:580px;width:100%">
        <table align="center" class="container float-center" style="Margin:0 auto;background:#fefefe;border-collapse:collapse;border-spacing:0;float:none;margin:0 auto;padding:0;text-align:center;vertical-align:top;width:580px">
          <tbody>
            <tr style="padding:0;text-align:left;vertical-align:top">
              <td style="-moz-hyphens:auto;-webkit-hyphens:auto;Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;hyphens:auto;line-height:1.3;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">
                <table class="spacer" style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                  <tbody>
                    <tr style="padding:0;text-align:left;vertical-align:top">
                      <td height="16px" style="-moz-hyphens:auto;-webkit-hyphens:auto;Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;hyphens:auto;line-height:16px;margin:0;mso-line-height-rule:exactly;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">
                        &#xA0;
                      </td>
                    </tr>
                  </tbody>
                </table>

                <center data-parsed="" style="min-width:580px;width:100%">
                  <img align="center" class="float-center" src="https://epurchase.byjasco.com/img/logo.png" style="-ms-interpolation-mode:bicubic;Margin:0 auto;clear:both;display:block;float:none;margin:0 auto;max-width:100%;outline:0;text-align:center;text-decoration:none;width:auto">
                </center>

                <table class="row" style="border-collapse:collapse;border-spacing:0;display:table;padding:0;position:relative;text-align:left;vertical-align:top;width:100%">
                  <tbody>
                    <tr style="padding:0;text-align:left;vertical-align:top">
                      <td>
                      </td>
                    </tr>
                  </tbody>
                </table>

                <table class="spacer" style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                  <tbody>
                    <tr style="padding:0;text-align:left;vertical-align:top">
                      <td height="16px" style="-moz-hyphens:auto;-webkit-hyphens:auto;Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;hyphens:auto;line-height:16px;margin:0;mso-line-height-rule:exactly;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">
                        &#xA0;
                      </td>
                    </tr>
                  </tbody>
                </table>

                <table class="row" style="border-collapse:collapse;border-spacing:0;display:table;padding:0;position:relative;text-align:left;vertical-align:top;width:100%">
                  <tbody>
                    <tr style="padding:0;text-align:left;vertical-align:top">
                      <th class="small-12 large-12 columns first last" style="Margin:0 auto;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0 auto;padding:0;padding-bottom:16px;padding-left:16px;padding-right:16px;text-align:left;width:564px">
                        <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                          <tr style="padding:0;text-align:left;vertical-align:top">
                            <th style="Margin:0;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left">
                              <h1 style="Margin:0;Margin-bottom:10px;color:inherit;font-family:Helvetica,Arial,sans-serif;font-size:34px;font-weight:400;line-height:1.3;margin:0;margin-bottom:10px;padding:0;text-align:center;word-wrap:normal;">
                            @if($order->emailStatus == 2)
                              Your Order in Confirm
                                @elseif($order->emailStatus == 3)
                                  Get Excited
                                @else
                                  Thanks for your order!
                              @endif
                              </h1>

                              <p style="Margin:0;Margin-bottom:10px;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;margin-bottom:10px;padding:0;text-align:left">
                              </p>

                              <center data-parsed="" style="min-width:532px;width:100%">
                                 @if($order->emailStatus == 2)
                              Your order has been Confirmed. See below for more information relating to purchase, price, and payment.
                                @elseif($order->emailStatus == 3)
                                  Your Order Is Ready For Pickup.
                                @else
                                  Your order has been placed. See below for more information relating to purchase, price, and payment.
                              @endif
                              
                              </center>

                              <p>
                              </p>

                              <table class="spacer" style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                <tbody>
                                  <tr style="padding:0;text-align:left;vertical-align:top">
                                    <td height="8px" style="-moz-hyphens:auto;-webkit-hyphens:auto;Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:8px;font-weight:400;hyphens:auto;line-height:8px;margin:0;mso-line-height-rule:exactly;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">
                                      &#xA0;
                                    </td>
                                  </tr>
                                </tbody>
                              </table>

                              <table class="callout" style="Margin-bottom:16px;border-collapse:collapse;border-spacing:0;margin-bottom:16px;padding:0;text-align:left;vertical-align:top;width:100%">
                                <tr style="padding:0;text-align:left;vertical-align:top">
                                  <th class="callout-inner secondary" style="Margin:0;background:#ebebeb;border:none;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:10px;text-align:left;width:100%">
                                    <table class="row" style="border-collapse:collapse;border-spacing:0;display:table;padding:0;position:relative;text-align:left;vertical-align:top;width:100%">
                                      <tbody>
                                        <tr style="padding:0;text-align:left;vertical-align:top">
                                          <th class="small-12 large-6 columns first" style="Margin:0 auto;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0 auto;padding:0;padding-bottom:16px;padding-left:0!important;padding-right:0!important;text-align:left;width:50%">
                                            <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                              <tr style="padding:0;text-align:left;vertical-align:top">
                                                <th style="Margin:0;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left">
                                                  <p style="Margin:0;Margin-bottom:10px;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;margin-bottom:10px;padding:0;text-align:left">
                                                    <strong>Payment Method</strong><br>
                                                    Stripe Payments
                                                  </p>

                                                  <p style="Margin:0;Margin-bottom:10px;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;margin-bottom:10px;padding:0;text-align:left">
                                                    <strong>Email Address</strong><br>
                                                    <span style="color:red">{{$order->email}}</span>
                                                  </p>

                                                  <p style="Margin:0;Margin-bottom:10px;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;margin-bottom:10px;padding:0;text-align:left">
                                                    <strong>Order ID</strong><br>
                                                    <span style="color:red">{{$order->orderNumber}}</span>
                                                  </p>
                                                </th>
                                              </tr>
                                            </table>
                                          </th>
                                          <th class="small-12 large-6 columns last" style="Margin:0 auto;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0 auto;padding:0;padding-bottom:16px;padding-left:0!important;padding-right:0!important;text-align:left;width:50%">
                                            <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                              <tr style="padding:0;text-align:left;vertical-align:top">
                                                <th style="Margin:0;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left">
                                                  <p style="Margin:0;Margin-bottom:10px;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;margin-bottom:10px;padding:0;text-align:left">
                                                    <strong>Shipping Method</strong><br>
                                                    Pickup
                                                  </p>
                                                </th>
                                              </tr>
                                            </table>
                                          </th>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </th>
                                  <th class="expander" style="Margin:0;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0!important;text-align:left;visibility:hidden;width:0">
                                  </th>
                                </tr>
                              </table>

                              <h4 style="Margin:0;Margin-bottom:10px;color:inherit;font-family:Helvetica,Arial,sans-serif;font-size:24px;font-weight:400;line-height:1.3;margin:0;margin-bottom:10px;padding:0;text-align:left;word-wrap:normal">
                                Order Details
                              </h4>

                              <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                <tr class="item-desc" style="background:#dadada;padding:0;text-align:left;vertical-align:top">
                                  <th style="Margin:0;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:5px;text-align:left">
                                    Item
                                  </th>
                                  <th style="Margin:0;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:5px;text-align:left">
                                    Quantity
                                  </th>
                                  <th style="Margin:0;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:5px;text-align:left">
                                    Price
                                  </th>
                                </tr>
                                <?php $subTotal=0;?>
@foreach($orderProducts as $product)
  <tr class="item-rec" style="margin-top:10px;padding:0;text-align:left;vertical-align:top">
    <td style="-moz-hyphens:auto;-webkit-hyphens:auto;Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;hyphens:auto;line-height:1.3;margin:0;padding:5px;text-align:left;vertical-align:top;word-wrap:break-word">
      <span style="color:red">{{$product->name}}</span>
    </td>
    <td style="-moz-hyphens:auto;-webkit-hyphens:auto;Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;hyphens:auto;line-height:1.3;margin:0;padding:5px;text-align:center;vertical-align:top;word-wrap:break-word">
     {{$product->quantity}}
    </td>
    <td style="-moz-hyphens:auto;-webkit-hyphens:auto;Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;hyphens:auto;line-height:1.3;margin:0;padding:5px;text-align:left;vertical-align:top;word-wrap:break-word">
       ${{$product->price}}
    </td>
  </tr>
  <?php $subTotal=$subTotal+$product->price*$product->quantity;?>
@endforeach
                                <tr class="sub-total" style="background:#dadada;padding:0;text-align:left;vertical-align:top">
                                  <td colspan="2" style="-moz-hyphens:auto;-webkit-hyphens:auto;Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;hyphens:auto;line-height:1.3;margin:0;padding:5px;text-align:left;vertical-align:top;word-wrap:break-word">
                                    <b>Tax:</b>
                                  </td>
                                  <td style="-moz-hyphens:auto;-webkit-hyphens:auto;Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;hyphens:auto;line-height:1.3;margin:0;padding:5px;text-align:left;vertical-align:top;word-wrap:break-word">
                                    <span style="color:black;font-weight:bold;">${{number_format((float)$order->tax, 2, '.', ',')}}</span>
                                  </td>
                                </tr>
                                <?php $subTotal = $subTotal+$order->tax;?>
                            @if($order->redeemStatus)
                                  <tr class="sub-total" style="background:#dadada;padding:0;text-align:left;vertical-align:top">
                                  <td colspan="2" style="-moz-hyphens:auto;-webkit-hyphens:auto;Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;hyphens:auto;line-height:1.3;margin:0;padding:5px;text-align:left;vertical-align:top;word-wrap:break-word">
                                    <b>Redeem ({{$order->redeemType}}):</b>
                                  </td>
                                  <td style="-moz-hyphens:auto;-webkit-hyphens:auto;Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;hyphens:auto;line-height:1.3;margin:0;padding:5px;text-align:left;vertical-align:top;word-wrap:break-word">
                                    <span style="color:black;font-weight:bold;">$-{{$order->redeemDiscount}}</span>
                                  </td>
                                </tr>
                                <?php $subTotal = $subTotal-$order->redeemDiscount; ?>
                               @endif 
                                <tr class="sub-total" style="background:#dadada;padding:0;text-align:left;vertical-align:top">
                                  <td colspan="2" style="-moz-hyphens:auto;-webkit-hyphens:auto;Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;hyphens:auto;line-height:1.3;margin:0;padding:5px;text-align:left;vertical-align:top;word-wrap:break-word">
                                    <b>Subtotal:</b>
                                  </td>
                                  <td style="-moz-hyphens:auto;-webkit-hyphens:auto;Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;hyphens:auto;line-height:1.3;margin:0;padding:5px;text-align:left;vertical-align:top;word-wrap:break-word">
                                    <span style="color:red">${{$subTotal}}</span>
                                  </td>
                                </tr>
                              </table>

                              <hr>

                              <h4 style="Margin:0;Margin-bottom:10px;color:inherit;font-family:Helvetica,Arial,sans-serif;font-size:24px;font-weight:400;line-height:1.3;margin:0;margin-bottom:10px;padding:0;text-align:left;word-wrap:normal">
                                Whats Next?
                              </h4>
                       <p style="Margin:0;Margin-bottom:10px;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;margin-bottom:10px;padding:0;text-align:left">
                                @if($order->state != "OK")
                                   Your order will be shipped in 2-3 business days.
                                @elseif($order->emailStatus == 3)
                                Please see the front office with a copy of your Order and ID Card and your order should be ready for pickup.
                                @else
                                Please visit either the Main Lobby or Warehouse (whichever you checked) with a copy of your Order and ID Card in 2-3 business days and your order should be ready for pickup.<br><br>
                                  <small><i>For more information on Jasco's Employee Store return or exchange policy, please click <a href="https://epurchase.byjasco.com/terms-and-conditions">here</a></i></small>
                              @endif
                              </p>
                            </th>
                          </tr>
                        </table>
                      </th>
                    </tr>
                  </tbody>
                </table>

                <table class="row footer text-center" style="background:#1daced;border-collapse:collapse;border-spacing:0;display:table;padding:0;position:relative;text-align:center;vertical-align:top;width:100%">
                  <tbody>
                    <tr style="padding:0;text-align:left;vertical-align:top">
                      <th class="small-12 large-6 columns first" style="Margin:0 auto;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0 auto;padding:0;padding-bottom:16px;padding-left:16px;padding-right:8px;text-align:left;width:274px">
                        <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                          <tr style="padding:0;text-align:left;vertical-align:top">
                            <th style="Margin:0;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left">
                              <p style="Margin:0;Margin-bottom:10px;color:#fff;font-family:Helvetica,Arial,sans-serif;font-size:13px;font-weight:400;line-height:1.3;margin:0;margin-bottom:10px;padding:0;padding-top:20px;text-align:left">
                                Email us at<br>
                                <a href="mailto:employeestore@byjasco.com" style="Margin:0;color:#eee;font-family:Helvetica,Arial,sans-serif;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left;text-decoration:none">employeestore@byjasco.com</a><br>
                                for questions or concerns.
                              </p>
                            </th>
                          </tr>
                        </table>
                      </th>
                      <th class="small-12 large-3 columns last" style="Margin:0 auto;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0 auto;padding:0;padding-bottom:16px;padding-left:8px;padding-right:16px;text-align:left;width:129px">
                        <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                          <tr style="padding:0;text-align:left;vertical-align:top">
                            <th style="Margin:0;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left">
                              <p style="Margin:0;Margin-bottom:10px;color:#fff;font-family:Helvetica,Arial,sans-serif;font-size:13px;font-weight:400;line-height:1.3;margin:0;margin-bottom:10px;padding:0;padding-top:20px;text-align:left">
                                10 E Memorial Rd<br>
                                Oklahoma City, OK 73114
                              </p>
                            </th>
                          </tr>
                        </table>
                      </th>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
      </center>
    </td>
  </tr>
</table>
<!-- prevent Gmail on iOS font size manipulation -->

<div style="display:none;white-space:nowrap;font:15px courier;line-height:0">
  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
</div>