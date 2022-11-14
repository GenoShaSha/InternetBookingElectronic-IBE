<?php

namespace app\controllers\public;

use app\models\Person;
use app\models\Booking;
use app\models\Bookingflight;
use app\models\Bookingperson;
use app\models\SeatAvailabilityFlight;

use Yii;


class PaymentgatewayController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSave()
    {
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $booking = new Booking();
            $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            $generatedNr = substr(str_shuffle($str_result), 0, 10);
            $booking->email = $data['email'];
            $booking->booking_nr = $generatedNr;
            if ($data['user'] != -1) {
                $booking->user_id = $data['user'];
            }
            $booking->seat_types = $data['seatType'];
            $booking->save();

            for ($i = 0; $i < count($data['passengers']); $i++) {
                $data2 = $data['passengers'][$i];
                $person = new person();
                $person->first_name = $data2['first_name'];
                $person->last_name = $data2['last_name'];
                $person->date_of_birth = $data2['date_of_birth'];
                $person->gender = $data2['gender'];
                $person->nationality = $data2['nationality'];
                $person->personal_doc_type = $data2['personal_doc_type'];
                $person->personal_doc_num = $data2['personal_doc_num'];
                $person->save();

                $bookingPerson = new Bookingperson();
                $bookingPerson->person_id = $person->person_id;
                $bookingPerson->booking_id = $booking->booking_id;
                $bookingPerson->check_in = 0;

                $bookingPerson->save();
            }


            for ($i = 0; $i < count($data['flightNr']); $i++) {
                $bookingFlight = new Bookingflight();
                $bookingFlight->booking_id = $booking->booking_id;
                $bookingFlight->flight_id = $data['flightNr'][$i]['plane_nr'];
                $bookingFlight->save();


                $seatAvailability = new SeatAvailabilityFlight();
                $flightSeats = $seatAvailability->getByFlightID($data['flightNr'][$i]['flight_id']);

                if ($data['seatType'] == 'economy') {
                    $flightSeats->available_economy_seats = $flightSeats->available_economy_seats - count($data['passengers']);
                } else {
                    $flightSeats->available_business_seats = $flightSeats->available_business_seats - count($data['passengers']);
                }
                $flightSeats->save();
            }
        }
    }
}
