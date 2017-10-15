<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customer  Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer--orders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
		<?= Html::a('Create Customer  Orders', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			//'ORDER_ID',
			//'USER_ID',
			[
				'header' => 'Customer Name',
				'attribute' => 'USER_ID',
				'value' => function ($model) {
					/* @var $model \app\model_extended\CUSTOMER_ORDERS */
					return "{$model->uSER->SURNAME} {$model->uSER->OTHER_NAMES}";
				}
			],
			[
				'header' => 'Delivery Location',
				'attribute' => 'LOCATION_ID',
				'value' => function ($model) {
					/* @var $model \app\model_extended\CUSTOMER_ORDERS */
					return $model->lOCATION->LOCATION_NAME;
				}
			],
			'CHEF_ID',
			'RIDER_ID',
			'ORDER_QUANTITY',
			'ORDER_DATE:datetime',
			'ORDER_PRICE:decimal',
			'PAYMENT_METHOD',
			'ORDER_STATUS',
			'NOTES',
			'CREATED_AT:datetime',
			'UPDATED_AT:datetime',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
