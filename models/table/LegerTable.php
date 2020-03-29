<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "leger".
 *
 * @property int $id
 * @property int $student_id
 * @property string $final_grade_point
 * @property string $grades
 * @property int $assign_classroom_teacher_id
 */
class LegerTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'leger';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'assign_classroom_teacher_id'], 'integer'],
            [['final_grade_point', 'grades'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'student_id' => Yii::t('app', 'Student ID'),
            'final_grade_point' => Yii::t('app', 'Final Grade Point'),
            'grades' => Yii::t('app', 'Grades'),
            'assign_classroom_teacher_id' => Yii::t('app', 'Assign Classroom Teacher ID'),
        ];
    }
}
