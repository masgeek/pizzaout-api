<?php

use yii\helpers\Html;

use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;


$home = \yii\helpers\Url::toRoute(['//site']);

$cartUrl = \yii\helpers\Url::toRoute(['shop/cart-items']);

$session = Yii::$app->session;
$search_url = $session->get('search_url');

NavBar::begin([
	'brandLabel' => 'Pizza Slice',
	'brandUrl' => Yii::$app->homeUrl,
	'options' => [
		//'class' => 'navbar-fixed-top',
		'class' => 'navbar-inverse navbar-fixed-top',
	],
]);
echo Nav::widget([
	'options' => ['class' => 'navbar-nav navbar-right'],
	//'options' => ['class' =>'nav navbar-nav'],
	'items' => [
		[
			'label' => 'Manage Orders',
			//'visible'=>Yii::$app->user->identity->usertype===\app\components\CUSTOM_HELPER::ADMIN_ACCOUNT,
			'items' => [
				['label' => 'Orders', 'url' => ['/orders']],
				'<li class="divider"></li>',
				['label' => 'Kitchen', 'url' => ['/kitchenqueue']],
				'<li class="divider"></li>',
			],
		],
		['label' => 'Manage Services', 'url' => ['/services'], 'visible' => Yii::$app->user->identity->usertype === \app\components\CUSTOM_HELPER::ADMIN_ACCOUNT],
		Yii::$app->user->isGuest ? (
		['label' => 'Login', 'url' => ['/site/login']]
		) : (
			'<li>'
			. Html::beginForm(['/site/logout'], 'post')
			. Html::submitButton(
				'Logout (' . Yii::$app->user->identity->username . ')',
				['class' => 'btn btn-link logout']
			)
			. Html::endForm()
			. '</li>'
		)
	],
]);
NavBar::end();