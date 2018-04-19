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
    [
        'class' => 'kartik\grid\SerialColumn',
    ],
    [
        'attribute' => 'ORDER_ID',
        'value' => function ($model, $key, $index, $widget) {
            return $model->ORDER_ID;
        },
        'group' => true,  // enable grouping
        'groupFooter' => function ($model, $key, $index, $widget) { // Closure method
            return [
                'mergeColumns' => [[0, 6]], // columns to merge in summary
                'content' => [             // content to show in each summary cell
                    1 => 'Order Summary (#' . $model->ORDER_ID . ')',
                    8 => GridView::F_SUM,
                    9 => GridView::F_SUM,
                    10 => GridView::F_SUM,
                ],
                'contentFormats' => [      // content reformatting for each summary cell
                    8 => ['format' => 'number', 'decimals' => 0],
                    9 => ['format' => 'number', 'decimals' => 2],
                    10 => ['format' => 'number', 'decimals' => 2],
                ],
                'contentOptions' => [      // content html attributes for each summary cell
                    1 => ['style' => 'font-variant:small-caps'],
                    8 => ['style' => 'text-align:right'],
                    9 => ['style' => 'text-align:right'],
                    10 => ['style' => 'text-align:right'],
                ],
                // html attributes for group summary row
                'options' => ['class' => 'info', 'style' => 'font-weight:bold;']
            ];
        }
    ],
    [
        'attribute' => 'MENU_CAT_NAME',
        'width' => '250px',
        'value' => function ($model, $key, $index, $widget) {
            return $model->MENU_CAT_NAME;
        },
        'group' => true,  // enable grouping
        'subGroupOf' => 1, // supplier column index is the parent group,
        'groupFooter' => function ($model, $key, $index, $widget) { // Closure method
            return [
                'mergeColumns' => [[2, 6]], // columns to merge in summary
                'content' => [              // content to show in each summary cell
                    2 => 'Summary (' . $model->MENU_CAT_NAME . ')',
                    8 => GridView::F_SUM,
                    9 => GridView::F_SUM,
                    10 => GridView::F_SUM,
                ],
                'contentFormats' => [      // content reformatting for each summary cell
                    8 => ['format' => 'number', 'decimals' => 0],
                    9 => ['format' => 'number', 'decimals' => 2],
                    10 => ['format' => 'number', 'decimals' => 2],
                ],
                'contentOptions' => [      // content html attributes for each summary cell
                    8 => ['style' => 'text-align:right'],
                    9 => ['style' => 'text-align:right'],
                    10 => ['style' => 'text-align:right'],
                ],
                // html attributes for group summary row
                'options' => ['class' => 'default', 'style' => 'font-weight:bold;']
            ];
        },
    ],
    //'MENU_CAT_NAME',
    'MENU_ITEM_NAME',
    'ITEM_TYPE_SIZE',

    [
        'class' => 'kartik\grid\DataColumn',
        'attribute' => 'LOCATION_ID',
        'format' => 'raw',
        'value' => function ($model) {
            /* @var $model \app\model_extended\PizzaReportModel */
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
        'attribute' => 'ORDER_DATE',
        //'visible'=>false,
        'value' => function ($model) {
            /* @var $model \app\model_extended\PizzaReportModel */
            return \app\helpers\APP_UTILS::FormatDate($model->ORDER_DATE);// \app\model_extended\CUSTOMER_ORDER_ITEMS::GetOrderTotal($model->ORDER_ID);
        }
    ],
    [
        'class' => 'kartik\grid\DataColumn',
        'attribute' => 'ORDER_STATUS',
        'header' => 'Status',
        //'headerOptions'=>['class'=>'noprint'],
        //'contentOptions'=>['class'=>'noprint'],
        'hiddenFromExport' => true,
    ],
    [
        'class' => 'kartik\grid\DataColumn',
        'attribute' => 'QUANTITY',
        //'hiddenFromExport' => true,
        //'mergeHeader' => true,
        'pageSummary' => true,
        'pageSummaryFunc' => GridView::F_SUM,
        'footer' => false,
        'headerOptions'=>['class'=>'text-right'],
        'contentOptions'=>['class'=>'text-right'],
    ],
    [
        'class' => 'kartik\grid\DataColumn',
        'attribute' => 'PRICE',
        //'format' => 'currency',
        'value' => function ($model) {
            /* @var $model \app\model_extended\PizzaReportModel */
            //$orderItems = $model->customerOrderItems;
            return $model->PRICE;
        },
        //'hiddenFromExport' => true,
        'mergeHeader' => true,
        'format'=>['decimal', 2],
        'pageSummary' => true,
        'pageSummaryFunc' => GridView::F_SUM,
        'footer' => false,
        'headerOptions'=>['class'=>'text-right'],
        'contentOptions'=>['class'=>'text-right'],
    ],
    [
        'class' => 'kartik\grid\DataColumn',
        'attribute' => 'ORDER_TOTAL',
        'header' => 'Total',
        'format'=>['decimal', 2],
        //'format' => 'currency',
        'value' => function ($model) {
            /* @var $model \app\model_extended\PizzaReportModel */
            //$orderItems = $model->customerOrderItems;
            return $model->PRICE * $model->QUANTITY; //\app\model_extended\CUSTOMER_ORDER_ITEMS::GetOrderTotal($model->ORDER_ID);
        },
        //'hiddenFromExport' => true,
        //'mergeHeader' => true,
        'pageSummary' => true,
        'pageSummaryFunc' => GridView::F_SUM,
        'hAlign'=>'right',
    ],
];
?>
<div class="report-model-index">

    <div id="PrintThis">
        <div class="row noprint">
            <?php echo $this->render('_pizza-search', ['model' => $searchModel, 'context' => $context]); ?>
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
                        'class' => 'btn btn-danger hidden'
                    ],
                    'filename' => strtolower($this->title),
                    'fontAwesome' => $isFa,
                    'dropdownOptions' => [
                        'label' => 'Export All',
                        'class' => 'btn btn-primary hidden'
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
                'responsive' => false,
                'hover' => false,
                'showFooter' => true,
                'floatHeader' => false,
                'showPageSummary' => true,
                'panel' => [
                    'success'
                ],
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
