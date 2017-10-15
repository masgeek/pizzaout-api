<?php
/* @var $this yii\web\View */
/* @var $model app\model_extended\CUSTOMER_ORDERS */
?>


<table class="table table-condensed table-bordered table-striped">
    <thead>
    <tr>
        <th>Date</th>
        <th>Status</th>
        <th>Comments</th>
    </tr>
    </thead>
    <tbody>


	<?php
	foreach ($model->orderTrackings as $orderTracking):?>
        <tr>
            <td><?= $orderTracking->TRACKING_DATE ?></td>
            <td><?= $orderTracking->STATUS ?></td>
            <td><?= $orderTracking->COMMENTS ?></td>
        </tr>
	<?php endforeach; ?>
    </tbody>
</table>