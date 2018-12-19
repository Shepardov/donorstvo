<?php 

namespace app\controllers;

use yii\rest\ActiveController;
use app\models\Users;
use Yii;

class AdminController extends ActiveController
{
    public $modelClass = 'app\models\Users';

    public function actions()
	{
    	$actions = parent::actions();
    	// отключить действия "delete" и "create"
    	unset($actions['delete'], $actions['index']);

    	return $actions;
	}

	public function checkAccess($action, $model = null, $params = [])
	{
    	// проверить, имеет ли пользователь доступ к $action и $model
    	// выбросить ForbiddenHttpException, если доступ следует запретить
    	if ($action === 'index') {
        	if (Yii::$app->user->identity->IsAdmin != 1)
            	throw new \yii\web\ForbiddenHttpException(sprintf('You can only %s articles that you\'ve created.', $action));
    	}
	}

	public function actionIndex()
    {
        $model = Users::find()
        		->where(['IsAdmin' => 1])
        		->all();
        return $model;
    }

    public function actionDelete($id)
    {
    	$user = Users::findOne($id);
    	if($user->IsAdmin != 1)
    		$user->delete();
	}
}