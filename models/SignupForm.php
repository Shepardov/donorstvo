<?php
namespace app\models;
use yii\base\Model;
 
class SignupForm extends Model{
    
    public $password;
    public $email;
    public $name;
    public $surname;
    public $gender;
    public $birthdate;
    public $bloodtype;

    public function rules() {
        return [
            [['password', 'email', 'name', 'surname', 'gender', 'bloodtype', 'birthdate'], 'required', 'message' => 'Заполните поле'],
        ];
    }
    
    public function attributeLabels() {
        return [
            'password' => 'Пароль',
            'email' => 'Email',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'gender' => 'Пол',
            'birthdate' => 'Дата рождения',
            'bloodtype' => 'Группа крови',

        ];
    }
    
}