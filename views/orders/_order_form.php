<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\model_extended\CUSTOMER_ORDERS */
/* @var $form yii\widgets\ActiveForm */

$attributes = [
	[
		'group' => true,
		'label' => 'Order Details',
		'rowOptions' => ['class' => 'success']
	],
	[
		'columns' => [
			[
				'attribute' => 'ORDER_ID',
				//'label'=>'Book #',
				'displayOnly' => true,
				'valueColOptions' => ['style' => 'width:30%']
			],
			[
				'attribute' => 'ORDER_PRICE',
				//'label'=>'Buy Amount ($)',
				'displayOnly' => true,
				'format' => ['decimal', 2],
				'inputContainer' => ['class' => 'col-sm-6'],
			],

		],
	],
	[
		'columns' => [
			[
				'attribute' => 'LOCATION_ID',
				'value' => "{$model->lOCATION->LOCATION_NAME}",
			],
			[
				'attribute' => 'ORDER_STATUS',
				'format' => 'raw',
				'value' => "<span class='badge' style='background-color: {$model->oRDERSTATUS->COLOR};'> </span>  <code>" . $model->ORDER_STATUS . '</code>',
				'type' => DetailView::INPUT_COLOR,
				'valueColOptions' => ['style' => 'width:30%'],
			],
		],
	],
	[
		'columns' => [
			[
				'attribute' => 'ORDER_QUANTITY',
			],
			[
				'attribute' => 'ORDER_DATE',
				'format' => 'datetime',
				'valueColOptions' => ['style' => 'width:30%'],
			],
		],
	],
	[
		'columns' => [
			[
				'attribute' => 'RIDER_ID',
			],
			[
				'attribute' => 'CHEF_ID',
				'valueColOptions' => ['style' => 'width:30%'],
			],
		],
	],
	[
		'columns' => [
			[
				'attribute' => 'PAYMENT_METHOD',
			],
			[
				'attribute' => 'NOTES',
				'valueColOptions' => ['style' => 'width:30%'],
			],
		],
	],

];

?>

<div class="customer-orders-view">
	<?= DetailView::widget([
		'model' => $model,
		'attributes' => $attributes,
	]) ?>
</div>

<div id="staus-history">
	<?= $this->render('_status_history', [
		'model' => $model,
	]) ?>
</div>

<div class="customer-orders-form">
	<?php $form = ActiveForm::begin(); ?>
    <!--?= $form->field($model, 'ORDER_STATUS')->textInput(['maxlength' => true]) ?-->
	<?= $form->field($model, 'ORDER_STATUS')->dropDownList(\app\model_extended\STATUS_MODEL::GetStatus()) ?>
    <div class="form-group">
		<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

	<?php ActiveForm::end(); ?>

</div>
