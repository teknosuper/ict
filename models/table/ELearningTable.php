<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "e_learning".
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $description
 * @property string $syllabus
 * @property int $status
 * @property int $teacher_id
 * @property int $subject_id
 * @property string $created_time
 * @property string $updated_time
 * @property int $created_by
 */
class ELearningTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'e_learning';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'status', 'teacher_id', 'subject_id', 'created_by'], 'integer'],
            [['description', 'syllabus'], 'string'],
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
            'user_id' => Yii::t('app', 'User ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'syllabus' => Yii::t('app', 'Syllabus'),
            'status' => Yii::t('app', 'Status'),
            'teacher_id' => Yii::t('app', 'Teacher ID'),
            'subject_id' => Yii::t('app', 'Subject ID'),
            'created_time' => Yii::t('app', 'Created Time'),
            'updated_time' => Yii::t('app', 'Updated Time'),
            'created_by' => Yii::t('app', 'Created By'),
        ];
    }
}
