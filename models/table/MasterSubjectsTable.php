<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "master_subjects".
 *
 * @property int $id
 * @property int $school_id
 * @property string $subjects
 * @property int $status
 */
class MasterSubjectsTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_subjects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['school_id', 'status'], 'integer'],
            [['subjects'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'school_id' => 'School ID',
            'subjects' => 'Subjects',
            'status' => 'Status',
        ];
    }
}
