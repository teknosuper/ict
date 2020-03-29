<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "teachers".
 *
 * @property int $id
 * @property string $full_name
 * @property string $address
 * @property string $place_of_birth
 * @property string $date_of_birth
 * @property string $country_ID
 */
class TeachersTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teachers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_of_birth'], 'safe'],
            [['full_name', 'address', 'place_of_birth'], 'string', 'max' => 255],
            [['country_ID'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'full_name' => Yii::t('app', 'Full Name'),
            'address' => Yii::t('app', 'Address'),
            'place_of_birth' => Yii::t('app', 'Place Of Birth'),
            'date_of_birth' => Yii::t('app', 'Date Of Birth'),
            'country_ID' => Yii::t('app', 'Country I D'),
        ];
    }
}
