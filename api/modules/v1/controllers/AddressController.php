<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 7/16/2017
 * Time: 8:47 PM
 */

namespace app\api\modules\v1\controllers;

use app\api\modules\v1\models\ACCOUNT_TYPE_MODEL;
use app\api\modules\v1\models\CUSTOMER_ADDRESS_MODEL;
use app\api\modules\v1\models\SERVICE_MODEL;
use app\api\modules\v1\models\USER_MODEL;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Expression;
use yii\filters\AccessControl;
use yii\rest\ActiveController;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\rest\Controller;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class AddressController extends ActiveController
{
    /**
     * @var object
     */
    public $modelClass = 'app\api\modules\v1\models\CUSTOMER_ADDRESS_MODEL';

    /**
     * @return array
     */
    public function actions()
    {
        $actions = parent::actions();
        //unset($actions['create']);
        //unset($actions['update']);
        return $actions;
    }

    public function actionMyAddress($user_id)
    {
        //get all the address of the user
        $address = CUSTOMER_ADDRESS_MODEL::find()
            ->where(["USER_ID" => $user_id])
            ->all();

        return $address;
    }
}