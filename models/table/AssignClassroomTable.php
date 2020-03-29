<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "assign_classroom".
 *
 * @property int $id
 * @property int $classroom_id
 * @property int $student_id
 * @property int $status
 */
class AssignClassroomTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assign_classroom';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['classroom_id', 'student_id', 'status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'classroom_id' => Yii::t('app', 'Classroom ID'),
            'student_id' => Yii::t('app', 'Student ID'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
