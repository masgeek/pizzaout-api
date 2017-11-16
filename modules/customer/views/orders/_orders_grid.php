<?php

use kartik\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models_search\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
    'ORDER_ID',
    //'SURNAME',
    //'OTHER_NAMES',
    //'MOBILE',
    //'PAYMENT_NUMBER',
    //'PAYMENT_AMOUNT',
    [
        'header' => 'Delivery Location',
        'attribute' => 'LOCATION_ID',
        'format' => 'raw',
        'value' => function ($model) {
            /* @var $model \app\model_extended\CUSTOMER_ORDERS */
            $address = "{$model->aDDRESS->ADDRESS} <br/>{$model->aDDRESS->lOCATION->LOCATION_NAME}";
            return ucwords(strtolower($address));
        }
    ],
    [
        'header' => 'Rider',
        'filter' => false,
        'attribute' => 'RIDER_ID',
        'value' => function ($model) {
            /* @var $model \app\model_extended\CUSTOMER_ORDERS */
            return $model->rIDER != null ? $model->rIDER->RIDER_NAME : 'N/A';
        }
    ],
    [
        'header' => 'Cost',
        'filter' => false,
        'format' => 'currency',
        'attribute' => 'ORDER_ID',
        'value' => function ($model) {
            /* @var $model \app\model_extended\CUSTOMER_ORDERS */
            return \app\model_extended\CUSTOMER_ORDER_ITEMS::GetOrderTotal($model->ORDER_ID);
        }
    ],
    'ORDER_DATE:datetime',
    //'PAYMENT_METHOD',
    'ORDER_STATUS',
    //'NOTES'
    [
        'class' => '\kartik\grid\ActionColumn',
        'template' => '{view}',
        'dropdown' => true,
    ],
];

?>


<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => null,//$searchModel,
    'columns' => $gridColumns,
    'beforeHeader' => [
        [
            'columns' => [
                ['content' => $this->title, 'options' => ['colspan' => 4, 'class' => 'text-center warning']],
            ],
            'options' => ['class' => 'skip-export'] // remove this row from export
        ]
    ],
    'bordered' => true,
    'striped' => true,
    'condensed' => false,
    'responsive' => true,
    'hover' => false,
    'floatHeader' => false,
    'showPageSummary' => false,
    'panel' => false,
    'resizableColumns' => true,
    'resizeStorageKey' => Yii::$app->user->id . '-' . date("m"),
    'pjax' => false,
    'pjaxSettings' => [
        'neverTimeout' => true,
        //'beforeGrid' => 'My fancy content before.',
        //'afterGrid' => 'My fancy content after.',
    ]
]); ?>
