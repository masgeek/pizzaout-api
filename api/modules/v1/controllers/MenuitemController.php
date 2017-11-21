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


class MenuitemController extends ActiveController
{
    /**
     * @var object
     */
    public $modelClass = 'app\api\modules\v1\models\MENU_ITEM_MODEL';

    public function actions()
    {
        $actions = parent::actions();
        //unset($actions['update']);
        //unset($actions['index']);
        return $actions;
    }


    public function actionCatItem($menu_cat_id)
    {
        return MENU_ITEM_MODEL::find()
            //->where(['MENU_CAT_ID' => 1])
            ->orderBy(['MENU_ITEM_NAME' => SORT_ASC])
            ->all();
    }
}