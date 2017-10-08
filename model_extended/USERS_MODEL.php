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
use yii\web\IdentityInterface;

class USERS_MODEL extends Users implements IdentityInterface
{

	//public $LOGIN_ID;
	//public $EMAIL_ADDRESS;
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
			->select(['User_ID', 'Email'])//select only specific fields
			->where(['Email' => $username])
			->one();
		if ($userModel == null) {
			$userModel = self::find()
				->select(['User_ID', 'Email'])//select only specific fields
				->where(['User_Name' => $username])
				->one();
		}
		if ($userModel != null) {
			$account_found = static::findOne(['User_ID' => $userModel->User_ID]);
		}
		return $account_found;
	}

	/**
	 * Password validation during login
	 * @param $password
	 * @return bool
	 */
	public function validatePassword($password)
	{
		return $this->Password === sha1($password);
	}

	public function setPassword($password)
	{
		$this->Password = Security::generatePasswordHash($password);
	}

	public function getPassword()
	{
		return $this->Password;
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
		return $this->Surname;
	}

	public function getFullNames()
	{
		return $this->Surname . ', ' . $this->Other_Names;
	}

	public function getEmailAddress()
	{
		return $this->Email;
	}

	public function getUserType()
	{
		return UserType::findOne($this->User_Type)->Type_Name;
	}
}