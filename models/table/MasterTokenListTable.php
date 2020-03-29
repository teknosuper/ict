<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "master_token_list".
 *
 * @property int $id
 * @property string $access_token
 * @property string $usedTime
 * @property int $access_token_status
 * @property string $token_type
 * @property string $source
 * @property string $authurl
 * @property string $createdTime
 * @property int $createdUserId
 * @property string $updatedTime
 * @property int $updatedUserId
 * @property string $deletedTime
 * @property int $deletedUserId
 * @property string $key
 * @property string $error_message
 * @property string $next_limit_time
 * @property string $quota_remaining
 * @property int $is_limit
 * @property string $error_code
 */
class MasterTokenListTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_token_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usedTime', 'createdTime', 'updatedTime', 'deletedTime', 'next_limit_time'], 'safe'],
            [['access_token_status', 'createdUserId', 'updatedUserId', 'deletedUserId', 'is_limit'], 'integer'],
            [['error_message'], 'string'],
            [['access_token', 'authurl'], 'string', 'max' => 1000],
            [['token_type', 'source', 'key', 'quota_remaining'], 'string', 'max' => 255],
            [['error_code'], 'string', 'max' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'access_token' => Yii::t('app', 'Access Token'),
            'usedTime' => Yii::t('app', 'Used Time'),
            'access_token_status' => Yii::t('app', 'Access Token Status'),
            'token_type' => Yii::t('app', 'Token Type'),
            'source' => Yii::t('app', 'Source'),
            'authurl' => Yii::t('app', 'Authurl'),
            'createdTime' => Yii::t('app', 'Created Time'),
            'createdUserId' => Yii::t('app', 'Created User ID'),
            'updatedTime' => Yii::t('app', 'Updated Time'),
            'updatedUserId' => Yii::t('app', 'Updated User ID'),
            'deletedTime' => Yii::t('app', 'Deleted Time'),
            'deletedUserId' => Yii::t('app', 'Deleted User ID'),
            'key' => Yii::t('app', 'Key'),
            'error_message' => Yii::t('app', 'Error Message'),
            'next_limit_time' => Yii::t('app', 'Next Limit Time'),
            'quota_remaining' => Yii::t('app', 'Quota Remaining'),
            'is_limit' => Yii::t('app', 'Is Limit'),
            'error_code' => Yii::t('app', 'Error Code'),
        ];
    }
}
