<?php

namespace app\controllers\public;

use Yii;
use app\models\User;

class SignupController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSave()
    {
        $model = new user();
        if (Yii::$app->request->isAjax) 
        {
            $data = Yii::$app->request->post();
            $model->username = 'sss';
            $model->email = $data['email'];
            $model->password = $data['password'];
            $model->auth_key = 'sss';
            $model->access_token = 'ssss';
            $model->user_type = 'customer';
            $model->save();
            return "OK";
        } 
        else 
        {
            return 'error';
        }
    }
}
