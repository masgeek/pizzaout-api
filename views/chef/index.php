<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manage Chef';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chef--model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add New Chef', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'CHEF_ID',
            'CHEF_NAME',
            //'KITCHEN_ID',
            [
                'attribute' => 'KITCHEN_ID',
                'value' => function ($model) {
                    /* @var $model \app\model_extended\CHEF_MODEL */
                    //var_dump($model->uSERTYPE);
                    return $model->kITCHEN->KITCHEN_NAME;
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
