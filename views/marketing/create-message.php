<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\model_extended\MailList */
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

<div class="location--model-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'category', ['template' => $field_template])->dropDownList(\app\model_extended\MailList::GetCustCategories(), ['prompt' => 'Select Category']) ?>

    <?= $form->field($model, 'subject', ['template' => $field_template])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body',['template' => $field_template])->widget(CKEditor::className(), [
        'options' => ['rows' => 15],
        'preset' => 'basic'
    ]) ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'email')->checkbox() ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'sms')->checkbox() ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success btn-lg btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
