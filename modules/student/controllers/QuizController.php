<?php

namespace app\modules\student\controllers;
use yii;
use yii\web\Response;
use yii\web\Controller;
use app\models\search\QuizSearch;
use app\models\search\AssignQuizSearch;
/**
 * Default controller for the `student` module
 */
class QuizController extends \app\controllers\MainController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AssignQuizSearch();
        $studentsAssignClassroomsPlanIds = \yii::$app->user->identity->userBelongsToUserType->studentsAssignClassroomsPlanIds;

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $teacher_id = $searchModel->teacher_id;
        $subject_id = $searchModel->subject_id;
        $dataProvider->query->where([
            'classroom_id'=>$studentsAssignClassroomsPlanIds,
        ]);
        $dataProvider->query->orderBy([
            'id'=>SORT_DESC
        ]);
        if($teacher_id)
        {
            $dataProvider->query->andWhere([
                'teacher_id'=>$teacher_id,
            ]);            
        }        
        if($subject_id)
        {
            $dataProvider->query->andWhere([
                'subject_id'=>$subject_id,
            ]);            
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }

    public function actionEnd()
    {
        $quiz_id = \yii::$app->request->get('quiz_id');
        if(\yii::$app->request->post())
        {
            $student_id = \yii::$app->user->identity->userBelongsToUserType->id;
            $getQuizResultsByQuizId = \app\models\QuizResultsModel::find()->where(['quiz_id'=>$quiz_id,'student_id'=>$student_id])->one();
            $getQuizResultsByQuizId->status = 2;
            $save = $getQuizResultsByQuizId->save();
            return $this->redirect(['/student/quiz/preview/'.$quiz_id]);
        }
        else
        {
            return $this->redirect(['/student/quiz/preview/'.$quiz_id]);
        }
    }

    public function actionTake()
    {
        if(\yii::$app->user->identity->userType=="student")
        {
            $quiz_id = \yii::$app->request->get('quiz_id');
            $getQuizById = \app\models\AssignQuizModel::find()->where(['id'=>$quiz_id])->one();
            $student_id = \yii::$app->user->identity->userBelongsToUserType->id;

            $current_page = (\yii::$app->request->get('page')) ? \yii::$app->request->get('page') : 1;
            if($getQuizById)
            {
                $message[] = $getQuizById;
                \cakebake\actionlog\model\ActionLog::add('success',$message, $student_id); //log message for success

                $getQuizItems = \app\models\QuizItemsModel::getQuizItems($getQuizById->quiz_id);
                $quisItemId = null;
                foreach($getQuizItems['returnData']['data'] as $getQuizItemsData)
                {
                    $quisItemId = $getQuizItemsData->id;
                    $getQuizItemsItem = $getQuizItemsData;
                }

                switch ($getQuizItemsItem->quiz_type) {
                    case \app\models\QuizItemsModel::MULTIPLE_CHOICE:
                        $QuizAnswerForm = new \app\models\form\QuizAnswerForm;
                        # code...
                        break;
                    case \app\models\QuizItemsModel::ESSAY:
                        $QuizAnswerForm = new \app\models\form\QuizAnswerEssayForm;
                        # code...
                        break;                    
                    default:
                        # code...
                        break;
                }
                $QuizResultsModel = \app\models\QuizResultsModel::startQuiz($student_id,$getQuizById->id);

                $getQuizResultsByQuizId = \app\models\QuizResultsModel::find()->where(['quiz_id'=>$quiz_id,'student_id'=>$student_id])->one();
                $getQuizResultsByQuizId->getCheckStatus();

                switch ($getQuizResultsByQuizId->status) {
                    case 2:
                    case 3:
                        $this->redirect(["/student/quiz/preview/{$quiz_id}"]);
                        # code...
                        break;
                    
                    default:
                        # code...
                        break;
                }
                $getAnswer = \app\models\QuizResultsAnswerModel::getAnswer($QuizResultsModel['returnData']['id'],$quisItemId,'answer');
                $QuizAnswerForm->optionItems = $getAnswer;
                $QuizAnswerForm->answer = $getAnswer;
                $pagingData = $getQuizItems['returnData']['paginationModel'];

                if($QuizAnswerForm->load(Yii::$app->request->post())) 
                {
                    switch ($getQuizItemsItem->quiz_type) {
                        case \app\models\QuizItemsModel::MULTIPLE_CHOICE:
                            $calculate = $getQuizById->getCalculateAllAnswer($student_id);
                            $setAnswer = \app\models\QuizResultsAnswerModel::setAnswer($QuizResultsModel['returnData']['id'],$quisItemId,$QuizAnswerForm->optionItems,$student_id);         
                            # code...
                            break;
                        case \app\models\QuizItemsModel::ESSAY:
                            $setAnswer = \app\models\QuizResultsAnswerModel::setAnswerEssay($QuizResultsModel['returnData']['id'],$quisItemId,$QuizAnswerForm->answer,$student_id);         
                            # code...
                            break;                    
                        default:
                            # code...
                            break;
                    }

                    $totalPage = $pagingData->totalCount;
                    // $next_page = ($current_page < $totalPage) ? $current_page+1 : $current_page;
                    $next_page = $current_page+1;
                    if($totalPage<$next_page)
                    {
                        return $this->redirect(["quiz/preview/{$quiz_id}"]);
                    }
                    else
                    {
                        return $this->redirect(["quiz/take/{$quiz_id}", 'page' => $next_page]);
                    }
                }
                $getStats = $getQuizById->getStats($student_id);
                return $this->render('takequiz',[
                    'getQuizById'=>$getQuizById,
                    'getQuizItems'=>$getQuizItems,
                    'QuizAnswerForm'=>$QuizAnswerForm,
                    'getStats'=>$getStats,
                ]);         
            }
            else
            {
                throw new \yii\web\NotFoundHttpException;
            }
        }
        else
        {
            throw new \yii\web\NotFoundHttpException;
        }

    }

    public function actionPreview()
    {
        if(\yii::$app->user->identity->userType=="student")
        {
        	$quiz_id = \yii::$app->request->get('quiz_id');
            $student_id = \yii::$app->user->identity->userBelongsToUserType->id;
        	$getQuizResultsByQuizId = \app\models\QuizResultsModel::find()->where(['quiz_id'=>$quiz_id,'student_id'=>$student_id])->one();
            if(!$getQuizResultsByQuizId)
            {
                $getQuizResultsByQuizId = new \app\models\QuizResultsModel;
                $getQuizResultsByQuizId->quiz_id = $quiz_id;
                $getQuizResultsByQuizId->student_id = $student_id;
                $getQuizResultsByQuizId->status = 0;
                $getQuizResultsByQuizId->save();
            }
     		if(isset($getQuizResultsByQuizId))
    		{
                $getQuizResultsByQuizId->getCheckStatus();
                $getStats = $getQuizResultsByQuizId->quizResultsBelongsToAssignQuiz->getStats($student_id);
                // if (\Yii::$app->request->isAjax)
                // {
                //     return $this->renderAjax('preview',[
                //         'getQuizResultsByQuizId'=>$getQuizResultsByQuizId,
                //         'getStats'=>$getStats,
                //     ]);                         
                // }
    	    	return $this->render('preview',[
    	    		'getQuizResultsByQuizId'=>$getQuizResultsByQuizId,
                    'getStats'=>$getStats,
    	    	]);			
    		}
    		else
    		{
                throw new \yii\web\NotFoundHttpException;
    		}
        }
        else
        {
            throw new \yii\web\NotFoundHttpException;
        }
    }

    public function actionResult()
    {

    	$quiz_id = \yii::$app->request->get('quiz_id');
        
        $student_id = \yii::$app->user->identity->userBelongsToUserType->id;
    	$getQuizById = \app\models\QuizResultsModel::find()->where(['quiz_id'=>$quiz_id,'student_id'=>$student_id])->one(); 
    	return $this->render('result');
    }

}
