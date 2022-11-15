<?php

namespace app\controllers\public;
use app\models\Flight;
use yii\helpers\Json;
use Yii;


class SearchbookingController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSearch()
    {
        $model = new Flight();
        $data = Yii::$app->request->post();
        $from = $data['from'];
        $to = $data['to'];
        $departure_date = $data['departure_date'];
        $seat_class = $data['seat_class'];
        $passengers = $data['passengers'];
        $specificFlights = $model->findSpecificFlights($from, $to, $departure_date,$seat_class,$passengers);
        $specificFlights = JSON::encode($specificFlights);
        return $specificFlights;
    }

    public function actionSearchreturn()
    {
        $model = new Flight();
        $data = Yii::$app->request->post();
        $from = $data['from'];
        $to = $data['to'];
        $departure_date = $data['departure_date'];
        $return_date = $data['return_date'];
        $seat_class = $data['seat_class'];
        $passengers = $data['passengers'];
        $specificFlights = $model->findSpecificFlights($from, $to, $departure_date,$seat_class,$passengers);
        $specificReturnFlights = $model->findSpecificFlights($to, $from, $return_date,$seat_class,$passengers);

        $data = [$specificFlights,$specificReturnFlights];
        $data = JSON::encode($data);
        return $data;
    }
}
