<?php

namespace app\modules\student\controllers;
use Yii;
use yii\web\Controller;
use yii\db\Query;

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
        $student_id = \yii::$app->user->identity->userBelongsToUserType->id;
    	$classroom_id = \yii::$app->request->get('id');
    	$assignClassroomModel = \app\models\AssignClassroomModel::find()->where(['id'=>$classroom_id])->one();
        $searchModel = new \app\models\search\AssignQuizSearch();
        $searchModel->classroom_id = $classroom_id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $offlineResults = \app\models\QuizResultsModel::find()->where([
            'student_id'=>$student_id,
            'quiz_model'=>2,
        ])->all();        
        $onlineResults = \app\models\QuizResultsModel::find()->where([
            'student_id'=>$student_id,
            'quiz_model'=>1,
        ])->all();
        $lksResultsAverage = \app\models\QuizResultsModel::find()
        // ->select('sum(grade_point) as average')
        ->where([
            'student_id'=>$student_id,
            'quiz_type'=>1,
        ])->average('grade_point');
        $kuisResultsAverage = \app\models\QuizResultsModel::find()
        // ->select('sum(grade_point) as average')
        ->where([
            'student_id'=>$student_id,
            'quiz_type'=>2,
        ])->average('grade_point');
        // echo "<pre>";
        // print_r($onlineResultsAverage);
        // echo "</pre>";
        // die;
    	return $this->render('view',[
    		'assignClassroomModel'=>$assignClassroomModel,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'offlineResults' => $offlineResults,
            'onlineResults' => $onlineResults,
            'lksResultsAverage' => $lksResultsAverage,
            'kuisResultsAverage' => $kuisResultsAverage,
    	]);
    }
}
