<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "master_hostname".
 *
 * @property int $id
 * @property string $host
 * @property string $host_description
 * @property string $host_template
 * @property int $status
 * @property string $host_logo
 */
class MasterHostnameTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_hostname';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['host', 'host_description', 'host_template', 'host_logo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'host' => Yii::t('app', 'Host'),
            'host_description' => Yii::t('app', 'Host Description'),
            'host_template' => Yii::t('app', 'Host Template'),
            'status' => Yii::t('app', 'Status'),
            'host_logo' => Yii::t('app', 'Host Logo'),
        ];
    }
}
