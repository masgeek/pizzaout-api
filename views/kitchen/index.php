<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Kitchens');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kitchen--model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Kitchen'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'KITCHEN_ID',
            'KITCHEN_NAME',
            'cITY.CITY_NAME',
            //'CITY_ID',
            'OPENING_TIME',
            'CLOSING_TIME',
            'ADDRESS:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
