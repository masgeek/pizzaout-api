<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manage Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users--model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'USER_ID',
            'USER_NAME',
            //'USER_TYPE',
            [
                'attribute' => 'USER_TYPE',
                'value' => function ($model) {
                    /* @var $model \app\model_extended\USERS_MODEL */
                    //var_dump($model->uSERTYPE);
                    return $model->uSERTYPE;
                }
            ],
            'SURNAME',
            'OTHER_NAMES',
            'MOBILE',
            'EMAIL:email',
            //'LOCATION_ID',
            //'PASSWORD',
            'DATE_REGISTERED:date',
            'LAST_UPDATED:date',
            //'CLIENT_TOKEN',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
