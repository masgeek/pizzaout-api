<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->params['breadcrumbs'][] = $this->title;

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
    <a href="pages-recover-password.html" class="pull-right">Lost Password?</a>
</div>
<div class="input-group input-group-icon">
     {input} 
    <span class="input-group-addon">
        <span class="icon icon-lg"><i class="fa fa-user"></i></span>
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
            <?= $form->field($model, 'username', ['template' => $field_template])
                ->textInput(['autofocus' => true, 'class' => 'form-control input-lg']) ?>
        </div>

        <div class="form-group mb-lg">
            <?= $form->field($model, 'password', ['template' => $password_field_template])
                ->passwordInput(['class' => 'form-control input-lg']) ?>
        </div>

        <div class="row">
            <div class="col-sm-8">
                <div class="checkbox-custom checkbox-default">
                    <input id="RememberMe" name="rememberme" type="checkbox"/>
                    <label for="RememberMe">Remember Me</label>
                </div>
            </div>
            <div class="col-sm-4 text-right">
                <!--<button type="submit" class="btn btn-primary hidden-xs">Sign In</button>
                <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign In</button>-->
                <?= Html::submitButton('Sign In', ['class' => 'btn btn-primary hidden-xs', 'name' => 'login-button']) ?>
                <?= Html::submitButton('Sign In', ['class' => 'btn btn-primary btn-block btn-lg visible-xs mt-lg', 'name' => 'login-button']) ?>
            </div>
        </div>

        <span class="mt-lg mb-lg line-thru text-center text-uppercase">
            <span>or</span>
        </span>

        <div class="mb-xs text-center">
            <a class="btn btn-facebook mb-md ml-xs mr-xs">Connect with <i class="fa fa-facebook"></i></a>
            <a class="btn btn-twitter mb-md ml-xs mr-xs">Connect with <i class="fa fa-twitter"></i></a>
        </div>

        <p class="text-center">Don't have an account yet? <a href="pages-signup.html">Sign Up!</a></p>
    </div>
</div>
<?php ActiveForm::end(); ?>

<p class="text-center text-muted mt-md mb-md">&copy; Copyright <?= date('Y') ?>. All Rights Reserved.</p>