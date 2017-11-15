<?php
/**
 * Created by PhpStorm.
 * User: barsa
 * Date: 15-Nov-17
 * Time: 15:03
 */

use kartik\growl\Growl;

$session = Yii::$app->session;
$message = ($session->getFlash('CARD'));
?>

<?= Growl::widget([
    'type' => Growl::TYPE_DANGER,
    'title' => 'Oh snap!',
    'icon' => 'glyphicon glyphicon-remove-sign',
    'body' => $message,
    'showSeparator' => true,
    //'delay' => 4500,
    'pluginOptions' => [
        'showProgressbar' => true,
        'placement' => [
            'from' => 'bottom',
            'align' => 'left',
        ],
        'animate' => [
            'enter' => 'animated fadeInDown',
            'exit' => 'animated fadeOutUp'
        ],
    ]
]); ?>
