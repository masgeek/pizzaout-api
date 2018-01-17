<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\model_extended\LOCATION_MODEL */

$this->title = Yii::t('app', 'Update Location', [
    'nameAttribute' => $model->LOCATION_ID,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Locations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->LOCATION_ID, 'url' => ['view', 'id' => $model->LOCATION_ID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="location--model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
