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
                            <i class="fa fa-money" aria-hidden="true"></i>
                            <span>Emails &amp; SMS</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <?= Html::a('<i class="fa fa-line-chart" aria-hidden="true"></i><span>View Queue</span>', ['//marketing/queue'], ['title' => 'Message Queue']); ?>
                            </li>
                            <li>
                                <?= Html::a('<i class="fa fa-envelope-o" aria-hidden="true"></i><span>Send Emails &amp; SMS</span>', ['//marketing'], ['title' => 'Marketing Emails & SMS']); ?>
                            </li>
                        </ul>
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
                    <li class="nav-parent">
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
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-line-chart" aria-hidden="true"></i>
                            <span>Reports</span>
                        </a>
                        <ul class="nav nav-children">
                            <li><?= Html::a('General & Sales Reports', ['//reports/report/general-reports'], []); ?></li>
                            <li><?= Html::a('Sales Reports', ['//reports/report/sales-reports'], ['class'=>'hidden']); ?></li>
                            <li><?= Html::a('Chef Reports', ['//reports/report/chef-reports'], []); ?></li>
                            <li><?= Html::a('Rider Reports', ['//reports/report/rider-reports'], []); ?></li>
                            <li><?= Html::a('District Reports', ['//reports/report/district-reports'], []); ?></li>
                            <li><?= Html::a('Pizza Reports', ['//reports/report/pizza-reports'], []); ?></li>
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-wrench" aria-hidden="true"></i>
                            <span>Setup</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <?= Html::a('Menu Categories', ['//menucategory'], ['title' => 'Menu Categories']); ?>
                            </li>
                            <li>
                                <?= Html::a('Manage Sizes', ['//size'], ['title' => 'Sizes']); ?>
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
                                <?= Html::a('Manage Kitchen', ['//kitchen'], ['title' => 'Kitchens']); ?>
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
                            <li>
                                <?= Html::a('Manage Locations', ['//location'], ['title' => 'Locations']); ?>
                            </li>
                            <li>
                                <?= Html::a('Manage Cities', ['//city'], ['title' => 'Cities']); ?>
                            </li>
                            <li>
                                <?= Html::a('Manage Countries', ['//country'], ['title' => 'Countries']); ?>
                            </li>
                            <li>
                                <?= Html::a('Manage Status', ['//status'], ['title' => 'Status']); ?>
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