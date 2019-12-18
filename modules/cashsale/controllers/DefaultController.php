<?php

namespace app\modules\cashsale\controllers;

use app\api\modules\v1\models\LOCATION_MODEL;
use app\helpers\APP_UTILS;
use app\helpers\ORDER_HELPER;
use app\model_extended\CART_MODEL;
use app\model_extended\CUSTOMER_ORDER_ITEMS;
use app\model_extended\CUSTOMER_ORDERS;
use app\model_extended\CUSTOMER_PAYMENTS;
use app\model_extended\MENU_ITEMS;
use app\models\CustomerOrderItem;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

/**
 * Default controller for the `cash-sale` module
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
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ]
            ],
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $user_id = Yii::$app->user->id; //use the currently logged in user
        $this->view->title = 'Orders';

        $this->view->params['title'] = 'Cash sale orders';
        $this->view->params['checkout_url'] = 'place-order';
        $this->view->params['class'] = 'btn-primary btn-md btn-block';

        //get the list of orders
        $this->view->params['cart_items'] = ORDER_HELPER::GetCartItems($user_id);


        //lets get the list of pizzas on offer
        $menu_item = new ActiveDataProvider([
            'query' => MENU_ITEMS::find()->orderBy(['MENU_CAT_ID' => SORT_ASC]),
        ]);

        return $this->render('view', [
            'dataProvider' => $menu_item,
        ]);
    }

    public function actionAdd()
    {
        $user_id = Yii::$app->user->id;
        $item_type_id = Yii::$app->request->post('ITEM_TYPE_ID', null);
        //lets query the carts table first we see if there is an already existing order
        $cartModel = CART_MODEL::find()
            ->where(['ITEM_TYPE_ID' => $item_type_id])
            ->andWhere(['USER_ID' => $user_id])
            ->one();


        if ($cartModel != null) {
            //update the item count
            $cartModel->QUANTITY = (int)$cartModel->QUANTITY + 1;
            if ($cartModel->save()) {
                return $this->redirect(['index']);
            }
        } else {
            $cartModel = new CART_MODEL();
            $cartModel->USER_ID = $user_id;
            //$cartModel->ITEM_TYPE_SIZE =
            $post = ['CART_MODEL' => Yii::$app->request->post()];
            if ($cartModel->load($post) && $cartModel->validate()) {
                //now we save and go back to the menu
                if ($cartModel->save()) {
                    return $this->redirect(['index']);
                }
            }

        }
        return $this->redirect(['index']);
    }

    /**
     * @return string|Response
     * @throws Exception
     */
    public function actionPlaceOrder()
    {
        $connection = Yii::$app->db;
        $this->layout = 'customer_layout_no_cart';
        $this->view->title = 'Cash sale checkout';
        $formatter = Yii::$app->formatter;
        $user_id = Yii::$app->user->id;
        $order_created = false;
        $saveSuccessful = false;
        $cart_timestamp = 0;
        $cart_items = ORDER_HELPER::GetCartItems($user_id);

        $paymentModel = new CUSTOMER_PAYMENTS();
        $model = new CUSTOMER_ORDERS();
        $model->PAYMENT_METHOD = APP_UTILS::PAYMENT_METHOD_CASH;
        $customer_order_items = new CUSTOMER_ORDER_ITEMS();

        $model->USER_ID = $user_id;
        $model->ORDER_STATUS = ORDER_HELPER::STATUS_ORDER_PENDING;

        if ($model->load(Yii::$app->request->post())) {

            $transaction = $connection->beginTransaction();
            if ($model->save()) {
                foreach ($cart_items as $key => $orderItems):
                    $customer_order_items->isNewRecord = true;
                    $customer_order_items->ORDER_ITEM_ID = null;
                    $customer_order_items->ORDER_ID = $model->ORDER_ID;
                    $customer_order_items->ITEM_TYPE_ID = $orderItems->ITEM_TYPE_ID;
                    $customer_order_items->QUANTITY = $orderItems->QUANTITY;
                    $customer_order_items->PRICE = (int)$orderItems->ITEM_PRICE;
                    $customer_order_items->SUBTOTAL = (int)$orderItems->ITEM_PRICE * (float)$orderItems->QUANTITY;
                    $customer_order_items->OPTIONS = 'NA';
                    $customer_order_items->NOTES = $model->NOTES;
                    $customer_order_items->CREATED_AT = APP_UTILS::GetCurrentDateTime();
                    $customer_order_items->UPDATED_AT = APP_UTILS::GetCurrentDateTime();

                    if ($customer_order_items->validate() && $customer_order_items->save()) {
//                        $order_created = true;
                        $saveSuccessful = true;
                    }
                endforeach;
//                if ($order_created) {
//                    CART_MODEL::ClearCart($cart_timestamp);
//                    $paymentModel->ORDER_ID = $model->ORDER_ID;
//                    $paymentModel->PAYMENT_DATE = APP_UTILS::GetCurrentDateTime();
//                    $paymentModel->PAYMENT_REF = strtoupper(uniqid());
//                    $paymentModel->PAYMENT_STATUS = ORDER_HELPER::STATUS_ORDER_PENDING;
//                    $paymentModel->PAYMENT_CHANNEL = $model->PAYMENT_METHOD;
//                    if ($paymentModel->validate() && $paymentModel->save()) {
//                        $saveSuccessful = true;
//                    }
//                }
            }
            if ($saveSuccessful) {
                $transaction->commit();
                Yii::$app->session->setFlash('success', 'Your order has been placed successfully');
                return $this->redirect(['///orders']);
//                return $this->redirect(['///orders/print', 'id' => $model->ORDER_ID]);
            }
            $transaction->rollback();
            Yii::$app->session->setFlash('error', 'Order not placed successfully');
            $this->refresh();
        }

        return $this->render('place-order', [
            'formatter' => $formatter,
            'cart_items' => $cart_items,
            'model' => $model]);
    }

    public function actionCheckout()
    {
        $connection = Yii::$app->db;
        $this->layout = 'customer_layout_no_cart';
        $this->view->title = 'Cash sale checkout';
        $formatter = Yii::$app->formatter;
        $user_id = Yii::$app->user->id;
        $order_created = false;
        $saveSuccessful = false;
        $cart_timestamp = 0;
        $cart_items = ORDER_HELPER::GetCartItems($user_id);

        $paymentModel = new CUSTOMER_PAYMENTS();
        $model = new CUSTOMER_ORDERS();
        $model->PAYMENT_METHOD = APP_UTILS::PAYMENT_METHOD_CASH;
        $customer_order_items = new CUSTOMER_ORDER_ITEMS();

        $location = LOCATION_MODEL::find()->one();

        $model->USER_ID = $user_id;
        $model->LOCATION_ID = $location->LOCATION_ID;
        $model->ORDER_DATE = APP_UTILS::GetCurrentDateTime();
        $model->ORDER_STATUS = ORDER_HELPER::STATUS_CHEF_ASSIGNED;

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
                    $customer_order_items->OPTIONS = 'NA';
                    $customer_order_items->NOTES = $model->NOTES;
                    $cart_timestamp = $orderItems->CART_TIMESTAMP;
                    $customer_order_items->CREATED_AT = APP_UTILS::GetCurrentDateTime();
                    $customer_order_items->UPDATED_AT = APP_UTILS::GetCurrentDateTime();

                    if ($customer_order_items->validate() && $customer_order_items->save()) {
                        $order_created = true;
                    }
                endforeach;
                //Save the payment information
                if ($order_created) {
                    CART_MODEL::ClearCart($cart_timestamp);
                    $paymentModel->ORDER_ID = $model->ORDER_ID;
                    $paymentModel->PAYMENT_DATE = APP_UTILS::GetCurrentDateTime();
                    $paymentModel->PAYMENT_REF = strtoupper(uniqid());
                    $paymentModel->PAYMENT_STATUS = ORDER_HELPER::STATUS_PAYMENT_CONFIRMED;
                    $paymentModel->PAYMENT_CHANNEL = $model->PAYMENT_METHOD;
                    if ($paymentModel->validate() && $paymentModel->save()) {
                        $saveSuccessful = true;
                    }
                }
            }
            if ($saveSuccessful) {
                $transaction->commit();
                return $this->redirect(['///orders/print', 'id' => $model->ORDER_ID]);
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

    public function actionComputeSale()
    {

        $amountDue = (float)Yii::$app->request->post('amountDue', 0);
        $amountReceived = (float)Yii::$app->request->post('amountReceived', 0);

        $change = Yii::$app->formatter->asDecimal($amountReceived - $amountDue, 2);

        $resp = [
            'change' => $change,
            'proceed' => $change >= 0
        ];
        return json_encode($resp);
    }
}
