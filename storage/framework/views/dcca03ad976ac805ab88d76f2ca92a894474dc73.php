<tr onClick="getDetailOf('<?php echo e($order->orderNumber); ?>')">
	<td><?php echo e($order->orderNumber); ?></td>
	<td><?php echo e($order->email); ?></td>
	<td><?php echo e($order->totalAmount); ?></td>
	<td><?php echo e($order->created_at); ?></td>
</tr>