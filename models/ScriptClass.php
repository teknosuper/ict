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
class ScriptClass extends \app\models\table\MasterScriptTable
{

    public static function getAllScriptByHostname()
    {
        $hostInfo = \app\models\HostnameClass::getHost();
        $getHostname = \app\models\HostnameClass::getHostname();
        $cache = Yii::$app->cache;
        $cacheUniqueId = "getAllScriptByHostname-{$hostInfo}";
        $getContent = $cache->get($cacheUniqueId);
        if($getContent===FALSE OR YII_DEBUG)
        {
            $getMasterScriptModel = self::find()->where(['master_script_status'=>1,'master_script_hostname_id'=>$getHostname['returnData']['id']])->orderBy(['master_script_order'=>SORT_ASC])->all();
            if($getMasterScriptModel)
            {
                $scriptArray = [];
                foreach ($getMasterScriptModel as $getMasterScript) {
                    # code...
                    $scriptArray[]=[
                        'id'=>$getMasterScript->id,
                        'master_script_name'=>$getMasterScript->master_script_name,
                        'master_script_slug'=>$getMasterScript->master_script_slug,
                        'master_script_by_tag_location'=>$getMasterScript->master_script_by_tag_location,
                        'master_script_by_tag_location_position'=>$getMasterScript->master_script_by_tag_location_position,
                        'master_script_hostname_id'=>$getMasterScript->master_script_hostname_id,
                        'master_script_code'=>$getMasterScript->master_script_code,
                        'master_script_order'=>$getMasterScript->master_script_order,
                        'master_script_status'=>$getMasterScript->master_script_status,
                        'master_script_platform_type'=>$getMasterScript->master_script_platform_type,
                    ];                
                }

                $returnData = [
                    'status'=>200,
                    'errorMessage'=>null,
                    'returnData'=>$scriptArray
                ];
            }

            else
            {
                $returnData = [
                    'status'=>404,
                    'errorMessage'=>'content not found',
                    'returnData'=>null
                ];            
            }

            $getContent = $returnData;
            $cache->set($cacheUniqueId,$getContent,60*5);          
        }

        return $getContent;
    }

    public static function getScriptCodeByTagLocation($tag_location="head",$location_position="top")
    {
        $cache = Yii::$app->cache;
        $cacheUniqueId = "getScriptCodeByTagLocation-{$tag_location}-{$location_position}";
        $getContent = $cache->get($cacheUniqueId);
        if($getContent===FALSE OR YII_DEBUG)
        {
            $getAllScriptByHostname = self::getAllScriptByHostname();
            if($getAllScriptByHostname['status']==200)
            {
                $scripts = $getAllScriptByHostname['returnData'];

                $selectsArray = [];
                foreach ($scripts as $key => $value) {
                    # code...
                    if($value['master_script_by_tag_location']==$tag_location AND $value['master_script_by_tag_location_position']==$location_position)
                    {
                        $selectsArray[] = $value['master_script_code'];                    
                    }

                }

                if($selectsArray)
                {
                    $returnData = implode(" ",$selectsArray);
                }
                else
                {
                    $returnData = '';
                }
                // if($selectsArray)
                // {
                //     $returnData = [
                //         'status'=>200,
                //         'errorMessage'=>null,
                //         'returnData'=>array_filter($selectsArray)
                //     ];                            
                // }
                // else
                // {
                //     $returnData = [
                //         'status'=>404,
                //         'errorMessage'=>'content not found',
                //         'returnData'=>null
                //     ];                            
                // }

            }
            else
            {
                $returnData = '';
                // $returnData = [
                //     'status'=>404,
                //     'errorMessage'=>'content not found',
                //     'returnData'=>null
                // ];            
            }

            $getContent = $returnData;
            $cache->set($cacheUniqueId,$getContent,60*5);
        }
        return $getContent;
    }	

}