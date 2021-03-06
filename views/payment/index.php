<?php

use yii\helpers\Html;
use kartik\grid\GridView;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payments';
$this->params['breadcrumbs'][] = $this->title;

$statusList = \app\model_extended\PAYMENT_STATUS_MODEL::GetStatus();
$gridColumns = [
	['class' => 'yii\grid\SerialColumn'],

	[
		'header' => 'Reservation',
		'attribute' => 'RESERVATION_ID',
		'value' => function ($paymentmodel, $key, $index) {
			$names = "{$paymentmodel->rESERVATION->uSER->SURNAME} {$paymentmodel->rESERVATION->uSER->OTHER_NAMES}";
			$data = "{$names}  - Booking number {$paymentmodel->rESERVATION->ACCOUNT_REF}";
			return $data;
		},
		'group' => true,  // enable grouping,
		'groupedRow' => true,                    // move grouped column to a single grouped row
		//'groupOddCssClass'=>'kv-grouped-row',  // configure odd group cell css class
		//'groupEvenCssClass'=>'kv-grouped-row', // configure even group cell css class
		'groupFooter' => function ($paymentmodel, $key, $index, $widget) { // Closure method
			$model = \app\model_extended\MY_RESERVATIONS_VIEW::findOne(['RESERVATION_ID' => $paymentmodel->RESERVATION_ID]);
			return [
				//'mergeColumns'=>[[2,2]], // columns to merge in summary
				'content' => [             // content to show in each summary cell
					1 => "Summary for booking {$paymentmodel->RESERVATION_ID}",
					3 => GridView::F_SUM,
					4 => "Total Cost {$model->getBalance($total_cost = true)}",
					5 => "Balance Remaining {$model->getBalance()}",
					//4=>GridView::F_AVG,
					//4=>GridView::F_SUM,
				],
				'contentFormats' => [      // content reformatting for each summary cell
					2 => ['format' => 'number', 'decimals' => 2],
					3 => ['format' => 'number', 'decimals' => 2],
					//4=>['format'=>'number', 'decimals'=>2],
					//6=>['format'=>'number', 'decimals'=>2],
				],
				'contentOptions' => [      // content html attributes for each summary cell
					1 => ['style' => 'font-variant:small-caps'],
					2 => ['style' => 'text-align:right'],
					3 => ['style' => 'text-align:right'],
					4 => ['style' => 'font-variant:small-caps'],
					5 => ['style' => 'font-variant:small-caps'],
					//6=>['style'=>'text-align:right'],
				],
				// html attributes for group summary row
				'options' => ['class' => 'success', 'style' => 'font-weight:bold;']
			];
		}
	],
	//'RESERVATION_ID',
	[
		'header' => 'Client Name',
		'attribute' => 'PAYMENT_ID',
		//'width'=>'100%',
		'value' => function ($paymentmodel, $key, $index, $widget) {
			$names = "{$paymentmodel->rESERVATION->uSER->SURNAME} {$paymentmodel->rESERVATION->uSER->OTHER_NAMES}";
			return $names;
		},
		//'group'=>false,  // enable grouping
		//'subGroupOf'=>1,
	],
	//'PAYMENT_ID',
	//'RESERVATION_ID',
	'BOOKING_AMOUNT',
	//'FINAL_AMOUNT',
	//'BALANCE',
	[
		//'header' => 'Amount Paid',
		'attribute' => 'FINAL_AMOUNT',
		//'format' => 'currency',
		'visible' => false,
		'value' => function ($paymentmodel, $key, $index) {
			/* @var $model \app\model_extended\MY_RESERVATIONS_VIEW */
			$model = \app\model_extended\MY_RESERVATIONS_VIEW::findOne(['RESERVATION_ID' => $paymentmodel->RESERVATION_ID]);
			return $model->getAmountPaid();
		}
	],
	'PAYMENT_REF',
	'MPESA_REF',
	'DATE_PAID',
	[
		'class' => 'kartik\grid\EditableColumn',
		'attribute' => 'PAYMENT_STATUS',
		'value' => function ($model, $key, $index, $widget) {
			/* @var $model \app\model_extended\PAYMENT_STATUS_MODEL */
			$data = 'PENDING';
			if ($model->PAYMENT_STATUS != null) {
				$data = \app\model_extended\PAYMENT_STATUS_MODEL::findOne($model->PAYMENT_STATUS)->STATUS;;
			}
			return $data;
		},
		'pageSummary' => true,
		'editableOptions' => [
			'header' => 'Select Status',
			'formOptions' => ['action' => ['/confirm-payment']],
			'format' => \kartik\editable\Editable::FORMAT_BUTTON,
			'inputType' => \kartik\editable\Editable::INPUT_DROPDOWN_LIST,
			'data' => $statusList,
		]
	],
	[
		'class' => 'kartik\grid\EditableColumn',
		'attribute' => 'COMMENTS',
		'editableOptions' => [
			'header' => 'Leave a comment',
			'formOptions' => ['action' => ['/confirm-payment']],
			'format' => \kartik\editable\Editable::FORMAT_BUTTON,
			'inputType' => \kartik\editable\Editable::INPUT_TEXTAREA,
			//'data' => $statusList,
		]
	],
	//'FINALIZED',
	//['class' => 'yii\grid\ActionColumn'],
];
?>
<div class="payments-index">

    <h3><?= Html::encode($this->title) ?></h3>

	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'export' => false,
		'columns' => $gridColumns,
		'responsive' => true,
		'hover' => true,
		'toggleData' => true,
		'panel' => [
			'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> Payment Grouping By Reservations</h3>',
			'type' => 'primary',
			//'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Create Country', ['create'], ['class' => 'btn btn-success']),
			//'before' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Refresh Grid', ['/my-payments'], ['class' => 'btn btn-info']),
			'showFooter' => false
		],
		//'showPageSummary'=>true,
	]); ?>
</div>
