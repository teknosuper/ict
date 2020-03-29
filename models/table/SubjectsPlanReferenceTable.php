<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "subjects_plan_reference".
 *
 * @property int $id
 * @property int $subject_plan_id
 * @property int $type
 * @property string $file
 * @property string $url
 * @property string $name
 */
class SubjectsPlanReferenceTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subjects_plan_reference';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subject_plan_id', 'type'], 'integer'],
            [['file'], 'string'],
            [['url'], 'string', 'max' => 1000],
            [['name'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'subject_plan_id' => Yii::t('app', 'Subject Plan ID'),
            'type' => Yii::t('app', 'Type'),
            'file' => Yii::t('app', 'File'),
            'url' => Yii::t('app', 'Url'),
            'name' => Yii::t('app', 'Name'),
        ];
    }
}
