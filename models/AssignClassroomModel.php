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
class AssignClassroomModel extends \app\models\table\AssignClassroomTable
{
    public $year;
    public $semester;
    public $school_id;

	public function getAssignClassroomModelBelongsToClassroomsPlanModel()
	{
		return $this->hasOne(ClassroomsPlanModel::className(),['id'=>'classroom_id']);
	}	

	public function getAssignClassroomModelBelongsToStudentsModel()
	{
		return $this->hasOne(StudentsModel::className(),['id'=>'student_id']);
	}

}
