<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\model_extended\USERS_MODEL */
/* @var $form yii\widgets\ActiveForm */
$model->PASSWORD = null;

$password_field_template = <<<TEMPLATE
<div class="clearfix">
    <label class="pull-left">{label}</label>
</div>
<div class="input-group input-group-icon">
     {input} 
    <span class="input-group-addon">
        <span class="icon icon-lg"><i class="fa fa-key"></i></span>
    </span>
</div>
    {error}{hint}
TEMPLATE;

?>
<?php $form = ActiveForm::begin([
    'id' => 'login-form',
    //'layout' => 'horizontal',
]); ?>

<div class="panel panel-sign">
    <div class="panel-title-sign mt-xl text-right">
        <h2 class="title text-uppercase text-weight-bold m-none">
            <i class="fa fa-user mr-xs"></i>
            <?= $this->title ?>
        </h2>
    </div>
    <div class="panel-body">

        <div class="form-group mb-lg">
            <?= $form->field($model, 'PASSWORD', ['template' => $password_field_template])
                ->passwordInput(['class' => 'form-control input-lg']) ?>
        </div>

        <div class="form-group mb-lg">
            <?= $form->field($model, 'CONFIRM_PASSWORD', ['template' => $password_field_template])
                ->passwordInput(['class' => 'form-control input-lg']) ?>
        </div>

        <div class="row">
            <div class="col-sm-12 text-right">
                <?= Html::submitButton(Yii::t('app', 'Update Password'), ['class' => 'btn btn-success btn-lg btn-block']) ?>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>







