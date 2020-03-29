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
class TeachersModel extends \app\models\table\TeachersTable
{

	public function getTeachersModelBelongsToUser()
	{
		return $this->hasOne(User::className(),['user_id'=>'id']);
	}

	public function getTeachersHasManyElearning()
	{
		return $this->hasMany(ELearningModel::className(),['teacher_id'=>'id']);
	}	

	public static function getTeachersList($teacher_id=null)
	{
		if($teacher_id)
		{
	        return \yii\helpers\ArrayHelper::map(self::find()->where(['id'=>$teacher_id])->all(), 'id', 'full_name');
		}
		else
		{
	        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id', 'full_name');			
		}

	}

	public function getCurrentClass()
	{
		return "";
	}

	public function getHowManyTeacherElearning()
	{
		return $this->getTeachersHasManyElearning()->count();
	}

}
