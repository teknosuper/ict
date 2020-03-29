<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "quiz_results_answer_elearning".
 *
 * @property int $id
 * @property int $quiz_result_id
 * @property int $quiz_item_id
 * @property string $option
 * @property string $created_time
 * @property int $created_by
 * @property string $updated_time
 * @property int $updated_by
 */
class QuizResultsAnswerElearningTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quiz_results_answer_elearning';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quiz_result_id', 'quiz_item_id', 'created_by', 'updated_by'], 'integer'],
            [['created_time', 'updated_time'], 'safe'],
            [['option'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'quiz_result_id' => Yii::t('app', 'Quiz Result ID'),
            'quiz_item_id' => Yii::t('app', 'Quiz Item ID'),
            'option' => Yii::t('app', 'Option'),
            'created_time' => Yii::t('app', 'Created Time'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_time' => Yii::t('app', 'Updated Time'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }
}
