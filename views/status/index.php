<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;

$gridColumns = [['class' => 'yii\grid\SerialColumn'],

    'STATUS_NAME',
    'STATUS_DESC',
    [
        'attribute' => 'COLOR',
        'value' => function ($model, $key, $index, $widget) {
            return "<span class='badge' style='background-color: {$model->COLOR}'> </span>  <code>" . $model->COLOR . '</code>';
        },
        'vAlign' => 'middle',
        'format' => 'raw',
    ],
    'SCOPE',
    'RANK',
    'WORKFLOW',
    ['class' => 'yii\grid\ActionColumn'],];
?>
<div class="status--model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Add New Status'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
    ]); ?>
</div>
