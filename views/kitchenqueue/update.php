<?php

use yii\helpers\Html;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $model app\model_extended\CUSTOMER_ORDERS */
/* @var $tracker app\model_extended\STATUS_TRACKING_MODEL */

$this->params['breadcrumbs'][] = ['label' => 'Customer  Orders', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->ORDER_ID, 'url' => ['view', 'id' => $model->ORDER_ID]];
$this->params['breadcrumbs'][] = 'Update';


$items = [
	[
		'label' => '<i class="glyphicon glyphicon-home"></i> Order Details',
		'content' => $this->render('/orders/_order_details', ['model' => $model]),
		'active' => true
	],
	[
		'label' => '<i class="glyphicon glyphicon-apple"></i> Order Items',
		'content' => $this->render('/orders/_order_items', ['model' => $model]),
	],
	[
		'label' => '<i class="glyphicon glyphicon-credit-card"></i> Payment Details',
        'visible'=>false,
		'content' => $this->render('/orders/_payment_info', ['model' => $model]),
	],
];

?>
<div class="customer-orders-update">

    <h1><?= Html::encode($this->title) ?></h1>

	<?=
	TabsX::widget([
		'items' => $items,
		'position' => TabsX::POS_ABOVE,
		'encodeLabels' => false,
		'bordered' => true,
	]);
	?>
	<?=
	$this->render('_kitchen_form', ['model' => $model, 'tracker' => $tracker])
	?>
</div>
