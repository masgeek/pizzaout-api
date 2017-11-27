<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 7/16/2017
 * Time: 8:47 PM
 */

namespace app\api\modules\v1\controllers;

use app\api\modules\v1\models\MENU_CAT_MODEL;
use app\api\modules\v1\models\OFFERED_SERVICE_MODEL;
use app\api\modules\v1\models\RESERVED_SERVICE_MODEL;
use app\api\modules\v1\models\SALON_MODEL;
use app\api\modules\v1\models\STAFF_MODEL;
use yii\rest\ActiveController;


class MenucategoryController extends ActiveController
{
    /**
     * @var object
     */
    public $modelClass = 'app\api\modules\v1\models\MENU_CAT_MODEL';

    public function actions()
    {
        $actions = parent::actions();
        //unset($actions['update']);
        unset($actions['index']);
        return $actions;
    }


    /**
     * Return only the active categories
     * @return array|\yii\db\ActiveRecord[]
     */
    public function actionIndex()
    {
        return MENU_CAT_MODEL::find()
            //->where(['ACTIVE' => 1])
            ->orderBy(['RANK' => SORT_ASC])
            ->all();
    }
}