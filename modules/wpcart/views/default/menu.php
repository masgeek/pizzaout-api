<?php

use kartik\tabs\TabsX;

$this->registerCssFile("@web/css/wpcart/css/menu-animation.css", [
    //'depends' => [\yii\bootstrap\BootstrapAsset::className()],
    //'media' => 'print',
], 'menu-animation');
?>



<?= TabsX::widget([
    'position' => TabsX::POS_ABOVE,
    'align' => TabsX::ALIGN_LEFT,
    'items' => [
        [
            'label' => 'Pizza',
            'content' => $this->render('menu-view', [
                'dataProvider' => $dataProvider
            ]),
            'active' => true
        ],
        /*[
            'label' => 'Drinks',
            'content' => $this->render('_menu-view'),
            'headerOptions' => ['style' => 'font-weight:bold'],
            'options' => ['id' => 'myveryownID'],
        ],*/
    ],
]);
?>