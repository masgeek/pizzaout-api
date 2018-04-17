<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models_search\ReportSearch */
/* @var $context */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;

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
    'ORDER_DATE:date',
    'PAYMENT_METHOD',
    'ORDER_STATUS',
    //'ORDER_TIME',
    //'NOTES',
    //'CREATED_AT',
    //'UPDATED_AT',
    [
        'class' => 'kartik\grid\DataColumn',
        'attribute' => 'ORDER_ID',
        'header' => 'Order Total',
        'format' => 'currency',
        'value' => function ($model) {
            /* @var $model \app\model_extended\ReportModel */
            //$orderItems = $model->customerOrderItems;
            return \app\model_extended\CUSTOMER_ORDER_ITEMS::GetOrderTotal($model->ORDER_ID);
        },
        //'hiddenFromExport' => true,
    ],

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

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <?php echo $this->render('_search', ['model' => $searchModel, 'context' => $context]); ?>
    </div>

    <div class="row" style="margin-top: 10px;">
        <!--// Renders a export dropdown menu -->
        <div class="">
            <?= ExportMenu::widget([
                'enableFormatter' => true,
                //'stripHtml'=>true,
                'dataProvider' => $dataProvider,
                'columns' => $gridColumns
            ]) ?>
        </div>
    </div>

    <div class="row">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'condensed' => true,
            //'itemLabelSingle' => 'smmy',
            //'itemLabelPlural' => 'we',
            'bordered' => true,
            'columns' => $gridColumns,
            'export' => false,
        ]); ?>
    </div>
</div>
