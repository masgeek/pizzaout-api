<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\model_extended\USERS_MODEL */

$this->title = 'Register User';
$this->params['breadcrumbs'][] = ['label' => 'Users  Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users--model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
