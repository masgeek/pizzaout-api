<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\model_extended\MENU_ITEMS */

$this->title = "Update Menu  Item: {$model->MENU_ITEM_NAME}";
$this->params['breadcrumbs'][] = ['label' => 'Menu Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->MENU_ITEM_ID, 'url' => ['view', 'id' => $model->MENU_ITEM_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="menu--items-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
