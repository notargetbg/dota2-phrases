<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $email
 * @property string $auth_key
 * @property string $access_token
 *
 *
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password_hash'], 'required'],
            [['username', 'email'], 'string', 'max' => 20],
            ['username', 'unique'],
            ['new_password', 'string', 'min' => 6],
            [['auth_key', 'access_token'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Потребителско име'),
            'password_hash' => Yii::t('app', 'Парола'),
            'new_password' => Yii::t('app', 'Нова Парола'),
            'email' => Yii::t('app', 'Имейл'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'access_token' => Yii::t('app', 'Access Token'),
        ];
    }

   /**
    * @captcha string
    */
    public $new_password;


    public static function findIdentity($id)
    {
      return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
      return static::findOne(['access_token' => $token]);
    }

    public static function findByUsername($username)
    {
      return  static::findOne(['username' => $username]);
    }

    public function getId()
    {
      return $this->id;
    }

    public function getAuthKey()
    {
      return $this->auth_key;
    }

    public function validateAuthKey($auth_key)
    {
      return $this->auth_key === $auth_key;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
      return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
      $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function updatePassword($new_password) {
      $this->password_hash = Yii::$app->security->generatePasswordHash($new_password);
    }
}
