<?php

use yii\helpers\Html;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $searchModel app\models_search\OrdersSearch */
/* @var $pendingOrder yii\data\ActiveDataProvider */
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<?= $this->render('_orders_grid', ['searchModel' => $searchModel, 'dataProvider' => $pendingOrder]) ?>

