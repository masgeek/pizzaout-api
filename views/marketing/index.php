<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Message Queue';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mail-list-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create New Message', ['marketing/index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'mail_id',
            'receipent:email',
            'subject:ntext',
            [
                'attribute' => 'body',
                'format' => 'raw'
            ],
            'sent:boolean',
            'type',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]); ?>
</div>
