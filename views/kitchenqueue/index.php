<?php

use yii\helpers\Html;
use kartik\tabs\TabsX;


/* @var $this yii\web\View */
/* @var $searchModel app\models_search\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;


$items = [
	[
		'label' => '<i class="glyphicon glyphicon-book"></i> Assign Chef',
		'content' => $this->render('_kitchen_grid', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider]),
		'active' => true
	],
	[
		'label' => '<i class="glyphicon glyphicon-time"></i> Preparing',
		'content' => $this->render('_kitchen_grid', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider])
	],
	[
		'label' => '<i class="glyphicon glyphicon-time"></i> Ready For Delivery',
		'content' => $this->render('_kitchen_grid', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider])
	],
];
?>

<h1><?= Html::encode($this->title) ?></h1>

<?=
TabsX::widget([
	'items' => $items,
	'position' => TabsX::POS_ABOVE,
	'encodeLabels' => false,
	'bordered' => true,
]);
?>

