<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\model_extended\SIZES_MODEL */
/* @var $form yii\widgets\ActiveForm */
$field_template = <<<TEMPLATE
<label>{label}</label>
<div class="input-group input-group-icon">
     {input} 
    <span class="input-group-addon">
        <span class="icon icon-lg"><i class="fa fa-adjust"></i></span>
    </span>
</div>
    {error}{hint}
TEMPLATE;
?>

<div class="sizes--model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'SIZE_TYPE', ['template' => $field_template])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ACTIVE')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
