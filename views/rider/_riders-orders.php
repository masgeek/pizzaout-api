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
        'visible' => false,
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
                    case \app\helpers\ORDER_HELPER::STATUS_PAYMENT_PENDING:
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
                        $action = '<i class="fa fa-building fa-1x"></i><br/>View';
                        $class .= 'btn-success';
                        $url = \yii\helpers\Url::toRoute(['view', 'id' => $model->ORDER_ID]);
                        break;
                    case \app\helpers\ORDER_HELPER::STATUS_CHEF_ASSIGNED:
                    case \app\helpers\ORDER_HELPER::STATUS_UNDER_PREPARATION:
                        $action = '<i class="fa fa-hourglass-2 fa-1x"></i><br/>View';
                        $class .= 'btn-success';
                        $url = \yii\helpers\Url::toRoute(['view', 'id' => $model->ORDER_ID]);
                        break;
                        break;
                    case \app\helpers\ORDER_HELPER::STATUS_ORDER_READY:
                        $action = '<i class="fa fa-hourglass fa-1x"></i><br/>View';
                        $class .= 'btn-success';
                        $url = \yii\helpers\Url::toRoute(['view', 'id' => $model->ORDER_ID]);
                        break;
                    case \app\helpers\ORDER_HELPER::STATUS_AWAITING_RIDER:
                    case \app\helpers\ORDER_HELPER::STATUS_RIDER_ASSIGNED:
                    case \app\helpers\ORDER_HELPER::STATUS_RIDER_DISPATCHED:
                    case \app\helpers\ORDER_HELPER::STATUS_ORDER_DELIVERED:
                        $action = '<i class="fa fa-pencil fa-1x"></i><br/>View';
                        $class .= 'btn-success';
                        $url = \yii\helpers\Url::toRoute(['view', 'id' => $model->ORDER_ID]);
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
    [
        'header' => 'Rider Name',
        'filter' => false,
        'attribute' => 'RIDER_ID',
        'value' => function ($model) {
            /* @var $model \app\model_extended\CUSTOMER_ORDERS */
            return $model->rIDER != null ? $model->rIDER->uSER->SURNAME : 'N/A';
        }
    ],
    'ORDER_ID',
    'SURNAME',
    'OTHER_NAMES',
    'MOBILE',
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
    'ORDER_DATE:datetime',
    'UPDATED_AT:datetime',
    //'PAYMENT_METHOD',
    'ORDER_STATUS',
    //'NOTES'
];

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Riders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<p>
    <?= Html::a(Yii::t('app', 'Riders'), ['rider/index'], ['class' => 'btn btn-primary']) ?>
</p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    //'filterModel' => $searchModel,
    'columns' => $gridColumns,
    'beforeHeader' => [
        [
            'columns' => [
                ['content' => $this->title, 'options' => ['colspan' => 4, 'class' => 'text-center warning']],
            ],
            'options' => ['class' => 'skip-export'] // remove this row from export
        ]
    ],
    'summary' => "Showing <strong>{begin}-{end}</strong> of <strong>{totalCount}</strong> Orders",
    'bordered' => true,
    'striped' => true,
    'condensed' => true,
    'responsive' => true,
    'hover' => true,
    'floatHeader' => false,
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
