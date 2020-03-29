<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "simulation".
 *
 * @property int $id
 * @property string $title
 * @property string $file_html
 * @property string $description
 * @property int $subjects_plan_id
 * @property int $created_by
 * @property string $created_time
 */
class SimulationTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'simulation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file_html', 'description'], 'string'],
            [['subjects_plan_id', 'created_by'], 'integer'],
            [['created_time'], 'safe'],
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
            'file_html' => Yii::t('app', 'File Html'),
            'description' => Yii::t('app', 'Description'),
            'subjects_plan_id' => Yii::t('app', 'Subjects Plan ID'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_time' => Yii::t('app', 'Created Time'),
        ];
    }
}
