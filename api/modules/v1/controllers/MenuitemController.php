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
     * Checks the privilege of the current user.
     *
     * This method should be overridden to check whether the current user has the privilege
     * to run the specified action against the specified data model.
     * If the user does not have access, a [[ForbiddenHttpException]] should be thrown.
     *
     * @param string $action the ID of the action to be executed
     * @param \yii\base\Model $model the model to be accessed. If `null`, it means no specific model is being accessed.
     * @param array $params additional parameters
     * @throws ForbiddenHttpException if the user does not have access
     * @throws \yii\web\ForbiddenHttpException
     */
    public function checkAccess($action, $model = null, $params = [])
    {

        if ($this->_apiToken == 0 or $this->_userID == 0) {
            $this->_apiToken = Yii::$app->request->headers->get("api_token", null);
            $this->_userID = Yii::$app->request->headers->get("user_id", null);
        }

        if ($this->_apiToken == null or $this->_userID == null) {
            throw new \yii\web\ForbiddenHttpException("You can't $action this section. {$this->_apiToken} {$this->_userID} ");
        }
        //check if the token is valid
        if (!API_TOKEN_MODEL::IsValidToken($this->_apiToken, $this->_userID)) {
            throw new \yii\web\ForbiddenHttpException('Invalid token, access denied');
        }
    }


    /**
     * @param $menu_cat_id
     * @return \app\api\modules\v1\models\CART_MODEL[]|\app\api\modules\v1\models\MENU_CAT_MODEL[]|MENU_ITEM_MODEL[]|array|\yii\db\ActiveRecord[]
     * @throws ForbiddenHttpException
     * @throws \yii\web\ForbiddenHttpException
     */
    public function actionCatItem($menu_cat_id)
    {
        $this->checkAccess('cat-item');
        return MENU_ITEM_MODEL::find()
            ->where(['MENU_CAT_ID' => $menu_cat_id])
            ->orderBy(['MENU_ITEM_NAME' => SORT_ASC])
            ->all();
    }

    /**
     * @return \app\api\modules\v1\models\CART_MODEL[]|\app\api\modules\v1\models\MENU_CAT_MODEL[]|MENU_ITEM_MODEL[]|array|\yii\db\ActiveRecord[]
     * @throws ForbiddenHttpException
     * @throws \yii\web\ForbiddenHttpException
     */
    public function actionSingleCat()
    {
        $this->_apiToken = Yii::$app->request->headers->get("api_token", null);
        $this->_userID = Yii::$app->request->headers->get("user_id", null);

        $this->checkAccess('single-cat');
        return MENU_ITEM_MODEL::find()
            ->orderBy(['MENU_ITEM_NAME' => SORT_ASC])
            ->all();

    }
}