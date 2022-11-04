<?php

namespace app\controllers\public;
use app\models\SeatPerson;
use app\models\BookingPerson;

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
            $booking = new BookingPerson();
            $seat->seat_id = $data['seatID'];
            $seat->person_id = $data['personID'];
            $seat->flight_id = $data['flightID'];
            if( $seat->person_id == $booking->person_id)
            {
                $booking->check_in = 1;
            }
            $seat->save();
            $booking->save();            
        }
    }

}
