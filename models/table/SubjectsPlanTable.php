<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "subjects_plan".
 *
 * @property int $id
 * @property int $subject_id
 * @property string $chapter
 * @property int $parent_id
 * @property string $cover_image
 * @property string $learning_objective
 */
class SubjectsPlanTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subjects_plan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subject_id', 'parent_id'], 'integer'],
            [['learning_objective'], 'string'],
            [['chapter'], 'string', 'max' => 255],
            [['cover_image'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'subject_id' => Yii::t('app', 'Subject ID'),
            'chapter' => Yii::t('app', 'Chapter'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'cover_image' => Yii::t('app', 'Cover Image'),
            'learning_objective' => Yii::t('app', 'Learning Objective'),
        ];
    }
}
