<?php
/**
 * Created by PhpStorm.
 * User: barsa
 * Date: 15-Nov-17
 * Time: 15:03
 */

use kartik\growl\Growl;

?>

<?= Growl::widget([
    'type' => $growl_type,
    'title' => $title,
    'icon' => 'glyphicon glyphicon-remove-sign',
    'body' => $message,
    'showSeparator' => true,
    //'delay' => 4500,
    'pluginOptions' => [
        'showProgressbar' => true,
        'placement' => [
            'from' => 'top',
            'align' => 'center',
        ],
        'animate' => [
            'enter' => 'animated fadeInDown',
            'exit' => 'animated fadeOutUp'
        ],
    ]
]); ?>
