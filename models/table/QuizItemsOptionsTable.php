<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "quiz_items_options".
 *
 * @property int $id
 * @property int $quiz_item_id
 * @property string $option
 * @property string $value
 * @property int $is_correct_answer
 * @property string $answer_details
 */
class QuizItemsOptionsTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quiz_items_options';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quiz_item_id', 'is_correct_answer'], 'integer'],
            [['answer_details'], 'string'],
            [['option'], 'string', 'max' => 2],
            [['value'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'quiz_item_id' => 'Quiz Item ID',
            'option' => 'Option',
            'value' => 'Value',
            'is_correct_answer' => 'Is Correct Answer',
            'answer_details' => 'Answer Details',
        ];
    }
}
