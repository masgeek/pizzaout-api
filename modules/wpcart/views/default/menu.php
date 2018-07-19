<?php

use kartik\tabs\TabsX;

$this->registerCssFile("@web/css/wpcart/css/menu-animation.css", [
    //'depends' => [\yii\bootstrap\BootstrapAsset::className()],
    //'media' => 'print',
], 'menu-animation');
?>
<hr/>
<div class="row">
    <?= \yii\helpers\Html::a('My Cart <span class="badge" id="cart_count">' . $cart_count . '</span>', ['default/my-cart'], [
        'class' => 'btn btn-primary btn-block btn-lg',
        'id' => 'cart_button'
    ]) ?>
</div>
<br/>
<div class="row">
    <?= TabsX::widget([
        'position' => TabsX::POS_ABOVE,
        'align' => TabsX::ALIGN_LEFT,
        'items' => [
            [
                'label' => 'Pizza',
                'content' => $this->render('menu-view', [
                    'dataProvider' => $pizzaDataProvider
                ]),
                'active' => true
            ],
            [
                'label' => 'Drinks',
                'content' => $this->render('menu-view', [
                    'dataProvider' => $drinksDataProvider
                ]),
                //'headerOptions' => ['style' => 'font-weight:bold'],
                //'options' => ['id' => 'myveryownID'],
            ],
        ],
    ]);
    ?>
</div>
