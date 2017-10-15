<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\model_extended\CUSTOMER_ORDERS */

$this->title = $model->ORDER_ID;
$this->params['breadcrumbs'][] = ['label' => 'Customer  Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer--orders-view">

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
            'USER_ID',
            'LOCATION_ID',
            'CHEF_ID',
            'RIDER_ID',
            'ORDER_QUANTITY',
            'ORDER_DATE',
            'ORDER_PRICE',
            'PAYMENT_METHOD',
            'ORDER_STATUS',
            'NOTES',
            'CREATED_AT',
            'UPDATED_AT',
        ],
    ]) ?>

</div>
