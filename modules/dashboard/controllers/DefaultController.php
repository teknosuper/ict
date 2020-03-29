<?php

namespace app\modules\dashboard\controllers;

use Yii;
use yii\web\Controller;

/**
 * Default controller for the `dashboard` module
 */
class DefaultController extends \app\controllers\MainController
{

    /**
     * Exclude layout rendering when ajax requests
     */
    public function render($view, $params = [])
    {
        if (\Yii::$app->request->isAjax) {
            return $this->renderAjax($view, $params);
        }
        return parent::render($view, $params);
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        if(\yii::$app->user->isGuest)
        {
            return $this->redirect('site/login');
        }
        return $this->redirect('site/index');
        // return $this->render('/../../../views/site/index');
    }
}
