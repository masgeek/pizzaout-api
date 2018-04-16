<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models_search\ReportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Report Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Report Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ORDER_ID',
            'LOCATION_ID',
            'KITCHEN_ID',
            'CHEF_ID',
            'RIDER_ID',
            //'ORDER_DATE',
            //'PAYMENT_METHOD',
            //'ORDER_STATUS',
            //'ORDER_TIME',
            //'NOTES',
            //'CREATED_AT',
            //'UPDATED_AT',
            //'USER_ID',
            //'USER_NAME',
            //'USER_TYPE',
            //'SURNAME',
            //'OTHER_NAMES',
            //'QUANTITY',
            //'PRICE',
            //'SUBTOTAL',
            //'MENU_PRICE',
            //'MENU_ITEM_NAME',
            //'MENU_CAT_NAME',
            //'LOCATION_NAME',
            //'COUNTRY_ID',
            //'CHEF_NAME',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
