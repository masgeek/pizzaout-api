<?php

use kartik\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;

$gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
    [
        'class' => '\kartik\grid\ActionColumn',
        'template' => '{update}{view}{delete}',
    ],
    [
        'class' => '\kartik\grid\ActionColumn',
        'template' => '{orders}',
        'buttons' => [
            'orders' => function ($url, $model, $key) {
                $url = \yii\helpers\Url::toRoute(['rider/rider-orders', 'id' => $model->RIDER_ID]);
                return Html::a('View Orders', $url, ['class' => 'btn btn-primary btn-xs btn-block']);;
            },
        ],
    ],
    [
        // 'header' => 'Rider',
        'filter' => false,
        'attribute' => 'USER_ID',
        'value' => function ($model) {
            /* @var $model \app\model_extended\RIDER_MODEL */
            return $model->uSER->USER_NAME;
        }
    ],
    [
        // 'header' => 'Rider',
        'filter' => false,
        'attribute' => 'KITCHEN_ID',
        'value' => function ($model) {
            /* @var $model \app\model_extended\RIDER_MODEL */
            return $model->kITCHEN->KITCHEN_NAME;
        }
    ],
    'RIDER_STATUS:boolean',
];

?>
<div class="rider--model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Add New Rider'), ['rider/add-rider'], ['class' => 'btn btn-primary']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'beforeHeader' => [
            [
                'columns' => [
                    ['content' => $this->title, 'options' => ['colspan' => 4, 'class' => 'text-center warning']],
                ],
                'options' => ['class' => 'skip-export'] // remove this row from export
            ]
        ],
        'summary' => "Showing <strong>{begin}-{end}</strong> of <strong>{totalCount}</strong> Riders",
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'floatHeader' => false,
        'showPageSummary' => false,
        'panel' => false,
        'resizableColumns' => true,
        'resizeStorageKey' => Yii::$app->user->id . '-' . date("m"),
        'pjax' => false,
        'pjaxSettings' => [
            'neverTimeout' => true,
            //'beforeGrid' => 'My fancy content before.',
            //'afterGrid' => 'My fancy content after.',
        ]
    ]); ?>
</div>
