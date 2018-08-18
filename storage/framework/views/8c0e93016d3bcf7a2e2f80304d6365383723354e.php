<?php $__env->startSection('mainContent'); ?>
<script src="https://js.stripe.com/v3/"></script>
<style>
.StripeElement {
background-color: white;
padding: 10px 12px;
border-radius: 4px;
border: 1px solid transparent;
box-shadow: 0 1px 3px 0 #e6ebf1;
-webkit-transition: box-shadow 150ms ease;
transition: box-shadow 150ms ease;
}

.StripeElement--focus {
box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
border-color: #fa755a;
}

.StripeElement--webkit-autofill {
background-color: #fefde5 !important;
}
form#payment-form {
width: 480px;
margin: 20px 0;
}

.group {
background: white;
box-shadow: 0 7px 14px 0 rgba(49,49,93,0.10),
0 3px 6px 0 rgba(0,0,0,0.08);
border-radius: 4px;
margin-bottom: 20px;
}

#card_name {
position: relative;
color: black;
font-weight: 300;
height: 40px;
line-height: 40px;
margin-left: 20px;
display: flex;
flex-direction: row;
}
#card_name::placeholder{
color: #8898AA;
}
.group label:not(:last-child) {
border-bottom: 1px solid #F0F5FA;
}
.field {
background: transparent;
font-weight: 300;
border: 0;
color: #31325F;
outline: none;
flex: 1;
padding-right: 10px;
padding-left: 10px;
cursor: text;
}

.field::-webkit-input-placeholder { color: #CFD7E0; }
.field::-moz-placeholder { color: #CFD7E0; }

button.submit-btn-1 {
display: block;
background: #00aeef;
color: white;
box-shadow: 0 7px 14px 0 rgba(49,49,93,0.10),
0 3px 6px 0 rgba(0,0,0,0.08);
border-radius: 4px;
border: 0;
font-size: 15px;
font-weight: 400;
width: 100%;
height: 40px;
line-height: 38px;
outline: none;
}

button.submit-btn-1:focus {
background: #555ABF;
}

button.submit-btn-1:active {
background: #43458B;
}

.outcome {
float: left;
width: 100%;
padding-top: 8px;
min-height: 20px;
text-align: center;
}

.success, .error {
display: none;
font-size: 13px;
}

.success.visible, .error.visible {
display: inline;
}

.error {
color: #E4584C;
}

.success {
color: #666EE8;
}

.success .token {
font-weight: 500;
font-size: 13px;
}
.page-wrapper{
display: none;
}
</style>
<!-- BREADCRUMBS SETCTION START -->
<div class="breadcrumbs-section plr-200 mb-80">
<div class="breadcrumbs overlay-bg">
  <div class="container">
      <div class="row">
          <div class="col-xs-12">
              <div class="breadcrumbs-inner">
                  <ul class="breadcrumb-list">
                      <li><a href="index.html">Home</a></li>
                      <li>Checkout</li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
</div>
</div>
<!-- BREADCRUMBS SETCTION END -->

<!-- Start page content -->
<center> <img src="img/loader.gif" id="loader" alt="Loading..."></center>
<section id="page-content" class="page-wrapper">
<!-- SHOP SECTION START -->
<div class="shop-section mb-80">
  <div class="container">
      <div class="row">
          <div class="col-md-2">
              <ul class="cart-tab">
                  <li>
                      <a class="active" href="/cart">
                          <span>01</span>
                          Shopping cart
                      </a>
                  </li>
                  <li>
                      <a class="active" href="/mywishlist">
                          <span>02</span>
                          Wishlist
                      </a>
                  </li>
                  <li>
                      <a class="active" href="/checkout" >
                          <span>03</span>
                          Checkout
                      </a>
                  </li>
                  <li>
                      <a>
                          <span>04</span>
                          Order complete
                      </a>
                  </li>
              </ul>
          </div>
          <div class="col-md-10">
              <!-- Tab panes -->
              <div class="tab-content">
                  <!-- shopping-cart start -->
                  <!-- checkout start -->
                  <div class="tab-pane active" id="checkout">
                              <div class="checkout-content box-shadow p-30">
                              <div class="row">
                                  <!-- billing details -->
                                  <div class="col-md-6">
                                      <!-- our order -->
                <?php echo $__env->make("layouts.subas.elements.cartTotalCard", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              <div class="coupon-discount">
                  <h6 class="widget-title border-left mb-20">redeem discount</h6>
                  <?php if(array_key_exists("redeem",$_COOKIE)): ?>
                  <p>Code is Already Applied</p>
                  <input type="text" name="redeemName" value="<?php echo e($_COOKIE['redeem']); ?>" readonly>
                  <a href="/redeem/removeRedeemForUser">
                  <button class="submit-btn-1 black-bg btn-hover-2">Remove Coupon</button>
                </a>
                <?php else: ?>
                  <p>Enter your coupon code or gift card  if you have one!</p>
                  <form action="/redeem/applyRedeemForUser" method="post">
                    <?php echo e(csrf_field()); ?>

                  <input type="text" name="redeemName" placeholder="Enter your coupon or gift card code here.">
                  <button class="submit-btn-1 black-bg btn-hover-2" type="submit">Apply Coupon</button>
                </form>
                <?php endif; ?>
              </div>

                  <form action="/checkout/charge" method="post" id="payment-form">
                    <?php echo e(csrf_field()); ?>

                  <div class="payment-method">
                  <h6 class="widget-title border-left mb-20">payment method</h6>
                  <div class="form-row">
                  <div class="group">
                  <input id="card_name" class="field" placeholder="Card Holder Name" />
                  </div>  
                  <div class="group">
                  <div id="card-element">
                  <!-- a Stripe Element will be inserted here. -->
                  </div>
                  </div>  
                  <!-- Used to display form errors -->
                  <div id="card-errors" role="alert"></div>
                  </div>
                  <br>
                  <h6 class="widget-title border-left mb-20">shipping details</h6>
                  <?php if(auth()->user()->state == "OK"): ?>
                  <h6 class="widget-title mb-20">
                  <input type="checkbox" value="ok" name="ShippingChkBoxBuilding1" id="ShippingChkBoxBuilding1">
                  Warehouse</h6>
                  <h6 class="widget-title mb-20">
                  <input type="checkbox" value="ok"  name="ShippingChkBoxBuilding2" id="ShippingChkBoxBuilding2">
                  Main Lobby</h6>
                  <?php elseif(Auth::user()->privilege == 'guest'): ?>
                  <h6 class="widget-title mb-20">
                  <input type="checkbox" value="ok" name="ShippingChkBoxBuilding1" id="ShippingChkBoxBuilding1">
                  Warehouse</h6>
                   <h6 class="widget-title mb-20">
                  <input type="checkbox" value="ok"  name="ShippingChkBoxBuilding2" id="ShippingChkBoxBuilding2">
                  Main Lobby</h6>
                  <?php else: ?>
                  <h6 class="widget-title mb-20">
                  <input type="checkbox" value="ok" id="ShippingChkBox" name="ShippingChkBox">
                  Shipping Outside The State</h6>
                  <?php endif; ?>
                    <div class="billing-details pr-10" id="shippingBox">
                     <h6 class="widget-title border-left mb-20">
                       SHIPPING details
                     </h6>
                     <textarea class="custom-textarea" placeholder="Your address here..." id="addressBox" name="addressBox"></textarea>
                      <select class="custom-select" id="stateDropdown" name="stateDropdown">
                        <option value="">State</option>
                          <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($district->District); ?>"><?php echo e($district->District); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select> 
                    <select class="custom-select" id="cityDropdown" name="cityDropdown">
                    <option value="">Town/City</option>
                    </select> 
                    <input type="text" id="phoneBox" name="phoneBox" placeholder="Phone Number">
                    <input type="text" id="zipBox" name="zipBox" placeholder="Zip Code...">
                    </div>
                      <div id="errorPanel" style="display: none;">
                        <div class="alert alert-danger">
                          <strong>Error</strong> <p id="errorPanelMessage"></p>
                        </div>
                      </div>
                  <button class="submit-btn-1 mt-30 btn-hover-1" type="submit">place order (<?php echo e($totalAmount); ?>)</button>
                                        </form>

                                      </div>
                                      <!-- payment-method end -->
                                  </div>
                              </div>
                      </div>
                  </div>
                  <!-- checkout end -->
              </div>
          </div>
      </div>
  </div>
</div>
<!-- SHOP SECTION END -->             

</section>
<script type="text/javascript">
  $("#shippingBox").slideUp("fast");
  $("#ShippingChkBox").change(function(){
    $('#ShippingChkBoxBuilding1').prop('checked', false);
    $('#ShippingChkBoxBuilding2').prop('checked', false);
     if(this.checked) {
$("#shippingBox").slideDown("slow");
}else{
$("#shippingBox").slideUp("slow");
}

});
$("#ShippingChkBoxBuilding1").change(function(){
     if(this.checked) {
    $('#ShippingChkBox').prop('checked', false);
    $('#ShippingChkBoxBuilding2').prop('checked', false);
$("#shippingBox").slideUp("slow");
}
});

$("#ShippingChkBoxBuilding2").change(function(){
     if(this.checked) {
    $('#ShippingChkBox').prop('checked', false);
    $('#ShippingChkBoxBuilding1').prop('checked', false);
$("#shippingBox").slideUp("slow");
}

});

$("#stateDropdown").change(function(){
if($("#stateDropdown").val() != "notSet") {
getCity($("#stateDropdown").val());
}else{
alert("Select State");
}
});
function getCity(district){
$.ajax({
    url : "/checkout/getCity",
    type:'POST',
    dataType: 'json',
    data:{ 
      "_token": "<?php echo e(csrf_token()); ?>",
      district: district
    },
    success: function(response) {
      $('#cityDropdown').empty();
      $('#cityDropdown').append('<option value="notSet">Town/City</option>');
      $("#cityDropdown").attr('disabled', false);
       $.each(response,function(cityId, city){
         $("#cityDropdown").append('<option value="' + city.ID + '"">' + city.Name + '</option>');
        });
     }
});
}
</script>
<script type="text/javascript" src="<?php echo e(asset('js/forCheckOut.js?ver=1.1')); ?>"></script>
<script type="text/javascript">
            window.onload = function () { 
         $("#loader").slideUp("slow");
         $("#page-content").slideDown("slow");     
  }
</script>
<!-- End page content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.subas.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>