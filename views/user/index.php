<?php

use kartik\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manage Users';
$this->params['breadcrumbs'][] = $this->title;

$gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
    [
        'class' => '\kartik\grid\ActionColumn',
        'template' => '{promote}',
        'buttons' => [
            'promote' => function ($url, $model, $key) {
                return $url;
            },
        ],
        'urlCreator' => function ($action, $model, $key, $index) {
            /* @var $model app\models_search\OrdersSearch */
            $url = '#';
            $class = 'btn btn-sm ';
            if ($action === 'promote') {
                $class .= 'btn-primary';
                $action = 'Update User';
                $url = \yii\helpers\Url::toRoute(['user/promote', 'id' => $model->USER_ID]);
            }

            return Html::a($action, $url, ['class' => $class]);
        },
    ],
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
    [
        'class' => '\kartik\grid\ActionColumn',
        'template' => '{view}{delete}',
    ],
];
?>
<div class="users--model-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'id' => 'kv-grid-demo',
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => $gridColumns, // check the configuration for grid columns by clicking button above
        'beforeHeader' => [
            [
                'columns' => [
                    ['content' => $this->title, 'options' => ['colspan' => 6, 'class' => 'text-center warning']],
                ],
                'options' => ['class' => 'skip-export'] // remove this row from export
            ]
        ],
        //'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
        //'headerRowOptions' => ['class' => 'kartik-sheet-style'],
        //'filterRowOptions' => ['class' => 'kartik-sheet-style'],
        'pjax' => false, // pjax is set to always true for this demo
        // set your toolbar
        'toolbar' => [
            ['content' =>
            // Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type' => 'button', 'title' => Yii::t('app', 'Add Book'), 'class' => 'btn btn-success', 'onclick' => 'alert("This will launch the book creation form.\n\nDisabled for this demo!");']) . ' ' .
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => Yii::t('app', 'Reset Grid')])
            ],
            '{export}',
            '{toggleData}',
        ],
        // set export properties
        'export' => [
            'fontAwesome' => true
        ],
        // parameters from the demo form
        'bordered' => true,
        'striped' => true,
        'condensed' => false,
        'responsive' => true,
        'hover' => true,
        'showPageSummary' => false,
        'panel' => [
            'type' => GridView::TYPE_ACTIVE,
            //'heading' => 'Hello world',
        ],
        'persistResize' => false,
        'toggleDataOptions' => ['minCount' => 10],
    ]) ?>
</div>
