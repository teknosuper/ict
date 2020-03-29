<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "assign_school".
 *
 * @property int $id
 * @property int $school_id
 * @property int $student_id
 * @property string $year
 * @property int $status
 * @property string $nis
 */
class AssignSchoolTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assign_school';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['school_id', 'student_id', 'status'], 'integer'],
            [['year', 'nis'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'school_id' => Yii::t('app', 'School ID'),
            'student_id' => Yii::t('app', 'Student ID'),
            'year' => Yii::t('app', 'Year'),
            'status' => Yii::t('app', 'Status'),
            'nis' => Yii::t('app', 'Nis'),
        ];
    }
}
