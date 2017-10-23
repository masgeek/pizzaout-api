<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\model_extended\CUSTOMER_ORDERS */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="customer-orders-form">
	<?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
			<?= $form->field($model, 'ORDER_STATUS')->dropDownList(\app\model_extended\STATUS_MODEL::GetStatus(), ['prompt' => '--- SELECT STATUS ---']) ?>
        </div>
        <div class="col-md-6">
			<?= $form->field($tracker, 'COMMENTS')->textarea(['cols' => 4, 'rows' => 2]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
			<?= $form->field($model, 'KITCHEN_ID')->dropDownList(\app\model_extended\KITCHEN_MODEL::GetKitchens(), [
					'prompt' => '--- SELECT KITCHEN ---',
				]
			) ?>
        </div>
    </div>
    <div class="form-group">
		<?= Html::submitButton('UPDATE ORDER', ['class' => 'btn btn-success']) ?>
    </div>

	<?php ActiveForm::end(); ?>
</div>
