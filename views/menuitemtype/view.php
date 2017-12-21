<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\model_extended\MENU_ITEM_TYPE */

$this->title = $model->mENUITEM->MENU_ITEM_NAME;
$this->params['breadcrumbs'][] = ['label' => 'Menu Item Type', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu--item--type-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ITEM_TYPE_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ITEM_TYPE_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'ITEM_TYPE_ID',
            //'MENU_ITEM_ID',
            'mENUITEM.MENU_ITEM_NAME',
            'ITEM_TYPE_SIZE',
            'PRICE:currency',
            'AVAILABLE:boolean',
        ],
    ]) ?>

</div>
