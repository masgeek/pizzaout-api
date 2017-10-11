<?php
/**
 * Created by PhpStorm.
 * User: barsa
 * Date: 25-Jul-17
 * Time: 11:48
 */

namespace app\model_extended;


use app\models\Users;
use app\models\UserType;
use yii\base\Security;
use yii\db\Expression;
use yii\web\IdentityInterface;

class USERS_MODEL extends Users implements IdentityInterface
{
    public $ACCOUNT_AUTH_KEY;
    public $PASSWORD_RESET_TOKEN;

    /**
     * Finds an identity by the given ID.
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     *                       Null should be returned if such an identity cannot be found
     *                       or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return $token;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     * @return string
     */
    public function getAuthKey()
    {
        return null;
    }


    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public static function findByUsername($username)
    {
        /* @var $userModel $this */

        $account_found = null;
        //$userModel = UserProfile::findOne(['USER_NAME' => $username, 'EMAIL_ADDRESS'=>$username]);
        $userModel = self::find()
            ->select(['USER_ID', 'EMAIL'])//select only specific fields
            ->where(['EMAIL' => $username])
            ->one();
        if ($userModel == null) {
            $userModel = self::find()
                ->select(['USER_ID', 'EMAIL'])//select only specific fields
                ->where(['USER_NAME' => $username])
                ->one();
        }
        if ($userModel != null) {
            $account_found = static::findOne(['USER_ID' => $userModel->USER_ID]);
        }
        return $account_found;
    }


    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->DATE_REGISTERED = new Expression('NOW()');
            }
            $this->LAST_UPDATED = new Expression('NOW()');
            return true;
        }
        return false;
    }

    /**
     * Password validation during login
     * @param $password
     * @return bool
     */
    public function validatePassword($password)
    {
        return $this->PASSWORD === sha1($password);
    }

    public function setPassword($password)
    {
        $this->PASSWORD = Security::generatePasswordHash($password);
    }

    public function getPassword()
    {
        return $this->PASSWORD;
    }

    /**
     * Generates a password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->PASSWORD_RESET_TOKEN = Security::generateRandomKey() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->PASSWORD_RESET_TOKEN = null;
    }

    //fields to return common stuff
    public function getUsername()
    {
        return $this->SURNAME;
    }

    public function getFullNames()
    {
        return $this->SURNAME . ', ' . $this->OTHER_NAMES;
    }

    public function getEmailAddress()
    {
        return $this->EMAIL;
    }

    public function getUserType()
    {
        return UserType::findOne($this->USER_TYPE)->USER_TYPE_NAME;
    }
}