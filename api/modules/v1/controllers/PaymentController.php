<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 7/16/2017
 * Time: 8:47 PM
 */

namespace app\api\modules\v1\controllers;




use app\api\modules\v1\models\ALL_SALON_PAYMENTS;
use app\api\modules\v1\models\PAYMENT_MODEL;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Expression;
use yii\rest\ActiveController;

use yii\web\BadRequestHttpException;

use app\api\modules\v1\models\RECEIPTS_MODEL;
use app\api\modules\v1\models\RESERVATION_MODEL;

use app\api\modules\v1\models\SERVICE_PAYMENTS;


class PaymentController extends ActiveController
{
	/**
	 * @var object
	 */
	public $modelClass = 'app\api\modules\v1\models\PAYMENT_MODEL';

	public function actionToken($client_id){
	    return 4;
    }
}