<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\detail\DetailView;
use yii\helpers\Url;
use kartik\depdrop\DepDrop;

/* @var $this yii\web\View */
/* @var $model app\model_extended\CUSTOMER_ORDERS */
/* @var $tracker app\model_extended\STATUS_TRACKING_MODEL */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="customer-orders-view">
	<?= $this->render('_static_view', [
		'model' => $model,
	]) ?>
</div>

<div id="staus-history">
	<?= $this->render('_status_history', [
		'model' => $model,
	]) ?>
</div>
