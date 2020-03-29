<?php

namespace app\modules\student\controllers;

use Yii;
use yii\web\Controller;

/**
 * Default controller for the `student` module
 */
class DefaultController extends \app\controllers\MainController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionProfile()
    {
    	return $this->render('profile');
    }

    public function actionPassword()
    {
        $user_id = \yii::$app->user->identity->id; 
        $model = new \app\models\form\ChangePasswordForm;
        if ($model->load(Yii::$app->request->post())) {
            $user_model = \yii::$app->user->identity;
            $user_model->password = sha1($model->new_password);
            $user_model->save();
            \Yii::$app->session->setFlash('success','Selamat Password Telah Berhasil Dirubah');
            return $this->redirect(['/profile/password']);
            // return $this->redirect(['view', 'id' => $model->id]);
        }
    	return $this->render('password',[
            'model'=>$model
        ]);
    }
}
