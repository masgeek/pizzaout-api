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
        <th>Customer Notified</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($model->orderTrackings as $orderTracking):?>
        <tr>
            <td><?= $orderTracking->STATUS ?></td>
            <td><?= $orderTracking->COMMENTS != null ? $orderTracking->COMMENTS : 'N/A' ?></td>
            <td><?= $orderTracking->USER_VISIBLE ? 'Yes' : 'No' ?></td>
            <td><?= \app\helpers\APP_UTILS::FormatDateTime($orderTracking->TRACKING_DATE) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

