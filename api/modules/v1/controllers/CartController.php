<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 7/16/2017
 * Time: 8:47 PM
 */

namespace app\api\modules\v1\controllers;

use app\api\modules\v1\models\MENU_ITEM_MODEL;
use app\api\modules\v1\models\OFFERED_SERVICE_MODEL;
use app\api\modules\v1\models\RESERVED_SERVICE_MODEL;
use app\api\modules\v1\models\SALON_MODEL;
use app\api\modules\v1\models\STAFF_MODEL;
use yii\rest\ActiveController;


class CartController extends ActiveController
{
    /**
     * @var object
     */
    public $modelClass = 'app\api\modules\v1\models\CART_MODEL';

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
    public function checkAccessOld($action, $model = null, $params = [])
    {
        throw new \yii\web\ForbiddenHttpException(sprintf('You can only %s articles that you\'ve created.', $action));

    }

}