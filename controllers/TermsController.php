<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 1/6/2018
 * Time: 12:08 PM
 */

namespace app\controllers;


use yii\web\Controller;

class TermsController extends Controller
{
    public function actionIndex()
    {
        $this->view->title = \Yii::t('app', 'Terms & Conditions');
        $this->layout = 'login_layout';
        return $this->render('//site/terms');
    }
}