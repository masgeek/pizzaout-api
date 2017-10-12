<?php
/**
 * Created by PhpStorm.
 * User: 219350
 * Date: 2016/10/10
 * Time: 09:03
 */

$this->beginContent('@app/views/layouts/main.php'); ?>
    <div class="content">
        <?= $content; ?>
    </div>
<?php $this->endContent();