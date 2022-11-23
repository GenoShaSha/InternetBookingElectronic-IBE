<?php

namespace app\controllers\public;
use Yii;

class LanguageController extends \yii\web\Controller
{
    public function actionIndonesian()
    {
        Yii::$app->session->set('language', 'id');
        return $this->redirect(['public/site/index']);
    }

    public function actionEnglish()
    {
        Yii::$app->session->set('language', 'en');
        return $this->redirect(['public/site/index']);
    }

    public function actionBulgarian()
    {
        Yii::$app->session->set('language', 'bg');
        return $this->redirect(['public/site/index']);
    }


}
