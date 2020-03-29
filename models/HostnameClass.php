<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_hostname".
 *
 * @property int $id
 * @property string $host
 * @property string $host_description
 * @property string $host_template
 * @property int $status
 */
class HostnameClass extends \app\models\table\MasterHostnameTable
{


    public static function getHostnameList()
    {
        return \yii\helpers\ArrayHelper::map(self::find()->all(), 'id', 'host');
    }

	public static function getHostname()
	{
        $host = self::getHost();
        $cache = Yii::$app->cache;
        $cacheUniqueId = 'getHostname-'."{$host}";
        $getContent = $cache->get($cacheUniqueId);
        if($getContent===FALSE)
        {
            $searchArray = [
                'http://',
                'www.',
                'https://'
            ];
            $replaceArray = ['','',''];
            $host = str_replace($searchArray, $replaceArray, $host);
            $hostnameModel = self::find()->where(['host'=>$host,'status'=>1])->one();
            if($hostnameModel)
            {
            	$returnData = [
            		'status'=>200,
            		'error_message'=>null,
            		'returnData'=>[
            			'id'=>$hostnameModel->id,
            			'host'=>$hostnameModel->host,
                        'host_template'=>$hostnameModel->host_template,
            			'host_logo'=>$hostnameModel->host_logo,
            			'status'=>$hostnameModel->status,
            		],
            	];
            }
            else
            {
            	$returnData = [
            		'status'=>404,
            		'error_message'=>'hostname not found',
            		'returnData'=>null,
            	];
            }

            $getContent = $returnData;
            $cache->set($cacheUniqueId,$getContent,60*10);
        }

        return $getContent;

	}

    public static function getHostStatic()
    {
        return isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'];        
    }

    public static function getHost()
    {
        return isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'];        
    }

}