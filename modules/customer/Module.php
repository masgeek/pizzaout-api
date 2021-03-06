<?php

namespace app\modules\customer;

/**
 * customer module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\customer\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
        //set custom theme for the customer module
        //$this->layoutPath = \Yii::getAlias('@app/themes/omnifood/layouts/');
        $this->layoutPath = \Yii::getAlias('@app/themes/porto_theme/layouts/');
        $this->layout = 'customer_layout';
    }

}
