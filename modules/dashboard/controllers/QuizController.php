<?php

namespace app\modules\dashboard\controllers;

use Yii;
use app\models\QuizModel;
use app\models\search\QuizSearch;
use app\controllers\MainController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\QuizItemsModel;
use app\models\search\QuizItemsSearch;
use app\models\search\AssignQuizSearch;
use app\models\AssignQuizModel;

/**
 * QuizController implements the CRUD actions for QuizModel model.
 */
class QuizController extends MainController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all QuizModel models.
     * @return mixed
     */
    public function actionBanksoal()
    {
        $searchModel = new QuizSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionBanksoalview($id)
    {
        $searchModel = new QuizItemsSearch();
        $searchModel->quiz_id = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('view', [
            'dataModel' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionBanksoalpublish($id)
    {
        $searchModel = new QuizItemsSearch();
        $searchModel->quiz_id = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('view', [
            'dataModel' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndex()
    {
        $searchModel = new QuizSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single QuizModel model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchModel = new QuizItemsSearch();
        $searchModel->quiz_id = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('view', [
            'dataModel' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionPublish($id)
    {
        $searchModel = new AssignQuizSearch();
        $quiz_id = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $classroom_id = $searchModel->classroom_id;
        $subject_id = $searchModel->subject_id;
        $dataProvider->query->where([
            'quiz_id'=>$quiz_id,
        ]);
        $dataProvider->query->orderBy([
            'id'=>SORT_DESC
        ]);
        if($classroom_id)
        {
            $dataProvider->query->andWhere([
                'classroom_id'=>$classroom_id,
            ]);            
        }        
        if($subject_id)
        {
            $dataProvider->query->andWhere([
                'subject_id'=>$subject_id,
            ]);            
        }

        return $this->render('publish', [
            'dataModel' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPublishclassroom()
    {
        $id = \yii::$app->request->get('quiz_id');
        $model = new AssignQuizModel();
        $quizModel = $this->findModel($id);
        $quiz_id = $quizModel->id;
        $model->subject_id = $quizModel->subject_id;
        $model->quiz_id = $quiz_id;
        $model->teacher_id = \yii::$app->user->identity->userBelongsToUserType->id;
        $model->created_by = \yii::$app->user->identity->id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/dashboard/quiz/publish', 'id' => $quiz_id]);
        }

        if (\Yii::$app->request->isAjax) {
            return $this->renderAjax('_publish/create', [
                'model' => $model,
                'quizModel' => $quizModel,
            ]);
        }

        return $this->render('_publish/create', [
            'model' => $model,
            'quizModel' => $quizModel,
        ]);
    }

    public function actionUpdatepublishclassroom()
    {
        $id = \yii::$app->request->get('id');
        $model = \app\models\AssignQuizModel::find()->where(['id'=>$id])->one();
        $quizModel = $model->assignQuizModelBelongsToQuizModel;
        $quiz_id = $quizModel->id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/dashboard/quiz/publish', 'id' => $quiz_id]);
        }

        if (\Yii::$app->request->isAjax) {
            return $this->renderAjax('_publish/create', [
                'model' => $model,
                'quizModel' => $quizModel,
            ]);
        }

        return $this->render('_publish/create', [
            'model' => $model,
            'quizModel' => $quizModel,
        ]);
    }

    /**
     * Creates a new QuizModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new QuizModel();
        $model->teacher_id = \yii::$app->user->identity->userBelongsToUserType->id;
        $model->created_by = \yii::$app->user->identity->id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing QuizModel model.
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
     * Deletes an existing QuizModel model.
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
     * Finds the QuizModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return QuizModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = QuizModel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
