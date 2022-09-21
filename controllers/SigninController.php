<?php

namespace app\controllers;

use Yii;
use app\models\user;

class SigninController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
