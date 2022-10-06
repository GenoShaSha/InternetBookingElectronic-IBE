<?php

namespace app\controllers\public;

use Yii;
use app\models\User;

class SigninController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        $model = new user();
        if (Yii::$app->request->isAjax) 
        {
            $data = Yii::$app->request->post();
            $newUser = $model-> findCustomerByEmail($data['email']);
            if ($newUser->validatePassword($data['password'])) {
                Yii::$app->user->login($newUser);
            }
            return $this->redirect(['public/site/index']);
        } 
        else 
        {
            return 'error';
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}
