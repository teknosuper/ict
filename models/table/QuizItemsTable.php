<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "quiz_items".
 *
 * @property int $id
 * @property int $quiz_id
 * @property int $quiz_type
 * @property string $text
 * @property int $status
 * @property string $answer_description
 * @property string $correct_option
 */
class QuizItemsTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quiz_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quiz_id', 'quiz_type', 'status'], 'integer'],
            [['text', 'answer_description'], 'string'],
            [['correct_option'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'quiz_id' => Yii::t('app', 'Quiz ID'),
            'quiz_type' => Yii::t('app', 'Quiz Type'),
            'text' => Yii::t('app', 'Text'),
            'status' => Yii::t('app', 'Status'),
            'answer_description' => Yii::t('app', 'Answer Description'),
            'correct_option' => Yii::t('app', 'Correct Option'),
        ];
    }
}
