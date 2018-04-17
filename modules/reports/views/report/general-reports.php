<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models_search\ReportSearch */
/* @var $context */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;


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
        'pdfConfig' => [
            'orientation' => 'L',
        ],
        //'writer' => ExportMenu::FORMAT_PDF
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
    /*[
        'class' => 'kartik\grid\SerialColumn',
        //'hiddenFromExport' => true,
    ],*/

    //'ORDER_ID',
    //'LOCATION_ID',
    //'CHEF_ID',
    //'RIDER_ID',
    [
        'attribute' => 'ORDER_ID',
    ],
    [
        'class' => 'kartik\grid\DataColumn',
        'attribute' => 'KITCHEN_ID',
        'format' => 'raw',
        'value' => function ($model) {
            /* @var $model \app\model_extended\ReportModel */
            $kitchen = 'N/A';
            if ($model->kITCHEN != null) {
                $kitchenData = $model->kITCHEN;
                $kitchen = Html::a($kitchenData->KITCHEN_NAME, [
                    'report/kitchen-reports', 'kitchen_id' => $kitchenData->CITY_ID
                ], [
                    'class' => 'btn btn-link disabled'
                ]);
                $kitchen = $kitchenData->KITCHEN_NAME;
            }

            return $kitchen;
        },
        //'hiddenFromExport' => true,
    ],
    [
        'class' => 'kartik\grid\DataColumn',
        'attribute' => 'CHEF_ID',
        'format' => 'raw',
        'value' => function ($model) {
            /* @var $model \app\model_extended\ReportModel */
            //$orderItems = $model->customerOrderItems;
            $chef = 'N/A';
            if ($model->cHEF != null) {
                $chefData = $model->cHEF;
                $chef = Html::a($chefData->CHEF_NAME, [
                    'report/chef-reports', 'chef_id' => $chefData->CHEF_ID
                ], [
                    'class' => 'btn btn-link'
                ]);
                $chef = $chefData->CHEF_NAME;
            }

            return $chef;
        },
        //'hiddenFromExport' => true,
    ],
    [
        'class' => 'kartik\grid\DataColumn',
        'attribute' => 'LOCATION_ID',
        'format' => 'raw',
        'value' => function ($model) {
            /* @var $model \app\model_extended\ReportModel */
            //$orderItems = $model->customerOrderItems;
            $location = 'N/A';
            if ($model->lOCATION != null) {
                $locationData = $model->lOCATION;
                $location = Html::a($locationData->LOCATION_NAME, [
                    'report/district-reports', 'location_id' => $locationData->LOCATION_ID
                ], [
                    'class' => 'btn btn-link'
                ]);

                $location = $locationData->LOCATION_NAME;
            }

            return $location;
        },
        //'hiddenFromExport' => true,
    ],
    [
        'class' => 'kartik\grid\DataColumn',
        'attribute' => 'RIDER_ID',
        'format' => 'raw',
        'value' => function ($model) {
            /* @var $model \app\model_extended\ReportModel */
            $rider = 'N/A';
            if ($model->rIDER != null) {
                $riderData = $model->rIDER;
                $rider = Html::a($riderData->uSER->SURNAME, [
                    'report/rider-reports', 'rider_id' => $riderData->RIDER_ID
                ], [
                    'class' => 'btn btn-link'
                ]);

                $rider = $riderData->uSER->SURNAME;
            }

            return $rider;
        },
        //'hiddenFromExport' => true,
    ],
    //'ORDER_DATE:datetime',
    //'ORDER_DATE',
    [
        'attribute' => 'ORDER_DATE',
        //'visible'=>false,
        'value' => function ($model) {
            /* @var $model \app\model_extended\ReportModel */
            return \app\helpers\APP_UTILS::FormatDateTime($model->ORDER_DATE);// \app\model_extended\CUSTOMER_ORDER_ITEMS::GetOrderTotal($model->ORDER_ID);
        }
    ],
    'PAYMENT_METHOD',
    //'ORDER_STATUS',
    [
        'class' => 'kartik\grid\DataColumn',
        'attribute' => 'ORDER_STATUS',
        'hiddenFromExport' => true,
    ],
    //'ORDER_TIME',
    //'NOTES',
    //'CREATED_AT',
    //'UPDATED_AT',
    [
        'class' => 'kartik\grid\DataColumn',
        'attribute' => 'ORDER_TOTAL',
        'header' => 'Order Total',
        'format' => 'currency',
        'value' => function ($model) {
            /* @var $model \app\model_extended\ReportModel */
            //$orderItems = $model->customerOrderItems;
            return \app\model_extended\CUSTOMER_ORDER_ITEMS::GetOrderTotal($model->ORDER_ID);
        },
        //'hiddenFromExport' => true,
        //'mergeHeader' => true,
        'pageSummary' => true,
        'pageSummaryFunc' => GridView::F_SUM,
        'footer' => false,
    ],
    /*[
        'class' => 'kartik\grid\FormulaColumn',
        'header' => 'Buy %<br>(100 * B/BS)',
        'vAlign' => 'middle',
        'hAlign' => 'right',
        'width' => '7%',
        'value' => function ($model, $key, $index, $widget) {
            $p = compact('model', 'key', 'index');
            return $widget->col(9, $p) != 0 ? $widget->col(7, $p) * 100 / $widget->col(9, $p) : 0;
        },
        'format' => ['decimal', 2],
        'headerOptions' => ['class' => 'kartik-sheet-style'],
        'mergeHeader' => true,
        'pageSummary' => true,
        'pageSummaryFunc' => GridView::F_AVG,
        'footer' => true
    ],*/

    //'USER_ID',
    //'USER_NAME',
    //'USER_TYPE',
    //'SURNAME',
    //'OTHER_NAMES',
    //'LOCATION_NAME',
    //'COUNTRY_ID',
    //'CHEF_NAME',

    //['class' => 'yii\grid\ActionColumn'],
];
?>
<div class="report-model-index">

    <div id="PrintThis">
        <div class="row noprint">
            <?php echo $this->render('_search', ['model' => $searchModel, 'context' => $context]); ?>
        </div>

        <div class="row noprint" style="margin-top: 10px;">
            <!--// Renders a export drop down menu -->
            <div class="col-md-6">
                <?= ExportMenu::widget([
                    'dataProvider' => $dataProvider,
                    //'stripHtml'=>true,
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
            </div>
            <div class="col-md-6">
                <?= \yii2assets\printthis\PrintThis::widget([
                    'htmlOptions' => [
                        'id' => 'PrintThis',
                        'btnClass' => 'btn btn-info pull-right',
                        'btnId' => 'btnPrintThis',
                        'btnText' => 'Print',
                        'btnIcon' => 'fa fa-print'
                    ],
                    'options' => [
                        'debug' => false,
                        'importCSS' => true,
                        'importStyle' => false,
                        //'loadCSS' => "path/to/my.css",
                        'pageTitle' => "",
                        'removeInline' => false,
                        'printDelay' => 333,
                        'header' => null,
                        'formValues' => true,
                    ]
                ]);
                ?>
            </div>
        </div>

        <hr/>
        <h2 class="text-center"><?= Html::encode($this->title) ?></h2>

        <div class="row">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => $gridColumns,
                'beforeHeader' => [
                    [
                        'columns' => [
                            ['content' => $this->title, 'options' => ['colspan' => 4, 'class' => 'text-center success noprint']],
                        ],
                        'options' => ['class' => 'skip-export noprint'] // remove this row from export
                    ]
                ],
                'summary' => "Showing <strong>{begin}-{end}</strong> of <strong>{totalCount}</strong> Orders",
                'bordered' => true,
                'striped' => true,
                'condensed' => true,
                'responsive' => true,
                'hover' => true,
                'showFooter' => true,
                'floatHeader' => false,
                'showPageSummary' => true,
                'panel' => false,
                'resizableColumns' => true,
                'resizeStorageKey' => Yii::$app->user->id . '-' . date("m"),
                'pjax' => false,
                'pjaxSettings' => [
                    'neverTimeout' => true,
                ]
            ]); ?>
        </div>
    </div>
</div>
