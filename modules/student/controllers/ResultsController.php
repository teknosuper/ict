<?php

namespace app\modules\student\controllers;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `student` module
 */
class ResultsController extends \app\controllers\MainController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new \app\models\search\AssignClassroomSearch();
        $searchModel->student_id = \yii::$app->user->identity->userBelongsToUserType->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionView()
    {
    	$classroom_id = \yii::$app->request->get('id');
    	$assignClassroomModel = \app\models\AssignClassroomModel::find()->where(['id'=>$classroom_id])->one();
        $searchModel = new \app\models\search\AssignQuizSearch();
        $searchModel->classroom_id = $classroom_id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // echo "<pre>";
        // print_r($dataProvider->getTotalCount());
        // echo "</pre>";
        // die;
    	return $this->render('view',[
    		'assignClassroomModel'=>$assignClassroomModel,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
    	]);
    }
}
