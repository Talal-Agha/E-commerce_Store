<?php $__env->startSection('Maincontent'); ?>
<?php echo $__env->make('layouts.admin.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
<h1>Orders</h1>
<hr>
 <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#Orders">Orders</a></li>
    <li><a data-toggle="tab" href="#Search">Search</a></li>
  </ul>

  <div class="tab-content">
    <div id="Orders" class="tab-pane fade in active">
<br>
        <div class="panel panel-info">
      <div class="panel-heading">Orders</div>
      <div class="panel-body">

<?php if(count($orders)): ?>
 <table class="table table-bordered">
    <thead>
      <tr>
        <th>Order Number</th>
        <th>Email</th>
        <th>Total Amount</th>
        <th>Time</th>
      </tr>
    </thead>
    <tbody id="ordersTable">
      <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr onClick="getDetailOf('<?php echo e($order->orderNumber); ?>')">
  <td><?php echo e($order->orderNumber); ?></td>
  <td><?php echo e($order->email); ?></td>
  <td><?php echo e($order->totalAmount); ?></td>
  <td><?php echo e($order->created_at); ?></td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
  </table>
  <?php else: ?>
<center><h1>0 Orders Found</h1></center>
  <?php endif; ?>
      </div>
    </div>
    </div>
    <div id="Search" class="tab-pane fade">
    <br>
        <div class="panel panel-info">
      <div class="panel-heading">Search</div>
      <div class="panel-body"> 
      <div class="well">
      <div class="row">
      <div class="col-sm-4">
      <label for="searchType">Search From:</label>
        <select id="searchType" class="form-control">
          <option value="orderNumber">Order Number</option>
          <option value="email">Email</option>
        </select>
        </div>
        <div class="col-sm-4">
        <label for="search">Search For:</label>
        <div class="input-group">
      <input type="text" id="search" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-default" onClick="searchOrder()" type="button">Search</button>
      </span>
       </div>
        </div>  
    </div>
    </div>
    <div id="searchResults">
      </div>
    </div>

  </div>
<script type="text/javascript">
  function searchOrder(){
  var searchFor = $("#search").val();
  if(!searchFor){
    alert("PLEASE ENTER SOMETHING TO SEARCH");
  }
  $.ajax({
            url : "/myadmin/searchorder",
            type:'POST',
            data: {
    "_token": "<?php echo e(csrf_token()); ?>",
    searchFor:searchFor,
    searchType:$("#searchType").val()
  },
            success: function(response) {
                $('#searchResults').html(response);    
             }
        });
}
function getDetailOf(orderNumber){
location.href = "/myadmin/orders/getDetailOf/"+orderNumber;
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>