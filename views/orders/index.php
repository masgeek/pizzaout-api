<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models_search\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pending Orders';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="customer-orders-index">

    <h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('_orders_grid', [
		'dataProvider' => $dataProvider,
		'searchModel' => $searchModel,
	]) ?>
</div>
