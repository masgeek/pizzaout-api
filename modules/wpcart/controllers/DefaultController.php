<?php

namespace app\modules\wpcart\controllers;

use app\helpers\APP_UTILS;
use app\helpers\ORDER_HELPER;
use app\model_extended\CART_MODEL;
use app\model_extended\CUSTOMER_ORDER_ITEMS;
use app\model_extended\CUSTOMER_ORDERS;
use app\model_extended\CUSTOMER_PAYMENTS;
use app\model_extended\LOCATION_MODEL;
use app\model_extended\MENU_ITEMS;
use app\model_extended\WP_CART_MODEL;
use app\models\LoginForm;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use Yii;

/**
 * Default controller for the `wpcart` module
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
                    'logout' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'except' => ['index', 'logout', 'login', 'add-to-cart', 'my-cart',],
                'rules' => [
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // everything else is denied
                ],
            ],
        ];
    }

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

        //sleep(40);
        $resp = [
            'ADDED' => false,
            'MESSAGE' => 'Item not added successfully to cart'
        ];

        return json_encode($resp);
        $session_id = WP_CART_MODEL::getCartCookie();
        $item_type_id = Yii::$app->request->post('ITEM_TYPE_ID', 0);
        $item_price = Yii::$app->request->post('ITEM_PRICE', 0);
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
            } else {
                $cartModel->validate();
                $resp = [
                    'ADDED' => false,
                    'MESSAGE' => $cartModel->getErrors()
                ];
            }
        }
        return json_encode($resp);
    }

    /**
     * @return string
     * @throws \yii\base\Exception
     */
    public function actionMyCart()
    {
        $this->view->title = 'WP Cart';
        $cart_guid = WP_CART_MODEL::getCartCookie();

        $cartItems = ORDER_HELPER::GetWpCartItems($cart_guid);

        //show the menu
        return $this->render('cart', ['cartItems' => $cartItems]);


    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionCheckout()
    {
        //we will also check if the user is logged in and redirect them to the payment interface
        //if not they will need to register that is up to them
        $this->layout = 'login_layout';
        $this->view->title = 'User Sign In';
        if (!Yii::$app->user->isGuest) {
            return $this->redirect('process-cart');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            //now we process the cart checkout items from wp cart
            return $this->redirect('process-cart');
        }
        return $this->render('@app/views/site/login', [
            'model' => $model,
        ]);
    }

    /**
     * @return string|\yii\web\Response
     * @throws \yii\base\Exception
     * @throws \yii\db\Exception
     */
    public function actionProcessCart()
    {
        $this->view->title = 'Checkout and Payment';

        $session = Yii::$app->session;
        $connection = \Yii::$app->db;

        $this->view->title = 'Order Checkout';
        $formatter = \Yii::$app->formatter;
        $user_id = Yii::$app->user->id;

        $order_created = false;
        $paymentNumber = null;
        $saveSuccessful = false;

        $cart_guid = WP_CART_MODEL::getCartCookie();
        $cart_items = ORDER_HELPER::GetWpCartItems($cart_guid);

        $paymentModel = new CUSTOMER_PAYMENTS();
        $model = new CUSTOMER_ORDERS();
        $customer_order_items = new CUSTOMER_ORDER_ITEMS();

        $location = LOCATION_MODEL::find()->one();

        $notes = 'Created from wordpress cart';
        $model->USER_ID = $user_id;
        $model->LOCATION_ID = $location->LOCATION_ID;
        $model->ORDER_DATE = APP_UTILS::GetCurrentDateTime();
        $model->ORDER_STATUS = ORDER_HELPER::STATUS_ORDER_PENDING;
        $model->NOTES = $notes;

        if ($model->load(Yii::$app->request->post())) {
            $transaction = $connection->beginTransaction();
            $paymentModel->load(Yii::$app->request->post());
            if ($model->save()) {

                foreach ($cart_items as $key => $orderItems):
                    $customer_order_items->isNewRecord = true;
                    $customer_order_items->ORDER_ITEM_ID = null;
                    $customer_order_items->ORDER_ID = $model->ORDER_ID;
                    $customer_order_items->ITEM_TYPE_ID = $orderItems->ITEM_TYPE_ID;
                    $customer_order_items->QUANTITY = $orderItems->QUANTITY;
                    $customer_order_items->PRICE = (int)$orderItems->ITEM_PRICE;
                    $customer_order_items->SUBTOTAL = (int)$orderItems->ITEM_PRICE * (float)$orderItems->QUANTITY;
                    $customer_order_items->OPTIONS = 'N/A';
                    $customer_order_items->NOTES = $notes;
                    $customer_order_items->CREATED_AT = APP_UTILS::GetCurrentDateTime();
                    $customer_order_items->UPDATED_AT = APP_UTILS::GetCurrentDateTime();

                    //save the order items as we are deleting
                    if ($customer_order_items->save()) {
                        $saveSuccessful = true;
                    }
                endforeach;
                //Save the payment information
                $paymentModel->PAYMENT_DATE = APP_UTILS::GetCurrentDateTime();
                $paymentModel->PAYMENT_REF = strtoupper(uniqid());
                $paymentModel->PAYMENT_STATUS = ORDER_HELPER::STATUS_PAYMENT_PENDING;
                if ($paymentModel->validate() && $paymentModel->save()) {
                    $saveSuccessful = true;
                }
            }
            if ($saveSuccessful) {
                //remove the cart item
                WP_CART_MODEL::ClearCart($cart_guid);
                $transaction->commit();
                //render the payment instructions
                $order_created = true;
            } else {
                $transaction->rollback();
                $this->refresh();
            }


        }

        return $this->render('@app/modules/customer/views/default/checkout', [
            'formatter' => $formatter,
            'cart_items' => $cart_items,
            'model' => $model,
            'paymentModel' => $paymentModel,
            'order_created' => $order_created]);
    }
}
