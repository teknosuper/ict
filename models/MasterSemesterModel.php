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
class MasterSemesterModel extends \app\models\table\MasterSemesterTable
{

	public static function getSemesterList()
	{
        return \yii\helpers\ArrayHelper::map(\app\models\MasterSemesterModel::find()->all(), 'id', 'desc');
	}

}
