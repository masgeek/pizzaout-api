<?php

namespace app\modules\wpcart\controllers;

use app\model_extended\MENU_ITEMS;
use app\model_extended\WP_CART_MODEL;
use app\modules\wpcart\cart;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use Yii;

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
        $this->view->title = 'WP Menu';
        //show the menu
        //lets get the list of pizzas on offer
        $drinksDataProvider = MENU_ITEMS::GetDrinksList();
        $pizzaDataProvider = MENU_ITEMS::GetPizzaList();


        return $this->render('menu', [
            'drinksDataProvider' => $drinksDataProvider,
            'pizzaDataProvider' => $pizzaDataProvider,
        ]);
    }

    /**
     * @return bool|string
     * @throws \yii\base\Exception
     */
    public function actionAddToCart()
    {

        $resp = [
            'ADDED' => false,
            'MESSAGE' => null
        ];
        $session_id = WP_CART_MODEL::getCartCookie();
        $item_type_id = Yii::$app->request->post('ITEM_TYPE_ID', null);
        $item_price = Yii::$app->request->post('ITEM_PRICE', null);
        $qty = Yii::$app->request->post('QUANTITY', 0);

        //lets query the wp carts table first we see if there is an already existing order
        $cartModel = WP_CART_MODEL::find()
            ->where(['ITEM_TYPE_ID' => $item_type_id])
            ->andWhere(['CART_GUID' => $session_id])
            ->one();

        if ($cartModel != null) {
            //update the item count
            $cartModel->QUANTITY = $cartModel->QUANTITY + $qty;
            if ($cartModel->save()) {
                if ($cartModel->save()) {
                    $resp = [
                        'ADDED' => true,
                        'MESSAGE' => $cartModel->CART_GUID
                    ];
                } else {
                    $cartModel->validate();
                    $resp = [
                        'ADDED' => false,
                        'MESSAGE' => $cartModel->getErrors()
                    ];
                }
            }
        } else {
            $cartModel = new WP_CART_MODEL();
            $cartModel->CART_GUID = $session_id;
            $post = ['WP_CART_MODEL' => Yii::$app->request->post()];
            if ($cartModel->load($post) && $cartModel->validate()) {
                //now we save and go back to the menu
                $cartModel->CART_GUID = $session_id;
                if ($cartModel->save()) {
                    $resp = [
                        'ADDED' => true,
                        'MESSAGE' => $cartModel->CART_GUID
                    ];
                } else {
                    $cartModel->validate();
                    $resp = [
                        'ADDED' => false,
                        'MESSAGE' => $cartModel->getErrors()
                    ];
                }
            }
        }
        return json_encode($resp);
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
