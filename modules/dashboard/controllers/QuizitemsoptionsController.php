<?php

namespace app\modules\dashboard\controllers;

use Yii;
use app\models\QuizItemsOptionsModel;
use app\models\search\QuizItemsOptionsSearch;
use app\controllers\MainController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * QuizitemsoptionsController implements the CRUD actions for QuizItemsOptionsModel model.
 */
class QuizitemsoptionsController extends MainController
{
    public function render($view, $params = [])
    {
        if (\Yii::$app->request->isAjax) {
            return $this->renderAjax($view, $params);
        }
        return parent::render($view, $params);
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    // 'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all QuizItemsOptionsModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $quiz_item_id = \yii::$app->request->get('quiz_item_id');
        $searchModel = new QuizItemsOptionsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where([
            'quiz_item_id'=>$quiz_item_id,
        ]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single QuizItemsOptionsModel model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new QuizItemsOptionsModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $quiz_item_id = \yii::$app->request->get('quiz_item_id');
        $model = new QuizItemsOptionsModel();
        $model->quiz_item_id = $quiz_item_id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/dashboard/quiz/view', 'id' => $model->quizItemsOptionsModelBelongsToQuizItemsModel->quiz_id]);
            // return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing QuizItemsOptionsModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/dashboard/quiz/view', 'id' => $model->quizItemsOptionsModelBelongsToQuizItemsModel->quiz_id]);
            // return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing QuizItemsOptionsModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model_id = $model->quizItemsOptionsModelBelongsToQuizItemsModel->quiz_id;
        $model->delete();

        return $this->redirect(['/dashboard/quiz/view', 'id' => $model_id]);
        // return $this->redirect(['index']);
    }

    /**
     * Finds the QuizItemsOptionsModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return QuizItemsOptionsModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = QuizItemsOptionsModel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
