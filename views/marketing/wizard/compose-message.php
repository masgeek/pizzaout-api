<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\model_extended\MailList */
/* @var $form yii\widgets\ActiveForm */
?>
<?= $form->field($model, 'subject', ['template' => $field_template])->textInput(['maxlength' => true]) ?>

<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'body', ['template' => $field_template])->widget(CKEditor::className(), [
            'options' => ['rows' => 15],
            'preset' => 'basic'
        ]) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'sms_text', ['template' => $field_template])
            ->textarea(['id' => 'sms-text', 'rows' => 11])
            ->hint('Hello', ['id' => 'sms-count'])
        ?>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'email')->checkbox() ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'sms')->checkbox(['id' => 'compose-sms']) ?>
    </div>
</div>
