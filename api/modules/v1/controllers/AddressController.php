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
        //private $_apiToken = 0;
        //private $_userID = 0;
        if ($this->_apiToken == 0 or $this->_userID == 0) {
            $this->_apiToken = Yii::$app->request->headers->get("api-token", null);
            $this->_userID = Yii::$app->request->headers->get("user-id", null);
        }

        if ($this->_apiToken == null or $this->_userID == null) {
            throw new \yii\web\ForbiddenHttpException("You can't $action this section. {$this->_apiToken} {$this->_userID} ");
        }
        //check if the token is valid
        if (!API_TOKEN_MODEL::IsValidToken($this->_apiToken, $this->_userID)) {
            throw new \yii\web\ForbiddenHttpException('Invalid token, access denied');
        }
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