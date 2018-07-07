<?php

namespace app\modules\wpcart\controllers;

use app\model_extended\MENU_ITEMS;
use yii\data\ActiveDataProvider;
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
        $this->view->title = 'Our Menu';
        //show the menu
        //lets get the list of pizzas on offer
        $menu_item = new ActiveDataProvider([
            'query' => MENU_ITEMS::find()->orderBy(['MENU_CAT_ID' => SORT_ASC]),
        ]);

        return $this->render('menu', [
            'dataProvider' => $menu_item
        ]);
    }

    public function actionAddToCart()
    {

        return json_encode($_REQUEST);
    }

    public function actionMyCart()
    {
        //show the menu
        return $this->render('cart');
    }

    public function actionUserLogin()
    {

    }
}
