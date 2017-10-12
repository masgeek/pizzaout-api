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
class MerchantBowerAsset extends AssetBundle
{
    public $sourcePath = '@bower';

    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );

    public $css = [
        //'animate.css/animate.min.css',
        //'tingle/dist/tingle.min.css'
        'simple-line-icons/css/simple-line-icons.css',
        'bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css',
        'morris.js/morris.css',
        'jqvmap/dist/jqvmap.min.css',
        'fullcalendar/dist/fullcalendar.min.css',
    ];

    public $js = [
        //'timer.jquery/dist/timer.jquery.js'
        //'countdown360/dist/jquery.countdown360.js'
        //'velocity/velocity.js',
        //'velocity/velocity.ui.js',
        //'//cdnjs.cloudflare.com/ajax/libs/numeral.js/1.4.5/numeral.min.js',
        //'tingle/dist/tingle.min.js'
        'bootstrap-switch/dist/js/bootstrap-switch.min.js',
        'morris.js/morris.min.js',
        'raphael/raphael.min.js',
        'blockUI/jquery.blockUI.js',
        'cookie/cookie.min.js',
        'waypoints/lib/jquery.waypoints.min.js',
        'counterup/jquery.counterup.min.js',

        //chart js
        'amcharts/dist/amcharts/amcharts.js',
        'amcharts/dist/amcharts/serial.js',
        'amcharts/dist/amcharts/pie.js',
        'amcharts/dist/amcharts/radar.js',
        'amcharts/dist/amcharts/themes/light.js',
        //'amcharts/dist/amcharts/themes/pattern.js',
        //'amcharts/dist/amcharts/themes/chalk.js',


        'ammap/dist/ammap/ammap.js',
        'ammap/dist/ammap/maps/js/worldLow.js',
        'amcharts-stock/dist/amcharts/amstock.js',
        'horizontal-timeline/js/main.js',

        'Flot/jquery.flot.js',
        'Flot/jquery.flot.resize.js',
        'Flot/jquery.flot.categories.js',
        'Flot/jquery.flot.js',

        'jqvmap/dist/jquery.vmap.min.js',
        'jqvmap/dist/maps/jquery.vmap.russia.js',
        'jqvmap/dist/maps/jquery.vmap.europe.js',
        'jqvmap/dist/maps/jquery.vmap.germany.js',
        'jqvmap/dist/maps/jquery.vmap.usa.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
/*

<script src="../assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>

<script src="../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
*/