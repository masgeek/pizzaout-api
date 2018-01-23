<?php
//$timezone = 'Africa/Mogadishu';
$timezone = 'UTC';

return
    [
        'class' => 'yii\i18n\Formatter',
        //'dateFormat' => 'dd.MM.yyyy',
        'decimalSeparator' => '.',
        'thousandSeparator' => ',',
        'timeZone' => $timezone, //default time zones and format
        'currencyCode' => 'USD',
        //'currencyCode' => 'KES',
        'nullDisplay' => '0'
    ];