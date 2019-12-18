<?php

use app\helpers\APP_UTILS;
use app\model_extended\CUSTOMER_ORDER_ITEMS;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\model_extended\CUSTOMER_ORDERS */
/* @var $tracker app\model_extended\STATUS_TRACKING_MODEL */
/* @var $form yii\widgets\ActiveForm */

$attributes = [
    [
        'group' => true,
        'label' => 'Order Details',
        'rowOptions' => ['class' => 'success']
    ],
    [
        'columns' => [
            [
                'attribute' => 'ORDER_ID',
                'displayOnly' => true,
            ],
            [
                'label' => 'Order Amount',
                'attribute' => 'ORDER_ID',
                'displayOnly' => true,
                'value' => CUSTOMER_ORDER_ITEMS::GetOrderTotal($model->ORDER_ID),
                'format' => 'currency',
                'valueColOptions' => ['style' => 'width:30%']
            ],

        ],
    ],
    [
        'columns' => [
            [
                'attribute' => 'ORDER_STATUS',
                'format' => 'raw',
                'displayOnly' => true,
                'value' => "<span class='badge' style='background-color: {$model->oRDERSTATUS->COLOR};'> </span>  <code>" . $model->ORDER_STATUS . '</code>',
            ],
            [
                'attribute' => 'ORDER_DATE',
                'displayOnly' => true,
                'format' => 'datetime',
                'valueColOptions' => ['style' => 'width:30%'],
            ],
        ],
    ],
    [
        'attribute' => 'NOTES',
        'displayOnly' => true,
    ],

];
?>

<?= DetailView::widget([
    'model' => $model,
    'mode' => DetailView::MODE_VIEW,
    'condensed' => true,
    'bordered' => true,
    'hover' => false,
    'panel' => false,
    'attributes' => $attributes,
]) ?>