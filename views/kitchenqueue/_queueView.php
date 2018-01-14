<?php

use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\model_extended\CUSTOMER_ORDERS */
/* @var $tracker app\model_extended\STATUS_TRACKING_MODEL */
/* @var $form yii\widgets\ActiveForm */

$attributes = [
    /*[
        'group' => true,
        'label' => 'Order Details',
        'attribute' => 'ORDER_ID',
        'rowOptions' => ['class' => 'success']
    ],*/
    [
        'columns' => [
            [
                'attribute' => 'ORDER_DATE',
                'format' => 'datetime',
                'valueColOptions' => ['style' => 'width:60%;text-align:left'],
            ],
        ],
    ],
    [
        'columns' => [
            [
                'label' => 'Assigned Chef',
                'attribute' => 'CHEF_ID',
                'value' => $model->cHEF != null ? $model->cHEF->CHEF_NAME : 'Not Assigned',
                'valueColOptions' => ['style' => 'width:60%;text-align:left'],
            ],
        ],
    ],
    [
        'columns' => [
            [
                'attribute' => 'ORDER_STATUS',
                'value' => $model->ORDER_STATUS,
                'valueColOptions' => ['style' => "text-align:left;width:60%;font-weight:bold;color:" . $model->oRDERSTATUS->COLOR . ";"],
            ],
        ],
    ],
    /*[
        'group' => true,
        'label' => 'Order Items',
        'attribute' => 'ORDER_ID',
        'rowOptions' => ['class' => 'danger']
    ],*/
    [
        'group' => true,
        'label' => count($model->customerOrderItems) > 0 ? \app\model_extended\CUSTOMER_ORDER_ITEMS::BuildItemsTable($model->customerOrderItems) : 'No Items',
        'attribute' => 'CHEF_ID',
        'format' => 'raw',
        'hideIfEmpty' => true,
        'valueColOptions' => ['style' => 'width:60%;text-align:left'],
        //'value' => count($model->customerOrderItems) > 0 ? \app\model_extended\CUSTOMER_ORDER_ITEMS::BuildItemsTable($model->customerOrderItems) : 'No Items'
    ],

];
?>

<div class="col-md-3">
    <?= DetailView::widget([
        'model' => $model,
        'mode' => DetailView::MODE_VIEW,
        'condensed' => true,
        'bordered' => true,
        'hover' => true,
        'panel' => [
            'heading' => 'Order ID # ' . $model->ORDER_ID,
            'type' => DetailView::TYPE_PRIMARY,
            'headingOptions' => [
                'template' => '{title}'
            ]
        ],
        'attributes' => $attributes,
    ]) ?>
</div>
