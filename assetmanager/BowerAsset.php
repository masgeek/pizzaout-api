<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assetmanager;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class BowerAsset extends AssetBundle
{

    public $sourcePath = '@bower';
    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );
    public $css = [
        'nanoscroller/bin/nanoscroller/css/nanoscroller.css',
        'magnific-popup/dist/magnific-popup.css',
        //'animate.css/animate.min.css',
        //'tingle/dist/tingle.min.css'
    ];
    public $publishOptions = [
        //'forceCopy'=>true,
    ];
    public $js = [
        'modernizer/modernizr.js',
        'magnific-popup/dist/jquery.magnific-popup.js',
        'nanoscroller/bin/nanoscroller/javascripts/jquery.nanoscroller.js'
        //'jquery-mobile/js/jquery.mobile.js'
        //'timer.jquery/dist/timer.jquery.js'
        //'countdown360/dist/jquery.countdown360.js'
        //'velocity/velocity.min.js',
        //'velocity/velocity.ui.js',
        //'//cdnjs.cloudflare.com/ajax/libs/numeral.js/1.4.5/numeral.min.js',
        //'tingle/dist/tingle.js',
        //'numeral/min/numeral.min.js'
    ];

    /*
     * <script src="assets2/vendor/flot/jquery.flot.js"></script>
<script src="assets2/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
<script src="assets2/vendor/flot/jquery.flot.pie.js"></script>
<script src="assets2/vendor/flot/jquery.flot.categories.js"></script>
<script src="assets2/vendor/flot/jquery.flot.resize.js"></script>
     */
    public $depends = [
        'yii\web\JqueryAsset',
    ];

}
