<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\model_extended\RIDER_MODEL */

$this->title = 'Update Rider  Model: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Rider  Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->RIDER_ID, 'url' => ['view', 'id' => $model->RIDER_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rider--model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
