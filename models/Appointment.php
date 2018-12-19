<?php
namespace app\models;

use yii\db\ActiveRecord;
use app\models\Users;
use app\models\Events;

class Appointment extends ActiveRecord
{
    public static function tableName()
    {
        return 'appointment';
    }

    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['ID_Users' => 'User_ID']);
    }

    public function getEvents()
    {
        return $this->hasMany(Events::className(), ['ID_Event' => 'Event_ID']);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }


    public function getId()
    {
        return $this->ID_Appointment;
    }
}