<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models_search\ReportSearch */
/* @var $context */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;

$gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],

    //'ORDER_ID',
    //'LOCATION_ID',
    //'CHEF_ID',
    //'RIDER_ID',
    [
        'class' => 'kartik\grid\DataColumn',
        'attribute' => 'KITCHEN_ID',
        'value' => function ($model) {
            /* @var $model \app\model_extended\ReportModel */
            //$orderItems = $model->customerOrderItems;
            return $model->kITCHEN != null ? $model->kITCHEN->KITCHEN_NAME : 'N/A';
        },
        //'hiddenFromExport' => true,
    ],
    [
        'class' => 'kartik\grid\DataColumn',
        'attribute' => 'CHEF_ID',
        'value' => function ($model) {
            /* @var $model \app\model_extended\ReportModel */
            //$orderItems = $model->customerOrderItems;
            return $model->cHEF != null ? $model->cHEF->CHEF_NAME : 'N/A';
        },
        //'hiddenFromExport' => true,
    ],
    [
        'class' => 'kartik\grid\DataColumn',
        'attribute' => 'LOCATION_ID',
        'value' => function ($model) {
            /* @var $model \app\model_extended\ReportModel */
            //$orderItems = $model->customerOrderItems;
            return $model->lOCATION != null ? $model->lOCATION->LOCATION_NAME : 'N/A';
        },
        //'hiddenFromExport' => true,
    ],
    [
        'class' => 'kartik\grid\DataColumn',
        'attribute' => 'RIDER_ID',
        'value' => function ($model) {
            /* @var $model \app\model_extended\ReportModel */
            //$orderItems = $model->customerOrderItems;
            return $model->rIDER != null ? $model->rIDER->uSER->SURNAME : 'N/A';
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
    [
        'attribute' => 'ORDER_ID',
        'pageSummary' => true
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
    <?php echo $this->render('_search', ['model' => $searchModel, 'context' => $context]); ?>

    <?= GridView::widget([
        'dataProvider'=> $dataProvider,
        //'filterModel' => $searchModel,
        'condensed' => true,
        //'itemLabelSingle' => 'smmy',
        //'itemLabelPlural' => 'we',
        'bordered' => true,
        'columns' => $gridColumns,
        'panel' => [
            //'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Countries</h3>',
            'type'=>'success',
            //'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Create Country', ['create'], ['class' => 'btn btn-success']),
            //'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
            //'footer'=>false
        ],
    ]); ?>
</div>
