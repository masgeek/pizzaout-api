<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-sign">
    <div class="panel-title-sign mt-xl text-right">
        <h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i><?= $this->title ?>
        </h2>
    </div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            //'layout' => 'horizontal',
        ]); ?>
        <div class="form-group mb-lg">
            <label>Username</label>
            <div class="input-group input-group-icon">
                <!--<input name="username" type="text" class="form-control input-lg"/>-->
                <div class="row">
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label(false)->hint('Username/Email') ?>
                </div>

                <span class="input-group-addon">
                    <span class="icon icon-lg"><i class="fa fa-user"></i></span>
                </span>
            </div>
        </div>

        <div class="form-group mb-lg">
            <div class="clearfix">
                <label class="pull-left">Password</label>
                <a href="pages-recover-password.html" class="pull-right">Lost Password?</a>
            </div>
            <div class="input-group input-group-icon">
                <input name="pwd" type="password" class="form-control input-lg"/>
                <span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-8">
                <div class="checkbox-custom checkbox-default">
                    <input id="RememberMe" name="rememberme" type="checkbox"/>
                    <label for="RememberMe">Remember Me</label>
                </div>
            </div>
            <div class="col-sm-4 text-right">
                <button type="submit" class="btn btn-primary hidden-xs">Sign In</button>
                <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign In</button>
            </div>
        </div>

        <span class="mt-lg mb-lg line-thru text-center text-uppercase">
								<span>or</span>
							</span>

        <div class="mb-xs text-center">
            <a class="btn btn-facebook mb-md ml-xs mr-xs">Connect with <i class="fa fa-facebook"></i></a>
            <a class="btn btn-twitter mb-md ml-xs mr-xs">Connect with <i class="fa fa-twitter"></i></a>
        </div>

        <p class="text-center">Don't have an account yet? <a href="pages-signup.html">Sign Up!</a>
            <?php ActiveForm::end(); ?>
    </div>
</div>

<p class="text-center text-muted mt-md mb-md">&copy; Copyright <?= date('Y') ?>. All Rights Reserved.</p>