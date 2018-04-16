<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\model_extended\ReportModel */

$this->title = $model->ORDER_ID;
$this->params['breadcrumbs'][] = ['label' => 'Report Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ORDER_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ORDER_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ORDER_ID',
            'LOCATION_ID',
            'KITCHEN_ID',
            'CHEF_ID',
            'RIDER_ID',
            'ORDER_DATE',
            'PAYMENT_METHOD',
            'ORDER_STATUS',
            'ORDER_TIME',
            'NOTES',
            'CREATED_AT',
            'UPDATED_AT',
            'USER_ID',
            'USER_NAME',
            'USER_TYPE',
            'SURNAME',
            'OTHER_NAMES',
            'QUANTITY',
            'PRICE',
            'SUBTOTAL',
            'MENU_PRICE',
            'MENU_ITEM_NAME',
            'MENU_CAT_NAME',
            'LOCATION_NAME',
            'COUNTRY_ID',
            'CHEF_NAME',
        ],
    ]) ?>

</div>
