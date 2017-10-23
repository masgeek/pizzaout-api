<?php
/**
 * Created by PhpStorm.
 * User: barsa
 * Date: 23-Oct-17
 * Time: 15:02
 */

namespace app\assetmanager;


use yii\web\AssetBundle;

class CustomAssets extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );

    public $js = [
        'js/liquid-meter/liquid.meter.js'
    ];
}