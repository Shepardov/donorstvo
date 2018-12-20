<?php 
class LoginTest extends \Codeception\Test\Unit
{
    public function testLoginNoUser()
    {
        $this->model = new \app\models\LoginForm([
            'username' => 'not_existing_username',
            'password' => 'not_existing_password',
        ]);
        expect_not($this->model->login());
    }
    public function testLoginWrongPassword()
    {
        $this->model = new \app\models\LoginForm([
            'username' => 'lol@yandex.ru',
            'password' => 'wrong_password',
        ]);
        expect_not($this->model->login());
    }
    public function testLoginCorrect()
    {
        $this->model = new \app\models\LoginForm([
            'username' => 'lol@yandex.ru',
            'password' => '123',
        ]);
        expect($this->model->login());
    }
}