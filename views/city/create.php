<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\model_extended\CITY_MODEL */

$this->title = Yii::t('app', 'Create City  Model');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'City  Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city--model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
