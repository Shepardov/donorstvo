<?php
namespace app\models;

use yii\db\ActiveRecord;
use app\models\Appointment;

class Events extends ActiveRecord
{
    public static function tableName()
    {
        return 'events';
    }

    public function getAppointments()
    {
        return $this->hasMany(Appointment::className(), ['Event_ID' => 'ID_Event']);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }


    public function getId()
    {
        return $this->ID_Events;
    }
}