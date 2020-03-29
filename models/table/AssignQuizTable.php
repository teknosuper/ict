<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "assign_quiz".
 *
 * @property int $id
 * @property int $classroom_id
 * @property int $quiz_id
 * @property int $quiz_type
 * @property string $start_time
 * @property string $end_time
 * @property string $created_time
 * @property string $updated_time
 * @property string $instruction
 * @property string $description
 * @property int $minutes
 * @property int $enable_pause
 * @property int $subject_id
 * @property int $teacher_id
 * @property string $quiz_title
 * @property int $created_by
 */
class AssignQuizTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assign_quiz';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['classroom_id', 'quiz_id', 'quiz_type', 'minutes', 'enable_pause', 'subject_id', 'teacher_id', 'created_by'], 'integer'],
            [['start_time', 'end_time', 'created_time', 'updated_time'], 'safe'],
            [['instruction', 'description'], 'string'],
            [['quiz_title'], 'string', 'max' => 255],
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
            'quiz_id' => Yii::t('app', 'Quiz ID'),
            'quiz_type' => Yii::t('app', 'Quiz Type'),
            'start_time' => Yii::t('app', 'Start Time'),
            'end_time' => Yii::t('app', 'End Time'),
            'created_time' => Yii::t('app', 'Created Time'),
            'updated_time' => Yii::t('app', 'Updated Time'),
            'instruction' => Yii::t('app', 'Instruction'),
            'description' => Yii::t('app', 'Description'),
            'minutes' => Yii::t('app', 'Minutes'),
            'enable_pause' => Yii::t('app', 'Enable Pause'),
            'subject_id' => Yii::t('app', 'Subject ID'),
            'teacher_id' => Yii::t('app', 'Teacher ID'),
            'quiz_title' => Yii::t('app', 'Quiz Title'),
            'created_by' => Yii::t('app', 'Created By'),
        ];
    }
}
