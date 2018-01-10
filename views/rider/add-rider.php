<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\model_extended\RIDER_MODEL */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Riders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rider-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_add-rider', [
        'model' => $model,
        'userModel' => $userModel
    ]) ?>

</div>
