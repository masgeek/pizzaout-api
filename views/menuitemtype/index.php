<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models_search\MenuItemTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menu  Item  Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu--item--type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Menu  Item  Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'ITEM_TYPE_ID',
            //'MENU_ITEM_ID',
            [
                'header' => 'Item Name',
                'attribute' => 'MENU_ITEM_ID',
                'value' => function ($model) {
                    /* @var $model \app\models_search\MenuItemTypeSearch */
                    return $model->mENUITEM->MENU_ITEM_NAME;
                }
            ],
            'ITEM_TYPE_SIZE',
            'PRICE:currency',
            'AVAILABLE:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
