<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 7/16/2017
 * Time: 8:47 PM
 */

namespace app\api\modules\v1\controllers;

use app\api\modules\v1\models\API_TOKEN_MODEL;
use app\api\modules\v1\models\MENU_ITEM_MODEL;
use app\api\modules\v1\models\OFFERED_SERVICE_MODEL;
use app\api\modules\v1\models\RESERVED_SERVICE_MODEL;
use app\api\modules\v1\models\SALON_MODEL;
use app\api\modules\v1\models\STAFF_MODEL;
use Yii;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;

class MenuitemController extends ActiveController
{
    /**
     * @var object
     */
    public $modelClass = 'app\api\modules\v1\models\MENU_ITEM_MODEL';

    private $_apiToken = 0;
    private $_userID = 0;


    public function actions()
    {
        $actions = parent::actions();
        //unset($actions['update']);
        //unset($actions['index']);
        return $actions;
    }


    /**
     * @param string $action
     * @param null $model
     * @param array $params
     */
    public function checkAccess($action, $model = null, $params = [])
    {
/*
        if ($this->_apiToken == 0 or $this->_userID == 0) {
            $this->_apiToken = Yii::$app->request->headers->get("api-token", null);
            $this->_userID = Yii::$app->request->headers->get("user-id", null);
        }

        if ($this->_apiToken == null or $this->_userID == null) {
            throw new ForbiddenHttpException("You can't $action this section. {$this->_apiToken} {$this->_userID} ");
        }
        //check if the token is valid
        if (!API_TOKEN_MODEL::IsValidToken($this->_apiToken, $this->_userID)) {
            throw new ForbiddenHttpException('Invalid token, access denied');
        }*/
    }


    /**
     * @param $menu_cat_id
     * @return MENU_ITEM_MODEL[]|array|\yii\db\ActiveRecord[]
     */
    public function actionCatItem($menu_cat_id)
    {
        //$this->_apiToken = Yii::$app->request->headers->get("api-token", null);
        //$this->_userID = Yii::$app->request->headers->get("user-id", null);
        $this->checkAccess('cat-item');
        return MENU_ITEM_MODEL::find()
            ->where(['MENU_CAT_ID' => $menu_cat_id])
            ->orderBy(['MENU_ITEM_NAME' => SORT_ASC])
            ->all();
    }

    /**
     * @return MENU_ITEM_MODEL[]|array|\yii\db\ActiveRecord[]
     * @throws ForbiddenHttpException
     */
    public function actionSingleCat()
    {
        //$this->_apiToken = Yii::$app->request->headers->get("api-token", null);
        //$this->_userID = Yii::$app->request->headers->get("user-id", null);
        $this->checkAccess('single-cat');
        return MENU_ITEM_MODEL::find()
            ->orderBy(['MENU_ITEM_NAME' => SORT_ASC])
            ->all();

    }
}