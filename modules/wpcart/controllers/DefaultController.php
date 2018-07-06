<?php

namespace app\modules\wpcart\controllers;

use yii\web\Controller;

/**
 * Default controller for the `wpcart` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
