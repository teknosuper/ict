<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "quiz_formula".
 *
 * @property int $id
 * @property string $tipe_kuis
 * @property string $year
 * @property int $porsi_nilai
 * @property int $status
 */
class QuizFormulaTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quiz_formula';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['porsi_nilai', 'status'], 'integer'],
            [['tipe_kuis', 'year'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tipe_kuis' => Yii::t('app', 'Tipe Kuis'),
            'year' => Yii::t('app', 'Year'),
            'porsi_nilai' => Yii::t('app', 'Porsi Nilai'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
