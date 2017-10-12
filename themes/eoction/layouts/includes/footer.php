<?php
use yii\helpers\Html;

?>

<footer class="footer">
    <!-- footer top -->
    <div class="row">
        <div class="col-sm-12 col-md-3">
            <h3 class="widget-title">EOCTION</h3>
            <div class="textwidget">
                <?= Html::a('About Us', ['//site/about'], ['title' => 'About our company']); ?><br>
                <?= Html::a('Terms &amp; Conditions', ['//site/terms'], ['title' => 'Terms &amp; Conditions']); ?><br>
                <?= Html::a('Seller Terms', ['//site/seller-terms'], ['title' => 'Seller terms &amp Conditions']); ?>
                <br>
                <a href="http://www.eoction.com/#">Privacy Policy</a><br>
                <a href="http://www.eoction.com/#">Store Directory</a>
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <h3 class="widget-title">CUSTOMER CARE</h3>
            <div class="textwidget"><a href="http://www.eoction.com/#">How to Bid</a><br>
                <a href="http://www.eoction.com/#">Payment</a><br>
                <a href="http://www.eoction.com/#">Shipping &amp; Delivery</a><br>
                <a href="http://www.eoction.com/#">Help Center</a><br>
                <a href="http://www.eoction.com/#">FAQ</a><br>
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <h3 class="widget-title">Contact
                Us</h3>
            <div class="contact-info contact-info-block">
                <ul class="list-group">
                    <li class="list-group-item"><i class="fa fa-map-marker"></i> <strong>Address:</strong> <span>7500 Bellaire Blvd #524 Houston, TX 77036</span>
                    </li>
                    <li class="list-group-item"><i class="fa fa-phone"></i> <strong>Phone:</strong>
                        <span>713 988 8210</span>
                    </li>
                    <li class="list-group-item"><i class="fa fa-envelope"></i> <strong>Email:</strong> <span><a
                                    href="mailto:info@eoction.com">info@eoction.com</a></span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <h3>Newsletter</h3>
            <form class="form-horizontal">
                <div class="form-group">
                    <input type="email" class="form-control" id="email" placeholder="email address">
                </div>
                <button type="submit" class="btn btn-default btn-block">Subscribe!</button>
            </form>
        </div>
    </div>
    <!-- /footer top -->
    <hr/>
    <!-- footer bottom -->
    <div class="row">
        <div class="col-md-3">
            <a href="./" title="<?= Yii::$app->name; ?>">
                <?php
                $imgLink = '@web/images/footer-logo.png';
                echo Html::img($imgLink, ['class' => 'img img-responsive', 'alt' => Yii::$app->name, 'title' => Yii::$app->name]);
                ?>
            </a>
        </div>

        <div class="col-md-3 social-icons">
            <li class="twitter" style="background-color: #f0f0f0">
                <a href="#" target="_blank" title="Twitter" rel="nofollow">Twitter</a>
            </li>

            <li class="facebook" style="background-color: #f0f0f0">
                <a href="#" target="_blank" title="Facebook" rel="nofollow">Facebook</a>
            </li>

            <li class="linkedin" style="background-color: #f0f0f0">
                <a href="#" target="_blank" title="LinkedIn" rel="nofollow">LinkedIn</a>
            </li>
        </div>

        <div class="col-md-3">
            <div class="centerBlock">
                <?php
                $imgLink = '@web/images/paypal.png';
                echo Html::img($imgLink, ['class' => 'img img-responsive', 'alt' => 'Payment Gateways', 'title' => 'Paypal Gateway']);
                ?>
            </div>
        </div>

        <div class="col-md-3">
            <span class="pull-right copyright" style="text-align: center;">&copy; <?= date('Y'); ?>
                All Rights Reserved.</span>
        </div>
    </div>
    <!-- /footer bottom -->
</footer>

<script>
    $(document).ready(function () {
        var url = window.location;
        $('ul.product-nav a[href="'+ url +'"]').parent().addClass('active');
        $('ul.product-nav a').filter(function() {
            return this.href == url;
        }).parent().addClass('active');
    });
</script>