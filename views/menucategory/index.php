<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models_search\MenuCatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menu  Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu--category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Add New Menu  Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'MENU_CAT_ID',
            'MENU_CAT_NAME',
            'ACTIVE:boolean',
            'RANK',
            'MENU_CAT_IMAGE',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
