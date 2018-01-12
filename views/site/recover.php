<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

/* @var $message */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->params['breadcrumbs'][] = $this->title;

$registerLink = \yii\helpers\Url::to(['user/register']);
$recoverLink = \yii\helpers\Url::to(['site/recover']);

$field_template = <<<TEMPLATE
<label>{label}</label>
<div class="input-group input-group-icon">
     {input} 
    <span class="input-group-addon">
        <span class="icon icon-lg"><i class="fa fa-user"></i></span>
    </span>
</div>
    {error}{hint}
TEMPLATE;

$password_field_template = <<<TEMPLATE
<div class="clearfix">
    <label class="pull-left">{label}</label>
    <a href="$recoverLink" class="pull-right">Forgot Password?</a>
</div>
<div class="input-group input-group-icon">
     {input} 
    <span class="input-group-addon">
        <span class="icon icon-lg"><i class="fa fa-user"></i></span>
    </span>
</div>
    {error}{hint}
TEMPLATE;

$checkboxTemplate = <<<TEMPLATE
<div class="col-lg-offset-1 col-lg-3">
{input} {label}
</div>
<div class="col-lg-8">{error}</div>
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
        <?php if ($message != null): ?>
            <div class="alert alert-info">
                <?= $message ?>
            </div>
        <?php endif; ?>
        <div class="form-group mb-lg">
            <?= $form->field($model, 'email', ['template' => $field_template])
                ->textInput(['autofocus' => true, 'class' => 'form-control input-lg']) ?>
        </div>

        <div class="row">
            <div class="col-sm-12 text-right">
                <?= Html::submitButton('Recover Password', ['class' => 'btn btn-success hidden-xs btn-block', 'name' => 'recover-button']) ?>
                <?= Html::submitButton('Recover Password', ['class' => 'btn btn-primary btn-block btn-lg visible-xs mt-lg btn-block', 'name' => 'recover-button']) ?>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>

<p class="text-center text-muted mt-md mb-md">&copy; Copyright <?= date('Y') ?>. All Rights Reserved.</p>