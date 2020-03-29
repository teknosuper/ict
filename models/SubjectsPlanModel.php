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
class SubjectsPlanModel extends \app\models\table\SubjectsPlanTable
{

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'subject_id' => Yii::t('app', 'Mata Pelajaran'),
            'chapter' => Yii::t('app', 'Materi'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'learning_objective' => Yii::t('app', 'Tujuan Pembelajaran'),
        ];
    }

    public function getSubjectsPlanModelHasManyChild()
    {
        return $this->hasMany(SubjectsPlanModel::className(),['parent_id'=>'id']);
    }    	

    public function getSubjectsPlanModelBelongsToParent()
    {
        return $this->hasOne(SubjectsPlanModel::className(),['id'=>'parent_id']);
    }    	

    public function getSubjectsPlanModelBelongsToMasterSubjectsModel()
    {
        return $this->hasOne(MasterSubjectsModel::className(),['id'=>'subject_id']);
    }       

    public function getSubjectsPlanModelHasManyELearningItemsModel()
    {
        return $this->hasMany(ELearningItemsModel::className(),['elearning_id'=>'id']);
    }       
    public function getSubjectsPlanModelHasManySimulationModel()
    {
        return $this->hasMany(SimulationModel::className(),['subjects_plan_id'=>'id']);
    }       

    public static function getSubjectsPlanModelLists()
    {
        $model = self::find()->all();
        $lists = [];
        if($model)
        {
            foreach($model as $modelData)
            {
                $lists[$modelData->id] = $modelData->chapter;
            }
        }
        return $lists;
    }

    public static function getRelatedSubjectsPlanModelListsByParentId($parent_id)
    {
    	$model = self::find()->where(['parent_id'=>$parent_id])->all();
    	$lists = [];
    	if($model)
    	{
    		foreach($model as $modelData)
    		{
    			$lists[$modelData->id] = $modelData->chapter;
    		}
    	}
    	return $lists;
    }

}
