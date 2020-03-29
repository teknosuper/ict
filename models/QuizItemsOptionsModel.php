<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_hostname".
 *
 * @property int $id
 * @property string $host
 * @property string $host_description
 * @property string $host_template
 * @property int $status
 */
class QuizItemsOptionsModel extends \app\models\table\QuizItemsOptionsTable
{
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'quiz_item_id' => Yii::t('app', 'Quiz Item ID'),
            'option' => Yii::t('app', 'Pilihan'),
            'value' => Yii::t('app', 'Isi Jawaban'),
            'is_correct_answer' => Yii::t('app', 'Jawaban Benar'),
        ];
    }

    public function getIsCorrectAnswerListDetail()
    {
    	$array = self::getIsCorrectAnswerList();
    	return isset($array[$this->is_correct_answer]) ? $array[$this->is_correct_answer] : "SALAH";
    }

    public static function getOptionsList()
    {
        return [
            "A"=>"A",
            "B"=>"B",
            "C"=>"C",
            "D"=>"D",
            "E"=>"E",
        ];
    }

    public static function getIsCorrectAnswerList()
    {
        return [
            1=>"BENAR",
            0=>"SALAH",
        ];
    }

	public function getQuizItemsOptionsModelBelongsToQuizItemsModel()
	{
		return $this->hasOne(QuizItemsModel::className(),['id'=>'quiz_item_id']);
	}	
}
