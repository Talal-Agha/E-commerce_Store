<?php $__env->startSection('Maincontent'); ?>
<?php echo $__env->make('layouts.admin.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
<style>
#pSku{
  width:100%;
  border:1px solid #ccc;
  padding:5px;
  font-family:Arial;
}
#pSku > span{
  cursor:pointer;
  display:block;
  float:left;
  color:#fff;
  background:#789;
  padding:5px;
  padding-right:25px;
  margin:4px;
}
#pSku > span:hover{
  opacity:0.7;
}
#pSku > span:after{
 position:absolute;
 content:"×";
 border:1px solid;
 padding:2px 5px;
 margin-left:3px;
 font-size:11px;
}
#pSku > input{
  background:#eee;
  border:0;
  margin:4px;
  padding:7px;
  width:auto;
}


#redeemName{
  width:100%;
  border:1px solid #ccc;
  padding:5px;
  font-family:Arial;
}
#redeemName > span{
  cursor:pointer;
  display:block;
  float:left;
  color:#fff;
  background:#789;
  padding:5px;
  padding-right:25px;
  margin:4px;
}
#redeemName > span:hover{
  opacity:0.7;
}
#redeemName > span:after{
 position:absolute;
 content:"×";
 border:1px solid;
 padding:2px 5px;
 margin-left:3px;
 font-size:11px;
}
#redeemName > input{
  background:#eee;
  border:0;
  margin:4px;
  padding:7px;
  width:auto;
}

</style>
<h1>Add Advance Redeem</h1>
<hr>
<br>
<form method="POST" action="/myadmin/addRedeem">
<?php echo e(csrf_field()); ?>

 <div class="form-group">
   <label>Redeem Name:*</label>
  <div id="redeemName">        
   <input type="text" id="addNewRedeemName" class="form-control" placeholder="Add a Redeem Name" />
  </div>
  </div>
<div class="form-group">
  <label for="redeemType">Select Type:*</label>
    <select class="form-control" id="redeemType" name="redeemType"  required>
      <option value="giftCard">Gift Card</option>
      <option value="coupon">Coupon</option>
   </select>
</div>

<div class="form-group" required>
  <label for="redeemDiscountType">Select Discount Type:*</label>
   <select class="form-control" id="redeemDiscountType"  name="redeemDiscountType">
      <option value="fixed">Fixed</option>
      <option value="percentage">Percentage</option>
   </select>
</div>

<div class="form-group">
   <label>Discount:*</label>
   <input type="text" name="redeemDiscount" placeholder="Discount For User" class="form-control" required>
</div>

<div class="form-group">
 <label>Minimum Amount Require:*</label>
 <input type="text" name="minimumAmountRequire" placeholder="Minimum Amount Require" class="form-control" required>
</div>

<div class="form-group">
 <label>Number Of Time Usage Allowed: *</label>
 <input type="text" name="usageAllow" placeholder="Usage Allowed" class="form-control" required>
</div>

<label for="pSku">Product SKU(s):</label>
  <div id="pSku">        
   <input type="text" id="addNewTag" class="form-control" placeholder="Add a Product SKU" />
  </div>

<button class="btn btn-success" type="submit">Add</button>
</form>
<script>
function chyForProduct(sku){
 var request = $.ajax({
  url: "/myadmin/products/chkWithSku",
  type: "POST",
  async:false,
  data:{ 
    "_token": "<?php echo e(csrf_token()); ?>",
    sku: sku
  },
});
request.fail(function(jqXHR, textStatus) {
  alert( "Request failed: " + textStatus);
  return false;
});
return request.responseText;
  }

  $(function(){ $("#addNewTag").on({focusout : function() {
      var txt= this.value.replace(/,/g,''); // allowed characters
      if (txt) {
        if(chyForProduct(txt) =="true"){
          this.value="";
         $("#pSku").prepend("<span><input type='hidden' value='"+txt+"' name='productSku[]' readonly>"+txt+"</span>");
        }else{
          this.value="";
           alert("You Enter "+txt+" and system is unable to find the product please chk id of your product again");
        }
        
      }
    },
    keyup : function(ev) {
      if(/(188)/.test(ev.which)) $(this).focusout(); 
    }
  });
  $('#pSku').on('click', 'span', function() {
     $(this).remove(); 
  });

});

    $(function(){ $("#addNewRedeemName").on({focusout : function() {
      var txt= this.value.replace(/,/g,''); // allowed characters
      if (txt) { 
         $("#redeemName").prepend("<span><input type='hidden' value='"+txt+"' name='redeemNames[]' readonly>"+txt+"</span>");
         this.value="";
      }
    },
    keyup : function(ev) {
      if(/(188)/.test(ev.which)) $(this).focusout(); 
    }
  });
  $('#redeemName').on('click', 'span', function() {
     $(this).remove(); 
  });

});


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>