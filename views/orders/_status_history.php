<?php
/* @var $this yii\web\View */
/* @var $model app\model_extended\CUSTOMER_ORDERS */

$formatter = \Yii::$app->formatter;
?>

<hr/>
<table class="table table-condensed table-hover table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>Status</th>
        <th>Comments</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $i = 1;
    foreach ($model->orderTrackings as $orderTracking):?>
        <tr>
            <th><?= $i ?></th>
            <td><?= $orderTracking->STATUS ?></td>
            <td><?= $orderTracking->COMMENTS != null ? $orderTracking->COMMENTS : 'N/A' ?></td>
            <td><?= Yii::$app->formatter->asDatetime($orderTracking->TRACKING_DATE) ?></td>
        </tr>
        <?php
        $i++;
    endforeach; ?>
    </tbody>
</table>

