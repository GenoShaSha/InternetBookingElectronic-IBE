<?php

namespace app\controllers\public;

use app\models\Booking;
use app\models\Flight;
use app\models\Bookingflight;
use app\models\Bookingperson;
use app\models\Person;
use Yii;
use yii\helpers\Json;

use PhpParser\Node\Expr\Cast\Bool_;

class GettripsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSearch()
    {
        $model = new Booking();
        $data = Yii::$app->request->post();
        $email = $data['email'];
        $bookingNr = $data['bookingNr'];

        $foundTrip = $model->findBookingByNrAndEmail($email,$bookingNr);

        $model2 = new Bookingflight();
        $foundConnectionFlightBookingList = $model2->getByBookingId($foundTrip->booking_id);

        $FlightsArray = [];
        for($i=0;$i<count($foundConnectionFlightBookingList);$i++){
            $flight = new Flight();
            $foundFlight = $flight->findObjectByFlightId($foundConnectionFlightBookingList[$i]->flight_id);
            array_push($FlightsArray, $foundFlight);
        }

        $model3 = new Bookingperson();
        $foundPassengerBookingList = $model3->getByBookingId($foundTrip->booking_id);
        $PassangersArray = [];
        for($i=0;$i<count($foundPassengerBookingList);$i++){
            $person = new Person();
            $foundPassengers = $person->getPassengerByID($foundPassengerBookingList[$i]->person_id);
            array_push($PassangersArray, $foundPassengers);
        }

        $AllBookingInformation = [];
        array_push($AllBookingInformation,$foundTrip,$FlightsArray,$PassangersArray);

        $data = JSON::encode($AllBookingInformation);


        return $data;
    }

}
