<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models_search\MenuItemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu--items-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'MENU_ITEM_ID') ?>

    <?= $form->field($model, 'MENU_CAT_ID') ?>

    <?= $form->field($model, 'MENU_ITEM_NAME') ?>

    <?= $form->field($model, 'MENU_ITEM_DESC') ?>

    <?= $form->field($model, 'MENU_ITEM_IMAGE') ?>

    <?php // echo $form->field($model, 'HOT_DEAL')->checkbox() ?>

    <?php // echo $form->field($model, 'VEGETARIAN')->checkbox() ?>

    <?php // echo $form->field($model, 'MAX_QTY') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
