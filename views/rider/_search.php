<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models_search\RiderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rider--model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'RIDER_ID') ?>

    <?= $form->field($model, 'USER_ID') ?>

    <?= $form->field($model, 'KITCHEN_ID') ?>

    <?= $form->field($model, 'RIDER_STATUS')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
