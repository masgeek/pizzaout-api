<?php
/**
 * Created by PhpStorm.
 * User: masgeek
 * Date: 04-Dec-17
 * Time: 14:58
 */

namespace app\controllers;


use yii\web\Controller;

class PaypalhookController extends Controller
{

    public function actionIndex()
    {
        var_dump($_REQUEST);
        return \Yii::$app->request->absoluteUrl;
    }
}