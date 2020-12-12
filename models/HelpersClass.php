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
class HelpersClass
{

    public static function getExt($fileUrl)
    {
        $parse_url = pathinfo($fileUrl);
        return $parse_url['extension'];
        // [dirname] => http://ade.diklat/uploads/2019/09
        //  [basename] => struktur-sospmdpppaall.pdf
        //  [extension] => pdf
        //  [filename] => struktur-sospmdpppaall
        // echo "<pre>";
        // print_r($parse_url);
        // echo "</pre>";
    }    

    public static function getPreviewLink($urlPreview)
    {
        $ext = self::getExt($urlPreview);
        switch ($ext) {
            case 'doc':
            case 'docx':
            case 'xls':
            case 'xlsx':
            case 'ppt':
            case 'pptx':
            case 'pdf':
                return "
                    <p><a  data-pjax=0 target='__blank' href='https://docs.google.com/viewerng/viewer?url={$urlPreview}&hl=en' class='btn btn-success btn-xs'><i class='fa fa-link'></i> Pratinjau Berkas</a></p> 
                     <p><a href='{$urlPreview}' class='btn btn-primary btn-xs' download='' data-pjax=0><i class='fa fa-download'></i> Unduh Berkas</a></p>
                ";            
                # code...
                break;
            default:
                return "
                    <p><a data-pjax=0 target='__blank' href='{$urlPreview}' class='btn btn-success btn-xs'><i class='fa fa-link'></i> Pratinjau Berkas</a></p>
                     <p><a href='{$urlPreview}' class='btn btn-primary btn-xs' download='' data-pjax=0><i class='fa fa-download'></i> Unduh Berkas</a></p>
                ";
                # code...
                break;
        }
    }

    public static function getUserDefaultProfilePic()
    {
        return "/images/undefined.png";
    }

    public static function getTextClean($text)
    {
        $search_array = ['<img '];
        $search_replace = ["<img class='img img-responsive'"];
        return str_replace($search_array,$search_replace, $text);
    }

    public static function getStatusListDetail($status)
    {
        $array = self::getStatusList();
        return isset($array[$status]) ? $array[$status] : NULL;
    }

    public static function getStatusList()
    {
        return [
            1=>"AKTIF",
            0=>"TIDAK AKTIF",
            2=>"DIHAPUS",
        ];
    }

    public static function closetags($html) {
        preg_match_all('#<([a-z]+)(?: .*)?(?<![/|/ ])>#iU', $html, $result);
        $openedtags = $result[1];
        preg_match_all('#</([a-z]+)>#iU', $html, $result);
        $closedtags = $result[1];
        $len_opened = count($openedtags);
        if (count($closedtags) == $len_opened) {
            return $html;
        }
        $openedtags = array_reverse($openedtags);
        for ($i=0; $i < $len_opened; $i++) {
            if (!in_array($openedtags[$i], $closedtags)) {
                $html .= '</'.$openedtags[$i].'>';
            } else {
                unset($closedtags[array_search($openedtags[$i], $closedtags)]);
            }
        }
        return $html;

    }

	public static function getUrlProxy($url)
	{

	}

    public static function setSeoUrl($string)
    {
        $search_replace = [
            '%','*','@','!','~','.',',','~',' ','/','(',')'
        ];
        $return = str_replace($search_replace,'-', $string);
        return strtolower($return);        
    }

	public static function setLatestCache($cacheUniqueId='cacheLatestUser',$cacheContent=[],$limitContent=30,$cacheTimeOut=120)
	{
        $cache = Yii::$app->cache;
        $getContent = $cache->get($cacheUniqueId);
        if($getContent===FALSE)
        {
            $newContent = $cacheContent;
            $cache->set($cacheUniqueId,$newContent,60*$cacheTimeOut);
        }        
        else
        {
            $limitArray = array_slice($getContent, 0,$limitContent);
            $addContent = array_values(array_unique(array_merge($cacheContent,$limitArray)));
            $cache->set($cacheUniqueId,$addContent,60*$cacheTimeOut);            
        }

        $getContent = $cache->get($cacheUniqueId);
        return $getContent;
	}

    public static function isMenuActive($urls=[],$isActive='active',$isNotActive='')
    {
        $pathInfo = \yii::$app->request->pathInfo;
        if(is_array($urls))
        {
            foreach($urls as $url){
                if(strpos($pathInfo, $url) !== false) 
                {
                    echo $isActive;
                }
                else
                {
                    echo $isNotActive;                    
                }
            }
        }
        else
        {
            echo $isNotActive;
        }

    }

	public static function getLatestCache($cacheUniqueId)
	{
        $cache = Yii::$app->cache;
        $getContent = $cache->get($cacheUniqueId);	
        return $getContent;	
	}
}