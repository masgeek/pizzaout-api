<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\model_extended\CUSTOMER_ORDERS */

$this->title = 'Create Customer  Orders';
$this->params['breadcrumbs'][] = ['label' => 'Customer  Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer--orders-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>