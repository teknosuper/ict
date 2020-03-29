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
class SubjectsPlanReferenceModel extends \app\models\table\SubjectsPlanReferenceTable
{
	const TYPE_URL = 1;
	const TYPE_FILE = 2;

	public function getSubjectsPlanReferenceModelBelongsToSubjectsPlanModel()
	{
		return $this->hasOne(SubjectsPlanModel::className(),['id'=>'subject_plan_id']);
	}

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'subject_plan_id' => Yii::t('app', 'Materi Pelajaran'),
            'type' => Yii::t('app', 'Tipe Referensi'),
            'file' => Yii::t('app', 'Berkas Data'),
            'url' => Yii::t('app', 'Tautan'),
            'name' => Yii::t('app', 'Nama Referensi'),
        ];
    }

    public static function getTypeList()
    {
        return [
            self::TYPE_URL=>"LINK",
            self::TYPE_FILE=>"BERKAS DATA",
        ];
    }

    public function getTypeListDetail($status)
    {
        $array = self::getTypeList();
        return isset($array[$status]) ? $array[$status] : NULL;
    }

}
