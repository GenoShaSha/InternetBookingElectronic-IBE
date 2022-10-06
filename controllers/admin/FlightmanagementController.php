<?php

namespace app\controllers\admin;

use app\models\Flight;
use Yii;


class FlightmanagementController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;

    public function actionIndex()
    {   $model = new Flight();
        $allFlights = $model->findAllFlights();
        return $this->render('index', ['allFlights' => $allFlights]);
    }

    public function actionGetall()
    {
            $model = new Flight();
            $allFlights = $model->findAllFlights();
            return $allFlights;
    }

    
    public function actionSearch()
    { 
        $model = new Flight();
        $data = Yii::$app->request->post();
        $param = $data['iden'];
        $foundFlight = $model->findByFlightId($param);
        return $foundFlight;
    }
}
