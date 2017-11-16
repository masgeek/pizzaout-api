<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $model app\model_extended\CUSTOMER_ORDERS */

$this->params['breadcrumbs'][] = ['label' => 'My Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


$items = [
	[
		'label' => '<i class="glyphicon glyphicon-home"></i> Order Details',
		'content' => $this->render('_order_details', ['model' => $model,]),
		'active' => true
	],
	[
		'label' => '<i class="glyphicon glyphicon-apple"></i> Order Items',
		'content' => $this->render('/orders/_order_items', ['model' => $model]),
	],
	[
		'label' => '<i class="glyphicon glyphicon-credit-card"></i> Payment Details',
		'content' => $this->render('/orders/_payment_info', ['model' => $model]),
	],
];

?>
<div class="customer--orders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
		<?= Html::a('Process Order Here', ['//orders'], ['class' => 'btn btn-primary']) ?>
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
