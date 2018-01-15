<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\tabs\TabsX;
use yii2assets\printthis\PrintThis;

/* @var $this yii\web\View */
/* @var $model app\model_extended\CUSTOMER_ORDERS */

$this->params['breadcrumbs'][] = ['label' => 'My Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="customer--orders-view">

    <?= PrintThis::widget([
        'htmlOptions' => [
            'id' => 'PrintThis',
            'btnClass' => 'btn btn-info',
            'btnId' => 'btnPrintThis',
            'btnText' => 'PRINT',
            'btnIcon' => 'fa fa-print'
        ],
        'options' => [
            'debug' => false,
            'importCSS' => true,
            'importStyle' => false,
            'loadCSS' => "path/to/my.css",
            'pageTitle' => "",
            'removeInline' => false,
            'printDelay' => 333,
            'header' => null,
            'formValues' => true,
        ]
    ]) ?>
    <hr/>
    <div id="PrintThis">
        <h1><?= Html::encode($this->title) ?></h1>
        <h5><?= date('D-M-Y H:i:s') ?></h5>
        <?= $this->render('/receipt/a4-receipt', ['model' => $model,]) ?>
        <?= $this->render('/orders/_order_items', ['model' => $model]) ?>
    </div>
</div>
