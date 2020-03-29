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
class QuizModel extends \app\models\table\QuizTable
{
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Judul'),
            'description' => Yii::t('app', 'Deskripsi Soal'),
            'teacher_id' => Yii::t('app', 'Guru'),
            'subject_id' => Yii::t('app', 'Mata Pelajaran'),
            'created_by' => Yii::t('app', 'Dibuat Oleh'),
            'created_time' => Yii::t('app', 'Waktu Buat'),
            'updated_time' => Yii::t('app', 'Waktu Ubah'),
        ];
    }


	public function getQuizBelongsToTeachers()
	{
		return $this->hasOne(TeachersModel::className(),['id'=>'teacher_id']);
	}

	public function getQuizBelongsToMasterSubjectsModel()
	{
		return $this->hasOne(MasterSubjectsModel::className(),['id'=>'subject_id']);
	}

	public static function getQuizList()
	{
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id', 'title');
	}

	public function getQuizModelHasManyQuizItemsModel()
	{
		return $this->hasMany(QuizItemsModel::className(),['quiz_id'=>'id']);
	}


}
