<?php

namespace app\controllers\public;

class SuccessController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
