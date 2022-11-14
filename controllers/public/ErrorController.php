<?php

namespace app\controllers\public;

class ErrorController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
