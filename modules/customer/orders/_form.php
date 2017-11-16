<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\model_extended\CUSTOMER_ORDERS */
/* @var $tracker app\model_extended\STATUS_TRACKING_MODEL */
/* @var $form yii\widgets\ActiveForm */
/* @var $scope array */
/* @var $workflow int */

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
<div class="customer-orders-form">
	<?php $form = ActiveForm::begin(); ?>

	<?php if ($model->scenario == \app\helpers\APP_UTILS::SCENARIO_ALLOCATE_KITCHEN): ?>
        <div class="col-md-12">
			<?= $form->field($model, 'KITCHEN_ID', ['template' => $field_template])->dropDownList(\app\model_extended\KITCHEN_MODEL::GetKitchens(), [
					'prompt' => '--- SELECT KITCHEN ---',
					'class' => 'form-control'
				]
			) ?>
        </div>

	<?php endif; ?>

	<?php if ($model->scenario == \app\helpers\APP_UTILS::SCENARIO_ASSIGN_CHEF): ?>
        <div class="col-md-12">
			<?= $form->field($model, 'CHEF_ID', ['template' => $field_template])->dropDownList(\app\model_extended\CHEF_MODEL::GetChefs($model->KITCHEN_ID), [
					'prompt' => '--- SELECT CHEF ---',
				]
			) ?>
        </div>
	<?php endif; ?>


	<?php if ($model->scenario == \app\helpers\APP_UTILS::SCENARIO_ASSIGN_RIDER): ?>
        <div class="col-md-12">
			<?= $form->field($model, 'RIDER_ID', ['template' => $field_template])->dropDownList(\app\model_extended\RIDER_MODEL::GetRiders($model->KITCHEN_ID), [
					'prompt' => '--- SELECT RIDER ---',
				]
			) ?>
        </div>
	<?php endif; ?>

    <div class="col-md-12">
		<?= $form->field($model, 'ORDER_STATUS', ['template' => $field_template])->dropDownList(\app\model_extended\STATUS_MODEL::GetStatus($model->ORDER_ID, $scope, $workflow), [
			'prompt' => '--- SELECT STATUS ---',
			'class' => 'form-control',
		]) ?>
    </div>

    <div class="col-md-12">
		<?= $form->field($model, 'COMMENTS', ['template' => $field_template])->textarea([
			'cols' => 4,
			'rows' => 4,
			'placeholder' => 'Comments'
		])->label(false) ?>
    </div>


    <div class="form-group">
		<?= Html::submitButton('Process Order', ['class' => 'btn btn-success btn-lg btn-block']) ?>
    </div>

	<?php ActiveForm::end(); ?>
</div>
