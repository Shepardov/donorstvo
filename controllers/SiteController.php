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

<<<<<<< HEAD
    public function actionAbout()
    {
        return $this->render('about');
    }
=======
>>>>>>> 7be3983067c2129c91b315a4fbd9bc47ecc139ed

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

<<<<<<< HEAD
    public function actionEvents() {
        $allEvents = Events::find()
                    ->all();
        return $this->render('events', [
            'events' => $allEvents,
        ]);
    }

    public function actionAddevent() {
        $event = new Events();
        $event->Date = Yii::$app->request->post('eventdate');
        $event->save();
        return $this->render('adminmenu');
    }

    public function actionDonormenu() {
        return $this->render('donormenu');
    }

    public function actionRecording() {
        $model = new RecordForm();
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $record = new Appointment();
            $record->User_ID = Yii::$app->user->identity->ID_Users;
            $record->Event_ID = $model->date;
            if($record->save()){
                return $this->render('index');
            }
        }   

        return $this->render('recording', compact('model'));
    }

    public function actionMyresults() {
        $myresults = Appointment::find()
                            ->where(['User_ID' => Yii::$app->user->identity->ID_Users])
                            ->andWhere(['not', ['BloodDonated' => null]])
                            ->all();
        return $this->render('myresults', [
            'myresults' => $myresults,
        ]);
    }

    public function actionAdminmenu() {
        return $this->render('adminmenu');
    }

    public function actionEdit() {
        if(Yii::$app->user->isGuest)
            return $this->goHome();
        $model = new EditForm();
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $user = Users::findOne(['Email' => Yii::$app->user->identity->Email]);
            $user->Email = $model->email;
            $user->Name = $model->name;
            $user->Surname = $model->surname;
            $user->Gender = $model->gender;
            $user->BloodType = $model->bloodtype;
            $user->DateOfBirth = $model->birthdate;
            $user->Password = Yii::$app->user->identity->Password;
            if($user->save()){
                return $this->render('donormenu');
            }   
        }
        $model->email = Yii::$app->user->identity->Email;
        $model->gender = Yii::$app->user->identity->Gender;
        $model->name = Yii::$app->user->identity->Name;
        $model->surname = Yii::$app->user->identity->Surname;
        $model->bloodtype = Yii::$app->user->identity->BloodType;
        $model->birthdate = Yii::$app->user->identity->DateOfBirth;

        return $this->render('edit', compact('model'));
    }

    public function actionAdminedit() {
        if(Yii::$app->user->isGuest)
            return $this->goHome();
        $model = new EditForm();
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $request = Yii::$app->request->post();
            $user = Users::findOne(['Email' => $request['EditForm']['email']]);
            $user->Name = $model->name;
            $user->Surname = $model->surname;
            $user->Gender = $model->gender;
            $user->BloodType = $model->bloodtype;
            $user->DateOfBirth = $model->birthdate;
            $user->Password = Yii::$app->user->identity->Password;
            if($user->save()){
                return $this->render('adminmenu');
            }   
        }
        $user = Users::findOne(['ID_Users' => Yii::$app->request->get('id')]);
        $model->email = $user->Email;
        $model->gender = $user->Gender;
        $model->name = $user->Name;
        $model->surname = $user->Surname;
        $model->bloodtype = $user->BloodType;
        $model->birthdate = $user->DateOfBirth;
        return $this->render('adminedit', compact('model'));
    }

    public function actionManage() {
        $records = Users::find()->all();
        return $this->render('manage', [
            'users' => $records,
        ]);
    }

=======
>>>>>>> 7be3983067c2129c91b315a4fbd9bc47ecc139ed
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
