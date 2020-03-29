<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "classrooms".
 *
 * @property int $id
 * @property int $school_id
 * @property string $classroom_name
 * @property string $classroom_description
 */
class ClassroomsTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'classrooms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['school_id'], 'integer'],
            [['classroom_name'], 'string', 'max' => 255],
            [['classroom_description'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'school_id' => 'Sekolah',
            'classroom_name' => 'Kelas',
            'classroom_description' => 'Deskripsi Kelas',
        ];
    }
}
