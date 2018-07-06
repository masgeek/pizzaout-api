<?php
/**
 * Created by PhpStorm.
 * User: SAURON
 * Date: 7/7/2018
 * Time: 12:36 AM
 */

namespace app\components;

use Yii;

class Request extends \yii\web\Request
{
    public $noCsrfRoutes = [];

public function validateCsrfToken($clientSuppliedToken = null)
{
    if ($this->enableCsrfValidation &&in_array(Yii::$app->getUrlManager()->parseRequest($this)[0], $this->noCsrfRoutes)) {
        return true;
    }
    return parent::validateCsrfToken();
}

}