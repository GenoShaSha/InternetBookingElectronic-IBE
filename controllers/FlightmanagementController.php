<?php

namespace app\controllers;

use app\models\Flight;
use Yii;


class FlightmanagementController extends \yii\web\Controller
{
    public function actionIndex()
    {
            $model = new Flight();
            $allFlights = $model->findAllFlights();

            return $this->render('index', ['allFlights' => json_encode($allFlights)]);
    }
}
