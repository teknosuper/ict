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
class AssignClassroomTeacherModel extends \app\models\table\AssignClassroomTeacherTable
{

	public $semester_id;
	public $year;

	// public function getAssignClassroomTeacherModelBelongsToMasterSemesterModel()
	// {
	// 	return $this->hasOne(MasterSemesterModel::className(),['id'=>'semester_id']);
	// }

	public function getAssignClassroomTeacherModelBelongsToClassroomsPlanModel()
	{
		return $this->hasOne(ClassroomsPlanModel::className(),['id'=>'classroom_id']);
	}

	public function getAssignClassroomModelBelongsToMasterSubjectsModel()
	{
		return $this->hasOne(MasterSubjectsModel::className(),['id'=>'subject_id']);
	}

	public function getAssignClassroomModelBelongsToTeachersModel()
	{
		return $this->hasOne(TeachersModel::className(),['id'=>'teacher_id']);
	}

	public function getAssignClassroomTeacherModelHasManyAssignClassroomModel()
	{
		return $this->hasMany(AssignClassroomModel::className(),['classroom_id'=>'classroom_id']);
	}

	public static function getYearList()
	{
        return \yii\helpers\ArrayHelper::map(\app\models\MasterYearModel::find()->all(), 'year', 'year');
	}

	public static function getClassroomListByTeacher($teacher_id)
	{
		$ids = [];
		$model = self::find()->where([
			'teacher_id'=>$teacher_id,
		])->all();
		foreach($model as $modelData)
		{
			$ids[] = $modelData->classroom_id;
		}

		$ids = array_unique($ids);

		$classroom_ids = [];
		$getClassromsId = \app\models\ClassroomsPlanModel::find()->where(['id'=>$ids])->all();
		foreach($getClassromsId as $modelData)
		{
			$classroom_ids[] = $modelData->classroom_id;
		}

        return \yii\helpers\ArrayHelper::map(\app\models\ClassroomsModel::find()->where(['id'=>$classroom_ids])->all(), 'id', 'classroom_name');
        // return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id', 'school_name');
		// $model = $this->assignClassroomTeacherModelHasManyAssignClassroomModel;
		// return [
		// 	1=>'TSM1',
		// 	2=>'TSMK'
		// ];
	}

}
