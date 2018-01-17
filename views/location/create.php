<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\model_extended\LOCATION_MODEL */

$this->title = Yii::t('app', 'Create Location');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Locations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="location--model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
