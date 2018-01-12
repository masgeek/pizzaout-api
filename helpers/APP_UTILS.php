<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 10/15/2017
 * Time: 3:30 PM
 */

namespace app\helpers;


use app\model_extended\CART_MODEL;
use app\model_extended\USERS_MODEL;
use PHPMailer\PHPMailer\PHPMailer;
use yii\helpers\Url;

class APP_UTILS
{
    const PAYMENT_METHOD_MOBILE = 'MOBILE';
    const PAYMENT_METHOD_CARD = 'CARD';

    const KITCHEN_SCOPE = 'KITCHEN';
    const CHEF_SCOPE = 'CHEF';
    const RIDER_SCOPE = 'RIDER';
    const OFFICE_SCOPE = 'OFFICE';
    const ALL_SCOPE = 'ALL';


    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';
    const SCENARIO_DEFAULT = 'default';
    const SCENARIO_ALLOCATE_KITCHEN = 'allocate_kitchen';
    const SCENARIO_CONFIRM_ORDER = 'confirm_order';
    const SCENARIO_PREPARE_ORDER = 'prepare_order';
    const SCENARIO_ORDER_READY = 'order_ready';
    const SCENARIO_ASSIGN_CHEF = 'assign_chef';
    const SCENARIO_ASSIGN_RIDER = 'assign_rider';
    const SCENARIO_UPDATE_RIDER = 'update_rider';


    const USER_TYPE_ADMIN = 'ADMIN';
    const USER_TYPE_CUSTOMER = 'CUSTOMER';

    /**
     * @return int
     */
    public static function GetTimeStamp()
    {
        $date = new \DateTime();
        return $date->getTimestamp();
    }

    /**
     * @param int $length
     * @return string
     * @throws \yii\base\Exception
     */
    public static function GenerateToken($length = 32)
    {
        $randomString = \Yii::$app->getSecurity()->generateRandomString($length);
        return $randomString;
    }

    /**
     * @param $userModel USERS_MODEL
     * @return void
     * @throws \PHPMailer\PHPMailer\Exception
     */
    public static function SendRecoveryEmailOld($userModel)
    {
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'mail.pizzaout.so';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;
            $mail->Username = 'support@pizzaout.so';                 // SMTP username
            $mail->Password = 'PQ*8Z(^V?ho}';                           // SMTP password
            //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 25;//587;                                    // TCP port to connect to

            $randomString = self::GenerateToken();
            $recipient = [$userModel->EMAIL => $userModel->SURNAME];
            $subject = 'Password Recovery';
            $body = null;

            $params = [
                'name' => $userModel->SURNAME,
                'email' => $recipient,
                'subject' => $subject,
                'link' => Url::to("@web/user/reset-pass?token=$randomString", true),
                'content' => $body
            ];

            $userModel->RESET_TOKEN = $randomString;
            $userModel->save();

            //Recipients
            $mail->setFrom('support@pizzaout.so', 'PIZZA OUT');
            $mail->addAddress('barsamms@gmail.com', 'Joe User');     // Add a recipient
            $mail->addReplyTo('support@pizzaout.so', 'PIZZA OUT');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            return true;
        } catch (Exception $e) {
            //echo 'Message could not be sent.';
            //echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
        return false;
    }

    public static function SendRecoveryEmail($userModel)
    {
        $randomString = self::GenerateToken();
        $recipient = [$userModel->EMAIL => $userModel->SURNAME];
        $subject = 'Password Recovery';
        $body = null;

        $params = [
            'name' => $userModel->SURNAME,
            'email' => $recipient,
            'subject' => $subject,
            'link' => Url::to("@web/user/reset-pass?token=$randomString", true),
            'content' => $body
        ];

        $userModel->RESET_TOKEN = $randomString;
        $userModel->save();
        $mailer = self::SendEmail($subject, $recipient, $params, 'layouts/password_recovery');

        return $mailer;
    }

    /**
     * @param string $format
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    public
    static function GetCurrentDateTime($format = 'yyyy-MM-dd HH:mm:ss')
    {

        return \Yii::$app->formatter->asDatetime('now', $format);

    }

    /**
     * @param string $format
     * @param int $period
     * @param string $perodType
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    public
    static function GetFutureDateTime($format = 'yyyy-MM-dd HH:mm:ss', $period = 1, $perodType = 'M')
    {

        return \Yii::$app->formatter->asDatetime('now', $format);

    }

    public
    static function GetCartTimesTamp($user_id)
    {
        $model = CART_MODEL::findOne(['USER_ID' => $user_id]);
        return $model != null ? $model->CART_TIMESTAMP : self::GetTimeStamp();
    }

    /**
     * @param $image_url
     * @param string $imageFolder
     * @return string
     */
    public
    static function BuildImageUrlBase($image_url, $imageFolder = "@foodimages")
    {

        //return Yii::$app->homeUrl . '/' . $imageFolder;
        $cleanBaseURL = Url::base(true);
        $cleanBaseURL .= '/';

        return "{$cleanBaseURL}{$imageFolder}/{$image_url}";
    }

    /**
     * @param $image_url
     * @param bool $fromApi
     * @param string $alias
     * @param string $imageFolder
     * @return string
     */
    public
    static function BuildImageUrl($image_url, $fromApi = true, $alias = '@foodimages', $imageFolder = "images")
    {

        if ($alias != null) {
            $imageFolder = \Yii::getAlias($alias);
        }

        $baseUrl = Url::to([null], true);


        if ($fromApi) {
            $cleanBaseURL = substr($baseUrl, 0, strpos($baseUrl, "api"));
        } else {
            $cleanBaseURL = substr($baseUrl, 0, strpos($baseUrl, "customer"));
        }
        $parsed = parse_url($cleanBaseURL);
        if (empty($parsed['scheme'])) {
            //$urlStr = 'http://' . ltrim($urlStr, '/');
            $cleanBaseURL = substr($baseUrl, 0, strpos($baseUrl, "site"));
        }

        return "{$cleanBaseURL}{$imageFolder}/{$image_url}";
    }

    /**
     * @param $subject
     * @param array $params
     * @param array $recipient
     * @param string $layout
     * @param array $replyTo
     * @return bool
     */
    public static function SendEmail($subject, array $recipient, array $params, $layout = 'layouts/welcome', array $replyTo = ['support@pizzaout.so' => 'Pizza Out'])
    {
        $mailer = \Yii::$app->mailer->compose($layout, $params)
            ->setTo($recipient)
            ->setFrom(['noreply@pizzaout.so' => 'Pizza Out'])
            ->setReplyTo($replyTo)
            ->setSubject($subject)
            ->send();

        return $mailer;
    }
}