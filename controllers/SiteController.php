<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Users;
use app\models\SignupForm;
use app\models\EditForm;
use app\models\Events;
use app\models\RecordForm;
use app\models\Appointment;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->render('index');
    }


    public function actionSignup() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new SignupForm();
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $request = Yii::$app->request->post();
            $user = Users::findOne(['Email' => $request['SignupForm']['email']]);            
            if($user != null) return $this->render('signup', compact('model'));
            $user = new Users();
            $user->Email = $model->email;
            $user->Password = $model->password;
            $user->Name = $model->name;
            $user->Surname = $model->surname;
            $user->Gender = $model->gender;
            $user->BloodType = $model->bloodtype;
            $user->DateOfBirth = $model->birthdate;
            if($user->save()){
                return $this->render('index');
            }   
        }
        return $this->render('signup', compact('model'));
    }

    public function actionSignin() {
        return $this->render('signin');
    }

    public function actionAuth() {
        $request = Yii::$app->request;

        $identity = Users::findOne(['Email' => $request->post('email')]);
        if($identity->Password == $request->post('password')) {
            Yii::$app->user->login($identity);
            if($identity->IsAdmin == 1)
                return $this->actionAdminmenu();
            else
                return $this->actionDonormenu();
        }
        else {
            return $this->render('signin', [
                'errorMessage' => 'Email или пароль неправильны',
            ]);
        }
    }
}
