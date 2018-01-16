<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 7/16/2017
 * Time: 8:47 PM
 */

namespace app\api\modules\v1\controllers;

use app\api\modules\v1\models\API_TOKEN_MODEL;
use app\api\modules\v1\models\CUSTOMER_ADDRESS_MODEL;
use Yii;
use yii\rest\ActiveController;


class AddressController extends ActiveController
{
    /**
     * @var object
     */
    public $modelClass = 'app\api\modules\v1\models\CUSTOMER_ADDRESS_MODEL';
    private $_apiToken = 0;
    private $_userID = 0;

    /**
     * @param string $action
     * @param null $model
     * @param array $params
     * @throws \yii\web\ForbiddenHttpException
     */
    public function checkAccess($action, $model = null, $params = [])
    {
        /*$api_token = Yii::$app->request->headers->get("api_token", null);
        $user_id = Yii::$app->request->headers->get("user_id", null);

        if ($api_token == null && $user_id == null) {
            throw new \yii\web\ForbiddenHttpException("You can't $action this section. $api_token");
        }
        //check if the token is valid
        if (!API_TOKEN_MODEL::IsValidToken($api_token, $user_id)) {
            throw new \yii\web\ForbiddenHttpException('Invalid token, access denied');
        }*/
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