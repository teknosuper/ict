<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "assign_classroom_teacher".
 *
 * @property int $id
 * @property int $classroom_id
 * @property int $teacher_id
 * @property int $subject_id
 * @property int $status
 */
class AssignClassroomTeacherTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assign_classroom_teacher';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['classroom_id', 'teacher_id', 'subject_id', 'status'], 'integer'],
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
            'teacher_id' => Yii::t('app', 'Teacher ID'),
            'subject_id' => Yii::t('app', 'Subject ID'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
