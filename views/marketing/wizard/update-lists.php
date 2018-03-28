<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\model_extended\MailList */
/* @var $form yii\widgets\ActiveForm */
?>

<?= $form->field($model, 'category', ['template' => $field_template])->dropDownList(\app\model_extended\MailList::GetCustCategories(), [
    'prompt' => 'Select Customer Category',
    'id' => 'list_name'
]) ?>




<?= Html::button('Update Selected List', ['id' => 'update-lists', 'class' => 'btn btn-success btn-block', 'style' => 'margin-top:10px;margin-bottom:10px;']) ?>


