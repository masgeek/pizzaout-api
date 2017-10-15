<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\model_extended\CHEF_MODEL */

$this->title = 'Update Chef  Model: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Chef  Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CHEF_ID, 'url' => ['view', 'id' => $model->CHEF_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="chef--model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
