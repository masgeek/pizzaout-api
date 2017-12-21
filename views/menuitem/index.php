<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models_search\MenuItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menu  Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu--items-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Menu  Items', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'MENU_ITEM_ID',
            //'MENU_CAT_ID',
            [
                'attribute' => 'MENU_CAT_ID',
                'value' => function ($model) {
                    /* @var $model \app\models_search\MenuItemSearch */
                    return $model->mENUCAT->MENU_CAT_NAME;
                }
            ],
            'MENU_ITEM_NAME',
            'MENU_ITEM_DESC:ntext',
            //'MENU_ITEM_IMAGE:image',
            //'HOT_DEAL:boolean',
            'VEGETARIAN:boolean',
            'MAX_QTY',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
