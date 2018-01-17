<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\model_extended\CITY_MODEL */

$this->title = Yii::t('app', 'Update City  Model: {nameAttribute}', [
    'nameAttribute' => $model->CITY_ID,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'City  Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CITY_ID, 'url' => ['view', 'id' => $model->CITY_ID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="city--model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
