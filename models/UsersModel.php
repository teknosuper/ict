<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $authKey
 * @property string $password
 * @property string $email
 * @property string $accessToken
 * @property string $userType
 * @property int $user_id
 */
class UsersModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['username', 'password', 'email'], 'string', 'max' => 255],
            [['authKey', 'accessToken'], 'string', 'max' => 32],
            [['userType'], 'string', 'max' => 50],
            [['username'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'authKey' => Yii::t('app', 'Auth Key'),
            'password' => Yii::t('app', 'Password'),
            'email' => Yii::t('app', 'Email'),
            'accessToken' => Yii::t('app', 'Access Token'),
            'userType' => Yii::t('app', 'User Type'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }
}
