<?php

use yii\helpers\Html;

?>
<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title">
            Navigation
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html"
             data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li>
                        <?= Html::a('<i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span>', ['//'], ['title' => 'Dashboard']); ?>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                            <span>Sales</span>
                        </a>
                        <ul class="nav nav-children">
                            <li><?= Html::a('Orders', ['//orders/index'], ['title' => 'View Orders']); ?></li>
                        </ul>
                    </li>
                    <li class="nav-parent nav-expanded nav-active">
                        <a>
                            <i class="fa fa-cutlery" aria-hidden="true"></i>
                            <span>Kitchen</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <?= Html::a('Kitchen', ['//kitchenqueue'], ['title' => 'Items in kitchen ']); ?>
                            </li>
                            <li>
                                <?= Html::a('Kitchen Display Queue', ['//kitchenqueue/display'], ['title' => 'Kitchen display queue']); ?>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent nav-expanded nav-active">
                        <a>
                            <i class="fa fa-wrench" aria-hidden="true"></i>
                            <span>Setup</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <?= Html::a('Menu Categories', ['//menucategory'], ['title' => 'Menu Categories']); ?>
                            </li>
                            <li>
                                <?= Html::a('Menu Items', ['//menuitem'], ['title' => 'Menu Items']); ?>
                            </li>
                            <li>
                                <?= Html::a('Menu Item Types', ['//menuitemtype'], ['title' => 'Menu Item Type']); ?>
                            </li>
                            <li>
                                <?= Html::a('Manage Orders Status', ['//status'], ['title' => 'Status Setup']); ?>
                            </li>
                            <li>
                                <?= Html::a('Manage Chefs', ['//chef'], ['title' => 'Chefs']); ?>
                            </li>
                            <li>
                                <?= Html::a('Manage Users', ['//user'], ['title' => 'Users']); ?>
                            </li>
                            <li>
                                <?= Html::a('Manage Riders', ['//rider'], ['title' => 'Riders']); ?>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>

    </div>

</aside>

<script>
    //set acrtive navigation
    /*$(".nav li").on("click", function () {
        $(".nav li").removeClass("active nav-expanded nav-active");
        $(this).addClass("active nav-expanded nav-active");

    });*/

    /*
		var path = window.location.pathname;
		path = path.replace(/\/$/, "");
		path = decodeURIComponent(path);

		$(".nav a").each(function () {
			var href = $(this).attr('href');

			if (path.substring(0, href.length) === href) {
				$(this).closest('nav li').addClass('nav-expanded nav-active');
				console.log(href);
			}
		});
	*/
</script>