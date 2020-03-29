<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "e_learning_items".
 *
 * @property int $id
 * @property int $elearning_id
 * @property string $chapter
 * @property string $content
 * @property int $status
 * @property string $description
 * @property string $created_time
 * @property int $created_by
 * @property string $elearning_type
 * @property string $cover_image
 */
class ELearningItemsTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'e_learning_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['elearning_id', 'status', 'created_by'], 'integer'],
            [['content', 'description', 'elearning_type'], 'string'],
            [['created_time'], 'safe'],
            [['chapter'], 'string', 'max' => 500],
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
            'elearning_id' => Yii::t('app', 'Elearning ID'),
            'chapter' => Yii::t('app', 'Chapter'),
            'content' => Yii::t('app', 'Content'),
            'status' => Yii::t('app', 'Status'),
            'description' => Yii::t('app', 'Description'),
            'created_time' => Yii::t('app', 'Created Time'),
            'created_by' => Yii::t('app', 'Created By'),
            'elearning_type' => Yii::t('app', 'Elearning Type'),
            'cover_image' => Yii::t('app', 'Cover Image'),
        ];
    }
}
