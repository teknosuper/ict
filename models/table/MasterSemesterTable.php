<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "master_semester".
 *
 * @property int $id
 * @property string $semeter
 * @property string $desc
 */
class MasterSemesterTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_semester';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['semeter', 'desc'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'semeter' => Yii::t('app', 'Semeter'),
            'desc' => Yii::t('app', 'Desc'),
        ];
    }
}
