<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 10/28/2017
 * Time: 3:33 PM
 */

namespace app\assetmanager;


use yii\web\AssetBundle;

class OmniThemeAssets extends AssetBundle
{
    //public $basePath = '@webroot/themes/omnifood/assets';
    //public $baseUrl = '@webroot/themes/omnifood/assets';
    public $sourcePath = '@omnifood';
    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );
    public $css = [
        'css/normalize.css',
        'css/grid.css',
        'css/ionicons.min.css',
        'css/style.css',
    ];
    public $publishOptions = [
        'forceCopy' => true,
    ];

    public $js = [

    ];

    public $depends = [
        //'yii\web\JqueryAsset',
        'app\assetmanager\FontAssets',
    ];
}