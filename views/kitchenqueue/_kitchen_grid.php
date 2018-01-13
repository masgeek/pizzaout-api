<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $searchModel app\models_search\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$isFa = true;

$exportConfig = [
    ExportMenu::FORMAT_HTML => false,
    ExportMenu::FORMAT_CSV => [
        'label' => Yii::t('app', 'CSV'),
        'icon' => $isFa ? 'file-code-o' : 'floppy-open',
        'iconOptions' => ['class' => 'text-primary'],
        'linkOptions' => [],
        'options' => ['title' => Yii::t('app', 'Comma Separated Values')],
        'alertMsg' => Yii::t('app', 'The CSV export file will be generated for download.'),
        'mime' => 'application/csv',
        'extension' => 'csv',
        //'writer' => 'CSV'
    ],
    ExportMenu::FORMAT_TEXT => false,
    ExportMenu::FORMAT_PDF => [
        'label' => Yii::t('app', 'PDF'),
        'icon' => $isFa ? 'file-pdf-o' : 'floppy-disk',
        'iconOptions' => ['class' => 'text-danger'],
        'linkOptions' => [],
        'options' => ['title' => Yii::t('app', 'Portable Document Format')],
        'alertMsg' => Yii::t('app', 'The PDF export file will be generated for download.'),
        'mime' => 'application/pdf',
        'extension' => 'pdf',
        'filename' => 'sammy',
        //'writer' => 'PDF'
    ],
    ExportMenu::FORMAT_EXCEL => [
        'label' => Yii::t('app', 'Excel 95 +'),
        'icon' => $isFa ? 'file-excel-o' : 'floppy-remove',
        'iconOptions' => ['class' => 'text-success'],
        'linkOptions' => [],
        'options' => ['title' => Yii::t('app', 'Microsoft Excel 95+ (xls)')],
        'alertMsg' => Yii::t('app', 'The EXCEL 95+ (xls) export file will be generated for download.'),
        'mime' => 'application/vnd.ms-excel',
        'extension' => 'xls',
        //'writer' => 'Excel5'
    ],
    ExportMenu::FORMAT_EXCEL_X => [
        'label' => Yii::t('app', 'Excel 2007+'),
        'icon' => $isFa ? 'file-excel-o' : 'floppy-remove',
        'iconOptions' => ['class' => 'text-success'],
        'linkOptions' => [],
        'options' => ['title' => Yii::t('app', 'Microsoft Excel 2007+ (xlsx)')],
        'alertMsg' => Yii::t('app', 'The EXCEL 2007+ (xlsx) export file will be generated for download.'),
        'mime' => 'application/application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'extension' => 'xlsx',
        //'writer' => 'Excel2007'
    ],
];

$gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
    [
        'class' => '\kartik\grid\ActionColumn',
        'template' => '{update}{receipt}',
        'buttons' => [
            'update' => function ($url, $model, $key) {
                return $url;
            },
            'receipt' => function ($url, $model, $key) {
                return $url;
            },
        ],
        'visibleButtons' => [
            'update' => function ($model) {
                return true;//$model->ORDER_STATUS != \app\helpers\ORDER_HELPER::STATUS_ORDER_READY;
            },
            'receipt' => function ($model) {
                return $model->ORDER_STATUS === \app\helpers\ORDER_HELPER::STATUS_ORDER_READY;
            },
        ],
        'urlCreator' => function ($action, $model, $key, $index) {
            /* @var $model app\models_search\OrdersSearch */
            $url = '#';
            $class = 'btn btn-sm ';
            if ($action === 'receipt') {
                switch ($model->ORDER_STATUS) {
                    case \app\helpers\ORDER_HELPER::STATUS_ORDER_READY:
                        $class .= 'btn-primary';
                        $action = 'Print Receipt';
                        $url = \yii\helpers\Url::toRoute(['receipt/print-receipt', 'order_id' => $model->ORDER_ID]);
                        break;
                }

            }

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
    'NOTES',
];
?>

<?= ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
    'columnSelectorOptions' => [
        'label' => 'Columns',
        'class' => 'btn btn-danger'
    ],
    'filename' => strtolower($this->title),
    'fontAwesome' => $isFa,
    'dropdownOptions' => [
        'label' => 'Export All',
        'class' => 'btn btn-primary'
    ],
    'exportConfig' => $exportConfig,
]); ?>

<?= GridView::widget([
    'id' => 'kv-grid-demo',
    'dataProvider' => $dataProvider,
    //'filterModel' => $searchModel,
    'columns' => $gridColumns, // check the configuration for grid columns by clicking button above
    'beforeHeader' => [
        [
            'columns' => [
                ['content' => $this->title, 'options' => ['colspan' => 6, 'class' => 'text-center warning']],
            ],
            'options' => ['class' => 'skip-export'] // remove this row from export
        ]
    ],
    //'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
    //'headerRowOptions' => ['class' => 'kartik-sheet-style'],
    //'filterRowOptions' => ['class' => 'kartik-sheet-style'],
    'pjax' => false, // pjax is set to always true for this demo
    // set your toolbar
    'toolbar' => [
        ['content' =>
        // Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type' => 'button', 'title' => Yii::t('app', 'Add Book'), 'class' => 'btn btn-success', 'onclick' => 'alert("This will launch the book creation form.\n\nDisabled for this demo!");']) . ' ' .
            Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => Yii::t('app', 'Reset Grid')])
        ],
        '{export}',
        '{toggleData}',
    ],
    // set export properties
    'export' => [
        'fontAwesome' => true
    ],
    // parameters from the demo form
    'bordered' => true,
    'striped' => true,
    'condensed' => false,
    'responsive' => true,
    'hover' => true,
    'showPageSummary' => false,
    'panel' => [
        'type' => GridView::TYPE_ACTIVE,
        //'heading' => 'Hello world',
    ],
    'persistResize' => false,
    'toggleDataOptions' => ['minCount' => 10],
    'itemLabelSingle' => 'Order',
    'itemLabelPlural' => 'Orders'
]) ?>