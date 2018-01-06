<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 1/6/2018
 * Time: 10:53 AM
 */

return [
    'class' => 'yii\swiftmailer\Mailer',
    'viewPath' => '@app/mail',
    // send all mails to a file by default. You have to set
    // 'useFileTransport' to false and configure a transport
    // for the mailer to send real emails.
    'useFileTransport' => true,
    'transport' => [
        'class' => 'Swift_SmtpTransport',
        'host' => 'mail.eoction.com',
        'username' => 'noreply@eoction.com',
        'password' => 'PSeOction',
        'port' => '587',
        //'encryption' => 'tls',
    ],
];