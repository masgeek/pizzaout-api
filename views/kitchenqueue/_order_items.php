<?php
/* @var $this yii\web\View */
/* @var $model app\model_extended\CUSTOMER_ORDERS */
?>


<table class="table table-condensed table-hover GeneratedTable">
    <thead>
    <tr>
        <th>Quantity</th>
        <th>Price</th>
        <th>Details</th>
    </tr>
    </thead>
    <tbody>


	<?php
	foreach ($model->customerOrderItems as $orderItems):?>
        <tr>
            <td><?= $orderItems->ORDER_ITEM_ID ?></td>
            <td><?= $orderItems->ORDER_ITEM_ID ?></td>
            <td><?= $orderItems->ORDER_ITEM_ID ?></td>
        </tr>
	<?php endforeach; ?>
    </tbody>
</table>

