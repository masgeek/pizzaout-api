<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models_search\MenuCatSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu--category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'MENU_CAT_ID') ?>

    <?= $form->field($model, 'MENU_CAT_NAME') ?>

    <?= $form->field($model, 'MENU_CAT_IMAGE') ?>

    <?= $form->field($model, 'ACTIVE') ?>

    <?= $form->field($model, 'RANK') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
