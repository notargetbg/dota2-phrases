<?php
/**
 * Created by PhpStorm.
 * User: notarget
 * Date: 7/3/2016
 * Time: 3:30 PM
 */

namespace app\models;


use yii\base\Model;
use Yii;


/**
 * Signup form
 */
class SignupForm extends Model
{
  public $username;
  public $email;
  public $password;


  /**
   * @inheritdoc
   */
  public function rules()
  {
    return [
        ['username', 'filter', 'filter' => 'trim'],
        ['username', 'required'],
        ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
        ['username', 'string', 'min' => 2, 'max' => 255],

        ['email', 'filter', 'filter' => 'trim'],
        ['email', 'email'],

        ['password', 'string', 'min' => 6],
    ];
  }

  /**
   * Signs user up.
   *
   * @return User|null the saved model or null if saving fails
   */
  public function signup()
  {
    if ($this->validate()) {
      $user = new User;

      $user->username = $this->username;
      $user->email = $this->email;
      $user->setPassword($this->password);





      if ($user->save()) {
        echo 'User saved.. returning $user';
        return $user;
      } else {
        $errors = $user->errors;
        echo 'Cannot create..<br>';
        print_r($errors);
      }
    }

    return null;
  }
}
