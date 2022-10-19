<?php

namespace app\controllers\public;
use app\models\Flight;
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
        $foundSpecificFlights = $model->findSpecificFlights($from, $to, $departure_date,$seat_class,$passengers);
        return $this->redirect(['index', 'specificFlights' => $foundSpecificFlights]);
    }

  
}
