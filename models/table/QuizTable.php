<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "quiz".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $teacher_id
 * @property int $subject_id
 * @property int $created_by
 * @property string $created_time
 * @property string $updated_time
 */
class QuizTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quiz';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['teacher_id', 'subject_id', 'created_by'], 'integer'],
            [['created_time', 'updated_time'], 'safe'],
            [['title'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'teacher_id' => Yii::t('app', 'Teacher ID'),
            'subject_id' => Yii::t('app', 'Subject ID'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_time' => Yii::t('app', 'Created Time'),
            'updated_time' => Yii::t('app', 'Updated Time'),
        ];
    }
}
