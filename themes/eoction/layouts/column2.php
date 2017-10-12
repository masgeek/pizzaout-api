<?php
/**
 * Created by PhpStorm.
 * User: 219350
 * Date: 2016/10/10
 * Time: 09:03
 */

$this->beginContent('@app/views/layouts/main.php'); ?>
    <div class="content">
        <div class="col-sm-4">
            <button class="btn btn-primary btn-block">Left column</button>
        </div>

        <div id="content" class="col-sm-8">
            <?= $content; ?>
        </div><!-- content -->
    </div>
<?php $this->endContent();