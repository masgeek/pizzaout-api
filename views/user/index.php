<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users  Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users--model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Users  Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'USER_ID',
            'USER_NAME',
            'USER_TYPE',
            'SURNAME',
            'OTHER_NAMES',
            //'MOBILE',
            //'EMAIL:email',
            //'LOCATION_ID',
            //'PASSWORD',
            //'DATE_REGISTERED',
            //'LAST_UPDATED',
            //'CLIENT_TOKEN',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
