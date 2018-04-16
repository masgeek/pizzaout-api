<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\model_extended\ReportModel */

$this->title = 'Update Report Model: ' . $model->ORDER_ID;
$this->params['breadcrumbs'][] = ['label' => 'Report Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ORDER_ID, 'url' => ['view', 'id' => $model->ORDER_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="report-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
