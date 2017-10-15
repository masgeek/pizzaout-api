<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\model_extended\CUSTOMER_ORDERS */
/* @var $tracker app\model_extended\STATUS_TRACKING_MODEL */
/* @var $form yii\widgets\ActiveForm */
?>

<div id="staus-history">
	<?= $this->render('/orders/_static_view', [
		'model' => $model,
	]) ?>
</div>

<div class="customer-orders-form">
	<?php $form = ActiveForm::begin(); ?>
    <div class="row">

        <div class="col-md-6">
			<?= $form->field($model, 'ORDER_STATUS')->dropDownList(\app\model_extended\STATUS_MODEL::GetStatus([\app\Helpers\AppUtils::KITCHEN_SCOPE]), [
					'prompt' => '--- SELECT STATUS ---',
				]
			) ?>
        </div>
        <div class="col-md-6">
			<?= $form->field($model, 'CHEF_ID')->dropDownList(\app\model_extended\CHEF_MODEL::GetChefs($model->KITCHEN_ID), [
					'prompt' => '--- SELECT CHEF ---',
				]
			) ?>
        </div>
    </div>
    <div class="form-group">
		<?= Html::submitButton('ADD TO QUEUE', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
    </div>

	<?php ActiveForm::end(); ?>

</div>
