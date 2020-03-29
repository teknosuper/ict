<?php

namespace app\modules\student\controllers;
use yii;
use yii\web\Response;
use yii\web\Controller;

use app\models\search\SubjectsPlanSearch;

/**
 * Default controller for the `student` module
 */
class SimulationController extends \app\controllers\MainController
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
        $searchModel = new \app\models\search\SimulationSearch();
        $searchModel->subjects_plan_id = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // $dataProvider->query->andWhere([
        //     'elearning_id'=>$id,
        // ]);
        return $this->render('chapter', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $this->layout = "//main-login";
        $model = \app\models\SimulationModel::find()->where(['id'=>$id])->one();
        if($model)
        {
            $searchModel = new \app\models\search\SimulationSearch();
            $searchModel->subjects_plan_id = $model->subjects_plan_id;
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


}