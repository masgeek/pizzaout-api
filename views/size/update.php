<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\model_extended\SIZES_MODEL */

$this->title = Yii::t('app', 'Update Size: {nameAttribute}', [
    'nameAttribute' => $model->SIZE_ID,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sizes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->SIZE_ID, 'url' => ['view', 'id' => $model->SIZE_ID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sizes--model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
