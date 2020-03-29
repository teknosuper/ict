<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "master_school".
 *
 * @property int $id
 * @property string $school_name
 * @property string $school_address
 * @property string $school_description
 * @property int $status
 */
class MasterSchoolTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_school';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['school_description'], 'string'],
            [['status'], 'integer'],
            [['school_name', 'school_address'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'school_name' => 'School Name',
            'school_address' => 'School Address',
            'school_description' => 'School Description',
            'status' => 'Status',
        ];
    }
}
