<?php

namespace app\controllers\admin;

use Yii;
use app\models\Flight;
use app\models\Plane;
use app\models\SeatAvailabilityFlight;


class CreateflightController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new Plane();
        $allPlaneNrs = $model->findAllPlaneNumbers();
        return $this->render('index', ['allPlaneNrs' => $allPlaneNrs]);
    }

    public function actionCreate()
    {
        $model = new Flight();
        $model2 = new SeatAvailabilityFlight();
        $model3 = new Plane();

        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $model->plane_nr = $data['plane_nr'];
            $model->from = $data['from'];
            $model->to = $data['to'];
            $model->arrival_terminal = $data['arrival_terminal'];
            $model->arrival_date = $data['arrival_date'];
            $model->departure_terminal = $data['departure_terminal'];
            $model->departure_date = $data['departure_date'];
            $model->economy_price = $data['economy_price'];
            $model->business_price = $data['business_price'];
            $model->save();

            $foundPlane = $model3->findObjectByPlaneNr($data['plane_nr']);
            $allSeats = $foundPlane->seat_columns * $foundPlane->seat_rows;
            $businessSeats = $foundPlane->seat_columns * $foundPlane->seat_rows_business;
            $economySeats = $allSeats - $businessSeats;
            $model2->flight_id = $model->flight_id;
            $model2->available_economy_seats = $economySeats;
            $model2->available_business_seats =$businessSeats;
            $model2->save();
            return "OK";
        } else {
            return 'error';
        }
    }
  
    public function actionSearchPlaneNr()
    { 
        $model = new Plane();
        $data = Yii::$app->request->post();
        $param = $data['iden'];
        $foundPlane = $model->findByPlaneNr($param);
        return $foundPlane;
    }
}
