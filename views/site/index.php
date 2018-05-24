<?php
/*if (date_default_timezone_get()) {
    echo 'date_default_timezone_set: ' . date_default_timezone_get() . '<br />';
}

if (ini_get('date.timezone')) {
    echo 'date.timezone: ' . ini_get('date.timezone');
}

die;*/
/* @var $this yii\web\View */

use yii\helpers\Html;

$pizza1 = \app\helpers\APP_UTILS::BuildImageUrl("pizza1.jpg", false, "images/foodimages");
$pizza2 = \app\helpers\APP_UTILS::BuildImageUrl("pizza2.jpg", false, "images/foodimages");
$pizza3 = \app\helpers\APP_UTILS::BuildImageUrl("pizza3.jpg", false, "images/foodimages");
$pizza4 = \app\helpers\APP_UTILS::BuildImageUrl("pizza4.jpg", false, "images/foodimages");

$drink1 = \app\helpers\APP_UTILS::BuildImageUrl("sprite.png", false, "images/foodimages");
$drink2 = \app\helpers\APP_UTILS::BuildImageUrl("fanta.png", false, "images/foodimages");
$drink3 = \app\helpers\APP_UTILS::BuildImageUrl("coke.png", false, "images/foodimages");
$drink4 = \app\helpers\APP_UTILS::BuildImageUrl("drinks2.png", false, "images/foodimages");
?>
<section class="section-meals">
    <ul class="meals-showcase clearfix">
        <li>
            <figure class="meal-photo"><?= Html::img($pizza1, ['alt' => 'Pizza Out']); ?></figure>
        </li>
        <li>
            <figure class="meal-photo"><?= Html::img($pizza2, ['alt' => 'Pizza Out']); ?></figure>
        </li>
        <li>
            <figure class="meal-photo"><?= Html::img($pizza3, ['alt' => 'Pizza Out']); ?></figure>
        </li>
        <li>
            <figure class="meal-photo"><?= Html::img($pizza4, ['alt' => 'Pizza Out']); ?></figure>
        </li>
    </ul>

    <ul class="meals-showcase clearfix">
        <li>
            <figure class="meal-photo"><?= Html::img($drink1, ['alt' => 'Pizza Out']); ?></figure>
        </li>
        <li>
            <figure class="meal-photo"><?= Html::img($drink2, ['alt' => 'Pizza Out']); ?></figure>
        </li>
        <li>
            <figure class="meal-photo"><?= Html::img($drink3, ['alt' => 'Pizza Out']); ?></figure>
        </li>
        <li>
            <figure class="meal-photo"><?= Html::img($drink4, ['alt' => 'Pizza Out']); ?></figure>
        </li>
    </ul>
</section>

<section class="section-features">
    <div class="row">
        <h2>Get food fast</h2>
        <p class="long-copy">
            Hello,we're PizzaOut, your new premium food delivery service. We know you're always busy. No time for
            cooking. So let us take care of that, we're really good at it, we promise!
        </p>
    </div>
    <div class="row">
        <div class="col span-1-of-4 box">
            <i class="ion-ios-infinite-outline icon-big"></i>
            <h3>Up to 365 days/year</h3>
            <p>Never cook again! We really mean that.</p>
        </div>
        <div class="col span-1-of-4 box">
            <i class="ion-ios-stopwatch-outline icon-big"></i>
            <h3>Ready in 60 minutes</h3>
            <p>You're only sixty minutes away from your delicious meals delivered right to your home.
                We work with the best chefs in each town to ensure that you're 100% happy.</p>
        </div>
        <div class="col span-1-of-4 box">
            <i class="ion-ios-nutrition-outline icon-big"></i>
            <h3>100% organic</h3>
            <p>All our ingredients are fresh, organic and local. Good for your health, the environment, and it also
                tastes better.</p>
        </div>
        <div class="col span-1-of-4 box">
            <i class="ion-ios-cart-outline icon-big"></i>
            <h3>Order anything</h3>
            <p>We don't limit your creativity, which means you can order whatever you feel like. You can also choose
                from our menu containing over 10 delicious pizzas. It's up to you.</p>
        </div>
    </div>
</section>


<section class="section-steps">
    <div class="row">
        <h2>How it works &mdash; Simple as 1, 2, 3</h2>
    </div>
    <div class="row">
        <div class="col span-1-of-2 steps-box">
            <!--<?= Html::img('@omnifood/img/app-iPhone.png', ['alt' => 'Pizza Out', 'class' => 'app-screen']); ?>-->
        </div>
        <div class="col span-1-of-2 steps-box">
            <div class="works-step">
                <div>1</div>
                <p>Create an account.</p>
            </div>
            <div class="works-step">
                <div>2</div>
                <p>Order your delicious Pizza using our mobile app or website.</p>
            </div>
            <div class="works-step">
                <div>3</div>
                <p>Enjoy your meal after less than 60 minutes. See you the next time!</p>
            </div>

            <a href="https://goo.gl/2F34Uj" class="btn-app" target="_blank">
                <?= Html::img('@omnifood/img/download-app.svg', ['alt' => 'Pizza Out IOS']); ?>
            </a>
            <a href="https://goo.gl/8vAwpM" target="_blank" class="btn-app">
                <?= Html::img('@omnifood/img/download-app-android.png', ['alt' => 'Pizza Out Android']); ?>
            </a>
        </div>
    </div>
</section>

<!--
<section class="section-cities">
    <div class="row">
        <h2>We're currently in these cities</h2>
    </div>
    <div class="row">
        <div class="col span-1-of-4 box">
            <img src="./assets/img/lisbon-3.jpg" alt="Lisbon">
            <h3>Lisbon</h3>
            <div class="city-feature">
                <i class="ion-ios-person icon-small"></i>
                1600+ happy eaters
            </div>
            <div class="city-feature">
                <i class="ion-ios-star icon-small"></i>
                60+ top chefs
            </div>
            <div class="city-feature">
                <i class="ion-social-twitter icon-small"></i>
                <a href="#">@omnifood_lx</a>
            </div>
        </div>
        <div class="col span-1-of-4 box">
            <img src="./assets/img/san-francisco.jpg" alt="San Francisco">
            <h3>San Francisco</h3>
            <div class="city-feature">
                <i class="ion-ios-person icon-small"></i>
                3700+ happy eaters
            </div>
            <div class="city-feature">
                <i class="ion-ios-star icon-small"></i>
                160+ top chefs
            </div>
            <div class="city-feature">
                <i class="ion-social-twitter icon-small"></i>
                <a href="#">@omnifood_sf</a>
            </div>
        </div>
        <div class="col span-1-of-4 box">
            <img src="./assets/img/berlin.jpg" alt="Berlin">
            <h3>Berlin</h3>
            <div class="city-feature">
                <i class="ion-ios-person icon-small"></i>
                2300+ happy eaters
            </div>
            <div class="city-feature">
                <i class="ion-ios-star icon-small"></i>
                110+ top chefs
            </div>
            <div class="city-feature">
                <i class="ion-social-twitter icon-small"></i>
                <a href="#">@omnifood_berlin</a>
            </div>
        </div>
        <div class="col span-1-of-4 box">
            <img src="./assets/img/london.jpg" alt="London">
            <h3>London</h3>
            <div class="city-feature">
                <i class="ion-ios-person icon-small"></i>
                1200+ happy eaters
            </div>
            <div class="city-feature">
                <i class="ion-ios-star icon-small"></i>
                50+ top chefs
            </div>
            <div class="city-feature">
                <i class="ion-social-twitter icon-small"></i>
                <a href="#">@omnifood_london</a>
            </div>
        </div>
    </div>
</section>
-->

<!--
<section class="section-testimonials">
    <div class="row">
        <h2>Our customer's can't live without us</h2>
        <div class="row">
            <div class="col span-1-of-3">
                <blockquote>
                    Omnifood is just awesome! I just launched a startup which leaves me with no time for cooking, so
                    Omnifood is a life-saver. Now that I got used to it, I couldn't live without my daily meals!
                    <br>
                    <cite>
                        <?= Html::img('@omnifood/img/customer-1.jpg', ['alt' => 'Pizza Out']); ?>
                        Ismail Yusuf</cite>
                </blockquote>
            </div>
            <div class="col span-1-of-3">
                <blockquote>
                    Inexpensive, healthy and great-tasting meals, delivered right to my home. We have lots of food
                    delivery here in Lisbon, but no one comes even close to Omnifood. Me and my family are so in love!
                    <br>
                    <cite>
                        <?= Html::img('@omnifood/img/customer-2.jpg', ['alt' => 'Pizza Out']); ?>
                        Nadia
                    </cite>
                </blockquote>
            </div>
            <div class="col span-1-of-3">
                <blockquote>
                    I was looking for a quick and easy food delivery service in San Francisco. I tried a lof of them and
                    ended up with Omnifood. Best food delivery service in the Bay Area. Keep up the great work!
                    <br>
                    <cite>
                        <?= Html::img('@omnifood/img/customer-3.jpg', ['alt' => 'Pizza Out']); ?>
                        Sammy Barasa</cite>
                </blockquote>
            </div>
        </div>
    </div>
</section>
-->
<section class="section-pricing">
    <div class="row">
        <h2>Start Ordering today!!!</h2>
    </div>
    <div class="row">
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
    </div>
</section>




