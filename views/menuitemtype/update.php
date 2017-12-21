<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\model_extended\MENU_ITEM_TYPE */

$this->title = 'Update Menu  Item  Type:';
$this->params['breadcrumbs'][] = ['label' => 'Menu  Item  Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ITEM_TYPE_ID, 'url' => ['view', 'id' => $model->ITEM_TYPE_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="menu--item--type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
