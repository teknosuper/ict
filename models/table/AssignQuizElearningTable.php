<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "assign_quiz_elearning".
 *
 * @property int $id
 * @property int $quiz_id
 * @property int $subject_id
 * @property int $elearning_item_id
 * @property int $status
 * @property string $created_time
 * @property string $updated_time
 */
class AssignQuizElearningTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assign_quiz_elearning';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quiz_id', 'subject_id', 'elearning_item_id', 'status'], 'integer'],
            [['created_time', 'updated_time'], 'safe'],
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
            'subject_id' => Yii::t('app', 'Subject ID'),
            'elearning_item_id' => Yii::t('app', 'Elearning Item ID'),
            'status' => Yii::t('app', 'Status'),
            'created_time' => Yii::t('app', 'Created Time'),
            'updated_time' => Yii::t('app', 'Updated Time'),
        ];
    }
}
