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
class ClassroomsModel extends \app\models\table\ClassroomsTable
{
	public function getClassroomsBelongsToSchool()
	{
		return $this->hasOne(MasterSchoolModel::className(),['id'=>'school_id']);
	}

	public static function getClassromsList()
	{
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id', 'classroom_name');
	}

}
