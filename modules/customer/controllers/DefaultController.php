<?php

namespace app\modules\customer\controllers;

use yii;
use app\model_extended\CART_MODEL;
use app\model_extended\MENU_ITEMS;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Default controller for the `customer` module
 */
class DefaultController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'add' => ['post'],
                ],
            ],
            /*'access' => [
                 'class' => AccessControl::className(),
                 'except' => ['index', 'logout', 'login',],
                 'rules' => [
                     // allow authenticated users
                     [
                         'allow' => true,
                         'roles' => ['@'],
                     ],
                     // everything else is denied
                 ],
             ],*/
        ];
    }

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


        //lets get the list of pizzas on offer
        $menu_item = new ActiveDataProvider([
            'query' => MENU_ITEMS::find(),
        ]);

        return $this->render('view', [
            'dataProvider' => $menu_item,
        ]);

    }

    public function actionCheckout()
    {
        return 6;
    }

    public function actionAdd()
    {
        $user_id = Yii::$app->user->id;
        $item_type_id = Yii::$app->request->post('ITEM_TYPE_ID', null);
        $item_price = Yii::$app->request->post('ITEM_PRICE', null);

        //lets query the carts tablef irst we see if there is an already existsing order
        $cartModel = CART_MODEL::find()
            ->where(['ITEM_TYPE_ID' => $item_type_id])
            ->andWhere(['USER_ID' => $user_id])
            ->one();

        if ($cartModel != null) {
            //update the item count
            $cartModel->QUANTITY = (int)$cartModel->QUANTITY + 1;
            if ($cartModel->save()) {
                return $this->redirect(['//customer/default/index']);
            }
        } else {
            $cartModel = new CART_MODEL();
            $cartModel->USER_ID = $user_id;
            $post = ['CART_MODEL' => Yii::$app->request->post()];
            if ($cartModel->load($post) && $cartModel->validate()) {
                //now we save and go back to the menu
                if ($cartModel->save()) {
                    return $this->redirect(['//customer/default/index']);
                }
            }

        }


        var_dump($cartModel);
        return $item_type_id;
    }
}
