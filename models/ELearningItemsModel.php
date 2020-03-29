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
class ELearningItemsModel extends \app\models\table\ELearningItemsTable
{
	public function getELearningItemsModelBelongsToSubjectsPlanModel()
	{
		return $this->hasOne(SubjectsPlanModel::className(),['id'=>'elearning_id']);
	}

    public function getELearningItemsModelHasManySimulationModel()
    {
        return $this->hasMany(SimulationModel::className(),['subjects_plan_id'=>'elearning_id']);
    }       

    public function getELearningItemsModelHasManyBlog()
    {
        return $this->hasMany(ELearningItemsModel::className(),['elearning_id'=>'elearning_id'])->where(['elearning_type'=>'blog']);
    }       

    public function getELearningItemsModelBelongsToUsersModel()
    {
        return $this->hasOne(User::className(),['id'=>'created_by']);
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'elearning_id' => Yii::t('app', 'Materi'),
            'chapter' => Yii::t('app', 'Judul'),
            'cover_image' => Yii::t('app', 'Gambar Sampul'),
            'content' => Yii::t('app', 'Konten'),
            'description' => Yii::t('app', 'Deskripsi'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

}
