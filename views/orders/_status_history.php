<?php
/* @var $this yii\web\View */
/* @var $model app\model_extended\CUSTOMER_ORDERS */

$formatter = \Yii::$app->formatter;
?>


<table class="table table-condensed table-hover table-border">
    <thead>
    <tr>
        <th>Status</th>
        <th>Comments</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>
	<?php
	foreach ($model->orderTrackings as $orderTracking):?>
        <tr>
            <td><?= $orderTracking->STATUS ?></td>
            <td><?= $orderTracking->COMMENTS ?></td>
            <td><?= $formatter->asDatetime($orderTracking->TRACKING_DATE) ?></td>
        </tr>
	<?php endforeach; ?>
    </tbody>
</table>

