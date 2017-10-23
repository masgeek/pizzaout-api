<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Chef  Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chef--model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Chef  Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'CHEF_ID',
            'CHEF_NAME',
            'KITCHEN_ID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
