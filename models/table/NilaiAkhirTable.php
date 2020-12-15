<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "nilai_akhir".
 *
 * @property int $id
 * @property int $student_id
 * @property string $nilai_akhir
 */
class NilaiAkhirTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nilai_akhir';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id'], 'integer'],
            [['nilai_akhir'], 'string', 'max' => 11],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'student_id' => Yii::t('app', 'Student ID'),
            'nilai_akhir' => Yii::t('app', 'Nilai Akhir'),
        ];
    }
}
