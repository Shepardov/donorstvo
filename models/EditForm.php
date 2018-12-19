<?php
namespace app\models;
use yii\base\Model;

class EditForm extends Model
{
    public $password;
    public $email;
    public $name;
    public $surname;
    public $gender;
    public $birthdate;
    public $bloodtype;

    public function rules()
    {
        return [
        	[['email','name','surname','gender','bloodtype', 'birthdate'], 'required', 'message' => 'Заполните поле'],
        ];
    }
}