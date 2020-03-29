<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "classrooms_plan".
 *
 * @property int $id
 * @property int $classroom_id
 * @property string $year
 * @property int $semester_id
 * @property int $status
 */
class ClassroomsPlanTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'classrooms_plan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['classroom_id', 'semester_id', 'status'], 'integer'],
            [['year'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'classroom_id' => Yii::t('app', 'Kelas'),
            'year' => Yii::t('app', 'Tahun'),
            'semester_id' => Yii::t('app', 'Semester'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
