<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "master_script".
 *
 * @property int $id
 * @property string $master_script_name
 * @property string $master_script_slug
 * @property string $master_script_by_tag_location
 * @property string $master_script_by_tag_location_position
 * @property int $master_script_hostname_id
 * @property string $master_script_code
 * @property int $master_script_order
 * @property int $master_script_status
 * @property string $master_script_platform_type
 * @property string $created_time
 * @property string $updated_time
 */
class MasterScriptTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_script';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['master_script_by_tag_location_position', 'master_script_code'], 'string'],
            [['master_script_hostname_id', 'master_script_order', 'master_script_status'], 'integer'],
            [['created_time', 'updated_time'], 'safe'],
            [['master_script_name', 'master_script_slug'], 'string', 'max' => 255],
            [['master_script_by_tag_location', 'master_script_platform_type'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'master_script_name' => Yii::t('app', 'Master Script Name'),
            'master_script_slug' => Yii::t('app', 'Master Script Slug'),
            'master_script_by_tag_location' => Yii::t('app', 'Master Script By Tag Location'),
            'master_script_by_tag_location_position' => Yii::t('app', 'Master Script By Tag Location Position'),
            'master_script_hostname_id' => Yii::t('app', 'Master Script Hostname ID'),
            'master_script_code' => Yii::t('app', 'Master Script Code'),
            'master_script_order' => Yii::t('app', 'Master Script Order'),
            'master_script_status' => Yii::t('app', 'Master Script Status'),
            'master_script_platform_type' => Yii::t('app', 'Master Script Platform Type'),
            'created_time' => Yii::t('app', 'Created Time'),
            'updated_time' => Yii::t('app', 'Updated Time'),
        ];
    }
}
