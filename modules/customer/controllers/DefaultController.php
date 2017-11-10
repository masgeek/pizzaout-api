<?php

namespace app\modules\customer\controllers;

use app\model_extended\CART_MODEL;
use yii\web\Controller;

/**
 * Default controller for the `customer` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->view->title = 'Orders';

        $this->view->params['title'] = 'Orders Cart';


        //get the list of orders
        $cart_items = CART_MODEL::find()
            ->where(['USER_ID' => \Yii::$app->user->id])
            ->all();
        $this->view->params['cart_items'] = $cart_items;

        return $this->render('index');
    }
}
