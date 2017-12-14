<?php

use kartik\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models_search\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
    [
        'class' => '\kartik\grid\ActionColumn',
        'template' => '{update}',
        'buttons' => [
            'update' => function ($url, $model, $key) {
                return $url;
            },
        ],
        'urlCreator' => function ($action, $model, $key, $index) {
            /* @var $model app\models_search\OrdersSearch */
            $url = '#';
            $class = 'btn btn-sm ';

            if ($action === 'update') {
                switch ($model->ORDER_STATUS) {
                    case \app\helpers\ORDER_HELPER::STATUS_ORDER_CANCELLED:
                        $action = '<i class="fa fa-pencil fa-1x"></i><br/>View';
                        $class .= 'btn-success';
                        $url = \yii\helpers\Url::toRoute(['view', 'id' => $model->ORDER_ID]);
                        break;
                    case \app\helpers\ORDER_HELPER::STATUS_ORDER_PENDING:
                        $action = '<i class="fa fa-pencil fa-1x"></i><br/>Confirm';
                        $class .= 'btn-success';
                        $url = \yii\helpers\Url::toRoute(['update', 'id' => $model->ORDER_ID]);
                        break;
                    case \app\helpers\ORDER_HELPER::STATUS_PAYMENT_CONFIRMED:
                    case \app\helpers\ORDER_HELPER::STATUS_ORDER_CONFIRMED:
                        $action = '<i class="fa fa-cutlery fa-1x"></i><br/>Assign Kitchen';
                        $class .= 'btn-warning';
                        $url = \yii\helpers\Url::toRoute(['assign-kitchen', 'id' => $model->ORDER_ID]);
                        break;
                    case \app\helpers\ORDER_HELPER::STATUS_KITCHEN_ASSIGNED:
                        $action = '<i class="fa fa-building fa-1x"></i><br/>Assign Chef';
                        $class .= 'btn-default';
                        $url = \yii\helpers\Url::toRoute(['assign-chef', 'id' => $model->ORDER_ID]);
                        break;
                    case \app\helpers\ORDER_HELPER::STATUS_CHEF_ASSIGNED:
                        $action = '<i class="fa fa-hourglass-2 fa-1x"></i><br/>Prepare Order';
                        $class .= 'btn-primary';
                        $url = \yii\helpers\Url::toRoute(['prepare-order', 'id' => $model->ORDER_ID]);
                        break;
                    case \app\helpers\ORDER_HELPER::STATUS_UNDER_PREPARATION:
                        $action = '<i class="fa fa-hourglass-2 fa-1x"></i><br/>Order Ready';
                        $class .= 'btn-primary';
                        $url = \yii\helpers\Url::toRoute(['order-ready', 'id' => $model->ORDER_ID]);
                        break;
                    case \app\helpers\ORDER_HELPER::STATUS_ORDER_READY:
                        $action = '<i class="fa fa-hourglass fa-1x"></i><br/>Assign Rider';
                        $class .= 'btn-success';
                        $url = \yii\helpers\Url::toRoute(['update-rider', 'id' => $model->ORDER_ID, 'workflow' => 4]);
                        break;
                    case \app\helpers\ORDER_HELPER::STATUS_AWAITING_RIDER:
                        //case \app\helpers\ORDER_STATUS_HELPER::STATUS_RIDER_ASSIGNED:
                        //case \app\helpers\ORDER_STATUS_HELPER::STATUS_RIDER_DISPATCHED:
                        //case \app\helpers\ORDER_STATUS_HELPER::STATUS_ORDER_DELIVERED:
                        $action = '<i class="fa fa-pencil fa-1x"></i><br/>Update';
                        $class .= 'btn-purple';
                        $url = \yii\helpers\Url::toRoute(['update-rider', 'id' => $model->ORDER_ID, 'workflow' => 5]);
                        break;
                    default:
                        $action = '<i class="fa fa-cog fa-1x"></i><br/>View';
                        $class .= 'btn-success';
                        $url = \yii\helpers\Url::toRoute(['view', 'id' => $model->ORDER_ID]);
                        break;
                }

            }

            return Html::a($action, $url, ['class' => $class]);
        },
    ],
    'ORDER_ID',
    'SURNAME',
    'OTHER_NAMES',
    'MOBILE',
    'PAYMENT_NUMBER',
    'PAYMENT_AMOUNT',
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
        'header' => 'Chef',
        'filter' => false,
        'attribute' => 'CHEF_ID',
        'value' => function ($model) {
            /* @var $model \app\model_extended\CUSTOMER_ORDERS */
            return $model->cHEF != null ? $model->cHEF->CHEF_NAME : 'N/A';
        }
    ],
    [
        'header' => 'Rider',
        'filter' => false,
        'attribute' => 'RIDER_ID',
        'value' => function ($model) {
            /* @var $model \app\model_extended\CUSTOMER_ORDERS */
            return $model->rIDER != null ? $model->rIDER->uSER->SURNAME : 'N/A';
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
    'PAYMENT_METHOD',
    'ORDER_STATUS',
    'NOTES'
];
?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumns,
    'beforeHeader' => [
        [
            'columns' => [
                ['content' => 'Kitchen Queue Items', 'options' => ['colspan' => 4, 'class' => 'text-center success']],
            ],
            'options' => ['class' => 'skip-export'] // remove this row from export
        ]
    ],
    'bordered' => true,
    'striped' => true,
    'condensed' => true,
    'responsive' => true,
    'hover' => true,
    'floatHeader' => true,
    'showPageSummary' => false,
    'panel' => false,
    'resizableColumns' => true,
    'resizeStorageKey' => Yii::$app->user->id . '-' . date("m"),
    'pjax' => true,
    'pjaxSettings' => [
        'neverTimeout' => true,
        //'beforeGrid' => 'My fancy content before.',
        //'afterGrid' => 'My fancy content after.',
    ]
]); ?>