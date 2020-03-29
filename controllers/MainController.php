<?php 

namespace app\controllers;
use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
/**
 * 
 */
class MainController extends Controller
{
    public $layout ='//main-dashboard';

	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    /**
     * Exclude layout rendering when ajax requests
     */
    // public function render($view, $params = [])
    // {
    //     if (\Yii::$app->request->isAjax) {
    //         return $this->renderAjax($view, $params);
    //     }
    //     return parent::render($view, $params);
    // }
	
	public function init()
	{
		$hostname = \app\models\HostnameClass::getHostname();
		// $hostname = \common\models\MasterHostnameModel::getHostname();
		if($hostname['status']==200)
		{
			// echo $hostname['returnData']['hostname_template'];die;
			\yii::$app->view->theme->pathMap['@app/views']=$hostname['returnData']['host_template'];
		}
	}
}

?>