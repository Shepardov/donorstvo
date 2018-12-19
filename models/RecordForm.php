<?php
namespace app\models;
use yii\base\Model;

class RecordForm extends Model
{
    public $date;

    public function rules()
    {
        return [
        	[['date'], 'required', 'message' => 'Дата:'],
        ];
    }

    public function attributeLabels() {
        return [
            'date' => 'Дата:',
        ];
    }
}