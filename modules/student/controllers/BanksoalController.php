<?php

namespace app\modules\student\controllers;
use yii;
use yii\web\Response;
use yii\web\Controller;

use app\models\search\SubjectsPlanSearch;

/**
 * Default controller for the `student` module
 */
class BanksoalController extends \app\controllers\MainController
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


}