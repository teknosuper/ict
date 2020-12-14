<?php

namespace app\modules\dashboard\controllers;

use Yii;
use app\models\AssignClassroomTeacherModel;
use app\models\search\ClassroomTeacherSearch;
use app\controllers\MainController;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\search\QuizResultsSearch;

/**
 * ResultsController implements the CRUD actions for AssignClassroomTeacherModel model.
 */
class ResultsController extends MainController
{

    /**
     * Lists all AssignClassroomTeacherModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClassroomTeacherSearch();
        $searchModel->teacher_id = \yii::$app->user->identity->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionStudent()
    {
        $student_id = \yii::$app->request->get('student_id');

        $searchModel = new QuizResultsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $lksResultsAverage = \app\models\QuizResultsModel::find()
        ->where([
            'student_id'=>$student_id,
            'quiz_type'=>1,
        ])->average('grade_point');
        $kuisResultsAverage = \app\models\QuizResultsModel::find()
        ->where([
            'student_id'=>$student_id,
            'quiz_type'=>2,
        ])->average('grade_point');
        return $this->render('student/index',[
            'lksResultsAverage' => $lksResultsAverage,
            'kuisResultsAverage' => $kuisResultsAverage,            
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AssignClassroomTeacherModel model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AssignClassroomTeacherModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AssignClassroomTeacherModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AssignClassroomTeacherModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AssignClassroomTeacherModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AssignClassroomTeacherModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AssignClassroomTeacherModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AssignClassroomTeacherModel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
