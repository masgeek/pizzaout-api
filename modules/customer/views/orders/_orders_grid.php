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
            $address = "{$model->lOCATION->LOCATION_NAME} <br/> {$model->lOCATION->cITY->CITY_NAME}";
            return ucwords(strtolower($address));
        }
    ],
    [
        'header' => 'Rider',
        'filter' => false,
        'attribute' => 'RIDER_ID',
        'value' => function ($model) {
            /* @var $model \app\model_extended\CUSTOMER_ORDERS */
            return $model->rIDER != null ? $model->uSER->SURNAME : 'N/A';
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
    'ORDER_STATUS',
    //'ORDER_DATE:datetime',

    [


        'filter' => true,
        //'format' => 'datetime',
        'attribute' => 'ORDER_TIME',
        //'visible'=>false,
        'value' => function ($model) {
            /* @var $model \app\model_extended\CUSTOMER_ORDERS */
            return \app\helpers\APP_UTILS::FormatDateTime($model->ORDER_DATE,true);// \app\model_extended\CUSTOMER_ORDER_ITEMS::GetOrderTotal($model->ORDER_ID);
        }
    ],
    [
        'attribute' => 'ORDER_DATE',
        'format' => 'date',
        'filter' => \kartik\daterange\DateRangePicker::widget([
            'model' => $searchModel,
            'attribute' => 'ORDER_DATE',
            'convertFormat' => true,
            'startAttribute' => 'START_DATE',
            'endAttribute' => 'END_DATE',
            //'hideInput'=>true,
            'presetDropdown' => true,
            'pluginOptions' => [

                'locale' => [
                    'format' => 'Y-m-d',
                    'separator' => ' TO '
                ],
            ],
        ]),
    ],
    //'PAYMENT_METHOD',
    //'NOTES'
    [
        'class' => '\kartik\grid\ActionColumn',
        'template' => '{view}',
        'buttons' => [
            'view' => function ($url) {
                return $url;
            },
        ],
        'urlCreator' => function ($action, $model, $key, $index) {
            $url = '#';
            $class = 'btn btn-xs ';
            if ($action === 'view') {
                $action = '<i class="fa fa-pencil fa-1x"></i> View';
                $class .= 'btn-success btn-block';
                $url = \yii\helpers\Url::toRoute(['//customer/orders/view', 'id' => $model->ORDER_ID]);
            }
            return Html::a($action, $url, ['class' => $class]);
        },
        'dropdown' => false,
    ],
];

$layout = <<< HTML
<div class="pull-right">
    {summary}
</div>
{custom}
<div class="clearfix"></div>
{items}
{pager}
HTML;
?>


<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumns,
    'beforeHeader' => [
        [
            'columns' => [
                ['content' => $this->title, 'options' => ['colspan' => 4, 'class' => 'text-center info']],
            ],
            'options' => ['class' => 'skip-export'] // remove this row from export
        ]
    ],
    'summary' => "Showing <strong>{begin}-{end}</strong> of <strong>{totalCount}</strong> Orders",
    'bordered' => true,
    'striped' => true,
    'condensed' => false,
    'responsive' => true,
    'hover' => false,
    'floatHeader' => false,
    'showPageSummary' => false,
    'panel' => false,
    'layout' => $layout,
    'perfectScrollbar' => true,
    'resizableColumns' => true,
    'resizeStorageKey' => Yii::$app->user->id . '-' . date("m"),
    'pjax' => false,
    'pjaxSettings' => [
        'neverTimeout' => true,
        //'beforeGrid' => 'My fancy content before.',
        //'afterGrid' => 'My fancy content after.',
    ], 'replaceTags' => [
        '{custom}' => function ($widget) {
            // you could call other widgets/custom code here
            if ($widget->panel === false) {
                return '';
            } else {
                return '';
            }
        }
    ]
]); ?>
