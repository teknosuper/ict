<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ClassroomsPlanTable".
 *
 * @property int $id
 * @property string $host
 * @property string $host_description
 * @property string $host_template
 * @property int $status
 */
class ClassroomsPlanModel extends \app\models\table\ClassroomsPlanTable
{

	public static function getCurrentYear()
	{
		return "2019/2020";
	}

	public function getClassroomsPlanModelBelongsToClassroomsModel()
	{
		return $this->hasOne(ClassroomsModel::className(),['id'=>'classroom_id']);
	}

	public function getClassroomsPlanModelBelongsToMasterSemesterModel()
	{
		return $this->hasOne(MasterSemesterModel::className(),['id'=>'semester_id']);
	}

	public static function getClassromPlanListByAssignClassroomTeacher($teacher_id)
	{
		$assignQuizModel = \app\models\AssignClassroomTeacherModel::find()->where(['teacher_id'=>$teacher_id])->all();
		$classroomPlanIds = []; 
		if($assignQuizModel)
		{
			foreach($assignQuizModel as $model)
			{
				$classroomPlanIds[] = $model->classroom_id;
			}
		}

		$classroomsPlanModel = self::find()->where(['id'=>$classroomPlanIds])->all();
		$lists = [];
		if($classroomsPlanModel)
		{
			foreach($classroomsPlanModel as $model)
			{
				$valueArray = [
					$model->classroomsPlanModelBelongsToClassroomsModel->classroom_name,
					$model->year,
					$model->classroomsPlanModelBelongsToMasterSemesterModel->desc,
					$model->classroomsPlanModelBelongsToClassroomsModel->classroomsBelongsToSchool->school_name,
				];
				$lists[$model->id] = implode(' - ', $valueArray); 
			}

		}
		return $lists;
        // return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id', 'classroom_id');
	}

	public static function getClassromPlanListByQuizId($quiz_id)
	{
		$assignQuizModel = \app\models\AssignQuizModel::find()->where(['quiz_id'=>$quiz_id])->all();
		$classroomPlanIds = []; 
		if($assignQuizModel)
		{
			foreach($assignQuizModel as $model)
			{
				$classroomPlanIds[] = $model->classroom_id;
			}
		}

		$classroomPlanIds = array_unique($classroomPlanIds);
		$classroomsPlanModel = self::find()->where(['id'=>$classroomPlanIds])->all();
		$lists = [];
		if($classroomsPlanModel)
		{
			foreach($classroomsPlanModel as $model)
			{
				$valueArray = [
					$model->classroomsPlanModelBelongsToClassroomsModel->classroom_name,
					$model->year,
					$model->classroomsPlanModelBelongsToMasterSemesterModel->desc,
					$model->classroomsPlanModelBelongsToClassroomsModel->classroomsBelongsToSchool->school_name,
				];
				$lists[$model->id] = implode(' - ', $valueArray); 
			}

		}
		return $lists;
        // return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id', 'classroom_id');
	}

}
