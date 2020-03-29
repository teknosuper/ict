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
class SimulationModel extends \app\models\table\SimulationTable
{
	public function getSimulationModelBelongsToSubjectsPlanModel()
	{
		return $this->hasOne(SubjectsPlanModel::className(),['id'=>'subjects_plan_id']);
	}

    public function getSimulationModelBelongsToUsersModel()
    {
        return $this->hasOne(User::className(),['id'=>'created_by']);
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Judul'),
            'file_html' => Yii::t('app', 'File Html'),
            'description' => Yii::t('app', 'Deskripsi'),
            'subjects_plan_id' => Yii::t('app', 'Materi'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_time' => Yii::t('app', 'Created Time'),
        ];
    }

}
