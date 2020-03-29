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
class ELearningModel extends \app\models\table\ELearningTable
{

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'ID User'),
            'title' => Yii::t('app', 'Judul'),
            'description' => Yii::t('app', 'Deskripsi'),
            'syllabus' => Yii::t('app', 'Silabus'),
            'status' => Yii::t('app', 'Status'),
            'teacher_id' => Yii::t('app', 'Guru'),
            'subject_id' => Yii::t('app', 'Subject ID'),
            'created_time' => Yii::t('app', 'Created Time'),
            'updated_time' => Yii::t('app', 'Updated Time'),
            'created_by' => Yii::t('app', 'Created By'),
        ];
    }

	public function getElearningBelongsToTeachers()
	{
		return $this->hasOne(TeachersModel::className(),['id'=>'teacher_id']);
	}

	public function getElearningHasManyElearningItems()
	{
		return $this->hasMany(ELearningItemsModel::className(),['elearning_id'=>'id']);
	}
}
