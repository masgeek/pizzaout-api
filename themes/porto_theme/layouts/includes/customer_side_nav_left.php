<?php

use yii\helpers\Html;

?>
<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title">
            Customer Dashboard
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
                        <?= Html::a('<i class="fa fa-clipboard" aria-hidden="true"></i><span>Menu</span>', ['//customer'], ['title' => 'Menu']); ?>
                    </li>
                    <li class="nav-parent nav-expanded nav-active">
                        <a>
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                            <span>Orders</span>
                        </a>
                        <ul class="nav nav-children">
                            <li><?= Html::a('Pending Orders', ['//customer/orders/pending'], ['title' => 'Placed Orders']); ?></li>
                            <li><?= Html::a('Confirmed Orders', ['//customer/orders/confirmed'], ['title' => 'Confirmed Orders']); ?></li>
                            <li><?= Html::a('Closed Orders', ['//customer/orders/closed'], ['title' => 'Closed Orders']); ?></li>
                            <li><?= Html::a('Cancelled Orders', ['//customer/orders/cancelled'], ['title' => 'Cancelled Orders']); ?></li>
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