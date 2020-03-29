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
class MasterSubjectsModel extends \app\models\table\MasterSubjectsTable
{

	public function getSubjectsBelongsToSchool()
	{
		return $this->hasOne(MasterSchoolModel::className(),['id'=>'school_id']);
	}

	public static function getSubjectsList()
	{
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id', 'subjects');
	}

}
