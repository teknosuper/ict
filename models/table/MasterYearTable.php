<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "master_year".
 *
 * @property int $id
 * @property string $year
 * @property int $status
 */
class MasterYearTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_year';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
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
            'year' => Yii::t('app', 'Year'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
