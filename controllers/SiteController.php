<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends \app\controllers\MainController
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        // $getUserAgent = \Yii::$app->request->getUserAgent();
        // echo "<pre>";
        // print_r($getUserAgent);
        // echo "</pre>";
        // die;
        $this->layout ='main-dashboard';
        return $this->render('index');
    }

    public function actionRedirect($url)
    {
        if (substr($url, -1) == '/') {
            return $this->redirect(Yii::$app->getRequest()->getBaseUrl() . '/' . rtrim($url, '/'), 301);
        } else {
            throw new \yii\web\NotFoundHttpException;
        }
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = 'main-login2';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    // /**
    //  * Displays contact page.
    //  *
    //  * @return Response|string
    //  */
    // public function actionContact()
    // {
    //     $model = new ContactForm();
    //     if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
    //         Yii::$app->session->setFlash('contactFormSubmitted');

    //         return $this->refresh();
    //     }
    //     return $this->render('contact', [
    //         'model' => $model,
    //     ]);
    // }

    // /**
    //  * Displays about page.
    //  *
    //  * @return string
    //  */
    // public function actionAbout()
    // {
    //     return $this->render('about');
    // }
}
