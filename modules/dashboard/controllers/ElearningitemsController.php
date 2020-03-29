<?php

namespace app\modules\dashboard\controllers;

use Yii;
use app\models\ELearningItemsModel;
use app\models\search\ELearningItemsModelSearch;
use app\controllers\MainController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ElearningitemsController implements the CRUD actions for ELearningItemsModel model.
 */
class ElearningitemsController extends MainController
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
     * Lists all ELearningItemsModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $id = \yii::$app->request->get('id');
        $user_id = \yii::$app->user->identity->id;
        $searchModel = new ELearningItemsModelSearch();
        $searchModel->elearning_id = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere([
            'created_by'=>$user_id,
            'elearning_type'=>'elearning',
        ]);            

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ELearningItemsModel model.
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
     * Creates a new ELearningItemsModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $elearning_id = \yii::$app->request->get('subject_id');
        $model = new ELearningItemsModel();
        $model->elearning_id = $elearning_id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->elearning_type = 'elearning';
            $model->created_by = \yii::$app->user->identity->id;
            $model->created_time = date('Y-m-d H:i:s');
            $model->save();
            return $this->redirect(['index','id'=>$elearning_id]);
            // return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ELearningItemsModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // return $this->redirect(['index']);
            // return $this->redirect(['/dashboard/elearning/view', 'id' => $model->elearning_id]);
            return $this->redirect(['index','id'=>$model->elearning_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ELearningItemsModel model.
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
     * Finds the ELearningItemsModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ELearningItemsModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ELearningItemsModel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
