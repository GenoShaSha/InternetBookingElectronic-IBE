<?php

namespace app\controllers\public;
use Yii;
use app\models\Bookingflight;


class TripsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
