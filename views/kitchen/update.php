<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\model_extended\KITCHEN_MODEL */

$this->title = Yii::t('app', 'Update Kitchen : {nameAttribute}', [
    'nameAttribute' => $model->KITCHEN_NAME,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kitchens'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->KITCHEN_NAME, 'url' => ['view', 'id' => $model->KITCHEN_ID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="kitchen--model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
