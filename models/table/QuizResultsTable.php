<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "quiz_results".
 *
 * @property int $id
 * @property int $student_id
 * @property int $quiz_id
 * @property string $quiz_taken
 * @property string $quiz_finish
 * @property int $status
 * @property string $grade_point
 */
class QuizResultsTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quiz_results';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'quiz_id', 'status'], 'integer'],
            [['quiz_taken', 'quiz_finish'], 'safe'],
            [['grade_point'], 'safe'],
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
            'quiz_id' => Yii::t('app', 'Quiz ID'),
            'quiz_taken' => Yii::t('app', 'Quiz Taken'),
            'quiz_finish' => Yii::t('app', 'Quiz Finish'),
            'status' => Yii::t('app', 'Status'),
            'grade_point' => Yii::t('app', 'Grade Point'),
        ];
    }
}
