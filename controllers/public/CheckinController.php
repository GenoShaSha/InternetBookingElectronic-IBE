<?php

namespace app\controllers\public;
use app\models\SeatPerson;
use app\models\BookingPerson;
use app\models\FlightPerson;
use app\models\Seat;


use Yii;


class CheckinController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSave()
    {
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $seat = new SeatPerson();
            $seat->seat_id = $data['seatID'];
            $seat->person_id = $data['personID'];
            $seat->flight_id = $data['flightID'];
            $seat->save();
                        
            $isCheckedIn = new FlightPerson();
            $checkedIn = $isCheckedIn->findByFlightIdAndPersonId($data['flightID'],$data['personID']);
            $checkedIn->check_in = 1;
            $checkedIn->save();
        }
    }

}
