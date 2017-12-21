<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models_search\MenuItemTypeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu--item--type-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ITEM_TYPE_ID') ?>

    <?= $form->field($model, 'MENU_ITEM_ID') ?>

    <?= $form->field($model, 'ITEM_TYPE_SIZE') ?>

    <?= $form->field($model, 'PRICE') ?>

    <?= $form->field($model, 'AVAILABLE')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
