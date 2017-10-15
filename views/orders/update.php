<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\model_extended\CUSTOMER_ORDERS */
/* @var $tracker app\model_extended\STATUS_TRACKING_MODEL */

$this->title = 'Update Customer  Orders: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Customer  Orders', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->ORDER_ID, 'url' => ['view', 'id' => $model->ORDER_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customer--orders-update">

    <h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('_order_form', [
		'model' => $model,
		'tracker' => $tracker,
	]) ?>

</div>
