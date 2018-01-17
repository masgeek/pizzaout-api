<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\model_extended\COUNTRY_MODEL */
/* @var $form yii\widgets\ActiveForm */

$field_template = <<<TEMPLATE
<label><h5>{label}</h5></label>
<div class="input-group input-group-icon">
     {input} 
    <span class="input-group-addon">
        <span class="icon"><i class="fa fa-cog"></i></span>
    </span>
</div>
    {error}{hint}
TEMPLATE;

?>

<div class="country--model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'COUNTRY_NAME', ['template' => $field_template])->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
