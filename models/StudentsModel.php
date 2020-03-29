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
class StudentsModel extends \app\models\table\StudentsTable
{

	public function getStudentsModelHasManyAssignClassroomModel()
	{
		return $this->hasMany(AssignClassroomModel::className(),['student_id'=>'id']);
	}	

	public function getStudentsAssignClassroomsPlanIds()
	{
		$classroomPlanId = [];
		$studentsModelHasManyAssignClassroomModel = $this->studentsModelHasManyAssignClassroomModel;
		if($studentsModelHasManyAssignClassroomModel)
		{
			foreach($studentsModelHasManyAssignClassroomModel as $model)
			{
				$classroomPlanId[] = $model->classroom_id;
			}
		}
		return $classroomPlanId;
	}

	public function getCurrentClass()
	{	
		$model = $this->getStudentsModelHasManyAssignClassroomModel()->orderBy(['id'=>SORT_DESC])->one();
		return $model->assignClassroomModelBelongsToClassroomsPlanModel->classroomsPlanModelBelongsToClassroomsModel->classroom_name;
	}

}
