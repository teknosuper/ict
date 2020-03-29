<?php

namespace app\modules\student\controllers;
use yii;
use yii\web\Response;
use yii\web\Controller;

use app\models\ELearningModel;
use app\models\search\SubjectsPlanSearch;

/**
 * Default controller for the `student` module
 */
class ElearningController extends \app\controllers\MainController
{
    public function actionIndex()
    {

        $searchModel = new SubjectsPlanSearch();
        $searchModel->subject_id = 1;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere([
            'parent_id'=>0,
        ]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionChapter($id)
    {
        $searchModel = new \app\models\search\ELearningItemsModelSearch();
        $searchModel->elearning_id = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere([
            'elearning_type'=>'elearning'
        ]);
        return $this->render('chapter', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSubjectreference($id)
    {
        $model = \app\models\SubjectsPlanReferenceModel::find()->where(['subject_plan_id'=>$id])->all();
        $searchModel = new \app\models\search\SubjectsPlanReferenceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if (\Yii::$app->request->isAjax) {
            return $this->renderAjax('subjectreference', [
                'model' => $model,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        return $this->render('subjectreference', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }    

    public function actionView($id)
    {
        $model = \app\models\ELearningItemsModel::find()->where(['id'=>$id])->one();
        if($model)
        {
            $searchModel = new \app\models\search\ELearningItemsModelSearch();
            $searchModel->elearning_id = $model->elearning_id;
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            // $dataProvider->query->andWhere([
            //     'elearning_id'=>$id,
            // ]);
            return $this->render('view', [
                'model' => $model,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);            
        }
        else
        {   
            throw new NotFoundHttpException(Yii::t('app', 'Maaf ! data tidak dapat ditemukan'));
        }

    }

    protected function findModel($id)
    {
        if (($model = ELearningModel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}