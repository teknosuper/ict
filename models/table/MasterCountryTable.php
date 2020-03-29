<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "master_country".
 *
 * @property int $id
 * @property string $country_ID
 * @property string $country_name
 * @property int $status
 */
class MasterCountryTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['country_ID'], 'string', 'max' => 10],
            [['country_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'country_ID' => Yii::t('app', 'Country I D'),
            'country_name' => Yii::t('app', 'Country Name'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
