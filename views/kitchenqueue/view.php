<?php

use kartik\tabs\TabsX;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\model_extended\CUSTOMER_ORDERS */

$this->params['breadcrumbs'][] = ['label' => 'Kitchen Queue Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


$items = [
	[
		'label' => '<i class="glyphicon glyphicon-apple"></i> Order Items',
		'content' => $this->render('/orders/_order_items', ['model' => $model]),
		'active' => true
	],
	[
		'label' => '<i class="glyphicon glyphicon-home"></i> Order Details',
		'content' => $this->render('/orders/_order_details', ['model' => $model,]),
	],
	[
		'label' => '<i class="glyphicon glyphicon-credit-card"></i> Payment Details',
		'content' => $this->render('/orders/_payment_info', ['model' => $model]),
		'visible' => false
	],
];

?>
<div class="customer--orders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
		<?= Html::a('Kitchen Queue', ['//kitchenqueue'], ['class' => 'btn btn-success']) ?>
        <!--
        <?= Html::a('Delete', ['delete', 'id' => $model->ORDER_ID], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => 'Are you sure you want to delete this item?',
				'method' => 'post',
			],
		]) ?>
		-->
    </p>

	<?=
	TabsX::widget([
		'items' => $items,
		'position' => TabsX::POS_ABOVE,
		'encodeLabels' => false,
		'bordered' => true,
	]);
	?>
</div>
