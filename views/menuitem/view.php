<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\model_extended\MENU_ITEMS */

$this->title = $model->MENU_ITEM_NAME;
$this->params['breadcrumbs'][] = ['label' => 'Menu  Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu--items-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->MENU_ITEM_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->MENU_ITEM_ID], [
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
            //'MENU_ITEM_ID',
            //'MENU_CAT_ID',
            'mENUCAT.MENU_CAT_NAME',
            'MENU_ITEM_NAME',
            'MENU_ITEM_DESC:ntext',
            'MENU_ITEM_IMAGE',
            'HOT_DEAL:boolean',
            'VEGETARIAN:boolean',
            'MAX_QTY',
        ],
    ]) ?>

</div>
