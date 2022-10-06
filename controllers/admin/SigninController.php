<?php

namespace app\controllers\admin;

use Yii;
use app\models\user;

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
            $newUser = $model->findAdminByEmail($data['email']);
            if ($newUser->validatePassword($data['password'])) {
                Yii::$app->user->login($newUser);
            }
            return $this->redirect(['admin/site/index']);
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
