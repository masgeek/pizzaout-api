<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\model_extended\CUSTOMER_ORDERS */
/* @var $form yii\widgets\ActiveForm */
/* @var $scope array */

$field_template = <<<TEMPLATE
<label>{label}</label>
<div class="input-group input-group-icon">
     {input} 
    <span class="input-group-addon">
        <span class="icon icon-lg"><i class="fa fa-user"></i></span>
    </span>
</div>
    {error}{hint}
TEMPLATE;

?>
<div class="customer-orders-form">
	<?php $form = ActiveForm::begin(); ?>
    <div class="row">

        <div class="col-md-6">
			<?= $form->field($model, 'KITCHEN_ID', ['template' => $field_template])->dropDownList(\app\model_extended\KITCHEN_MODEL::GetKitchens(), [
					'prompt' => '--- SELECT KITCHEN ---',
					'class' => 'form-control input-lg'
				]
			) ?>
        </div>

        <div class="col-md-6">
			<?= $form->field($model, 'ORDER_STATUS', ['template' => $field_template])->dropDownList(\app\model_extended\STATUS_MODEL::GetStatus($model->ORDER_ID, $scope), [
				'prompt' => '--- SELECT STATUS ---',
				'class' => 'form-control input-lg'
			]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
			<?= $form->field($tracker, 'COMMENTS', ['template' => $field_template])->textarea(['cols' => 4, 'rows' => 4]) ?>
        </div>
    </div>

    <div class="form-group">
		<?= Html::submitButton('UPDATE ORDER', ['class' => 'btn btn-success']) ?>
    </div>

	<?php ActiveForm::end(); ?>
</div>
