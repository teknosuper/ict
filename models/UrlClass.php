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
class UrlClass
{

    public static function  generateUrl($urlType='/',$urlDatas=[],$link_name=[],$anchor=null,$appendPaging=null)
    {
        $urlData = implode('/',$urlDatas);
        $urlDataAttr = implode(' | ',$urlDatas);

        switch ($_SERVER['SERVER_NAME']) {
            case 'webgrum.com':
                switch ($urlType) {
                    case 'instagram_profile':
                        return rtrim("/{$urlData}{$anchor}","/");
                        # code...
                        break;       
                    default:
                        return '';
                        # code...
                        break;
                }
                # code...
                break;
                # code...
	    	default:
                switch ($urlType) {
                    case 'logout':
                        return rtrim("/site/logout/{$urlData}{$anchor}","/");
                        # code...
                        break;          
                    case 'site':
                        return rtrim("/{$urlData}{$anchor}","/");
                        # code...
                        break;          
                    default:
                        return rtrim("/{$urlData}{$anchor}","/");
                        # code...
                        break;
                }
                # code...
                break;
        }

    }  

}