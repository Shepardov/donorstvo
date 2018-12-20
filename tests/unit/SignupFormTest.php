<?php 
class SignupFormTest extends \Codeception\Test\Unit
{

    public function testEmptyData()
    {
        $this->model = new \app\models\SignupForm([
            'email' => ' ',
            'password' => ' ',
            'name' => ' ',
            'surname' => ' ',
            'gender' => ' ',
            'birthdate' => ' ',
            'bloodtype' => ' ',

        ]);

        expect_that($this->model->rules());

    }
}