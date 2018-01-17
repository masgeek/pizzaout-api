<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\model_extended\COUNTRY_MODEL */

$this->title = Yii::t('app', 'Update Country', [
    'nameAttribute' => $model->COUNRY_ID,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Countries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->COUNRY_ID, 'url' => ['view', 'id' => $model->COUNRY_ID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="country--model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
