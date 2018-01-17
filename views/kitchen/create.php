<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\model_extended\KITCHEN_MODEL */

$this->title = Yii::t('app', 'Create Kitchen  Model');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kitchen  Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kitchen--model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
