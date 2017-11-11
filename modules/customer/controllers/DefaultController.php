<?php

namespace app\modules\customer\controllers;

use app\helpers\APP_UTILS;
use app\helpers\ORDER_STATUS_HELPER;
use app\model_extended\CUSTOMER_ORDER_ITEMS;
use app\model_extended\CUSTOMER_ORDERS;
use app\model_extended\CUSTOMER_PAYMENTS;
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

        $user_id = \Yii::$app->user->id;
        //get the list of orders

        $this->view->params['cart_items'] = $this->GetCartItems($user_id);


        //lets get the list of pizzas on offer
        $menu_item = new ActiveDataProvider([
            'query' => MENU_ITEMS::find(),
        ]);

        return $this->render('view', [
            'dataProvider' => $menu_item,
        ]);

    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionPlacedOrders()
    {
        $this->view->title = 'Place Orders';

        $this->view->params['title'] = 'Orders Cart';

        $user_id = \Yii::$app->user->id;
        //get the list of orders

        $this->view->params['cart_items'] = $this->GetCartItems($user_id);


        //lets get the list of pizzas on offer
        $menu_item = new ActiveDataProvider([
            'query' => MENU_ITEMS::find(),
        ]);

        return $this->render('view', [
            'dataProvider' => $menu_item,
        ]);

    }

    /**
     * @return yii\web\Response
     */
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
        return $this->redirect(['//customer/default/index']);
    }

    /**
     * @param $id
     * @return array
     */
    public function actionChangeQuantity($id)
    {
        $output = ['output' => '', 'message' => ''];
        $model = CART_MODEL::findOne($id);
        // Check if there is an Editable ajax request
        if (isset($_POST['hasEditable'])) {
            // read your posted model attributes
            if ($model->load(Yii::$app->request->post())) {
                // read or convert your posted information
                if ($model->save()) {
                    $value = $model->QUANTITY;
                    if ($model->QUANTITY <= 0) {
                        $model->delete();
                    } else {
                        $output = ['output' => $value, 'message' => ''];
                    }
                }
            }
        }

        // return JSON encoded output in the below format
        return json_encode($output);
    }

    /**
     * @return string
     * @throws \Exception
     * @throws \Throwable
     * @throws yii\db\Exception
     * @throws yii\db\StaleObjectException
     */
    public function actionCheckout()
    {
        $connection = \Yii::$app->db;
        $this->layout = 'customer_layout_no_cart';
        $this->view->title = 'Order Checkout';
        $formatter = \Yii::$app->formatter;
        $user_id = Yii::$app->user->id;

        $saveSuccessful = false;
        $cart_items = $this->GetCartItems($user_id);

        $paymentModel = new CUSTOMER_PAYMENTS();
        $model = new CUSTOMER_ORDERS();
        $customer_order_items = new CUSTOMER_ORDER_ITEMS();

        $model->USER_ID = $user_id;
        $model->ADDRESS_ID = 1;
        $model->ORDER_DATE = APP_UTILS::GetCurrentDateTime();
        $model->ORDER_STATUS = ORDER_STATUS_HELPER::STATUS_ORDER_PENDING;
        $model->PAYMENT_METHOD = APP_UTILS::PAYMENT_METHOD_MOBILE;
        $paymentModel->PAYMENT_CHANNEL = APP_UTILS::PAYMENT_METHOD_MOBILE;

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
                    $customer_order_items->NOTES = 'Test Order Here';
                    $customer_order_items->CREATED_AT = APP_UTILS::GetCurrentDateTime();

                    //save the order items as we are deleting
                    if ($customer_order_items->save()) {
                        $saveSuccessful = true;
                        //remove the cart item
                        CART_MODEL::findOne($orderItems->CART_ITEM_ID)->delete();
                    }
                endforeach;
                //Save the payment information
                $paymentModel->PAYMENT_DATE = APP_UTILS::GetCurrentDateTime();
                $paymentModel->PAYMENT_REF = strtoupper(uniqid());
                $paymentModel->PAYMENT_STATUS = ORDER_STATUS_HELPER::STATUS_PAYMENT_PENDING;
                if ($paymentModel->validate() && $paymentModel->save()) {
                    $saveSuccessful = true;
                }
            }
            if ($saveSuccessful) {
                $transaction->commit();
                return $this->redirect(['//customer/default/placed-orders']);
            }
            $transaction->rollback();
            $this->refresh();
        }

        return $this->render('checkout', [
            'formatter' => $formatter,
            'cart_items' => $cart_items,
            'model' => $model,
            'paymentModel' => $paymentModel]);
    }

    private function GetCartItems($user_id)
    {
        return CART_MODEL::find()
            ->where(['USER_ID' => $user_id])
            ->all();
    }
}
