<?php

use yii\helpers\Html;

/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>"/>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<p>
    Dear <strong><?= $name ?></strong>
</p>
<p>We got a request to reset your pizza out password</p>
<table cellpadding="0" cellspacing="0" style="border-collapse:separate;" align="center" border="0">
    <tbody>
    <tr>
        <td style="border:none;color:#fff;cursor:auto;padding:10px 25px;" align="center"
            valign="middle" bgcolor="#e85034">
            <a href="<?= $link ?>"
               style="text-decoration:none;background:#e85034;color:#fff;"
               target="_blank">RESET PASSWORD</a>
        </td>
    </tr>
    </tbody>
</table>
<p>If you ignore this message your password won't change.
</p>
<p>If you didn't request a password reset let us know</p>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
